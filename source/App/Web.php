<?php


namespace Source\App;


use http\Message;
use http\Params;
use Source\Core\Connect;
use Source\Core\Controller;
use Source\Models\Auth;
use Source\Models\Category;
use Source\Models\Faq\Questions;
use Source\Models\Post;
use Source\Models\User;
use Source\Support\Pager;
use function Sodium\library_version_minor;

/**
 * Class Web
 * @package Source\App
 */
class Web extends Controller
{
    /**
     * Web Controllers
     */
    public function __construct()
    {
        Connect::getInstance();
        parent::__construct(__DIR__ . "/../../themes/" . CONF_VIEW_THEME . "/");
    }

    /**
     * SITE HOME
     */
    public function home()
    {
        $head = $this->seo->render(
            CONF_SITE_NAME . CONF_SITE_TITLE,
            CONF_SITE_DESC,
            url(),
            url("/assets/image/shared/share.jpg")
        );

        echo $this->view->render("home", [
            "head" => $head,
            "video" => "",
            "blog" => (new Post())
                ->findK()
                ->order("post_at DESC")
                ->limit(6)
                ->fetch(true)
        ]);
    }

    /**
     * PAGINA SOBRE
     */
    public function about()
    {
        $head = $this->seo->render(
            CONF_SITE_NAME . CONF_SITE_TITLE,
            CONF_SITE_DESC,
            url("/sobre"),
            theme("/assets/image/share.jpg")
        );

        echo $this->view->render("about", [
            "head" => $head,
            "video" => "ZDehqEFKG-g",
            "faq" => (new Questions())
                ->find("channel_id = :id", "id=1", "question, response")
                ->order("order_by")
                ->fetch(true)
        ]);
    }

    /**
     * BLOG
     * @param array|null $data
     */
    public function blog(?array $data)
    {
        $head = $this->seo->render(
            CONF_SITE_NAME . CONF_SITE_TITLE,
            CONF_BLOG_DESC,
            url("/blog"),
            theme("/assets/image/share.jpg")
        );

        $blog = (new Post())->findK();
        $pager = new Pager(url("/blog/p/"));
        $pager->pager($blog->count(), 9, ($data['page'] ?? 1));

        echo $this->view->render("blog", [
            "head" => $head,
            "blog" => $blog->limit($pager->limit())->offset($pager->offset())->fetch(true),
            "paginator" => $pager->render(),

        ]);
    }

    /**
     * BLOG SEARCH
     */
    public function blogSearch(array $data): void
    {
        if (!empty($data['s'])) {
            $search = filter_var($data['s'], FILTER_SANITIZE_STRIPPED);
            echo json_encode(["redirect" => url("/blog/buscar/{$search}/1")]);
            return;
        }
        if (empty($data['terms'])) {
            redirect("/blog");
        }
        $search = filter_var($data['terms'], FILTER_SANITIZE_STRIPPED);
        $page = (filter_var($data['page'], FILTER_VALIDATE_INT) >= 1 ? $data['page'] : 1);

        $head = $this->seo->render(
            "Pesquisa Por {$search} -" . CONF_SITE_NAME,
            "Confira os resultados de sua pesquisa por {$search}",
            url("/blog/buscar/{$search}/{$page}"),
            theme("/assets/images/share.jpg")
        );

        $blogSearch = (new Post())->find("(title LIKE :s OR subtitle LIKE :s OR content LIKE :s)", "s=%{$search}%");
        if (!$blogSearch->count()) {
            echo $this->view->render("blog", [
                    "head" => $head,
                    "title" => "PESQUISA POR",
                    "search" => $search
                ]
            );
            return;
        }
        $pager = new Pager(url("/blog/buscar/{$search}/"));
        $pager->pager($blogSearch->count(), 9, $page);

        echo $this->view->render("blog", [
            "head" => $head,
            "title" => "Pesquisa Por",
            "search" => $search,
            "blog" => $blogSearch->limit($pager->limit())->offset($pager->offset())->fetch(true),
            "paginator" => $pager->render()
        ]);

    }

    /**
     * BLOG POST
     * @param array $data
     */
    public function blogPost(array $data)
    {
        $post = (new Post())->findByUri($data['uri']);
        if (!$post) {
            redirect('/404');
        }
        $post->views += 1;
        $post->save();


        $head = $this->seo->render(
            $post->title . CONF_SITE_TITLE,
            $post->subtitle,
            url("/blog/{$post->uri}"),
            image($post->cover, 1200, 628)
        );
        echo $this->view->render("blog-post", [
            "head" => $head,
            "post" => $post,
            "related" => (new Post())->find("category = :c AND id = :i", "c={$post->category}&i={$post->id}")
                ->order(rand())
                ->limit(3)
                ->fetch(true)
        ]);
    }

    /**
     * LOGIN PAGE
     */
    public function login(?array $data): void
    {
        if (!empty($data['csrf'])) {
            if (!csrf_verify($data)) {
                $json['message'] = $this->message->error("Erro ao enviar o formulário, tente novamente")->render();
                echo json_encode($json);
                return;
            }
            if(empty($data['email']) || empty($data['password'])){
                $json['message'] = $this->message->warning("Informe um email e senha para entrar :)");
                echo json_encode($json);
                return;
            }

            $save = (!empty($data['save']) ? true : false);
            $auth = new Auth();
            $login = $auth->login($data['email'], $data['password'], $save);

            if($login){
                $json['redirect'] = url("/app");
            }else{
                $json['message'] = $auth->message()->render();
            }
            echo json_encode($json);
            return;

        }

        $head = $this->seo->render(
            "Entrar - " . CONF_SITE_NAME . CONF_SITE_TITLE,
            CONF_SITE_DESC,
            url("/login"),
            theme("/assets/image/share.jpg")
        );

        echo $this->view->render("auth-login", [
            "head" => $head,
            "cookie"=> filter_input(INPUT_COOKIE, "authEmail")
        ]);
    }


    /**SITE REGISTER
     * @param|null array $data
     */
    public function register(?array $data): void
    {
        //validando o CSRF
        if (!empty($data['csrf'])) {
            if (!csrf_verify($data)) {
                $json['message'] = $this->message->error("Erro ao enviar o formulário, tente novamente")->render();
                echo json_encode($json);
                return;
            }
            //verificando se o usuario enviou todos os dados no formulario
            if (in_array("", $data)) {
                $json['message'] = $this->message->info("Preencha todos os dados para realizar o cadastro")->render();
                echo json_encode($json);
                return;
            }
            $auth = new Auth();
            $user = new User();
            $user->bootstrap(
                $data['first_name'],
                $data['last_name'],
                $data['email'],
                $data['password']
            );
            if ($auth->register($user)) {
                $json['redirect'] = url("/confirma");
            } else {
                $json['message'] = $auth->message()->render();
            }
            echo json_encode($json);
            return;


        }

        $head = $this->seo->render(
            "Cadastro - " . CONF_SITE_NAME . CONF_SITE_TITLE,
            CONF_SITE_DESC,
            url("/cadastrar"),
            theme("/assets/image/share.jpg")
        );
        echo $this->view->render("auth-register", [
            "head" => $head
        ]);
    }

    /**
     * FORGET PASSWORD
     */
    public function forget()
    {
        $head = $this->seo->render(
            "Recuperar - " . CONF_SITE_NAME . CONF_SITE_TITLE,
            CONF_SITE_DESC,
            url("/recuperar"),
            theme("/assets/image/share.jpg")
        );
        echo $this->view->render("auth-forget", [
            "head" => $head
        ]);

    }

    /**
     * CONFIRM REGISTER
     */
    public function confirm()
    {
        $head = $this->seo->render(
            "Confirmar Cadastro - " . CONF_SITE_NAME . CONF_SITE_TITLE,
            CONF_SITE_DESC,
            url("/confirmar"),
            theme("/assets/image/share.jpg")
        );
        echo $this->view->render("optin", [
            "head" => $head,
            "data" => (object)[
                "title" => "Falta pouco! Confirme seu cadastro.",
                "desc" => "Enviamos um link de confirmação para seu e-mail. Acesse e siga as instruções para concluir seu cadastro e comece a gerenciarseu pedidos com CaféFood",
                "image" => theme("/assets/images/optin-confirm.jpg")
            ]
        ]);
    }

    /**
     * SUCCESS REGISTER
     */
    public function success(array $data): void
    {
        $email = base64_decode($data['email']);
        $user = (new User())->findByEmail($email);

        if ($user && $user->status != "confirmed") {
            $user->status = "confirmed";
            $user->save();
        }

        $head = $this->seo->render(
            "Sucesso - " . CONF_SITE_NAME . CONF_SITE_TITLE,
            CONF_SITE_DESC,
            url("/sucesso"),
            theme("/assets/image/share.jpg")
        );
        echo $this->view->render("optin", [
            "head" => $head,
            "data" => (object)[
                "title" => "Tudo pronto. Você já pode gerenciar seus Pedidos :)",
                "desc" => "Bem-vindo(a) ao seu controle de pedidos, vamos tomar um café?",
                "image" => theme("/assets/images/optin-success.jpg"),
                "link" => url("/entrar"),
                "link_title" => "fazer login"
            ]
        ]);
    }


    /**
     * TERMS WEB SITE
     */
    public function terms()
    {

        $head = $this->seo->render(
            CONF_SITE_NAME . CONF_SITE_TITLE,
            CONF_SITE_DESC,
            url("/termo"),
            theme("/assets/image/share.jpg")
        );

        echo $this->view->render("terms", [
            "head" => $head
        ]);
    }

    /**
     * SITE NAV ERROR
     * @param array $data
     */
    public function error(array $data)
    {
        $error = new \stdClass();

        switch ($data['codigodoerro']) {
            case "problemas":
                $error->code = "Ops";
                $error->title = "Estamos enfrentado Problemas";
                $error->message = "texto para problemas";
                $error->linkTitle = "ENVIAR EMAIL";
                $error->link = "mailto:" . CONF_MAIL_SUPPORT;
                break;

            case "manutencao":
                $error->code = "Ops";
                $error->title = "Estamos em manutenção";
                $error->message = "texto para manutencao";
                $error->linkTitle = null;
                $error->link = null;
                break;

            default:
                $error->code = $data['codigodoerro'];
                $error->title = "Oops conteudo não encontrado";
                $error->message = "Sentimos muito, mas o conteudo que voce tentou acessar não existe...";
                $error->linkTitle = "Continuar nevegando";
                $error->link = url_back();
                break;
        }


        $head = $this->seo->render(
            "{$error->code} | {$error->title}",
            $error->message,
            url("/ops/{$error->code}"),
            theme("/assets/image/share.jpg"),
            false
        );

        echo $this->view->render(
            "error", [
                "head" => $head,
                "error" => $error
            ]
        );

    }

}
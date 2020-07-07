<?php

namespace Source\App;

use Source\Core\Controller;
use Source\Models\Auth;
use Source\Models\CafeApp\Product;
use Source\Models\Report\Access;
use Source\Models\Report\Online;
use Source\Models\User;
use Source\Support\Message;
use Source\Support\Pager;

/**
 * Class App
 * @package Source\App
 */
class App extends Controller
{
    /** @var User */
    private $user;
    /** @var Product */
    private $product;

    /**
     * App constructor.
     */
    public function __construct()
    {
        parent::__construct(__DIR__ . "/../../themes/" . CONF_VIEW_APP . "/");

        if (!$this->user = Auth::user()) {
            $this->message->warning("Efetue login para acessar o APP.")->flash();
            redirect("/entrar");
        }

        //(new Access())->report();
        //(new Online())->report();
    }

    /**
     * APP HOME
     */
    public function home()
    {
        $head = $this->seo->render(
            "Olá {$this->user->first_name}. Vamos controlar? - " . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url(),
            theme("/assets/images/share.jpg"),
            false
        );

        echo $this->view->render("home", [
            "head" => $head
        ]);
    }

/** Product */

    public function product(?array $data)
    {
        $head = $this->seo->render(
            "Produtos - " . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url("/produtos"),
            theme("/assets/images/share.jpg")
        );
        $product = (new Product())->findK(
            null,
            " app_product_category c ON p.id_category = c.id INNER JOIN app_environment ae ON p.id_environment = ae.id",
            null,
            "p.id, p.sku, p.ean, p.description, p.image, p.regular_price, p.sale_price, c.description as category, 
            ae.description as environment"

        );
        //var_dump($product);
        $pager = new Pager(url("/produtos/"));
        $pager->pager($product->count(), 10, ($data['page'] ?? 1));


        echo $this->view->render("product", [
            "head" => $head,
            "product"=>$product->limit($pager->limit())->offset($pager->offset())->fetch(true),
            "paginator"=>$pager->render()
        ]);
    }

    public function product_edit(?array $data)
    {
        if(!empty($data["update"])){
            $json["data"] = $data;
            echo json_encode($json);
            return;
        }
        $product = (new Product())->findById($data['id']);
        if(!$product){
            redirect("/404");
        }

        $head = $this->seo->render(
            "Edição Produto - " . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url("/produtos/edit/{$product->id}"),
            theme("/assets/images/share.jpg"),
            false
        );

        echo $this->view->render("product-edit", [
            "head"=>$head,
            "product"=>$product,
            "image"=>($product->photo() ? image($product->image, 400, 400) :
                theme("/assets/img/default.jpg", CONF_VIEW_APP)),
            "category"=>$product->category
        ]);

    }

    public function product_remove(array $data)
    {
        $product = (new Product())->findById($data['id']);
        if($product){
            $product->delete("id", $product->id);
        }
        $this->message->success("Tudo ok, produto removido com sucesso")->flash();
        $json['redirect'] = url_back();
        echo json_encode($json);
        var_dump($product);
    }
    /** Users */
    public function users(?array $data)
    {
        $head = $this->seo->render(
            "Lista de Usuarios - " . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url("/usuarios"),
            theme("/assets/images/share.jpg"),
            false
        );

        $user = (new User())->find();
        $pager = new Pager(url("/usuarios/"));
        $pager->pager($user->count(), 10, ($data['page'] ?? 1));

        echo $this->view->render("users", [
            "head" => $head,
            "user"=>$user->limit($pager->limit())->offset($pager->offset())->fetch(true),
            "paginator"=>$pager->render()
        ]);
    }

    /**
     * APP EXPENSE (Pagar)
     */
    public function expense()
    {
        $head = $this->seo->render(
            "Minhas despesas - " . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url(),
            theme("/assets/images/share.jpg"),
            false
        );

        echo $this->view->render("expense", [
            "head" => $head
        ]);
    }

    /**
     * APP INVOICE (Fatura)
     */
    public function invoice()
    {
        $head = $this->seo->render(
            "Aluguel - " . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url(),
            theme("/assets/images/share.jpg"),
            false
        );

        echo $this->view->render("invoice", [
            "head" => $head
        ]);
    }

    /**
     * APP PROFILE (Perfil)
     */
    public function profile()
    {
        $head = $this->seo->render(
            "Meu perfil - " . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url(),
            theme("/assets/images/share.jpg"),
            false
        );

        echo $this->view->render("profile", [
            "head" => $head
        ]);
    }

    /**
     * APP LOGOUT
     */
    public function logout()
    {
        (new Message())->info("Você saiu com sucesso " . Auth::user()->first_name . ". Volte logo :)")->flash();

        Auth::logout();
        redirect("/entrar");
    }
}
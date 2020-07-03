<?php


namespace Source\Models;


use http\Url;
use Source\Core\Model;
use Source\Core\Session;
use Source\Core\View;
use Source\Support\Email;

class Auth extends Model
{
    public function __construct()
    {
        parent::__construct("users", ["id"], ["email", "password"]);
    }

    public static function user(): ?User
    {
        $session = new Session();
        if (!$session->has("authUser")) {
            return null;
        }
        return (new User())->findById($session->authUser);
    }

    public static function logout(): void
    {
        $session = new Session();
        $session->unset("authUser");
    }

    public function register(User $user): bool
    {
        if (!$user->save()) {
            $this->message = $user->message;
            return false;
        }
        $view = new View(__DIR__ . "/../../shared/views/email");
        $message = $view->render("confirm", [

            "first_name" => $user->first_name,
            "confirm_link" => url("/obrigado/" . base64_encode($user->email))
        ]);

        (new Email())->bootstrap(
            "Ative sua conta no " . CONF_SITE_NAME,
            $message,
            $user->email,
            "{$user->first_name} {$user->last_name}"
        )->send();
        return true;
    }

    public function login(string $email, string $password, bool $save): bool
    {
        //verificando se o email esta em um formato válido
        if (!is_email($email)) {
            $this->message->warning("Email informado não é válido!");
            return false;
        }
        //criado ou deletenado o cooking de email
        if ($save) {
            setcookie("authEmail", $email, time() + 604800, "/");
        } else {
            setcookie("authEmail", null, time() - 3600, "/");
        }
        //verificando se o passqord esta em um formato valido de acordo com CONFIG
        if (!is_passwd($password)) {
            $this->message->warning("Senha informada não esta correta");
            return false;
        }
        //Validando email do usuario no banco
        $user = (new User())->findByEmail($email);
        if (!$user) {
            $this->message->error("Não existe cadastro com esse email");
            return false;
        }
        //Validando o password do usuario no banco
        if (!password_verify($password, $user->password)) {
            $this->message->error("Senha informada esta diferente do que temos cadastrado!");
            return false;
        }
        //Verificar se preciso atualizar o HASH de senha do usuario
        if (passwd_rehash($user->password)) {
            $user->password = $password;
            $user->save();
        }
        //LOGIN SE ESTIVER TUDO OK
        //Inicializa uma nova sessao de usuario
        (new Session())->set("authUser", $user->id);
        $this->message->success("Login Ok");
        return true;
    }

    public function forget(string $email): bool
    {
        $user = (new User())->findByEmail($email);

        if (!$user) {
            $this->message->warning("O e-mail informado não está cadastrado.");
            return false;
        }

        $user->forget = md5(uniqid(rand(), true));
        $user->save();

        $view = new View(__DIR__ . "/../../shared/views/email");
        $message = $view->render("forget", [
            "first_name" => $user->first_name,
            "forget_link" => url("/recuperar/{$user->email}|{$user->forget}")
        ]);

        (new Email())->bootstrap(
            "Recupere sua senha no " . CONF_SITE_NAME,
            $message,
            $user->email,
            "{$user->first_name} {$user->last_name}"
        )->send();

        return true;
    }


}
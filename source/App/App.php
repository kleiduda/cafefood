<?php


namespace Source\App;


use Source\Core\Controller;
use Source\Models\Auth;

class App extends Controller
{
    public function __construct()
    {
        parent::__construct(__DIR__ ."/../../themes/".CONF_VIEW_APP);
        //VALIDACAO
        
    }

    public function home()
    {
        echo flash();
        var_dump(Auth::user());
        echo "<a title='sair' href='".url("/app/sair")."'>Sair</a>";
    }

    public function logout()
    {
        
    }
}
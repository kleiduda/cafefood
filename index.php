<?php
ob_start();
require __DIR__ . "/vendor/autoload.php";

use Source\Core\Session;
use CoffeeCode\Router\Router;

$session = new Session();
$route = new Router(url(), ":");

/**
 * WEB ROUTE
 */

$route->namespace("Source\App");
$route->get("/", "Web:home");
$route->get("/sobre", "Web:about");

//blog
$route->group("/blog");
$route->get("/", "Web:blog");
$route->get("/p/{page}", "Web:blog");
$route->get("/{uri}", "Web:blogPost");
$route->post("/buscar", "Web:blogSearch");
$route->get("/buscar/{terms}/{page}", "Web:blogSearch");


//auth
$route->group(null);
$route->get("/entrar", "Web:login");
$route->post("/entrar", "Web:login");
$route->get("/cadastrar", "Web:register");
$route->post("/cadastrar", "Web:register");
$route->get("/recuperar", "Web:forget");

//optin
$route->get("/confirma", "Web:confirm");
$route->get("/obrigado/{email}", "Web:success");


//services
$route->get("/termo", "Web:terms");
$route->group("app");
$route->get("/", "App:home");
$route->get("/sair", "App:logout");

/**
 * ERROR ROUTE
 */
$route->namespace("Source\App")->group("/ops");
$route->get("/{codigodoerro}", "Web:error");

/**
 * ROUTE
 */

$route->dispatch();

/**
 * ERROR REDIRECT
 */

if ($route->error()) {
    $route->redirect("/ops/{$route->error()}");
}

ob_end_flush();


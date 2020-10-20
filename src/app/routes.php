<?php

/* Documentation: */
// https://packagist.org/packages/coffeecode/router

use CoffeeCode\Router\Router;

$router = new Router($_ENV["BASE"]);

// Router namespace
$router->namespace("App\Controllers");

// Home
$router->get("/", "Home:index");
$router->get("/home/usuario/{id}", "Home:getUser");

// Usuários
$router->get("/usuarios/{id}", "Users:getUser");

$router->dispatch();

if ($router->error()) {
    echo $router->error();
    // $router->redirect("/error/{$router->error()}");
}

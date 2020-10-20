<?php

use CoffeeCode\Router\Router;

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$router = new Router($_ENV["BASE"]);

// Router namespace
$router->namespace("Api\Controllers");

// Auth
$router->post("/login", "Auth:login");

// Usuários
$router->get("/usuarios", "Users:index");
$router->get("/usuarios/{id}", "Users:getUser");
$router->post("/usuarios", "Users:createUser");
$router->delete("/usuarios", "Users:deleteUser");
$router->put("/usuarios", "Users:updateUser");

$router->dispatch();

if ($router->error()) {
    echo $router->error();
}

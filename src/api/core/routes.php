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
$router->post("/login", "Auth:login"); // 1

// Usuários
$router->get("/usuario/{id}", "Users:getUser"); // 2
$router->put("/usuario", "Users:updateUser"); // 3
$router->post("/usuario", "Users:updateImg"); // 4
$router->delete("/usuario", "Users:deleteSession"); // 5

// Extras
$router->get("/usuarios", "Users:index");
$router->post("/usuario/criar", "Users:createUser");
$router->delete("/usuario/deletar", "Users:deleteUser");

$router->dispatch();

if ($router->error()) {
    echo $router->error();
}

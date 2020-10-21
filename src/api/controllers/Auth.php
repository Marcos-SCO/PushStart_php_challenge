<?php

namespace Api\Controllers;

use Api\Models\Model;
use \Firebase\JWT\JWT;

class Auth extends Model
{

    public function __construct()
    {
    }

    public function login()
    {
        $data = $this->getContents();
        extract($data);

        $selectUser = $this->customQuery("SELECT first_name, email, password FROM users WHERE email = :email", ["email" => $email], "fetch");

        if (isset($selectUser[0]->email)) {

            $passwordVerified = password_verify($password, $selectUser[0]->password);

            if ($selectUser && $passwordVerified) {

                if (!isset($_COOKIE['user'])) {
                    $expire_claim = time() + 3600;

                    setcookie('user', $selectUser[0]->first_name, $expire_claim, '/');

                    echo json_encode(
                        [
                            "status" => "Logado com sucesso!",
                            "email" => $email,
                            "expire_at" => $expire_claim
                        ]
                    );
                } else {
                    echo json_encode(
                        [
                            "status" => "Usuário já está logado",
                            "email" => $email,
                        ]
                    );
                }
            } else {
                echo json_encode(
                    ["status" => "Dados inválidos!"]
                );
            }
        } else {
            echo json_encode(
                ["status" => "Usuário não existe"]
            );
        }
    }

    public static function checkAuth()
    {
        $cookie = isset($_COOKIE['user']) ? true : false;

        if ($cookie) {
            return true;
        }

        http_response_code(401);
        echo json_encode(
            [
                "status" => "Usuário não autenticado"
            ]
        );
        exit();
    }

    public static function logout()
    {

        $removeCookie = isset($_COOKIE['user']) ? setcookie('user', null, -1, '/') : false;

        if ($removeCookie) {
            http_response_code(200);
            echo json_encode(
                [
                    "status" => "Usuário saiu!",
                ]
            );
        }
    }
}

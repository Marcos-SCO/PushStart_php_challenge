<?php

namespace Api\Controllers;

use App\Models\Model;
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

        $selectUser = $this->customQuery("SELECT email, password FROM users WHERE email = :email", ["email" => $email], "fetch");

        $passwordVerified = password_verify($password, $selectUser->password);

        if ($selectUser && $passwordVerified) {
            $secret_key = 123;
            $issuer_claim = "localhost";
            $audience_claim = "THE_AUDIENCE";
            $issuedat_claim = time();
            $notbefore_claim = $issuedat_claim + 10;
            $expire_claim = $issuedat_claim + 3600;
            $token = [
                "iss" => $issuer_claim,
                "aud" => $audience_claim,
                "iat" => $issuedat_claim,
                "nbf" => $notbefore_claim,
                "exp" => $expire_claim,
                "data" => [
                    "id" => $id,
                    "first_name" => $first_name,
                    "last_name" => $last_name,
                    "email" => $email
                ]
            ];

            http_response_code(200);

            $jwt = JWT::encode($token, $secret_key);
            echo json_encode(
                [
                    "status" => "Logado com sucesso!",
                    "email" => $email,
                    "expire_at" => $expire_claim,
                    "jwt" => $jwt,
                ]
            );
        } else {
            echo json_encode(
                ["status" => "Dados inválidos!"]
            );
        }
    }

    public static function checkAuth()
    {
        $http_header = apache_request_headers();

        if (isset($http_header['Authorization']) && $http_header['Authorization'] != null) {
            $bearer = explode(' ', $http_header['Authorization']);

            $token = explode('.', $bearer[1]);
            $header = $token[0];
            $payload = $token[1];
            $sign = $token[2];

            // Check signature
            $valid = JWT::decode($bearer[1], 123, ['HS256']);

            if ($valid) {
                return true;
            }
        }

        return false;
    }
}

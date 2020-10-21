<?php

namespace Api\Controllers;

use Api\Models\User;
use Api\Controllers\Auth;

class Users extends User
{
    public function index()
    {
        Auth::checkAuth();

        $users = $this->selectAll();
        if ($users) {
            http_response_code(200);
            echo json_encode($users);
        }
    }

    public function createUser()
    {
        $data = $this->getPostData();
        extract($data);

        // Find email in db
        $findUser = $this->selectBy("email", $email);

        // Password Hash
        $password = password_hash($password, PASSWORD_DEFAULT);

        if (!$findUser) {

            $img_path = $this->imgCreateHandler();

            $this->moveUpload($img_path);

            $this->insert([
                "first_name" => $first_name,
                "last_name" => $last_name,
                "email" => $email,
                "password" => $password,
                "img_path" => $img_path
            ]);

            http_response_code(201);
            echo json_encode(
                [
                    "status" => "Usuário criado com sucesso!",
                    $data
                ]
            );
        } else {
            http_response_code(401);
            echo json_encode(
                [
                    "status" => "Erro: Usuário já existe no DB",
                ]
            );
        }
    }

    public function deleteUser()
    {
        Auth::checkAuth();

        $data = $this->getContents();
        extract($data);

        $id = $this->customQuery("SELECT id_user FROM users WHERE email = :email", ["email" => $email]);
        if ($this->delete(["email" => $email])) {

            $this->deleteFolder($id[0]->id_user);

            // Expire session
            setcookie('user', null, -1, '/');

            http_response_code(200);

            echo json_encode(
                [
                    "status" => "Usuário deletado com sucesso!",
                    "response" => $data
                ]
            );
        } else {
            http_response_code(404);
            echo json_encode(
                [
                    "status" => "Erro: usuário não foi deletado"
                ]
            );
        }
    }

    public function updateUser()
    {
        Auth::checkAuth();

        $data = $this->getContents();
        extract($data);

        // Rehash password
        $password = password_hash($password, PASSWORD_DEFAULT);

        $updateUser = $this->update([
            "first_name" => $first_name,
            "last_name" => $last_name,
            "password" => $password,
            "email" => $email
        ], ["id_user" => $id_user]);

        if ($updateUser) {
            http_response_code(200);
            echo json_encode(
                [
                    "status" => "Atualizado com sucesso!",
                    "body" => $data
                ]
            );
        } else {
            http_response_code(401);
            echo json_encode(
                [
                    "status" => "Não foi possível atualizar"
                ]
            );
        }
    }

    public function updateImg()
    {
        Auth::checkAuth();

        $data = $this->getPostData();
        extract($data);

        $img_path = $this->imgCreateHandler();
        $this->moveUpload($img_path);

        $updateImg = $this->update([
            "img_path" => $img_path,
        ], ["id_user" => $id_user]);

        if ($updateImg) {
            http_response_code(200);
            echo json_encode(
                [
                    "status" => "Imagem do usuário atualizada com sucesso!",
                    "body" => $data
                ]
            );
        } else {
            http_response_code(401);
            echo json_encode(
                [
                    "status" => "Não foi possível atualizar a imagem do usuário"
                ]
            );
        }
    }

    public function getUser($id)
    {
        Auth::checkAuth();

        extract($id);
        http_response_code(200);

        $user = $this->selectUser($id);

        if ($user) {
            echo json_encode(
                [
                    "status" => "Usuário encontrado",
                    "response" => $user,
                    "img_complete_url" => $_ENV['BASE'] . $user->img_path
                ]
            );
        } else {
            http_response_code(404);

            echo json_encode(
                [
                    "status" => "Usuário não encontrado"
                ]
            );
        }
    }

    public function deleteSession()
    {
        Auth::checkAuth();

        $data = $this->getContents();
        extract($data);

        Auth::logout($email);
    }
}

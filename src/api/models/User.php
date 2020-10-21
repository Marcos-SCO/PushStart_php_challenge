<?php

namespace Api\Models;

use Api\Traits\ImgUpload;

class User extends Model
{

    use ImgUpload;

    public function __construct()
    {
        Self::$table = 'users';
    }

    public function selectAllUsers()
    {
        return $this->selectAll();
    }

    public function selectUser($id)
    {
        // extract($id);

        return $this->selectBy("id_user", $id);
    }
}

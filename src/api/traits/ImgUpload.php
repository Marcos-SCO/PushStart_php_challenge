<?php

namespace Api\Traits;

use Api\Models\Model;

trait ImgUpload
{
    /* Img methods Start */

    public function imgValidate()
    {
        $valid_extensions = ['jpeg', 'jpg', 'png', 'gif'];
        $imgExt = strtolower(pathinfo($_FILES['img_path']['name'], PATHINFO_EXTENSION));
        if (!in_array($imgExt, $valid_extensions)) {
            $valid_extensions = implode(', ', $valid_extensions);
            return "Enviei somente {$valid_extensions}";
        }
    }

    public function moveUpload($imgFullPath)
    {
        if ($_FILES["img_path"]["tmp_name"] != "") {
            return move_uploaded_file($_FILES['img_path']['tmp_name'], dirname(__DIR__, 2) . $imgFullPath);
        } else {
            return  "Envie uma imagem";
        }
    }

    public function imgCreateHandler()
    {
        $tableIdAutoIncrement = $this->customQuery("SELECT AUTO_INCREMENT
         FROM information_schema.TABLES
         WHERE TABLE_SCHEMA = :schema
         AND TABLE_NAME = :table", [
            'schema' => $_ENV['DBNAME'],
            'table' => Model::$table
        ]);
        $tableId = strval($tableIdAutoIncrement[0]->AUTO_INCREMENT);

        return $this->imgFullPath($tableId, $_FILES['img_path']['name']);
    }

    public function imgFullPath($id, $imgName)
    {
        // delete the folder
        $this->deleteFolder($id);
        if (!file_exists(dirname(__DIR__, 2) . "/public/img/" . Model::$table . "/id_$id")) {
            mkdir(dirname(__DIR__, 2) . "/public/img/" . Model::$table . "/id_$id");
        }
        $upload_dir = "/public/img/" . Model::$table . "/id_$id/";

        $imgFullPath = $upload_dir . $imgName;

        return $imgFullPath;
    }

    public function deleteFolder($id)
    {
        // Delete img with id named folder
        if (file_exists(dirname(__DIR__, 2) . "/public/img/" . Model::$table . "/id_$id")) {
            array_map('unlink', glob(dirname(__DIR__, 2) . "/public/img/" . Model::$table . "/id_{$id}/*.*"));
            rmdir(dirname(__DIR__, 2) . "/public/img/" . Model::$table . "/id_$id");
        }
    }
}

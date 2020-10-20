<?php

namespace App\Config;

use App\Interfaces\DatabaseInterface;

class Connection
{
    public $connection;

    public function __construct(DatabaseInterface $conn)
    {
        return $this->connection = $conn;
    }
}

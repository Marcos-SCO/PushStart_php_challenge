<?php 

require_once "./vendor/autoload.php";
require_once "./app/helpers/functions.php";

use App\Config\Connection;
use App\Config\MySql;

// Env variables will be in $_ENV array
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__, 1), '.env');
$dotenv->load();
// var_dump($_ENV);

// Timezone
date_default_timezone_set($_ENV["DEFAULT_TIME_ZONE"]);

// Connection 
$conn = new Connection(new MySql);

// Model instantiation and connection set
$model = new App\Models\Model($conn);

require_once "./app/routes.php";

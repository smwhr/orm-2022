<?php

use Illuminate\Database\Capsule\Manager as Capsule;

chdir(__DIR__);

include(__DIR__."/../vendor/autoload.php");

// si je lance
// php public/index.php test get


//de quoi avons-nous besoin pour faire fonctionner un ORM ?
//une connexion

//resultat : un entityManager

$conn = require("../config/config.php");

$capsule = new Capsule();
$capsule->addConnection($conn);

$capsule->setAsGlobal();
$capsule->bootEloquent();
//où est ma description de l'objet pour transformation ???

// routing
$controller_name = "Controller\\".ucfirst($argv[1])."Controller";
$controller = new $controller_name();
$action = $argv[2];


//ici, j'aurais
// TestController->get()
$controller->$action();




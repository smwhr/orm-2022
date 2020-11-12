<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

include("../vendor/autoload.php");

//routing à partir de l'url
$url = $_SERVER['REQUEST_URI'];

//et si on créait l'entityManager ?
// de quoi à besoin un entityManager
// - une connexion
$conn = require("../config/config.php");
// - où trouver les définition des classes
$definitions = Setup::createAnnotationMetadataConfiguration([
  __DIR__."/models"], /*isDevMode*/ true );

$em = EntityManager::create($conn, $definitions);

$controller = new Controller\TestController($em);


$controller->get();
<?php

require '../vendor/autoload.php';
require '../Model/conexion.php';

$config = ["settings" => [
    "displayErrorDetails" => true
]];

$app = new  \Slim\App($config);

require "../src/rutasAll.php";

$app->run();

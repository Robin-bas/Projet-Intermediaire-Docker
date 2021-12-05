<?php
require_once "vendor/autoload.php";

// database configuration parameters
try {
    $bdd = new PDO('mysql:host=db;dbname=docker-inter', 'root', 'example');
}
catch(Exception $e) {
    die('Erreur : '.$e->getMessage());
}
echo 'hello from autoload';
?>
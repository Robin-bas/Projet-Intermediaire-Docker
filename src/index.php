<?php
session_start();

require_once('Controller/Router.php');

$router = new Router();
$router->getController();
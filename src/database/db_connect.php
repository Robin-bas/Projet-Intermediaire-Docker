<?php
	try {
		$bdd = new PDO('mysql:host=db;dbname=docker-inter', 'root', 'example');
	}
	catch(Exception $e) {
		die('Erreur : '.$e->getMessage());
	}

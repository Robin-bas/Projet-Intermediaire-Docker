<?php
	try {
		$bdd = new PDO('mysql:host=db;dbname=docker-inter', 'root', 'example');
	}
	catch(Exception $e) {
		die('Erreur : '.$e->getMessage());
	}

    //include('db_connect.php');
    $requete_SQL = 'SELECT * FROM Users WHERE id=1';
    $response = $bdd->query( $requete_SQL );

    while ( $data = $response->fetch() ) {
        var_dump($data);
    }
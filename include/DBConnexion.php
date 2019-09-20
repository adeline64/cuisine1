<?php
    try {
	   $db = new PDO('mysql:host=localhost;dbname=owlbook;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch (Exception $e) {
    	echo 'Connexion impossible:<br>'.$e->getMessage();
    	exit;
    }
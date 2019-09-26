<?php
    try {
	   $db = new PDO('mysql:host=localhost;dbname=cuisine;charset=utf8', 'step35', 'step35',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch (Exception $e) {
    	echo 'Connexion impossible:<br>'.$e->getMessage();
    	exit;
    }
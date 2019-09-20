<?php

spl_autoload_register(function ($className) {
	$dirClass = 'code/php/class/'.$className.'.class.php';
	if(file_exists($dirClass)){
		require_once $dirClass;
	}else{
		echo 'Fichier '.$dirClass.' Introuvable';
	}
});



/**
 * Fonction servant au debug de l'application
 * @param string $text le texte a afficher
 * @param boolean $force force l'affichage ssi true
 */
function debug ($text,$force=false) {
    if (defined('_DEBUG_') || $force) {
        if (is_array($text) || is_object($text)) {
            echo '<pre>'.print_r($text,true).'</pre>'.PHP_EOL;
        } else {
            echo '<br/>'.$text.PHP_EOL;
        }
    }
}
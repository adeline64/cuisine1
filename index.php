<?php


ini_set('display_errors', '1');
ini_set('error_reporting', E_ALL);
    error_reporting(E_ALL);
    define('_DEBUG_',1);
   
    //Les fonctions communes
    require_once 'include/functions.php';
    
    // On demarre la session
    session_start(); 

    //la connexion � la base
    require_once 'include/DBConnexion.php';
   
    //debug($_SESSION);

    if (array_key_exists("initsession", $_POST)) {
        $_SESSION = array();
	   debug($_SESSION,true);
    }

    
?>

<html lang="fr">
<head>

<!-- header -->

<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=10">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="X-UA-Compatible" content="chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
 
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="bootstrap/dist/css/bootstrap.min.css">
    <script src="util/tether/dist/css/tether.min.css"></script>
    <script src="util/tether/dist/css/tether-theme-arrows.min.css"></script>
    <script src="util/tether/dist/css/tether-theme-basic.min.css"></script>
    <script src="util/tether/dist/css/tether-theme-arrows-dark.min.css"></script>
 
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title></title>
</head>
<body>

<!-- contenu -->


<?php

  include_once "code/html/navbar.php";

  ?>

<div class="container">

  <?php


if (empty($_SESSION['utilisateur'])) {

  if (!empty($_GET['page'])&& $_GET['page'] == 'boisson') 
    { include_once "code/html/boisson.php"; } 
  else if (!empty($_GET['page'])&& $_GET['page'] == 'carte') 
    { include_once "code/html/carte.php"; } 
  else if (!empty($_GET['page'])&& $_GET['page'] == 'carto') 
    { include_once "code/html/carto.php"; }
  else if (!empty($_GET['page'])&& $_GET['page'] == 'commentaire') 
    { include_once "code/html/commentaire.php";}
  else if (!empty($_GET['page'])&& $_GET['page'] == 'connexion') 
    { include_once "code/html/connexion.php"; }
  else if (!empty($_GET['page'])&& $_GET['page'] == 'contact') 
    { include_once "code/html/contact.php";}
  else if (!empty($_GET['page'])&& $_GET['page'] == 'inscription') 
    { include_once "code/html/inscription.php"; }
  else if (!empty($_GET['page'])&& $_GET['page'] == 'menu') 
    { include_once "code/html/menu.php"; }
  else if (!empty($_GET['page'])&& $_GET['page'] == 'reservation') 
    { include_once "code/html/reservation.php"; }
  else if (!empty($_GET['page'])&& $_GET['page'] == 'restauration') 
    { include_once "code/html/restauration.php"; }
  else { //par defaut accueil 
    include_once "code/html/accueil.php"; }
  }else{
    //connecte

  if (!empty($_GET['page'])&& $_GET['page'] == 'carte') 
    { include_once "code/html/carte.php"; } 
  else if (!empty($_GET['page'])&& $_GET['page'] == 'carto') 
    { include_once "code/html/carto.php"; }
  else if (!empty($_GET['page'])&& $_GET['page'] == 'minichat') 
    { include_once "code/html/minichat.php";}
  else if (!empty($_GET['page'])&& $_GET['page'] == 'commentaire') 
    { include_once "code/html/commentaire.php";}
    else if (!empty($_GET['page'])&& $_GET['page'] == 'connexion') 
    { include_once "code/html/connexion.php"; }
  else if (!empty($_GET['page'])&& $_GET['page'] == 'contact') 
    { include_once "code/html/contact.php";}
  else if (!empty($_GET['page'])&& $_GET['page'] == 'inscription') 
    { include_once "code/html/inscription.php"; }
  else if (!empty($_GET['page'])&& $_GET['page'] == 'menu') 
    { include_once "code/html/menu.php"; }
  else if (!empty($_GET['page'])&& $_GET['page'] == 'mesreservations') 
    { include_once "code/html/mesreservations.php"; }
  else if (!empty($_GET['page'])&& $_GET['page'] == 'reservation') 
    { include_once "code/html/reservation.php"; }
  else if (!empty($_GET['page'])&& $_GET['page'] == 'restauration') 
    { include_once "code/html/restauration.php"; } 
  else if (!empty($_GET['page'])&& $_GET['page'] == 'boisson') 
    { include_once "code/html/boisson.php"; }
  else { //par defaut accueil 
    include_once "code/html/accueil.php"; }

  }

?>
</div>
<?php

  include_once "code/html/footer.php";

  ?>



<script src="util/jquery/jquery-3.3.1.slim.min.js"></script>
<script src="util/jsdelivr/html5shiv/dist/html5shiv.min.js"></script>
<script src="util/jsdelivr/html5shiv/dist/html5shiv-printshiv.min.js"></script>
<script src="util/jsdelivr/respond.min.js"></script>
<script src="util/popper/popper.min.js"></script>
<script src="util/tether/dist/js/tether.min.js"></script>
<script src="javascript/verificationForm.js"></script>
</body>
</html>
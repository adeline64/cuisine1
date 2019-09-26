<?php
if (!empty($_SESSION['utilisateur'])) {
    /*
	 * Nous sommes dans le cas d'un utilsateur connect�
	 */
?>

<p>
    ATTENTION !!!! 
    Vous êtes déja connecté
</p>

<?php

}else{
if (!empty($_POST)) {
	echo '<br>$_POST non vide';
	echo '<br>Donnees envoyees:';
	echo '<pre>'.print_r($_POST,true).'</pre>';

	

	$oManagerUtilisateur = new ManagerUtilisateur();
	$oManagerUtilisateur -> setDb($db);
	//connexion de l'utilisateur
	$_SESSION['utilisateur'] = $oManagerUtilisateur->connecte($_POST['email'], $_POST['password']);
	
	//redirection
   header("Location: index.php?page=accueil");
	

}

?>

<div class="row align-items-start">
    <div class="col-12 col-md-12 ">
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 formulaire">                    
            <div class="panel panel-info" >
                <div class="panel-heading">
                    <div class="panel-title">Se connecter</div>
                </div>     

                <div style="padding-top:30px" class="panel-body" >
                    <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                        <form action="?page=connexion" method="post">
                                                    
                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input id="email" type="email" class="form-control" name="email" value="" placeholder="adresse email" required autofocus>                                        
                            </div>
                                                
                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input id="password" type="password" class="form-control" name="password" placeholder="mot de passe" required>
                            </div>
                                                    

                            <div style="margin-top:10px" class="form-group">
                            <!-- Button -->

                                <div class="col-sm-12 controls">
                                <input type="submit" name="connexion" id="button" class="btn_connexion" value="connexion" >
                                                                                         
                                </div>
                            </div>
                        </form>     


                    </div>                     
                </div>  
                                
                               

            </div> 
        </div>
    </div>
</div>


<?php

}
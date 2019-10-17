<?php
if (!empty($_SESSION['utilisateur'])) {

    $utilisateur=$_SESSION['utilisateur'];

    if ( ! empty( $_POST ) ) {

        if ( ! isset(
            $_POST['dateheure'],
            $_POST['nbPersonne']
            ) )
        {
            echo "il manque une ou plusieurs donnees";
            

        } else {
            $managerReservation = new ManagerReservation();
            $managerReservation->setDb( $db );
            $reservation = $managerReservation->add( $_POST);
            $reservation->setUtilisateur($utilisateur->getId());
            $managerReservation->update($reservation);

        }
    }
    /*
	 * Nous sommes dans le cas d'un utilsateur connect�
	 */
    ?>

<div class="jumbotron jumbotron-sm">
    <div class="container">
        <div class="row reser">
            <div class="col-sm-12 col-lg-12">
                <h1 class="h1">
                    Reserve chez nous ! <small>Gardons le contact</small>
                </h1>
            </div>
        </div>
    </div>
</div>

    <a href="?page=mesreservations" class="btn btn-reser btn-lg active" role="button" aria-pressed="true">Mes reservations</a><br>
                    
<div class="row">
    <div class="col-md-8">
        <div class="well well-sm"><br>
            <form action="?page=reservation" method="post">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nom">
                                Nom
                            </label>
                            <input type="text" class="form-control" name="nom" id="nom" placeholder="Votre nom" autofocus required/>
                        </div>
                        <div class="form-group">
                            <label for="prenom">
                                Prenom
                            </label>
                            <input type="text" class="form-control" name="prenom" id="prenom" placeholder="Votre prenom" required/>
                        </div>
                        <div class="form-group">
                            <label for="email">
                                Email 
                            </label>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope">
                                </span>
                                <input type="email" class="form-control" name="email" id="email" placeholder="votre email" required /></div>
                            </div>
                        <div class="form-group">
                            <label for="telephone">
                                Téléphone 
                            </label>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope">
                                </span>
                                <input type="telephone" class="form-control" name="telephone" id="telephone" placeholder="votre n°telephone" required /></div>
                        </div>
                        <div class="form-group">
                            <label for="adresse">
                                Adresse 
                            </label>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                </span>
                                <input type="adresse" class="form-control" name="adresse" id="adresse" placeholder="votre Adresse" required/></div>
                        </div>
                        <div class="form-group">
                            <label for="date">
                                Date 
                            </label>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                </span>
                                <input type="date" class="form-control" name="dateheure" id="dateheure" placeholder="Date de réservation" required/></div>
                        </div>
                        <div class="form-group">
                            <label for="nbPersonne">
                                Nombre de personne </label>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                </span>
                                <input type="nbPersonne" class="form-control" name="nbPersonne" id="nbPersonne" placeholder="nbPersonne" required/></div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <input type="submit" name="Reserver" id="button" class="btn_reservation" value="Reserver">
                    </div><br>
                </div>
            </form>
        </div>
    </div>
</div><br>

<p>
    Une question ? Parlez en ici : <a href="?page=minichat">avec notre équipe</a>
</p>


<?php

}else{

    ?>

<div class="jumbotron reser">
  <h1 class="display-4">Cher Client</h1>
  <p class="lead">Vous êtes déconnectés.</p>
  <hr class="my-4">
  <p>Merci de vous connecter pour pouvoir effectuer une réservation.</p>
  <p class="lead">
    <a class="btn btn-reser btn-lg" href="?page=connexion" role="button">Connexion</a>
  </p>
</div>


<?php

}

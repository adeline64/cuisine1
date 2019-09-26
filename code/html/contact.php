<?php
if (!empty($_SESSION['utilisateur'])) {
    /*
	 * Nous sommes dans le cas d'un utilsateur connect�
	 */

    $utilisateur=$_SESSION['utilisateur'];

    if ( ! empty( $_POST ) ) {

        if ( ! isset(
            $_POST['message']
            ) )
        {
            echo "il manque une ou plusieurs donnees";
            

        } else {
            $managerContact = new ManagerContact();
            $managerContact->setDb( $db );
            $contact = $managerContact->add( $_POST);
            $contact->setUtilisateur($utilisateur->getId());
            $managerContact->update($contact);

        }
    }

    ?>
<div class="jumbotron jumbotron-sm">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <h1 class="h1">
                    Contact nous <small>Gardons le contact</small></h1>
            </div>
    </div>
</div>
    <div class="row">
        <div class="col-md-8">
            <div class="well well-sm">
                <form action="?page=contact" method="post">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nom">
                                Nom</label>
                            <input type="text" class="form-control" name="nom" id="nom" placeholder="Votre nom" required autofocus/>
                        </div>
                        <div class="form-group">
                            <label for="prenom">
                                Prenom</label>
                            <input type="text" class="form-control" name="*prenom" id="prenom" placeholder="Votre prenom" required />
                        </div>
                        <div class="form-group">
                            <label for="email">
                                Email </label>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                </span>
                                <input type="email" class="form-control" name="email" id="email" placeholder="votre email" required /></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                Message</label>
                            <textarea name="message" name="message" id="message" class="form-control" rows="9" cols="25" required
                                placeholder="Message"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                    <input type="submit" name="contact" id="button" class="btn_contact" value="Contact">
                    </div>
                </div>
                </form>
            </div>
        </div>
        <div class="col-md-4">
        <form>
            <legend><span class="glyphicon glyphicon-globe"></span> Notre restaurant</legend>
            <address>
                <strong>La Fabrique du petit mangé</strong><br>
                795 Folsom Ave, Suite 600<br>
                San Francisco, CA 94107<br>
                <abbr title="telephone">
                    Telephone:</abbr>
                    0559876545
            </address>
            <address>
                <strong>Notre email</strong><br>
                <a href="mailto:#">first.last@example.com</a>
            </address>
            </form>
        </div>
    </div>

    <p style="text-align: justify;">Postremo ad id indignitatis est ventum, ut cum peregrini ob formidatam haut ita dudum alimentorum <br>
            inopiam pellerentur ab urbe praecipites, sectatoribus disciplinarum liberalium inpendio paucis sine 
            respiratione ulla extrusis, tenerentur minimarum adseclae veri, quique id simularunt 
            ad tempus, et tria milia saltatricum ne interpellata quidem cum choris totidemque remanerent magistris.</p>
<?php

}else{

    ?>

<p>
    Merci de vous connecter pour pouvoir effectuer une réservation. <br>
</p>

<p>
    Pour vous connecter, rendez vous ici : <a href="?page=connexion">Connexion</a>
</p>

<?php

}
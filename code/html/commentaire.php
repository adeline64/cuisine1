<?php

	$managerCommentaire = new ManagerCommentaire();
    $managerCommentaire->setDb($db);
	$commentaires = $managerCommentaire->getAllCommentaire();

	
debug($_POST);
if (!empty($_SESSION['utilisateur'])) {

    $utilisateur=$_SESSION['utilisateur'];

    if ( ! empty( $_POST ) ) {

        if ( ! isset(
            $_POST['titre'],
            $_POST['contenu']
            ) )
        {
            echo "il manque une ou plusieurs donnees";
            

        } else {
            $managerCommentaire = new ManagerCommentaire();
            $managerCommentaire->setDb( $db );
            $commentaire = $managerCommentaire->add( $_POST);
            $commentaire->setUtilisateur($utilisateur->getId());
            $managerCommentaire->update($commentaire);

        }
    }
    /*
	 * Nous sommes dans le cas d'un utilsateur connect�
	 */

	 ?>


<div class="row">
	<div class="col-md-8">
		<div class="well well-sm">
			<form action="?page=commentaire" method="post">
                <div class="row">
                    <div class="col-md-6">
						<div class="form-group">
							<label for="nom">
								Nom
							</label>
							<input type="text" class="form-control" name="nom" id="nom" placeholder="Votre nom" required autofocus/>
						</div>
						<div class="form-group">
							<label for="prenom">
								Prenom
							</label>
							<input type="text" class="form-control" name="prenom" id="prenom" placeholder="Votre prenom" required />
						</div>
						<div class="form-group">
							<label for="titre">
								Titre
							</label>
							<input type="text" class="form-control" name="titre" id="titre" placeholder="Donner un titre" required />
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="name">
								Message
							</label>
							<textarea name="contenu" name="contenu" id="contenu" class="form-control" rows="9" cols="25" required
									placeholder="Message">
							</textarea>
						</div>
					</div>
                    <div class="col-md-12">
                    	<input type="submit" name="poster" id="button" class="btn_poster" value="Poster">
                    </div>
                </div>
       		</form>
    	</div>
	</div>
</div>

<h1>Commentaire</h1>

	<?php
			//	var_dump($commentaires);
			foreach($commentaires AS $commentaire){
		?>
	

			<ul class="comments-list reply-list">
				<li>
					<div class="comment-box">
						<div class="comment-head">
							<span>
								Titre : <?= $commentaire['titre'] ?>
							</span>
							<i class="fa fa-reply"></i>
							<i class="fa fa-heart"></i>
						</div>
					<div class="comment-content"> 
						Commentaire : <?= $commentaire['contenu'] ?><br>
					</div>
									
				</li>
			</ul>


<?php
}

}else{
?>


	<h1>Commentaire</h1>

		<?php
			//	var_dump($commentaires);
			foreach($commentaires AS $commentaire){
		?>
	

			<ul class="comments-list reply-list">
				<li>
					<div class="comment-box">
						<div class="comment-head">
							<span>
								Titre : <?= $commentaire['titre'] ?>
							</span>
							<i class="fa fa-reply"></i>
							<i class="fa fa-heart"></i>
						</div>
					<div class="comment-content"> 
						Commentaire : <?= $commentaire['contenu'] ?><br>
					</div>
									
				</li>
			</ul>


<?php
	
}
}
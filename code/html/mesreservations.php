<?php

	
	
debug($_POST);
if (!empty($_SESSION['utilisateur'])) {

    /*
	 * Nous sommes dans le cas d'un utilsateur connect�
	 */
    $managerReservation = new ManagerReservation();
    $managerReservation->setDb($db);
	$reservations = $managerReservation->getAllReservation();

	 ?>

<h1>Reservation</h1>

	<?php
			//	var_dump($commentaires);
			foreach($reservations AS $reservation){
		?>
	

			<ul class="comments-list reply-list">
				<li>
					<div class="comment-box">
						<div class="comment-head">
							<span>
								Date : <?= $reservation['dateheure'] ?>
							</span>
							<i class="fa fa-reply"></i>
							<i class="fa fa-heart"></i>
						</div>
					<div class="comment-content"> 
						Nombre de personne : <?= $reservation['nbPersonne'] ?><br>
					</div>
									
				</li>
			</ul>

<?php

    }
}
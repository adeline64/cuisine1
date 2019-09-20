<?php
/**
 * Created by PhpStorm.
 * User: Adeline
 * Date: 23/02/2019
 * Time: 09:45
 */

class ManagerUtilisateur extends Manager{

	public function construct($mode='prod') {
		parent::__construct( $mode );
	}

	public function read($id){
		echo '<br>[debug]Dans "'.__FUNCTION__.'" [/debug]';
		$req = $this->db->prepare('SELECT * FROM utilisateur WHERE id =:id');
		$req->bindValue('id', $id, PDO::PARAM_INT);
		$req->execute();
		$array = $req->fetch(PDO::FETCH_ASSOC);
		$utilisateur = new utilisateur($array);

		return $utilisateur;
	}

	public function add( $data) {
		echo '<br>[debug]Dans "'.__FUNCTION__.'" [/debug]';
		//bloc try/catch pour g�rer les exceptions
		//provenant de utilisateur
		try {
			$utilisateur = new utilisateur( $data);
		} catch (LengthException $lengthException) {
			//cas longueur == 0
			throw new Exception($lengthException->GetMessage(),$lengthException->GetCode());
		} catch (Exception $exception) {
			//autre cas (mais pour nous invalide)
			throw new Exception($exception->GetMessage(),$exception->GetCode());
		}
		$req = $this->db->prepare('INSERT INTO utilisateur (nom,prenom,email,date_reservation) VALUES(:nom,:prenom,:email,:date_reservation)');
		$req->bindValue('nom', $utilisateur->getNom(), PDO::PARAM_STR);
		$req->bindValue('prenom', $utilisateur->getPrenom(), PDO::PARAM_STR);
		$req->bindValue('email', $utilisateur->getEmail(), PDO::PARAM_STR);
		$req->bindValue('date_reservation', $utilisateur->getDateReservation(), PDO::PARAM_STR);
		$req->execute();
		$id = $this->db->lastInsertId();
		$utilisateur->setId($id);
	}

	public function update($data){
        echo '<pre>'.print_r($data,true).'</pre>';

        echo '<br>[debug]SESSION';
        echo '<pre>'.print_r($_SESSION,true).'</pre>';
        $req = $this->db->prepare('UPDATE utilisateur SET nom =:nom, prenom =:prenom,email =:email, date_reservation=:date_reservation WHERE id =:id');
        $req->bindValue('id', $data->getId(), PDO::PARAM_INT);
        $req->bindValue('nom', $data->getNom(), PDO::PARAM_STR);
        $req->bindValue('prenom', $data->getPrenom(), PDO::PARAM_STR);
        $req->bindValue('email', $data->getEmail(), PDO::PARAM_STR);
		$req->bindValue('date_reservation', $data->getDateReservation(), PDO::PARAM_STR);
        if (! $req->execute()) {
	        echo "<br>[debug] Erreur";
        }
    }

	public function delete($id) {
		// =>voir  getLivre(id) pour modele
		$req = "DELETE FROM utilisateur WHERE id=:id";
		$stmt = $this->db->prepare($req);
		$stmt->execute();
		if ($stmt->rowCount() == 1) {
			echo '[debug]OK 1 ligne inseree';
		} else {
			echo 'Erreur insertion donnees';
		}

	}



}
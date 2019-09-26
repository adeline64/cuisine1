<?php
/**
 * Created by PhpStorm.
 * User: Adeline
 * Date: 23/02/2019
 * Time: 09:45
 */

class ManagerReservation extends Manager{

	public function construct($mode='prod') {
		parent::__construct( $mode );
	}

	public function read($id){
		echo '<br>[debug]Dans "'.__FUNCTION__.'" [/debug]';
		$req = $this->db->prepare('SELECT * FROM reservation WHERE id =:id');
		$req->bindValue('id', $id, PDO::PARAM_INT);
		$req->execute();
		$array = $req->fetch(PDO::FETCH_ASSOC);
		$reservation = new reservation($array);

		return $reservation;
	}


	public function getAllReservation() {
		$reservations = $this->db->query("SELECT * FROM reservation");

		return $reservations->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getReservation($id) {
		$reservation = "SELECT * FROM reservation WHERE id=:id";
		//preparation == protection des donn�es � venir
		$reservations = $this->db->prepare($reservation);
		//liaison des marqueur :toto aux donnees
		$reservations->bindValue('id',$id,PDO::PARAM_INT);
		//execution de la requete sur le serveur SQL
		$reservations->execute();
		return $reservations;
	}

	public function add( $data) {
		echo '<br>[debug]Dans "'.__FUNCTION__.'" [/debug]';
		//bloc try/catch pour g�rer les exceptions
		//provenant de restaurant
		try {
			$reservation = new reservation($data);
		} catch (LengthException $lengthException) {
			//cas longueur == 0
			throw new Exception($lengthException->GetMessage(),$lengthException->GetCode());
		} catch (Exception $exception) {
			//autre cas (mais pour nous invalide)
			throw new Exception($exception->GetMessage(),$exception->GetCode());
		}
		$req = $this->db->prepare('INSERT INTO reservation (dateheure,nbPersonne,utilisateur) VALUES(:dateheure,:nbPersonne,:utilisateur)');
		$req->bindValue('dateheure', $reservation->getDateheure(), PDO::PARAM_STR);
		$req->bindValue('nbPersonne', $reservation->getNbPersonne(), PDO::PARAM_STR);
		$req->bindValue('utilisateur', $reservation->getUtilisateur(), PDO::PARAM_INT);
		$req->execute();
		$id = $this->db->lastInsertId();
		$reservation->setId($id);
		return $reservation;
	}

	public function update($data){
        echo '<pre>'.print_r($data,true).'</pre>';

        echo '<br>[debug]SESSION';
        echo '<pre>'.print_r($_SESSION,true).'</pre>';
        $req = $this->db->prepare('UPDATE reservation SET dateheure=:dateheure,nbPersonne=:nbPersonne,utilisateur=:utilisateur WHERE id =:id');
        $req->bindValue('id', $data->getId(), PDO::PARAM_INT);
        $req->bindValue('dateheure', $data->getDateheure(), PDO::PARAM_STR);
		$req->bindValue('nbPersonne', $data->getNbPersonne(), PDO::PARAM_STR);
		$req->bindValue('utilisateur', $data->getUtilisateur(), PDO::PARAM_INT);
        if (! $req->execute()) {
	        echo "<br>[debug] Erreur";
        }
    }

	public function delete($id) {
		$req = "DELETE FROM reservation WHERE id=:id";
		$stmt = $this->db->prepare($req);
		$stmt->execute();
		if ($stmt->rowCount() == 1) {
			echo '[debug]OK 1 ligne inseree';
		} else {
			echo 'Erreur insertion donnees';
		}

	}

}
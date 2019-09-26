<?php
/**
 * Created by PhpStorm.
 * User: Adeline
 * Date: 23/02/2019
 * Time: 09:45
 */

class ManagerRestaurant extends Manager{

	public function construct($mode='prod') {
		parent::__construct( $mode );
	}

	public function read($id){
		echo '<br>[debug]Dans "'.__FUNCTION__.'" [/debug]';
		$req = $this->db->prepare('SELECT * FROM restaurant WHERE id =:id');
		$req->bindValue('id', $id, PDO::PARAM_INT);
		$req->execute();
		$array = $req->fetch(PDO::FETCH_ASSOC);
		$restaurant = new restaurant($array);

		return $restaurant;
	}

	public function add( $data) {
		echo '<br>[debug]Dans "'.__FUNCTION__.'" [/debug]';
		//bloc try/catch pour g�rer les exceptions
		//provenant de restaurant
		try {
			$restaurant = new restaurant( $data);
		} catch (LengthException $lengthException) {
			//cas longueur == 0
			throw new Exception($lengthException->GetMessage(),$lengthException->GetCode());
		} catch (Exception $exception) {
			//autre cas (mais pour nous invalide)
			throw new Exception($exception->GetMessage(),$exception->GetCode());
		}
		$req = $this->db->prepare('INSERT INTO restaurant (nom,adresse,residence) VALUES(:nom,:adresse,:residence)');
		$req->bindValue('nom', $restaurant->getNom(), PDO::PARAM_STR);
		$req->bindValue('adresse', $restaurant->getAdresse(), PDO::PARAM_STR);
		$req->bindValue('residence', $restaurant->getResidence(), PDO::PARAM_INT);
		$req->execute();
		$id = $this->db->lastInsertId();
		$restaurant->setId($id);
	}

	public function update($data){
        echo '<pre>'.print_r($data,true).'</pre>';

        echo '<br>[debug]SESSION';
        echo '<pre>'.print_r($_SESSION,true).'</pre>';
        $req = $this->db->prepare('UPDATE restaurant SET nom=:nom,adresse=:adresse,residence=:residence WHERE id =:id');
        $req->bindValue('id', $data->getId(), PDO::PARAM_INT);
        $req->bindValue('nom', $data->getNom(), PDO::PARAM_STR);
		$req->bindValue('adresse', $data->getAdresse(), PDO::PARAM_STR);
		$req->bindValue('residence', $data->getResidence(), PDO::PARAM_INT);
        if (! $req->execute()) {
	        echo "<br>[debug] Erreur";
        }
    }

	public function delete($id) {
		// =>voir  getLivre(id) pour modele
		$req = "DELETE FROM restaurant WHERE id=:id";
		$stmt = $this->db->prepare($req);
		$stmt->execute();
		if ($stmt->rowCount() == 1) {
			echo '[debug]OK 1 ligne inseree';
		} else {
			echo 'Erreur insertion donnees';
		}

	}



}
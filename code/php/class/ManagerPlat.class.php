<?php
/**
 * Created by PhpStorm.
 * User: Adeline
 * Date: 23/02/2019
 * Time: 09:45
 */

class ManagerPlat extends Manager{

	public function construct($mode='prod') {
		parent::__construct( $mode );
	}

	public function read($id){
		echo '<br>[debug]Dans "'.__FUNCTION__.'" [/debug]';
		$req = $this->db->prepare('SELECT * FROM plat WHERE id =:id');
		$req->bindValue('id', $id, PDO::PARAM_INT);
		$req->execute();
		$array = $req->fetch(PDO::FETCH_ASSOC);
		$plat = new plat($array);

		return $plat;
	}

	public function add( $data) {
		echo '<br>[debug]Dans "'.__FUNCTION__.'" [/debug]';
		//bloc try/catch pour g�rer les exceptions
		//provenant de restaurant
		try {
			$plat = new plat($data);
		} catch (LengthException $lengthException) {
			//cas longueur == 0
			throw new Exception($lengthException->GetMessage(),$lengthException->GetCode());
		} catch (Exception $exception) {
			//autre cas (mais pour nous invalide)
			throw new Exception($exception->GetMessage(),$exception->GetCode());
		}
		$req = $this->db->prepare('INSERT INTO plat (nom,description) VALUES(:nom,:description)');
		$req->bindValue('nom', $plat->getNom(), PDO::PARAM_STR);
		$req->bindValue('description', $plat->getDescription(), PDO::PARAM_STR);
		$req->execute();
		$id = $this->db->lastInsertId();
		$plat->setId($id);
	}

	public function update($data){
        echo '<pre>'.print_r($data,true).'</pre>';

        echo '<br>[debug]SESSION';
        echo '<pre>'.print_r($_SESSION,true).'</pre>';
        $req = $this->db->prepare('UPDATE plat SET nom=:nom,description=:description WHERE id =:id');
        $req->bindValue('id', $data->getId(), PDO::PARAM_INT);
        $req->bindValue('nom', $data->getNom(), PDO::PARAM_STR);
		$req->bindValue('description', $data->getDescription(), PDO::PARAM_STR);
        if (! $req->execute()) {
	        echo "<br>[debug] Erreur";
        }
    }

	public function delete($id) {
		$req = "DELETE FROM plat WHERE id=:id";
		$stmt = $this->db->prepare($req);
		$stmt->execute();
		if ($stmt->rowCount() == 1) {
			echo '[debug]OK 1 ligne inseree';
		} else {
			echo 'Erreur insertion donnees';
		}

	}

}
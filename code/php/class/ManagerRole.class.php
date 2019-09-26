<?php
/**
 * Created by PhpStorm.
 * User: Adeline
 * Date: 01/03/2019
 * Time: 16:50
 */

class ManagerRole extends Manager {

	public function construct($mode='prod') {
		parent::__construct( $mode );
	}

	public function read($id){
	    debug('<br>[debug]Dans "'.__CLASS__."::".__FUNCTION__.'" [/debug]');
		$req = $this->db->prepare('SELECT * FROM role WHERE id=:id');
		$req->bindValue('id_role', $id, PDO::PARAM_INT);
		$req->execute();
		$array = $req->fetch(PDO::FETCH_ASSOC);
		$role = new role($array);

		return $role;
	}

	public function add($data) {
	    debug('<br>[debug]Dans "'.__CLASS__."::".__FUNCTION__.'" [/debug]');
		debug($data);
		//bloc try/catch pour gérer les exceptions
		//provenant de utilisateur
		try {
			$role = new role($data);
		} catch (LengthException $lengthException) {
			//cas longueur == 0
			throw new Exception($lengthException->GetMessage(),$lengthException->GetCode());
		} catch (Exception $exception) {
			//autre cas (mais pour nous invalide)
			throw new Exception($exception->GetMessage(),$exception->GetCode());
		}
		$req = $this->db->prepare('INSERT INTO role (nom,description) VALUES(:nom,:description)');
		$req->bindValue('nom', $role->getNom(), PDO::PARAM_STR);
		$req->bindValue('description', $role->getDescription(), PDO::PARAM_STR);
		$req->execute();
		$id = $this->db->lastInsertId();
		$role->setId($id);
		debug($role);
	}

	public function update($data){
	    debug('<br>[debug]Dans "'.__CLASS__."::".__FUNCTION__.'" [/debug]');
		echo '<pre>'.print_r($data,true).'</pre>';
		//bloc try/catch pour gérer les exceptions
		//provenant de Client

		echo '<br>[debug]SESSION';
		echo '<pre>'.print_r($_SESSION,true).'</pre>';
		$req = $this->db->prepare('UPDATE role SET nom =:nom, description =:description WHERE id=:id');
		$req->bindValue('id', $data->getId(), PDO::PARAM_INT);
		$req->bindValue('nom', $data->getNom(), PDO::PARAM_STR);
		$req->bindValue('description', $data->getDescription(), PDO::PARAM_STR);
		if (! $req->execute()) {
			echo "<br>[debug] Erreur";
		}
	}


}
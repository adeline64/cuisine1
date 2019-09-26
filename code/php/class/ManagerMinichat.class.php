<?php
/**
 * Created by PhpStorm.
 * User: Adeline
 * Date: 23/02/2019
 * Time: 09:45
 */

class ManagerMinichat extends Manager{

	public function construct($mode='prod') {
		parent::__construct( $mode );
	}

	public function read($id){
		echo '<br>[debug]Dans "'.__FUNCTION__.'" [/debug]';
		$req = $this->db->prepare('SELECT * FROM minichat WHERE id =:id');
		$req->bindValue('id', $id, PDO::PARAM_INT);
		$req->execute();
		$array = $req->fetch(PDO::FETCH_ASSOC);
		$minichat = new minichat($array);

		return $minichat;
	}

	public function getChatBy(){
		$minichat = $this->db->query('SELECT utilisateur, message FROM minichat ORDER BY ID DESC LIMIT 0, 10');

		return $minichat->fetchAll(PDO::FETCH_ASSOC);
	}

	public function add( $data) {
		echo '<br>[debug]Dans "'.__FUNCTION__.'" [/debug]';
		//bloc try/catch pour g�rer les exceptions
		//provenant de restaurant
		try {
			$minichat = new minichat($data);
		} catch (LengthException $lengthException) {
			//cas longueur == 0
			throw new Exception($lengthException->GetMessage(),$lengthException->GetCode());
		} catch (Exception $exception) {
			//autre cas (mais pour nous invalide)
			throw new Exception($exception->GetMessage(),$exception->GetCode());
		}
		$req = $this->db->prepare('INSERT INTO minichat (message,utilisateur) VALUES(:message,:utilisateur)');
		$req->bindValue('message', $minichat->getMessage(), PDO::PARAM_STR);
		$req->bindValue('utilisateur', $minichat->getUtilisateur(), PDO::PARAM_INT);
		$req->execute();
		$id = $this->db->lastInsertId();
        $minichat->setId($id);
        return $minichat;
	}

	public function update($data){
        echo '<pre>'.print_r($data,true).'</pre>';

        echo '<br>[debug]SESSION';
        echo '<pre>'.print_r($_SESSION,true).'</pre>';
        $req = $this->db->prepare('UPDATE minichat SET message=:message,utilisateur=:utilisateur WHERE id =:id');
        $req->bindValue('id', $data->getId(), PDO::PARAM_INT);
        $req->bindValue('message', $data->getMessage(), PDO::PARAM_STR);
		$req->bindValue('utilisateur', $data->getUtilisateur(), PDO::PARAM_INT);
        if (! $req->execute()) {
	        echo "<br>[debug] Erreur";
        }
    }

	public function delete($id) {
		$req = "DELETE FROM minichat WHERE id=:id";
		$stmt = $this->db->prepare($req);
		$stmt->execute();
		if ($stmt->rowCount() == 1) {
			echo '[debug]OK 1 ligne inseree';
		} else {
			echo 'Erreur insertion donnees';
		}

	}

}
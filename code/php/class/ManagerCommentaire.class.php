<?php
/**
 * Created by PhpStorm.
 * User: Adeline
 * Date: 23/02/2019
 * Time: 09:45
 */

class ManagerCommentaire extends Manager{

	public function construct($mode='prod') {
		parent::__construct( $mode );
	}

	public function read($id){
		echo '<br>[debug]Dans "'.__FUNCTION__.'" [/debug]';
		$req = $this->db->prepare('SELECT * FROM commentaire WHERE id =:id');
		$req->bindValue('id', $id, PDO::PARAM_INT);
		$req->execute();
		$array = $req->fetch(PDO::FETCH_ASSOC);
		$commentaire = new commentaire($array);

		return $commentaire;
	}

	public function getAllCommentaire() {
		$commentaires = $this->db->query("SELECT * FROM commentaire");

		return $commentaires->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getCommentaire($id) {
		$commentaire = "SELECT * FROM commentaire WHERE id=:id";
		//preparation == protection des donn�es � venir
		$commentaires = $this->db->prepare($commentaire);
		//liaison des marqueur :toto aux donnees
		$commentaires->bindValue('id',$id,PDO::PARAM_INT);
		//execution de la requete sur le serveur SQL
		$commentaires->execute();
		return $commentaires;
	}

	public function add( $data) {
		echo '<br>[debug]Dans "'.__FUNCTION__.'" [/debug]';
		//bloc try/catch pour g�rer les exceptions
		//provenant de restaurant
		try {
			$commentaire = new commentaire($data);
		} catch (LengthException $lengthException) {
			//cas longueur == 0
			throw new Exception($lengthException->GetMessage(),$lengthException->GetCode());
		} catch (Exception $exception) {
			//autre cas (mais pour nous invalide)
			throw new Exception($exception->GetMessage(),$exception->GetCode());
		}
		$req = $this->db->prepare('INSERT INTO commentaire (titre,contenu,utilisateur) VALUES(:titre,:contenu,:utilisateur)');
        $req->bindValue('titre', $commentaire->getTitre(), PDO::PARAM_STR);
        $req->bindValue('contenu', $commentaire->getContenu(), PDO::PARAM_STR);
		$req->bindValue('utilisateur', $commentaire->getUtilisateur(), PDO::PARAM_INT);
		$req->execute();
		$id = $this->db->lastInsertId();
        $commentaire->setId($id);
        return $commentaire;
	}

	public function update($data){
        echo '<pre>'.print_r($data,true).'</pre>';

        echo '<br>[debug]SESSION';
        echo '<pre>'.print_r($_SESSION,true).'</pre>';
        $req = $this->db->prepare('UPDATE commentaire SET titre=:titre,contenu=:contenu,utilisateur=:utilisateur WHERE id =:id');
        $req->bindValue('id', $data->getId(), PDO::PARAM_INT);
        $req->bindValue('titre', $data->getTitre(), PDO::PARAM_STR);
        $req->bindValue('contenu', $data->getContenu(), PDO::PARAM_STR);
		$req->bindValue('utilisateur', $data->getUtilisateur(), PDO::PARAM_INT);
        if (! $req->execute()) {
	        echo "<br>[debug] Erreur";
        }
    }

	public function delete($id) {
		$req = "DELETE FROM commentaire WHERE id=:id";
		$stmt = $this->db->prepare($req);
		$stmt->execute();
		if ($stmt->rowCount() == 1) {
			echo '[debug]OK 1 ligne inseree';
		} else {
			echo 'Erreur insertion donnees';
		}

	}

}
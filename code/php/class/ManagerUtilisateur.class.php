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
		//bloc try/catch pour g�rer les exceptions
		//provenant de utilisateur
		echo '<br>[debug]Dans "'.__FUNCTION__.'" [/debug]';
		debug('<br>[debug]Dans "'.__CLASS__."::".__FUNCTION__.'" [/debug]');
		debug($data);
		try {
			$utilisateur = new utilisateur( $data);
		} catch (LengthException $lengthException) {
			//cas longueur == 0
			throw new Exception($lengthException->GetMessage(),$lengthException->GetCode());
		} catch (Exception $exception) {
			//autre cas (mais pour nous invalide)
			throw new Exception($exception->GetMessage(),$exception->GetCode());
		}
		$req = $this->db->prepare('INSERT INTO utilisateur (nom,prenom,email,password,telephone,adresse,role,residence) VALUES(:nom,:prenom,:email,:password,:telephone,:adresse,:role,:residence)');
		$req->bindValue('nom', $utilisateur->getNom(), PDO::PARAM_STR);
		$req->bindValue('prenom', $utilisateur->getPrenom(), PDO::PARAM_STR);
		$req->bindValue('email', $utilisateur->getEmail(), PDO::PARAM_STR);
		$req->bindValue('password', password_hash($utilisateur->getPassword(),PASSWORD_BCRYPT));
		$req->bindValue('telephone', $utilisateur->getTelephone(), PDO::PARAM_STR);
		$req->bindValue('adresse', $utilisateur->getAdresse(), PDO::PARAM_STR);
		$req->bindValue('role', $utilisateur->getRole(), PDO::PARAM_INT);
		$req->bindValue('residence', $utilisateur->getResidence(), PDO::PARAM_INT);
		$req->execute();
		$id = $this->db->lastInsertId();
		$utilisateur->setId($id);
		return $utilisateur;
		echo '<pre>'.print_r($utilisateur,true).'</pre>';
		debug('<br>[debug]Dans "'.__CLASS__."::".__FUNCTION__.'" [/debug]');
		debug($utilisateur);
	}

	public function update($data){
        echo '<pre>'.print_r($data,true).'</pre>';
		debug('<br>[debug]Dans "'.__CLASS__."::".__FUNCTION__.'" [/debug]');
		debug($data);
        echo '<br>[debug]SESSION';
        echo '<pre>'.print_r($_SESSION,true).'</pre>';
        $req = $this->db->prepare('UPDATE utilisateur SET nom=:nom,prenom=:prenom,email=:email,telephone=:telephone,adresse=:adresse,role=:role,residence=:residence WHERE id =:id');
        $req->bindValue('id', $data->getId(), PDO::PARAM_INT);
        $req->bindValue('nom', $data->getNom(), PDO::PARAM_STR);
        $req->bindValue('prenom', $data->getPrenom(), PDO::PARAM_STR);
		$req->bindValue('email', $data->getEmail(), PDO::PARAM_STR);
		$req->bindValue('telephone', $data->getTelephone(), PDO::PARAM_STR);
		$req->bindValue('adresse', $data->getAdresse(), PDO::PARAM_STR);
		$req->bindValue('role', $data->getRole(), PDO::PARAM_INT);
		$req->bindValue('residence', $data->getResidence(), PDO::PARAM_INT);
        if (! $req->execute()) {
	        echo "<br>[debug] Erreur";
        }
	}

	public function connecte($email,$password) {
		echo '<br>[debug]Dans "' . __FUNCTION__ . '" [/debug]';
		$req = $this->db->prepare( 'SELECT * FROM utilisateur WHERE email =:email' );
		$req->bindValue( 'email', $email );
		$req->execute();
		$data = $req->fetch();
		if ( empty( $data ) ) {
			throw new Exception( 'Mauvais email' );
		} else {
			$utilisateur = new utilisateur($data);
			if ( password_verify( $password, $utilisateur->getPassword() ) ) {
				//OK c'est le bon
				return $utilisateur;
			} else {
				//rallage
				throw new Exception( 'Mauvais mot de passe' );
			}
		}
	}

	public function getAllUtilisateur() {
		$utilisateurs = $this->db->query("SELECT * FROM utilisateur");

		return $utilisateurs->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getUtilisateur($id) {
		$utilisateur = "SELECT * FROM utilisateur WHERE id=:id";
		//preparation == protection des donn�es � venir
		$utilisateurs = $this->db->prepare($utilisateur);
		//liaison des marqueur :toto aux donnees
		$utilisateurs->bindValue('id',$id,PDO::PARAM_INT);
		//execution de la requete sur le serveur SQL
		$utilisateurs->execute();
		return $utilisateurs;
	}

	public function delete($id) {
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
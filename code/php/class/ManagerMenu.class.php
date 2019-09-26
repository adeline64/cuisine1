<?php
/**
 * Created by PhpStorm.
 * User: Adeline
 * Date: 23/02/2019
 * Time: 09:45
 */

class ManagerMenu extends Manager{

	public function construct($mode='prod') {
		parent::__construct( $mode );
	}

	public function read($id){
		echo '<br>[debug]Dans "'.__FUNCTION__.'" [/debug]';
		$req = $this->db->prepare('SELECT * FROM menu WHERE id =:id');
		$req->bindValue('id', $id, PDO::PARAM_INT);
		$req->execute();
		$array = $req->fetch(PDO::FETCH_ASSOC);
		$menu = new menu($array);

		return $menu;
	}

	public function add( $data) {
		echo '<br>[debug]Dans "'.__FUNCTION__.'" [/debug]';
		//bloc try/catch pour g�rer les exceptions
		//provenant de restaurant
		try {
			$menu = new menu( $data);
		} catch (LengthException $lengthException) {
			//cas longueur == 0
			throw new Exception($lengthException->GetMessage(),$lengthException->GetCode());
		} catch (Exception $exception) {
			//autre cas (mais pour nous invalide)
			throw new Exception($exception->GetMessage(),$exception->GetCode());
		}
		$req = $this->db->prepare('INSERT INTO menu (entree,plat,dessert,vin,boisson) VALUES(:entree,:plat,:dessert,:vin,:boisson)');
		$req->bindValue('entree', $menu->getEntree(), PDO::PARAM_INT);
		$req->bindValue('plat', $menu->getPlat(), PDO::PARAM_INT);
        $req->bindValue('dessert', $menu->getDessert(), PDO::PARAM_INT);
        $req->bindValue('vin', $menu->getVin(), PDO::PARAM_INT);
        $req->bindValue('boisson', $menu->getBoisson(), PDO::PARAM_INT);
		$req->execute();
		$id = $this->db->lastInsertId();
		$menu->setId($id);
	}

	public function update($data){
        echo '<pre>'.print_r($data,true).'</pre>';

        echo '<br>[debug]SESSION';
        echo '<pre>'.print_r($_SESSION,true).'</pre>';
        $req = $this->db->prepare('UPDATE menu SET entree=:entree,plat=:plat,dessert=:dessert,vin=:vin,boisson=:boisson WHERE id =:id');
        $req->bindValue('id', $data->getId(), PDO::PARAM_INT);
        $req->bindValue('entree', $data->getEntree(), PDO::PARAM_INT);
        $req->bindValue('plat', $data->getPlat(), PDO::PARAM_INT);
        $req->bindValue('dessert', $data->getDessert(), PDO::PARAM_INT);
        $req->bindValue('vin', $data->getVin(), PDO::PARAM_INT);
        $req->bindValue('boisson', $data->getBoisson(), PDO::PARAM_INT);
        if (! $req->execute()) {
	        echo "<br>[debug] Erreur";
        }
    }

	public function delete($id) {
		// =>voir  getLivre(id) pour modele
		$req = "DELETE FROM menu WHERE id=:id";
		$stmt = $this->db->prepare($req);
		$stmt->execute();
		if ($stmt->rowCount() == 1) {
			echo '[debug]OK 1 ligne inseree';
		} else {
			echo 'Erreur insertion donnees';
		}

	}



}
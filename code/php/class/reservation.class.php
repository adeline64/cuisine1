<?php
/**
 * Created by PhpStorm.
 * User: Adeline
 * Date: 23/02/2019
 * Time: 09:44
 */

class reservation {


	private $id;
	private $dateheure;
	private $nbPersonne;
	private $utilisateur;

	public function __construct( array $array =[] )
	{
		$this->hydrate($array);
	}

// LES GETTERS

	/**
	 * @return mixed
	 */
	public function getId() {
		return $this->id;
	}


	public function getDateheure() {
		return $this->dateheure;
	}
	public function getNbPersonne() {
		return $this->nbPersonne;
    }

	public function getUtilisateur() {
		return $this->utilisateur;
	}

	// LES SETTERS


	/**
	 * @param mixed $id
	 */
	public function setId( $id ) {
	    debug('<br>[debug]Dans "'.__CLASS__."::".__FUNCTION__.'" [/debug]',true);
		$id = (int) $id;
		if ( $id > 0 ) {

			$this->id = $id;
		}
    }

    public function setDateheure( $dateheure ) {
	    debug('<br>[debug]Dans "'.__CLASS__."::".__FUNCTION__.'" [/debug]',true);
		
			$this->dateheure = $dateheure;
	}
    
	public function setNbPersonne( $nbPersonne ) {
	    debug('<br>[debug]Dans "'.__CLASS__."::".__FUNCTION__.'" [/debug]',true);
		
			$this->nbPersonne = $nbPersonne;
    }
    
    public function setUtilisateur( $utilisateur ) {
	    debug('<br>[debug]Dans "'.__CLASS__."::".__FUNCTION__.'" [/debug]',true);
		
			$this->utilisateur = $utilisateur;
	}


	// HYDRATATION

	public function hydrate($array){
	    debug('<br>[debug]Dans "'.__CLASS__."::".__FUNCTION__.'" [/debug]',true);
		foreach ($array as $key => $value) {
			$methodName = 'set'.ucfirst($key);
			if(method_exists($this, $methodName)){
				$this->$methodName($value);
			}
		}
	}

}
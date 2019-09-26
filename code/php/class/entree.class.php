<?php
/**
 * Created by PhpStorm.
 * User: Adeline
 * Date: 25/02/2019
 * Time: 21:41
 */

class entree  {

	protected $id;
	protected $nom;
	protected $description;

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

	public function getNom() {
		return $this->nom;
    }
    
	public function getDescription() {
		return $this->description;
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

	public function setNom( $nom ){
	    debug('<br>[debug]Dans "'.__CLASS__."::".__FUNCTION__.'" [/debug]',true);
	
				$this->nom = $nom;
			}
		

	public function setDescription( $description ) {
	    debug('<br>[debug]Dans "'.__CLASS__."::".__FUNCTION__.'" [/debug]',true);
        $this->description = $description;
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
<?php
/**
 * Created by PhpStorm.
 * User: Adeline
 * Date: 25/02/2019
 * Time: 21:41
 */

class minichat  {

	protected $id;
	protected $message;
    protected $utilisateur;

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

	public function getMessage() {
		return $this->message;
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

	public function setMessage( $message ){
	    debug('<br>[debug]Dans "'.__CLASS__."::".__FUNCTION__.'" [/debug]',true);
	
				$this->message = $message;
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
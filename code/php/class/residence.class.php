<?php
/**
 * Created by PhpStorm.
 * User: Adeline
 * Date: 25/02/2019
 * Time: 21:41
 */

class residence  {

    protected $id;
    protected $codepostal;
    protected $ville;


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

	public function getCodepostal() {
		return $this->codepostal;
    }
    
	public function getVille() {
		return $this->ville;
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

	public function setCodepostal( $codepostal ){
	    debug('<br>[debug]Dans "'.__CLASS__."::".__FUNCTION__.'" [/debug]',true);
	
				$this->codepostal = $codepostal;
			}
		

	public function setVille( $ville ) {
		echo '<pre>'.print_r($ville,true).'</pre>';
		debug('<br>[debug]Dans "'.__CLASS__."::".__FUNCTION__.'" [/debug]');
		debug($ville);
        $this->ville = $ville;
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

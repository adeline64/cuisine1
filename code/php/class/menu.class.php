<?php
/**
 * Created by PhpStorm.
 * User: Adeline
 * Date: 25/02/2019
 * Time: 21:41
 */

class menu  {

	protected $id;
	protected $entree;
    protected $plat;
    protected $dessert;
    protected $vin;
    protected $boisson;

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

	public function getEntree() {
		return $this->entree;
    }
    
	public function getPlat() {
		return $this->plat;
    }

    public function getDessert() {
		return $this->dessert;
    }
    
	public function getVin() {
		return $this->vin;
    }

    public function getBoisson() {
		return $this->boisson;
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

	public function setEntree( $entree ){
	    debug('<br>[debug]Dans "'.__CLASS__."::".__FUNCTION__.'" [/debug]',true);
	
				$this->entree = $entree;
			}
		

	public function setPlat( $plat ) {
	    debug('<br>[debug]Dans "'.__CLASS__."::".__FUNCTION__.'" [/debug]',true);
        $this->plat = $plat;
    }

    public function setDessert( $dessert ){
	    debug('<br>[debug]Dans "'.__CLASS__."::".__FUNCTION__.'" [/debug]',true);
	
				$this->dessert = $dessert;
			}
		

	public function setVin( $vin ) {
	    debug('<br>[debug]Dans "'.__CLASS__."::".__FUNCTION__.'" [/debug]',true);
        $this->vin = $vin;
    }

    public function setBoisson( $boisson ) {
	    debug('<br>[debug]Dans "'.__CLASS__."::".__FUNCTION__.'" [/debug]',true);
        $this->boisson = $boisson;
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
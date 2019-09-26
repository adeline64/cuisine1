<?php
/**
 * Created by PhpStorm.
 * User: Adeline
 * Date: 25/02/2019
 * Time: 21:41
 */

class role  {

	protected $id;
	protected $nom;
	protected $description;

	public function __construct( array $data =[] )
	{
	    debug('<br>[debug]Dans "'.__CLASS__."::".__FUNCTION__.'" [/debug]');
		//appel du constructeur parent puisqu'on est hérité de ...
	    $this->hydrate($data);
	}

	/**
	 * @return mixed
	 */
	public function getId() {
	    debug('<br>[debug]Dans "'.__CLASS__."::".__FUNCTION__.'" [/debug]');
		return $this->id;
	}

	/**
	 * @return mixed
	 */
	public function getNom() {
	    debug('<br>[debug]Dans "'.__CLASS__."::".__FUNCTION__.'" [/debug]');
		return $this->nom;
	}

	/**
	 * @return mixed
	 */
	public function getDescription() {
	    debug('<br>[debug]Dans "'.__CLASS__."::".__FUNCTION__.'" [/debug]');
		return $this->description;
	}

	/**
	 * @param mixed $id_role
	 */
	public function setId( $id ) {
	    debug('<br>[debug]Dans "'.__CLASS__."::".__FUNCTION__.'" [/debug]');
		$id = (int) $id;
		if ($id > 0)
		{
			$this->id = $id;
		}
	}

	/**
	 * @param mixed $nom
	 */
	public function setNom( $nom ) {
	    debug('<br>[debug]Dans "'.__CLASS__."::".__FUNCTION__.'" [/debug]');
		$this->nom = $nom;
	}

	/**
	 * @param mixed $description
	 */
	public function setDescription( $description ) {
	    debug('<br>[debug]Dans "'.__CLASS__."::".__FUNCTION__.'" [/debug]');
		$this->description = $description;
	}
	
	protected function hydrate($array){
	    debug('<br>[debug]Dans "'.__CLASS__."::".__FUNCTION__.'" [/debug]');
	    foreach ($array as $key => $value) {
	        $methodName = 'set'.ucfirst($key);
	        if(method_exists($this, $methodName)){
	            $this->$methodName($value);
	        }
	    }
	}

}
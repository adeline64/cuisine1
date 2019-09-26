<?php

class commentaire  {

	protected $id;
    protected $titre;
    protected $contenu;
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
    
    public function getTitre() {
		return $this->titre;
	}

	public function getContenu() {
		return $this->contenu;
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
    
    public function setTitre( $titre ){
	    debug('<br>[debug]Dans "'.__CLASS__."::".__FUNCTION__.'" [/debug]',true);
	
				$this->titre = $titre;
			}

	public function setContenu( $contenu ){
	    debug('<br>[debug]Dans "'.__CLASS__."::".__FUNCTION__.'" [/debug]',true);
	
				$this->contenu = $contenu;
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
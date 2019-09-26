<?php
/**
 * Created by PhpStorm.
 * User: Adeline
 * Date: 23/02/2019
 * Time: 09:44
 */

class utilisateur {


	private $id;
	private $nom;
	private $prenom;
	private $email;
	private $password;
	private $telephone;
	private $adresse;
	private $role;
	private $residence;

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

	public function getEmail() {
		return $this->email;
	}

	public function getPrenom() {
		return $this->prenom;
	}

	public function getPassword() {
		return $this->password;
	}

	public function getTelephone() {
		return $this->telephone;
	}

	public function getAdresse() {
		return $this->adresse;
	}

	public function getRole() {
		return $this->role;
	}

	public function getResidence() {
		return $this->residence;
	}

	// LES SETTERS


	/**
	 * @param mixed $id
	 */
	public function setId( $id ) {
		$id = (int) $id;
		if ( $id > 0 ) {

			$this->id = $id;
		}
	}

	public function setNom( $nom ){
		if (strlen(trim($nom)) > 0)
			//strlen = Calcule la taille d'une cha�ne
			// trim = Supprime les espaces (ou d'autres caract�res) en d�but et fin de cha�ne
		{
			if (strpos($nom,"#") !== false)
				// strpos = Cherche la position de la premi�re occurrence dans une cha�ne
			{
				throw new Exception("Le nom ne peut pas avoir de caracteres speciaux");
			}
			if (preg_match("/[0-9]/", "$nom"))
				// preg_match = sert ici pour les chiffres
			{
				throw new Exception("Le nom ne peut pas avoir de chiffre");
			}
			else
			{
				//echo "la cha�ne $nom est correcte";
				$this->nom = $nom;
			}
		}
	}

	public function setPrenom( $prenom ){
	    debug('<br>[debug]Dans "'.__CLASS__."::".__FUNCTION__.'" [/debug]',true);
		if (strlen(trim($prenom)) > 0)
		{
			if (strpos($prenom,"#") !== false)
			{
				throw new Exception("Le prenom ne peut pas avoir de caracteres speciaux");
			}

			if (preg_match("/[0-9]/", "$prenom"))
			{
				throw new Exception("Le prenom ne peut pas avoir de chiffre");
			}

			else
			{
				//echo "la cha�ne $prenom est correcte";
				$this->prenom = $prenom;
			}
		}
	}
	


	public function setEmail( $email ) {
		//1) si la chaine n'est pas vide
		if (strlen(trim($email)) == 0) {
			//erreur
			throw new LengthException("Le mail est vide",100); //code 100 == mail vide
		} else {
			//pas d'erreur on continue
			if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
				//mail valid�
				$this->email = $email;
				$this->email = $email;
			} else {
				//erreur � g�rer
				throw new Exception("Le mail est invalide",101); //code 101 == mail invalide
			}
		}
	}

	public function setPassword( $password ) {
	    debug('<br>[debug]Dans "'.__CLASS__."::".__FUNCTION__.'" [/debug]',true);
		if ( strlen( trim( $password ) ) == 0 )
		{
			//Si le mot de passe est vide
			throw new Exception( "le mot de passe est obligatoire" );
		}

		if ( strlen( $password ) > strlen( trim( $password ) ) )
		{
			//si le mot de passe commence/fini (ou les 2) par <espace>
			throw new Exception( "Le mot de passe ne peut pas commencer et se finir par un espace" );
		}

		if ( strlen( trim( $password ) ) < 6 )
		{
			//Si le mot de passe est inf 6 car
			throw new Exception( "Le mot de passe doit avoir plus de 6 caract�res" );
		}
		/*
		 TOUT VA BIEN
        */
		$this->password = $password;
		echo '<pre>'.print_r($password,true).'</pre>';
		debug('<br>[debug]Dans "'.__CLASS__."::".__FUNCTION__.'" [/debug]');
		debug($password);
	}

	public function setTelephone( $telephone ) {
		$this->telephone = $telephone;
	}

	public function setAdresse( $adresse ) {
			$this->adresse = $adresse;
		
	}

/**
	 * @param mixed $role
	 */
	public function setRole( $role ) {
		$this->role = $role;
	}

	public function setResidence( $residence ) {
		echo '<pre>'.print_r($residence,true).'</pre>';
		debug('<br>[debug]Dans "'.__CLASS__."::".__FUNCTION__.'" [/debug]');
		debug($residence);
		$this->residence = $residence;
	}

	// HYDRATATION

	public function hydrate($array){
		foreach ($array as $key => $value) {
			$methodName = 'set'.ucfirst($key);
			if(method_exists($this, $methodName)){
				$this->$methodName($value);
			}
		}
	}

}
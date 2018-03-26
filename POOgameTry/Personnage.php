<?php

class Personnage
{
	//attributs 
	private $_id;
	private $_nom;
	private $_degats;

	//constantes pour la méthode frapper
	const CEST_MOI = 1;
  	const PERSONNAGE_TUE = 2;
  	const PERSONNAGE_FRAPPE = 3;

	//le constructeur
	public function __construct(array $donnees)
	{
		$this->hydrate($donnees); //relié à la méthode qui initialise les objets

	}

	//GETTERS
	public function id(){
		return $this->_id;
	}

	public function nom(){
		return $this->_nom;
	}

	public function degats(){
		return $this->_degats;
	}

	//SETTERS
	public function setId($id){
		$id = (int) $id; //on met id en int
		//si c'est ok, on set
		if($id > 0) //si nb entier positif
		{

			$this->_id = $id;
		}

	}

	public function setNom($nom){
		if(is_string($nom)){ //si le nom est bien un string

			$this->_nom = $nom;
		}

	}

	public function setDegats($degats){
		$degats = (int) $degats; // met degats en int
		//si c'est ok, on set
		if($degats >= 0 && $degats <= 100) //si degats entre 0 et 100
		{

			$this->_degats = $degats;
		}

	}

	//Méthodes 
	public function frapper(Personnage $perso) //un perso en frappe un autre
	{

		//verif qu'on se frappe pas soi meme
		if($perso->id() == $this->_id){ //on doit utiliser le getter id pour un perso qui n'est pas $this
			return self::CEST_MOI;
		}
		

		// indique au perso frappé qu'il doit recevoir des degats
		return $perso->recevoirDegats();

	}

	public function recevoirDegats() //augmente les degats de 5
	{
		//doit augmenter le compteur de degats de 5 pts d'un personnage qui appelle la méthode
		$this->_degats += 5;
		//si 100 pts ou plus on kill le perso
		if($this->_degats >= 100)
		{

			return self::PERSONNAGE_TUE;
		}


		//sinon renverra valeur pour dire que perso a été frappé
		return self::PERSONNAGE_FRAPPE;
	}

	public function nomValide() //check si le nom est valide (si on a rentré un nom)
  	{
    	return !empty($this->_nom);
  	}

	public function hydrate(array $donnees) // initialise données avec ce qu'on a écrit
	{
		foreach ($donnees as $key => $value) //pour chaque carac (ex : nom)
		{
			$method = 'set'.ucfirst($key); //met le 1er carac en maj
			
			if (method_exists($this, $method)) { //si l'attribut existe -> on met la valeur
				$this->$method($value);
			}
		}

	}	


}
<?php

class PersonnagesManager
{

	private $_db; //co à la bdd via pdo 

	//setter

  public function __construct($db)
  {
    $this->setDb($db);
  }
	

	public function add(Personnage $perso)
	{
		//Ajouter un personnage à la bdd

		//prep
		$q = $this->_db->prepare('INSERT INTO personnages(nom) VALUES(:nom)');

		//valeurs
		$q->bindValue(':nom', $perso->nom());

		//exec
		$q->execute();

		//hydra avec id et des degats == 0
		$perso->hydrate([
			'id' => $this->_db->lastInsertId(),
			'degats' => 0,
		]);
	}

	public function get($info)
	{
		//Afficher personnage avec le $info  correspondant à un id s'il existe
		//en format int -> cherche avec id
		if (is_int($info))
	    {
	      $q = $this->_db->query('SELECT id, nom, degats FROM personnages WHERE id = '.$info);//quand c'est un int on peut faire une query direct
	      $donnees = $q->fetch(PDO::FETCH_ASSOC); //$q->fetch .. car on renvoie un new perso
	      
	      return new Personnage($donnees);
	    }
			//en format string -> cherche avec nom
	    else
	    {
	    	$q = $this->_db->prepare('SELECT id, nom, degats FROM personnages WHERE nom = :nom'); //quand c'est u nstr on fait un prepare avec :nom et un exec qui precise la 		valeur a utiliser;
	    	$q->execute([":nom" => $info]);
	    	return new Personnage($q->fetch(PDO::FETCH_ASSOC)); // pareil ici
	    }
	}

	public function update(Personnage $perso)
	{
		//modif les caractéristiques d'un perso de la bdd

		//prep
		$q = $this->_db->prepare("UPDATE personnages SET degats = :degats WHERE id = :id");

		//valeurs avec bindValue , on utilise les getters car on nous a deja transmi les new val
		$q->bindValue(':degats', $perso->degats(), PDO::PARAM_INT);
		$q->bindValue(':id', $perso->id(), PDO::PARAM_INT);

		//exec
		$q->execute();

	}

	public function delete(Personnage $perso)
	{
		//supprimer un personnage de la bdd
		$this->_db->query('DELETE FROM personnages WHERE id = '.$perso->id());
	}

	public function count()
	{
		//Compte le nombre de persos présents dans la db, execute requeste COUNT
		return $this->_db->query('SELECT COUNT(*) FROM personnages')->fetchColumn();
		//retourne le resultat de la query
	}

	public function getList($nom)
	{
		//retourne la liste de tous les persos sauf celui qui porte le nom $nom (le joueur)
		$persos = []; //besoin d'un tableau pour stocker les persos à affich

		$q = $this->_db->prepare("SELECT id, nom, degats FROM personnages WHERE nom <> :nom ORDER BY nom");
		$q->execute([':nom' => $nom]);
		//prep + exec

		while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) // tant qu'on trouve des données avec fetch assoc
		{
			$persos[] = new Personnage($donnees); //rempli le tab avec des objets personnages
		}

		return $persos; // retourne le tab

	}

	public function exists($info)
	{
		//si param = entier c'est qu'on a un id
		if(is_int($info))
		{
			return (bool) $this->_db->query("SELECT COUNT(*) FROM personnages WHERE id = ".$info)->fetchColumn();

		}

			//on fait un count where et on retourne un bool true ou false
		// Sinon c'est qu'on a passé un nom.
		if(is_string($info))
		{
			$q = $this->_db->prepare("SELECT COUNT(*) FROM personnages WHERE nom = :nom");
			$q ->execute([':nom' => $info]);
			return (bool) $q->fetchColumn();
		}
    // Exécution d'une requête COUNT() avec une clause WHERE, et retourne un boolean.
	}




	public function setDb(PDO $db)
	{
		//changer la db par celle proposée
		$this->_db = $db;
	}


}
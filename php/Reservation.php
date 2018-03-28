<?php
	//object Reservation
	class Reservation{
		//attributes

		/*private $_firstname;
		private $_lastname;*/
		private $_email;
		private $_dateR;
		private $_dateStart;
		private $_dateEnd;
		private $_room;
		private $_site;
		private $_originalState;
		private $_afterState;
		//private $_pwd;
		private $_idRoom;
		private $_idUser;

		private $_id;

		//constructor
		public function __construct(array $data){
			$this->hydrate($data);
		}

		//destructor
		public function __destruct(){
			/*unset($this->_firstname);
			unset($this->_lastname);*/
			unset($this->_email);
			//unset($this->_pwd);
			unset($this->_dateR);
			unset($this->_dateStart);
			unset($this->_dateEnd);
			unset($this->_room);
			unset($this->_site);
			unset($this->_originalState);
			unset($this->_afterState);
			unset($this->_idRoom);
			unset($this->_idUser);
			unset($this->_id);
		}

		// Getters

		

		public function getEmail(){
			return $this->_email;
		}


		public function getDateR(){
			return $this->_dateR;
		}

		public function getDateStart(){
			return $this->_dateStart;
		}

		public function getDateEnd(){
			return $this->_dateEnd;
		}

		public function getRoom(){
			return $this->_room;
		}

		public function getSite(){
			return $this->_site;
		}


		public function getOriginalState(){
			return $this->_originalState;
		}

		public function getAfterState(){
			return $this->_afterState;
		}



		public function getIdUser(){
			return $this->_idUser;
		}


		public function getIdRoom(){
			return $this->_idRoom;
		}

		public function getId(){
			return $this->id;
		}

		public function __get($name){
			echo 'Impossible d\'accèder à : '.$name.' sois il n\'existe pas, sois il est innacessible !';
		}

		// Setters


		public function setEmail($email){
			$this->_email = $email;
		}


		public function setDateR($dateR){
			$this->_dateR = $dateR;
		}

		public function setDateStart($dateStart){
			$this->_dateStart = $dateStart;
		}

		public function setDateEnd($dateEnd){
			$this->_dateEnd = $dateEnd;
		}

		public function setRoom($room){
			$this->_room = $room;
		}

		public function setSite($site){
			$this->_site = $site;
		}

		public function setOriginalState($originalState){
			$this->_originalState = $originalState;
		}

		public function setAfterState($afterState){
			$this->_afterState = $afterState;
		}

		public function setIdUser($idUser){
			$this->_idUser = $idUser;
		}

		public function setIdRoom($idRoom){
			$this->_idRoom = $idRoom;
		}

		public function setId($id){
			$this->_id = $id;
		}

		public function __set($name, $value){
			echo 'Erreur vous avez tentez d\'entrer une donnée dans une proprièté qui n\'existe pas ! ';
			echo 'L\'attribut invalide est : '.$name.' et la valeur est : '.$value;			
		}

		

		public function hydrate(array $data){
			foreach ($data as $key => $value) {
				$method = 'set'.ucfirst($key);
				if(method_exists($this, $method)){
					$this->$method($value);
				}
			}

		}

		public function __toString(){
			return "l'email est : ".$this->_email." la date est".$this->_dateR." la date de début est : ".$this->_dateStart." la date de fin est : ".$this->_dateEnd." le numéro de salle est : ".$this->_room." l'id du user est : ".$this->_idUser." l'id de salle est : ".$this->_idRoom." l'état original est : ".$this->_originalState." l'état de la salle après reservation est : ".$this->afterState." le site est : ".$this->_site." et l'id : ".$this->_id;
		}

	}


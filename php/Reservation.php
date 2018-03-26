<?php
	class Reservation{
		/*private $_firstname;
		private $_lastname;*/
		private $_email;
		private $_dateR;
		private $_dateStart;
		private $_dateEnd;
		private $_room;
		private $_site;
		//private $_pwd;
		private $_idRoom;

		private $_id;

		public function __construct(array $data){
			$this->hydrate($data);
		}

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
			unset($this->_idRoom);
			unset($this->_id);
		}

		// Getter
		/*public function getFirstname(){
			return $this->_firstname;
		}

		public function getLastname(){
			return $this->_lastname;
		}*/

		public function getEmail(){
			return $this->_email;
		}

		/*public function getPwd(){
			return $this->_pwd;
		}*/

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


		public function getIdRoom(){
			return $this->_idRoom;
		}

		public function getId(){
			return $this->id;
		}

		public function __get($name){
			echo 'Impossible d\'accèder à : '.$name.' sois il n\'existe pas, sois il est innacessible !';
		}

		// Setter
		/*public function setFirstname($firstname){
			$this->_firstname = $firstname;
		}

		public function setLastname($lastname){
			$this->_lastname = $lastname;
		}*/

		public function setEmail($email){
			$this->_email = $email;
		}

		/*public function setPwd($pwd){
			$this->_pwd = $pwd;
		}*/

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
			return "l'email est : ".$this->_email." la date est".$this->_dateR." la date de début est : ".$this->dateStart." la date de fin est : ".$this->dateEnd." le numéro de salle est : ".$this->room." l'id de salle est : ".$this->idRoom." le site est : ".$this->site." et l'id : ".$this->_id;
		}

	}


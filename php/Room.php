<?php
	//object Reservation
	class Room{
		//attributes

		private $_type;
		private $_description;
		private $_roomNumber;
		private $_site;
		private $_roomStatus;
		private $_id;

		//constructor
		public function __construct(array $data){
			$this->hydrate($data);
		}

		//destructor
		public function __destruct(){
			unset($this->_type);
			unset($this->_description);
			unset($this->_roomNumber);
			unset($this->_site);
			unset($this->_roomStatus);
			unset($this->_id);
		}

		// Getters

		public function getType(){
			return $this->_type;
		}

		public function getDescription(){
			return $this->_description;
		}		

		public function getRoomNumber(){
			return $this->_roomNumber;
		}

		
		public function getRoomStatus(){
			return $this->_roomStatus;
		}
		
		public function getSite(){
			return $this->_site;
		}
		

		public function getId(){
			return $this->id;
		}

		public function __get($name){
			echo 'Impossible d\'accèder à : '.$name.' sois il n\'existe pas, sois il est innacessible !';
		}

		// Setters

		public function setType($type){
			$this->_roomStatus = $type;
		}

		public function setDescription($description ){
			$this->_description = $description;
		}

		public function setRoomNumber($roomNumber){
			$this->_roomNumber = $roomNumber;
		}

		public function setRoomStatus($roomStatus){
			$this->_roomStatus = $roomStatus;
		}

		public function setSite($site){
			$this->_site = $site;
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
			return " le site est : ".$this->_site."  l'id : ".$this->_id." et le type est : ".$this->_type." description : ".$this->_description." le numéro de la chambre : ".$this->_roomNumber." et le statut de la chambre : ".$this->_roomStatus;
		}

	}



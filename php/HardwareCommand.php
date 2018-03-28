<?php
	//object Reservation
	class HardwareCommand{
		//attributes

		private $_idHardware;
		private $_hardwareType;
		private $_information;
		private $_status;
		private $_price;
		private $_quantity;
		private $_dateStart;
		private $_dateEnd;
		private $_id;

		//constructor
		public function __construct(array $data){
			$this->hydrate($data);
		}

		//destructor
		public function __destruct(){
			unset($this->_idHardware);
			unset($this->_hardwareType);
			unset($this->_information);
			unset($this->_status);
			unset($this->_price);
			unset($this->_quantity);
			unset($this->_id);
		}

		// Getters
		
		public function getIdHardware(){
			
			return $this->_idHardware;
		}
		
		public function getHardwareType(){
			return $this->_hardwareType;
		}

		public function getInformation(){
			return $this->_information;
		}		

		public function getStatus(){
			return $this->_status;
		}

		
		public function getQuantity(){
			return $this->_quantity;
		}
		
		public function getPrice(){
			return $this->_price;
		}

		public function getDateStart(){
			return $this->_dateStart;
		}

		public function getDateEnd(){
			return $this->_dateEnd;
		}


		public function getId(){
			return $this->id;
		}

		public function __get($name){
			echo 'Impossible d\'accèder à : '.$name.' sois il n\'existe pas, sois il est innacessible !';
		}

		// Setters

		public function setIdHardware($idHardware){
			$this->_idHardware = $idHardware;
		}

		public function setHardwareType($hardwareType){
			$this->_hardwareType = $hardwareType;
		}

		public function setInformation($information){
			$this->_information = $information;
		}

		public function setStatus($status){
			$this->_status = $status;
		}

		public function setQuantity($quantity){
			$this->_quantity = $quantity;
		}

		public function setPrice($price){
			$this->_price = $price;
		}

		public function setDateStart($dateStart){
			$this->_dateStart = $dateStart;
		}

		public function setDateEnd($dateEnd){
			$this->_dateEnd = $dateEnd;
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
			return " le prix est : ".$this->_price."  l'id : ".$this->_id."  le hardwareType est : ".$this->_hardwareType."  l'id harware est : ".$this->_idHardware." information : ".$this->_information." status : ".$this->_status." et la quantité : ".$this->_quantity." dateStart : ".$this->_dateStart." dateEnd : ".$this->_dateEnd;
		}

	}



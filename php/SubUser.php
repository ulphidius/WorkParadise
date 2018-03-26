<?php
	class SubUser{
		private $_idUser;
		private $_idSub;
		private $_dateStart;
		private $_dateEnd;

		// Getter
		public function __get($name){
			echo 'Impossible d\'accèder à : '.$name.' sois il n\'existe pas, sois il est innacessible !';
		}

		public function getIdUser(){
			return $this->_idUser;
		}

		public function getIdSub(){
			return $this->_idSub;
		}

		public function getDateStart(){
			return $this->_dateStart;
		}

		public function getDateEnd(){
			return $this->_dateEnd;
		}

		// Setter
		public function setIdUser($idUser){
			$this->_idUser = $idUser;
		}

		public function setIdSub($idSub){
			$this->_idSub = $idSub;
		}

		public function setDateStart($dateStart){
			$this->_dateStart = $dateStart;
		}

		public function setDateEnd($dateEnd){
			$this->_dateEnd = $dateEnd
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
			return "L'id : " . $this->_id . " le nom : " . $this->_name . " la description : " . $this->_description . " le prix de la journée : " . $this->_dayRate . " le prix à l'heure : " . $this->_hourRate . " le prix pour les étudiant : " . $this->_studentRate . " le prix pour les non inscrits : " . $this->_notEngagementRate . " le prix pour les engagés : " .$this->_engagementRate . " le temp d'engagement : " . $this->_engagementTime;
		}
	}
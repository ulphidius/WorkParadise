<?php
	class Subscription{
		private $_id;
		private $_name;
		private $_description;
		private $_dayRate;
		private $_hourRate;
		private $_studentRate;
		private $_notEngagementRate;
		private $_engagementRate;
		private $_engagementTime;


		public function __construct(array $data){
			$this->hydrate($data);
		}

		public function __destruct(){
			unset($this->_id);
			unset($this->_name);
			unset($this->_description);
			unset($this->_dayRate);
			unset($this->_hourRate);
			unset($this->_studentRate);
			unset($this->_notEngagementRate);
			unset($this->_engagementRate);
			unset($this->_engagementTime);
		}

		// Getter
		public function getId(){
			return $this->_id;
		}

		public function getName(){
			return $this->_name;
		}

		public function getDescription(){
			return $this->_description;
		}

		public function getDayRate(){
			return $this->_dayRate;
		}

		public function getHourRate(){
			return $this->_hourRate;
		}

		public function getStudentRate(){
			return $this->_studentRate;
		}

		public function getNotEngagementRate(){
			return $this->_notEngagementRate;
		}

		public function getEngagementRate(){
			return $this->_engagementRate;
		}

		public function getEngagementTime(){
			return $this->_engagementTime;
		}

		public function __get($name){
			echo 'Impossible d\'accèder à : '.$name.' sois il n\'existe pas, sois il est innacessible !';
		}

		// Setter
		public function setId($id){
			$this->_id = $id;
		}

		public function setName($name){
			$this->_name = $$name;
		}

		public function setDescription($description){
			$this->_description = $description;
		}

		public function setDayRate($dayRate){
			$this->_dayRate = $dayRate;
		}

		public function setHourRate($hourRate){
			$this->_hourRate = $hourRate;
		}

		public function setStudentRate($studentRate){
			$this->_studentRate = $studentRate;
		}

		public function setNotEngagementRate($notEngagementRate){
			$this->_notEngagementRate = $notEngagementRate;
		}

		public function setEngagementRate($engagementRate){
			$this->_engagementRate = $engagementRate;
		}

		public function setEngagementTime($_engagementTime){
			$this->_engagementTime = $_engagementTime;
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
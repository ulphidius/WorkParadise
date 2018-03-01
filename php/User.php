<?php
	class User{
		private $_firstname;
		private $_lastname;
		private $_email;
		private $_pwd
		private $_id;

		public function __construct(array $data){
			hydrate($data);
		}

		public function __destruct(){
			unset($this->_firstname);
			unset($this->_lastname);
			unset($this->_email);
			unset($this->_pwd);
			unset($this->_id);
		}

		// Getter
		public function getFirstname(){
			return $this->_firstname;
		}

		public function getLastname(){
			return $this->_lastname;
		}

		public function getEmail(){
			return $this->_email;
		}

		public function getPwd(){
			return $this->_pwd;
		}

		public function getId(){
			return $this->id;
		}

		public function __get($name){
			echo 'Impossible d\'accèder à : '.$name.' sois il n\'existe pas, sois il est innacessible !';
		}

		// Setter
		public function setFirstname($firstname){
			$this->_firstname = $firstname;
		}

		public function setLastname($lastname){
			$this->_lastname = $lastname;
		}

		public function setEmail($email){
			$this->_email = $email;
		}

		public function setPwd($pwd){
			$this->_pwd = $pwd;
		}

		public function setId($id){
			$this->_id = $id;
		}

		public function __set($name, $value){
			echo 'Erreur vous avez tentez d\'entrer une donnée dans une proprièté qui n\'existe pas ! ';
			echo 'L\'attribut invalide est : '.$name.' et la valeur est : '.$value;			
		}

		public function hydrate(array $data{
			foreach ($data as $key => $value) {
				$method = 'set'.ucfirst($key);
			}

			if(method_exists($this, $method)){
				$this->$method($value);
			}
		}

		public function __toString(){
			return "Le prénom est : ".$this->_firstname." le nom est : ".$this->_lastname." l'email est : ".$this->_email." le mot de passe est : ".$this->_pwd." et l'id : ".$this->_id;
		}

	}


<?php
	class User implements JsonSerializable{
		private $_firstname;
		private $_lastname;
		private $_email;
		private $_pwd;
		private $_phoneN;
		private $_admin;
		private $_statut;
		private $_secret;
		private $_id;


		public function __construct(array $data){
			$this->hydrate($data);
		}

		public function __destruct(){
			unset($this->_firstname);
			unset($this->_lastname);
			unset($this->_email);
			unset($this->_phoneN);
			unset($this->_admin);
			unset($this->_statut);
			unset($this->_secret);
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

		public function getPhoneN(){
			return $this->_phoneN;
		}

		public function getAdmin(){
			return $this->_admin;
		}

		public function getStatut(){
			return $this->_statut;
		}

		public function getSecret(){
			return $this->_secret;
		}

		public function getId(){
			return $this->_id;
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

		public function setPhoneN($phone){
			$this->_phoneN = $phone;
		}

		public function setAdmin($admin){
			$this->_admin = $admin;
		}

		public function setStatut($statut){
			$this->_statut = $statut;
		}

		public function setSecret($secret){
			$this->_secret = $secret;
		}

		public function setId($id){
			$this->_id = $id;
		}

		public function jsonSerialize(){
			return [
				'email' => $this->getEmail(),
				'phone' => $this->getPhoneN(),
				'firstname' => $this->getFirstname(),
				'lastname' => $this->getLastname()

			];
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
			return "Le prénom est : ".$this->_firstname." le nom est : ".$this->_lastname." l'email est : ".$this->_email." le mot de passe est : ".$this->_pwd." le téléphone est : ".$this->_phoneN." est-il admin : ".$this->_admin." le statut : ".$this->_statut. "et l'id : ".$this->_id;
		}

	}


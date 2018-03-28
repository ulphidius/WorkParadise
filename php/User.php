<?php
	class User{
		private $_firstname;
		private $_lastname;
		private $_email;
		private $_phoneN;
		private $_secret;
		private $_pwd;
		private $_id;

		public function __construct(array $data){
			$this->hydrate($data);
		}

		public function __destruct(){
			unset($this->_firstname);
			unset($this->_lastname);
			unset($this->_email);
			unset($this->_phoneN);
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

		public function getSecret(){
			return $this->_secret;
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

		public function setPhoneN($phoneN){
			$this->_phoneN = $phoneN;
		}

		public function setSecret($secret){
			$this->_secret = $secret;
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

		public function hydrate(array $data){
			foreach ($data as $key => $value) {
				$method = 'set'.ucfirst($key);
				if(method_exists($this, $method)){
					$this->$method($value);
				}
			}

		}

		public function __toString(){
			return "Le prénom est : ".$this->_firstname." le nom est : ".$this->_lastname." l'email est : ".$this->_email." le numéro de téléphone  est : ".$this->_phoneN." la phrase secrete est : ".$this->_secret." le mot de passe est : ".$this->_pwd." et l'id : ".$this->_id;
		}


				/*
					function isConnected(){
					//Vérification de l'existance des sessions
						if( !empty($_SESSION["email"]) && !empty($_SESSION["accesstoken"])){

							//on va chercher l'existance dans la bdd (token et email)
							$db = connectDb();
							$query = $db->prepare("SELECT 1 FROM users WHERE token=:token AND email=:email");
							$query->execute([
								"token"=>$_SESSION["accesstoken"],
								"email"=>$_SESSION["email"]
							]);
							if( $query->rowCount() ){
								//Si oui
								$_SESSION["accesstoken"] = generateAccessToken($_SESSION["email"]);
								return true;
							}else{
								//Sinon (l'utilisateur possède des sessions mais ces sessions ne sont pas valides)
								logout();
								return false;
							}
						}else{
							//Les variables de session n'existent pas
							return false;
						}
					}


					public function logout($redirect = false){
						//restore bdd
						$db = connectDb();
						$query = $db->prepare("UPDATE users SET token = null WHERE email=:email");
						$query->execute([
									"email"=>$_SESSION["email"]
								]);

						//supprimer les variables de session
						unset($_SESSION["accesstoken"]);
						unset($_SESSION["email"]);

						if($redirect){
							//rediriger sur la home
							header("Location: index.php");
						}

					}


					public function generateAccessToken($email){
						//Modification de la bdd avec un nouvel access token
						$accessToken = md5(uniqid()."gfdG nbvc.234");

						$db = connectDb();
						//Insérer en bdd le token pour cet utilisateur
						$query = $db->prepare("UPDATE users SET token=:token  WHERE email = :email");
						$query->execute(
								[
									"token"=>$accessToken,
									"email"=>$email
								 ]
						);
				//Retourne le nouvel access token
				return $accessToken;
			}
			*/

	
}


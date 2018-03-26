<?php
	class ConnectDB{
		private $_hostName;
		private $_dbName;
		private $_charset;
		private $_userName;
		private $_pwd;

		public function __construct(array $data){
			$this->hydrate($data);
		}

		// Getter
		public function getHostName(){
			return $this->_hostName;
		}

		public function getDbName(){
			return $this->_dbName;
		}

		public function getCharset(){
			return $this->_charset;
		}

		public function getUserName(){
			return $this->_userName;
		}

		public function getPwd(){
			return $this->_pwd;
		}

		// Setter
		public function setHostName($hostNameE){
			$this->_hostName = $hostNameE;
		}

		public function setDbName($dbNameE){
			$this->_dbName = $dbNameE;
		}

		public function setCharset($charsetE){
			$this->_charset = $charsetE;
		}

		public function setUserName($userNameE){
			$this->_userName = $userNameE;
		}

		public function setPwd($pwdE){
			$this->_pwd = $pwdE;
		}

		public function hydrate(array $data){
			foreach ($data as $key => $value) {
				$method = 'set'.ucfirst($key);
				if(method_exists($this, $method)){
					$this->$method($value);
				}
			}

		}

		// Les méthodes
		public function connectToDB(){
			try{
				$db = new PDO('mysql:host='.$this->_hostName.';dbname='.$this->_dbName.';charset='.$this->_charset.'', $this->_userName, $this->_pwd);
				$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			}catch(Exception $e){
				die('Erreur : ' . $e->getMessage());
			
			}
			return $db;
		}

		// Retour affichage

		public function to_string(){
			return "Le host : ".$this->_hostName." le nom de la base de données : ".$this->_dbName." le type d'encodage : ".$this->_charset." le nom de l'utilisateur : ".$this->_userName." le mot de passe : ".$this->_pwd;
		}


	}
?>
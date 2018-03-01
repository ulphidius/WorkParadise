<?php
	class ConnectDB{
		private $_hostName;
		private $_dbName;
		private $_charset;
		private $_userName;
		private $_pwd;

		public function __construct($hostNameE, $dbNameE, $charsetE, $userNameE, $pwdE){
			if(is_string($hostNameE))
				this->_hostName = $hostNameE;
			if(is_string($dbNameE))
				this->_dbName = $dbNameE;
			if(is_string($charsetE))
				this->_charset = $charsetE;
			if(is_string($userNameE))
				this->_userName = $userNameE;
			if(is_string($pwdE))
				this->_pwd = $pwdE;
			else{
				print("Erreur Une des données n'est pas une chaine de caractère ! ");
			}
		}

		// Getter
		public function getHostName(){
			return this->_hostName;
		}

		public function getDBName(){
			return this->_dbName;
		}

		public function getCharset(){
			return this->_charset;
		}

		public function getUserName(){
			return this->_userName;
		}

		public function getPwd(){
			return this->_pwd;
		}

		// Setter
		public function setHostName($hostNameE){
			this->_hostName = $hostNameE;
		}

		public function setDBName($dbNameE){
			this->_dbName = $dbNameE;
		}

		public function setCharset($charsetE){
			this->_charset = $charsetE;
		}

		public function setUserName($userNameE){
			this->_userName = $userNameE;
		}

		public function setPwd($pwdE){
			this->_pwd = $pwdE;
		}

		// Les méthodes
		public function connectToDB(){
			try{
				$db = new PDO('mysql:host='.this->_hostName.';dbname='.this->_dbname.';charset='.this->_charset.'', this->_userName, this->_pwd);

			}catch(Exception $e){
				die('Erreur : ' . e->getMessage());
			
			}
		}

		// Retour affichage

		public function to_string(){
			return "Le host : ".this->_hostName." le nom de la base de données : ".this->_dbName." le type d'encodage : ".this->_charset." le nom de l'utilisateur : ".this->_userName." le mot de passe : ".this->_pwd;
		}


	}
?>
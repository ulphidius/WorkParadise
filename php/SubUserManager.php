<?php
	require "SubUser.php";

	class SubUserManager{
		private $_db;

		public function __construct(PDO $db){
			$this->_db = $db;
		}

		public function __destruct(){
			unset($this->_db);
		}

		// Getter
		public function getDb(){
			return $this->_db;
		}

		public function __get($name){
			echo 'Impossible d\'accèder à : '.$name.' sois il n\'existe pas, sois il est innacessible !';
		}

		// Setter
		public function setDb($db){
			$this->_db = $db;
		}

		public function __set($name, $value){
			echo 'Erreur vous avez tentez d\'entrer une donnée dans une proprièté qui n\'existe pas ! ';
			echo 'L\'attribut invalide est : '.$name.' et la valeur est : '.$value;			
		}

		public function addSUbUser(SubUser $subUser){
			$connect = $this->_db->prepare('INSERT INTO subUser (dateStart, dateEnd, idUser, idSub) VALUES (:dateStart, :dateEnd, :idUser, :idSub)');

			$connect->bindValue(':dateStart', $user->getFirstname(), PDO::PARAM_STR);
			$connect->bindValue(':dateEnd', $user->getLastname(), PDO::PARAM_STR);			
			$connect->bindValue(':idUser', $user->getEmail(), PDO::PARAM_INT);
			$connect->bindValue(':idSub', $user->getStatut(), PDO::PARAM_INT);

			$connect->execute();
		}

		public function getSubUser($id){
			$id = (int)$id;
			$connect = $this->_db->prepare('SELECT dateStart, dateEnd, idSub, idUser FROM subUser WHERE idUser = :idUser');
			$connect->execute([":idUser"=>$id]);
			$data = $connect->fetch(PDO::FETCH_ASSOC);

			return new SubUser($data);
		}

		public function getSubUserList(){
			$subUser = [];
			$connect = $this->_db->prepare('SELECT idUser, idSub, dateStart, dateEnd FROM subUser ORDER BY idUser');
			$connect->execute();
			while($data = $connect->fetch(PDO::FETCH_ASSOC)){
				$subUsers[] = new SubUser($data);
			}

			return $subUsers;
		}

		public function __toString(){
			return "Les données de la BD : " . $this->_db;
		}
	}

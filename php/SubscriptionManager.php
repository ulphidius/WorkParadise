<?php
	require "Subscription.php";

	class SubscriptionManager{
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
		public function setDb(PDO $db){
			$this->_db = $db;
		}

		public function __set($name, $value){
			echo 'Erreur vous avez tentez d\'entrer une donnée dans une proprièté qui n\'existe pas ! ';
			echo 'L\'attribut invalide est : '.$name.' et la valeur est : '.$value;			
		}

		public function getSubscription(Subscription $sub){
			$connect = $this->_db->prepare('UPDATE Subscription SET id = :id, name = :name, description = :description, hourRate = :hourRate, studentRate = :studentRate, engagementRate = :engagementRate, notEngagementRate = :notEngagementRate, engagemementTime = :engagemementTime, dayRate = :dayRate WHERE id = :id');
			
			$connect->bindValue(':id', $sub->getId(), PDO::PARAM_INT);
			$connect->bindValue(':name', $sub->getName(), PDO::PARAM_STR);
			$connect->bindValue(':description', $sub->getDescription(), PDO::PARAM_STR);
			$connect->bindValue(':hourRate', $sub->getHourRate(), PDO::PARAM_STR);
			$connect->bindValue(':studentRate', $sub->studentRate(), PDO::PARAM_STR);
			$connect->bindValue(':engagemementTime', $sub->getEngagementTime(), PDO::PARAM_STR);
			$connect->bindValue(':notEngagementRate', $sub->getNotEngagementRate(), PDO::PARAM_STR);
			$connect->bindValue(':engagemementTime', $user->getEngagementTime(), PDO::PARAM_STR);
			$connect->bindValue(':dayRate', $user->getDayRate(), PDO::PARAM_STR);

			$connect->execute();
		} 

		public function getSubscription($name){
			$connect = $this->_db->prepare('SELECT id FROM Subscription WHERE name = :name');
			$connect->execute([':name'=>$name]);

			$data = $connect->fetchColumn();

			return $data;
		}


		public function addSubscription(){
			$connect = $this->_db->prepare('INSERT INTO Subscription (id, name, description, hourRate, studentRate, engagemementTime, engagemementRate, notEngagementRate, engagemementTime, dayRate) VALUES (:id, :name, :description, :hourRate, :studentRate, :engagemementTime, :engagemementRate, :notEngagementRate, :dayRate)');

			$connect->bindValue(':id', $sub->getId(), PDO::PARAM_INT);
			$connect->bindValue(':name', $sub->getName(), PDO::PARAM_STR);
			$connect->bindValue(':description', $sub->getDescription(), PDO::PARAM_STR);
			$connect->bindValue(':hourRate', $sub->getHourRate(), PDO::PARAM_STR);
			$connect->bindValue(':studentRate', $sub->studentRate(), PDO::PARAM_STR);
			$connect->bindValue(':engagemementTime', $sub->getEngagementTime(), PDO::PARAM_STR);
			$connect->bindValue(':notEngagementRate', $sub->getNotEngagementRate(), PDO::PARAM_STR);
			$connect->bindValue(':engagemementTime', $user->getEngagementTime(), PDO::PARAM_STR);
			$connect->bindValue(':dayRate', $user->getDayRate(), PDO::PARAM_STR);

			$connect->execute();
		}

		public function __toString(){
			return "Les données de la BD : " . $this->_db;
		}
	}
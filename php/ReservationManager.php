<?php
	require "Reservation.php";
	
	class ReservationManager{
		private $_db;

		public function __construct(PDO $db){
			$this->_db = $db;
		}

		public function __destruct(){
			$this->_db;
		}

		// Getter
		public function getDb(){
			return $this->_db;
		}

		// Setter
		public function setDb(PDO $db){
			$this->_db = $db;
		}


		//bdd methods

		/*public function loadId(){
			$connect = $this->_db->prepare('SELECT id FROM reservationroom WHERE id = MAX(id)');
			$connect->execute();
			$id = $connect->fetch();
			echo $id;
			
			return $id;
		}*/

		public function addReservation(Reservation $reservation){
			$connect = $this->_db->prepare('INSERT INTO reservationroom(dateStart, dateEnd, idRoom) VALUES(:dateStart, :dateEnd, :idRoom)');

					
			//$connect->bindValue(':email', $reservation->getEmail(), PDO::PARAM_STR);
			//$connect->bindValue(':dateR', $reservation->getDateR(), PDO::PARAM_STR);
			$connect->bindValue(':dateStart', $reservation->getDateStart(), PDO::PARAM_STR);
			$connect->bindValue(':dateEnd', $reservation->getDateEnd(), PDO::PARAM_STR);
			$connect->bindValue(':idRoom', $reservation->getIdRoom(), PDO::PARAM_INT);
			//$connect->bindValue(':site', $reservation->getSite(), PDO::PARAM_STR);
			

			$connect->execute();

			/*$reservId = $reservationManager->loadId();
			$userId = $_SESSION["connect"];

			$connect2 = $this->_db->prepare('INSERT INTO makereservation(idUser, idReservation) VALUES(:idUser, :idReservation)');

			$connect2->bindValue(':idUser', $userId, PDO::PARAM_INT);
			$connect2->bindValue(':idReservation', $reservId, PDO::PARAM_INT);
			$connect->execute();*/



		}

		public function deleteReservation(Reservation $reservation){
			$connect = $this->_db->prepare('DELETE FROM ReservationS WHERE id = :id');
			$connect->execute([":id"=>$reservation->getId()]);
		}

		public function getReservation($id){
			$id = (int)$id;
			$connect = $this->_db->prepare('SELECT id, prenom, nom, email, pwd FROM Reservation WHERE id = :id');
			$connect->execute([":id"=>$id]);
			$data = $connect->fetch(PDO::FETCH_ASSOC);

			return new Reservation($data);
		}

		public function getList(){
			$Reservations = [];
			$connect = $this->_db-prepare('SELECT id, prenom, nom, email, pwd FROM Reservation ORDER BY nom');
			$connect->execute();
			while($data = $connect->fetch(PDO::FETCH_ASSOC)){
				$Reservations[] = new Reservation($data);
			}

			return $Reservations;
		}

		public function checkEmail($email){
			$connect = $this->_db->prepare('SELECT email FROM ReservationS WHERE email = :email');
			$connect->execute([":email"=> $email]);
			$result = $connect->fetch();
			if(empty($result)){
				return false;
			} 
			return true;
		}
		
		public function checkRoom($roomNumber, $site){
			$connect = $this->_db->prepare('SELECT id FROM room WHERE roomNumber = :roomNumber AND site = :site');
			$connect->execute([
				":roomNumber" => $roomNumber,
				":site" => $site
			]);

			

			$result = $connect->fetch();
			if(empty($result)){
				return $_POST["idRoom"] = NULL;
			} 
			$str = implode(" ",$result);

			$str2 = explode(" ", $str);

			//retourne l'id de la room correspondante

			return $_POST["idRoom"] =  intval($str2[0]);
			//return intval($str);


			
		}

		public function checkReservationRoom($idRoom, $dateStart, $dateEnd){
			
			/*echo $idRoom;
			echo "<br>";
			echo $dateStart;
			echo "<br>";
			echo $dateEnd;
			echo "<br>";*/
			//$dateStart = strtotime($dateStart);
			//echo $dateStart;
			$connect = $this->_db->prepare('SELECT * FROM reservationroom WHERE idRoom = :idRoom AND( (:dateStart BETWEEN dateStart AND dateEnd) OR (:dateEnd BETWEEN dateStart AND dateEnd) OR (:dateEnd >= dateEnd AND :dateStart <= dateStart))');
			$connect->execute([
				":idRoom" => $idRoom,
				":dateStart" => $dateStart,
				":dateEnd" => $dateEnd
			]);

			

			$result = $connect->fetch();
			if(empty($result)){
				return false;
			}
			return true; 
			/*$str = implode(" ",$result);

			$str2 = explode(" ",$str);

			//retourne l'id de la room correspondante

			return $_POST["idRoom"] =  intval($str2[0]);*/
			//return intval($str);


			
		}

		
		

		/*public function updateReservation(Reservation $Reservation){
			$connect = $this->_db->prepare('UPDATE ReservationS SET id = :id, prenom = :prenom, nom = :nom, email = :email, pwd = :pwd WHERE id = :id');
			
			$pwd = password_hash($Reservation->getPwd(), PASSWORD_DEFAULT);
			
			$connect->bindValue(':id', $Reservation->getId(), PDO::PARAM_INT);
			$connect->bindValue(':prenom', $Reservation->getFirstname(), PDO::PARAM_STR);
			$connect->bindValue(':nom', $Reservation->getLastname(), PDO::PARAM_STR);
			$connect->bindValue(':email', $Reservation->getEmail(), PDO::PARAM_STR);
			$connect->bindValue(':pwd', $pwd, PDO::PARAM_STR);

			$connect->execute();

		}*/

	}

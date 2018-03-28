<?php
	require "Reservation.php";
	
	class ReservationManager{
		public $_db; //needs to be private but set to public for testing

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
			$connect = $this->_db->prepare('INSERT INTO reservationroom(dateR, dateStart, dateEnd, idRoom, idUser) VALUES(:dateR ,:dateStart, :dateEnd, :idRoom, :idUser)');

			$str1 = implode(" ",$_SESSION["connection"]);

			$str2 = explode(" ", $str1);		
			$connect->bindValue(':dateR', $reservation->getDateR(), PDO::PARAM_STR);
			$connect->bindValue(':dateStart', $reservation->getDateStart(), PDO::PARAM_STR);
			$connect->bindValue(':dateEnd', $reservation->getDateEnd(), PDO::PARAM_STR);
			$connect->bindValue(':idRoom', $reservation->getIdRoom(), PDO::PARAM_INT);
			$connect->bindValue(':idUser', intval($str2[0]), PDO::PARAM_INT);
			
			$connect->execute();


		}

		public function deleteReservation(Reservation $reservation){
			$connect = $this->_db->prepare('DELETE FROM reservationroom WHERE id = :id');
			$connect->execute([":id"=>$reservation->getId()]);
		}

		/*public function getReservation($idUser){
			$id = (int)$id;
			$connect = $this->_db->prepare('SELECT * FROM reservationroom WHERE idUser = :idUser');
			$connect->execute([":idUser"=>$idUser]);
			$data = $connect->fetch(PDO::FETCH_ASSOC);

			return new Reservation($data);
		}*/

		/*public function getList(){
			$Reservations = [];
			$connect = $this->_db-prepare('SELECT id, prenom, nom, email, pwd FROM Reservation ORDER BY nom');
			$connect->execute();
			while($data = $connect->fetch(PDO::FETCH_ASSOC)){
				$Reservations[] = new Reservation($data);
			}

			return $Reservations;
		}*/

		//check if a room exist in the database for x site
		/*public function checkSite($site){
			$connect = $this->_db->prepare('SELECT id FROM site WHERE name = :name');
			$connect->execute([
				":name" => $site
			]);

			

			$result = $connect->fetch();
			if(empty($result)){
				return $_POST["idSite"] = NULL;
			} 
			$str = implode(" ",$result);

			$str2 = explode(" ", $str);

			//return id of room in int format

			return $_POST["idSite"] =  intval($str2[0]);
			//return intval($str);


			
		}*/

		public function checkHourSite($dateR, $site){
			//check le jour de la semaine avec $day
			//nous renvoie un nombre correspondant au jour de la semaine
			$tabDate = explode('-', $dateR);
			$timestamp = mktime(0, 0, 0, $tabDate[1], $tabDate[2], $tabDate[0]);
			$day = date('w', $timestamp);

			/*if($day == "3"){
				echo $day;
			}*/
			//echo $day;

		
			



			if($day >= 1 && $day <= 4){

				$connect = $this->_db->prepare('SELECT openHourWeek, endHourWeek FROM site WHERE name = :site');

				$connect->execute([
				":site" => $site
				]);
				
				$result = $connect->fetch();
				if(empty($result)){
					return $_POST["result"] = 0;
				}
				//echo $result[0];
				//echo $result[1];

				return $_POST["result"] = $result ;   


				/*$connect2 = $this->_db->prepare('SELECT endHourWeek FROM site WHERE name = :site');

				$connect2->execute([
				":site" => $site
				]);*/

			}else if($day == 5){
				$connect = $this->_db->prepare('SELECT openHourFriday, endHourFriday FROM site WHERE name = :site');

				$connect->execute([
				":site" => $site
				]);

				$result = $connect->fetch();
				if(empty($result)){
					return $_POST["result"] = 0;
				}
				return $_POST["result"] = $result ;   




			}else if($day <= 7){
				$connect = $this->_db->prepare('SELECT openHourWeekend, endHourWeekend FROM site WHERE name = :site');

				$connect->execute([
				":site" => $site
				]);

				$result = $connect->fetch();
				if(empty($result)){
					return $_POST["result"] = 0;
				}
				return $_POST["result"] = $result ;   
			}
		


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

			//return id of room in int format

			return $_POST["idRoom"] =  intval($str2[0]);
			//return intval($str);


			
		}

		//verify if a room is reserved between dateStart and dateEnd
		public function checkReservationRoom($idRoom, $dateR, $dateStart, $dateEnd){
			
			$connect = $this->_db->prepare('SELECT * FROM reservationroom WHERE idRoom = :idRoom AND dateR = :dateR AND( (:dateStart BETWEEN dateStart AND dateEnd) OR (:dateEnd BETWEEN dateStart AND dateEnd) OR (:dateEnd >= dateEnd AND :dateStart <= dateStart))');
			$connect->execute([
				":idRoom" => $idRoom,
				":dateR" => $dateR,
				":dateStart" => $dateStart,
				":dateEnd" => $dateEnd
			]);

			

			$result = $connect->fetch();
			if(empty($result)){
				return false;
			}
			return true; 
			


			
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

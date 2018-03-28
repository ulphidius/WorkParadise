<?php
	require "HardwareCommand.php";
	
	class HardwareCommandManager{
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
			$connect = $this->_db->prepare('SELECT id FROM roomroom WHERE id = MAX(id)');
			$connect->execute();
			$id = $connect->fetch();
			echo $id;
			
			return $id;
		}*/

		public function addHardwareCommand(HardwareCommand $hardwareCommand){
			$connect = $this->_db->prepare('INSERT INTO hardwarecommandlist(idUser, idHardware, quantity, dateStart, dateEnd) VALUES (9,:idHardware, :quantity, :dateStart, :dateEnd)');
 
			$connect->bindValue(':idHardware', $hardwareCommand->getIdHardware(), PDO::PARAM_INT);
			$connect->bindValue(':quantity', $hardwareCommand->getQuantity(), PDO::PARAM_STR);
			$connect->bindValue(':dateStart', $hardwareCommand->getDateStart(), PDO::PARAM_INT);
			$connect->bindValue(':dateEnd', $hardwareCommand->getDateEnd(), PDO::PARAM_STR);
			
			$connect->execute();

		/*	$result = $connect->fetch();

			echo($result);
*/



		}

		public function deleteroom(room $room){
			$connect = $this->_db->prepare('DELETE FROM room WHERE id = :id');
			$connect->execute([":id"=>$room->getId()]);
		}

		/*public function getroom($idUser){
			$id = (int)$id;
			$connect = $this->_db->prepare('SELECT * FROM roomroom WHERE idUser = :idUser');
			$connect->execute([":idUser"=>$idUser]);
			$data = $connect->fetch(PDO::FETCH_ASSOC);

			return new room($data);
		}*/

		/*public function getList(){
			$rooms = [];
			$connect = $this->_db-prepare('SELECT id, prenom, nom, email, pwd FROM room ORDER BY nom');
			$connect->execute();
			while($data = $connect->fetch(PDO::FETCH_ASSOC)){
				$rooms[] = new room($data);
			}

			return $rooms;
		}*/

		//check if a room exist in the database for x site
		public function checkHardware($hardwareType, $quantity){
			$connect = $this->_db->prepare('SELECT id FROM hardwarecommand WHERE hardwareType = :hardwareType AND quantity >= :quantity');
			$connect->execute([
				":hardwareType" => $hardwareType,
				":quantity" => $quantity
			]);

			

			$result = $connect->fetch();
			if(empty($result)){
				return $_POST["idHardware"] = NULL;
			} 
			$str = implode(" ",$result);

			$str2 = explode(" ", $str);

			//return id of room in int format

			return $_POST["idHardware"] =  intval($str2[0]);
			//return intval($str);


			
		}

		//verify if a room is reserved between dateStart and dateEnd
		/*public function checkRoom($idRoom, $dateStart, $dateEnd){
			
			$connect = $this->_db->prepare('SELECT * FROM roomroom WHERE idRoom = :idRoom AND( (:dateStart BETWEEN dateStart AND dateEnd) OR (:dateEnd BETWEEN dateStart AND dateEnd) OR (:dateEnd >= dateEnd AND :dateStart <= dateStart))');
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
			


			
		}*/

		
		

		/*public function updateroom(room $room){
			$connect = $this->_db->prepare('UPDATE roomS SET id = :id, prenom = :prenom, nom = :nom, email = :email, pwd = :pwd WHERE id = :id');
			
			$pwd = password_hash($room->getPwd(), PASSWORD_DEFAULT);
			
			$connect->bindValue(':id', $room->getId(), PDO::PARAM_INT);
			$connect->bindValue(':prenom', $room->getFirstname(), PDO::PARAM_STR);
			$connect->bindValue(':nom', $room->getLastname(), PDO::PARAM_STR);
			$connect->bindValue(':email', $room->getEmail(), PDO::PARAM_STR);
			$connect->bindValue(':pwd', $pwd, PDO::PARAM_STR);

			$connect->execute();

		}*/

	}

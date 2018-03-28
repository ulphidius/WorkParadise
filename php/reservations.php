<?php
	//test file to create reservations
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	
	session_start();
	
	require "conf.php";
	require "ReservationManager.php";
	require "ConnectDB.php";


	//all data of form needs to be set
	if(count($_POST) == 5
		&& !empty($_POST["dateR"])
		&& !empty($_POST["dateStart"])
		&& !empty($_POST["dateEnd"])
		&& !empty($_POST["roomNumber"])
		&& !empty($_POST["site"])){

		
		$error = false;
		$listOfError = [];

		//echo $_POST["dateR"];
		//trim hours

		//$_POST["email"] = trim($_POST["email"]);
		$_POST["dateR"] = trim($_POST["dateR"]);
		$_POST["dateStart"] = trim($_POST["dateStart"]);
		$_POST["dateEnd"] = trim($_POST["dateEnd"]);


		//dateStart needs to be < dateEnd
		if($_POST["dateStart"] >= $_POST["dateEnd"]){
			$error = true;
			$listOfError[] = $listOfErrors[14];

		}

		// dateR needs to be beetween today and 14 days in the future
		$stockDateR = date("Y-m-d");

		list($y,$m,$d)= explode("-",$stockDateR);
									$stockDateR = mktime(0,0,0,$m,$d+14,$y);
									$stockDateR=gmdate("Y-m-d", $stockDateR);
									//echo $stockDateR;


		if($_POST["dateR"] > $stockDateR){
			$error = true;
			$listOfError[] = $listOfErrors[20];

		}


		//you can't reserve for more than x hours
		//echo (($_POST["dateEnd"] - $_POST["dateStart"]));

		/*if(($_POST["dateEnd"] - $_POST["dateStart"]) > 1){
			$error = true;
			$listOfError[] = $listOfErrors[15];

		}*/



		/*if($_POST["dateStart"] >= $_POST["dateEnd"]){
			$error = true;
			$listOfError[] = $listOfErrors[14];

		}*/
		//echo($_POST["dateEnd"] - $_POST["dateStart"]);
		//echo($_POST["dateEnd"]);




		//put roomNumber in an another $_POST variable
		$_POST["room"] = $_POST["roomNumber"];
		

		

		//launch bdd + tests bdd
		$db = new ConnectDB($dbConnection);

		$db = $db->connectToDB();
		$reservationManager = new ReservationManager($db);

		//check if site exist an return an id
		/*if($reservationManager->checkSite($_POST["site"]) == 0){
			$error = true;
			$listOfError[] = $listOfErrors[17];
		}*/

		//check if for room and site we got a room in the database, if not it doesn't exist
		/*echo $_POST["dateR"];
		$tabDate = explode('-', $_POST['dateR']);
		$timestamp = mktime(0, 0, 0, $tabDate[1], $tabDate[2], $tabDate[0]);
		$jour = date('w', $timestamp);

		echo $jour;*/
	
		//check if date is ok with the database data for each site
		if($reservationManager->checkHourSite($_POST["dateR"], $_POST["site"]) == 0){
			$error = true;
			$listOfError[] = $listOfErrors[17];
			echo $_POST["result"];
		}else{
			//ok on recup la date max et la date min en heures selon date
			//echo $_POST["result"][0];
			//echo $_POST["result"][1];
			
			//echo "voila : ";

			//to test if the first time is < at timeEndMax - 1 hour in dateTest
			$dateD = date("H", strtotime($_POST["result"][1]))-1; 
			$dateA = date("H", strtotime($_POST["result"][0]))+1; 
			
			$dateTestD = date($dateD.":i", strtotime($_POST["result"][1]));
			$dateTestA = date($dateA.":i", strtotime($_POST["result"][0]));

			/*echo $_POST["result"][0];
			echo $_POST["result"][1];
			echo "  ";
			echo $_POST["dateStart"];
			echo $_POST["dateEnd"];*/

			if ($_POST["result"][0] > $_POST["dateStart"] || $_POST["dateStart"] > $dateTestD) {
				$error = true;
				$listOfError[] = $listOfErrors[19];			
			}

			if ($_POST["dateEnd"] > $_POST["result"][1] || $_POST["dateEnd"] < $dateTestA ) {

				$error = true;
				$listOfError[] = $listOfErrors[19];	
			}
		
		}


		if($reservationManager->checkRoom($_POST["room"], $_POST["site"]) == 0){
			$error = true;
			$listOfError[] = $listOfErrors[12];
		}

		//if a room exist, check if there isn't a reservated room between hours
		if(!is_null($_POST["idRoom"])){
			if($reservationManager->checkReservationRoom($_POST["idRoom"], $_POST["dateR"], $_POST["dateStart"], $_POST["dateEnd"]) == true){
				$error = true;
				$listOfError[] = $listOfErrors[13];
			}
		}



		//if there are errors , print them in the webpage
		if($error){
			$_SESSION["errors_form"] = $listOfError;
			$_SESSION["data_form"] = $_POST;
			echo json_encode($listOfError);
		
		//else create a reservation 
		}else{
			

			$reservation = new Reservation([
						//'email' => $_POST["email"],
						'dateR' => $_POST["dateR"],
						'dateStart' => $_POST["dateStart"],
						'dateEnd' => $_POST["dateEnd"],
						'room' => $_POST["room"],
						'site' => $_POST["site"],
						'idRoom' => $_POST["idRoom"]
						]);
			

			$reservationManager->addReservation($reservation);
			$idOfReserv = $reservationManager->loadId();
			$reservationManager->makeReservation();


			

		}

	}else{
		die("Erreur tentative, formulaire altérer ou erreur interne !");


	}

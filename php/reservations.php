<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	
	session_start();
	
	require "conf.php";
	require "ReservationManager.php";
	require "ConnectDB.php";



	if(count($_POST) == 4
		&& !empty($_POST["dateStart"])
		&& !empty($_POST["dateEnd"])
		&& !empty($_POST["roomNumber"])
		&& !empty($_POST["site"])){

		
		$error = false;
		$listOfError = [];

		//$_POST["email"] = trim($_POST["email"]);
		$_POST["dateStart"] = trim($_POST["dateStart"]);
		$_POST["dateEnd"] = trim($_POST["dateEnd"]);


		
		if($_POST["dateStart"] >= $_POST["dateEnd"]){
			$error = true;
			$listOfError[] = $listOfErrors[14];

		}
	//La salle doit être comprise entre 1 et 100 (nombre max de salles par site pour l'instant)
	/*if( $_POST["roomNumber"] < 1 ||  $_POST["roomNumber"] > 100 ){
		//echo ($_POST["room"]);
		$error = true;
		$listOfError[] = $listOfErrors[10];
	}*/

	//l'heure d'arrivée doit être différente de l'heure de départ et doit être entre 8h et 20h
	/*$checkDatStart = []; // on fait deux tab pour transformer en int
	$checkDatEnd = [];

	$checkDatStart[] = $_POST["start_hour"];
	$checkDatStart[2] = "0";

	$checkDatEnd[] = $_POST["end_hour"];
	$checkDatEnd[2] = "0";*/

	//on met les heures en int pour les comparer
	
	/*
	$checkDatStart = explode(":", $_POST["start_hour"]);
	$checkDatEnd = explode(":", $_POST["end_hour"]);
	*/


	/*if( $_POST["start_hour"] >= $_POST["end_hour"]) && $_POST["start_hour"] > 8{*/
	/*if($checkDatStart >= $checkDatEnd){
		//echo ($_POST["start_hour"]);
		$error = true;
		$listOfError[] = $listOfErrors[9];
	}



		*/


		//on met dans room le nuémro qu'on a saisi dans le formulaire
		$_POST["room"] = $_POST["roomNumber"];
		

		

		//on initie les tests avec bdd avec reservationManager
		$db = new ConnectDB($dbConnection);

		$db = $db->connectToDB();
		$reservationManager = new ReservationManager($db);
		/*if($userManager->checkEmail($user->getEmail()) != false){
			$error = true;
			$listOfError[] = $listOfErrors[7];
		}*/

		//check si la room existe en vérifiant si pour tel site et tel room on a une correspondance en bdd
		if($reservationManager->checkRoom($_POST["room"], $_POST["site"]) == 0){
			$error = true;
			$listOfError[] = $listOfErrors[12];
		}

		if(!is_null($_POST["idRoom"])){
			if($reservationManager->checkReservationRoom($_POST["idRoom"], $_POST["dateStart"], $_POST["dateEnd"]) == true){
				$error = true;
				$listOfError[] = $listOfErrors[13];
			}
		}

		//s'il y a des erreurs, on les affiche dans le formulaire
		if($error){
			$_SESSION["errors_form"] = $listOfError;
			$_SESSION["data_form"] = $_POST;
			echo json_encode($listOfError);
		
		//sinon on crée une reservation et on l'inscrit dans reservationroom
		}else{
			//$_POST["idRoom"] = ;//$reservationManager->checkRoom($_POST["room"], $_POST["site"]);
			//echo($_POST['idRoom']);

			$reservation = new Reservation([
						//'email' => $_POST["email"],
						//'dateR' => $_POST["dateR"],
						'dateStart' => $_POST["dateStart"],
						'dateEnd' => $_POST["dateEnd"],
						'room' => $_POST["room"],
						'site' => $_POST["site"],
						'idRoom' => $_POST["idRoom"]
						]);
			

			$reservationManager->addReservation($reservation);
			$idReserv = $reservationManager->loadId();
			echo "bonsoir" + $idReserv;

		}

	}else{
		die("Erreur tentative, formulaire altérer ou erreur interne !");


	}

<?php
	//test file to create reservations
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	
	session_start();
	
	require "conf.php";
	require "ServiceCommandManager.php";
	require "ConnectDB.php";


		if(count($_POST) == 4
		&& !empty($_POST["dateStart"])
		&& !empty($_POST["dateEnd"])
		&& !empty($_POST["serviceType"])
		&& !empty($_POST["quantity"])){
		


		$_POST["dateStart"] = trim($_POST["dateStart"]);
		$_POST["dateEnd"] = trim($_POST["dateEnd"]);
		//echo $_POST["serviceType"];
		//launch bdd + tests bdd

		$error = false;
		$listOfError = [];


		$db = new ConnectDB($dbConnection);

		$db = $db->connectToDB();
		$serviceCommandManager = new ServiceCommandManager($db);

		//check if for room and site we got a room in the database, if not it doesn't exist
		/*if($serviceCommandManager->checkRoom($_POST["room"], $_POST["site"]) == 0){
			$error = true;
			$listOfError[] = $listOfErrors[12];
		}*/

		//if a room exist, check if there isn't a reservated room between hours
		/*if(!is_null($_POST["idRoom"])){
			if($serviceCommandManager->checkReservationRoom($_POST["idRoom"], $_POST["dateStart"], $_POST["dateEnd"]) == true){
				$error = true;
				$listOfError[] = $listOfErrors[13];
			}
		}*/
		/*if($serviceCommandManager->checkService($_POST["serviceType"], $_POST["quantity"]) == 0){

				
			
				$error = true;
				$listOfError[] = $listOfErrors[16];
		}*/
		if($serviceCommandManager->checkService($_POST["serviceType"], $_POST["quantity"]) == 0){

				
			
				$error = true;
				$listOfError[] = $listOfErrors[16];
		}

		

		//if there are errors , print them in the webpage
		if($error){
			$_SESSION["errors_form"] = $listOfError;
			$_SESSION["data_form"] = $_POST;
			echo json_encode($listOfError);
		
		//else create a reservation 
		}else{
			//echo $_POST["result"][0][0];
		

			$serviceCommand = new ServiceCommand([
						//'email' => $_POST["email"],
						'idService' => $_POST["idService"],//$_POST["result"][0][0],
						'dateStart' => $_POST["dateStart"],
						'dateEnd' => $_POST["dateEnd"],
						'quantity'=> $_POST["quantity"],
						'serviceType'=> $_POST["serviceType"]
						]);
			

			$serviceCommandManager->addServiceCommand($serviceCommand);
		}
			

		

	}else{
		die("Erreur tentative, formulaire altérer ou erreur interne !");


	}

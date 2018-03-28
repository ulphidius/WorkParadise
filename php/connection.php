<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 'On');


	ini_set('display_errors', 1);
	
	session_start();

	require "UserManager.php";
	require "ConnectDB.php";
	require "conf.php";


	if(count($_POST) == 2
		&& !empty($_POST["email"])
		&& !empty($_POST["pwd"])){

		$error = false;

		$db = new ConnectDB($dbConnection);
		$db = $db->connectToDB();
		$userManager = new UserManager($db);
		
		if($userManager->checkPwd($_POST["email"], $_POST["pwd"]) == false){
			$error = true;
		}

		if($error == true){
			echo "false";

		}else{
			echo "true";
			$id = $userManager->loadId($_POST["email"]);
			$_SESSION["connection"] = $id;
			$_SESSION["timeout"] = time() + 900;

			//header("Location : cowdorking.php");


		}

	}else{
		die("Erreur tentative, formulaire altérer ou erreur interne !");

	}
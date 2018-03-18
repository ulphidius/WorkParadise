<?php
	
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	
	session_start();

	require "UserManager.php";
	require "ConnectDB.php";
	require "conf.php";

	if(count($_POST) == 2
		&& !empty($_POST["email"])
		&& !empty($_POST["pwd"])){

		$error = false;
		$listOfError = [];

		$db = new ConnectDB($dbConnection);
		$db = $db->connectToDB();
		$userManager = new UserManager($db);
		
		if($userManager->checkPwd($_POST["email"], $_POST["pwd"]) == false){
			$error = true;
			$listOfError[] = $listOfErrors[8];
		
		}else if($userManager->checkValidation() == false){
			$error = true;
			$listOfError[] = $listOfErrors[9];

		}

		if($error == true){
			$_SESSION["errors_form"] = $listOfError;
			$_SESSION["data_form"] = $_POST;
			echo json_encode($listOfError);

		}else{
			$id = $userManager->loadId($_POST["email"]);
			$_SESSION["connection"] = $id;
			$_SESSION["timeout"] = time() + 900;
		}

	}
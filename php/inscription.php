<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	
	session_start();
	
	require "conf.php";
	require "UserManager.php";
	require "ConnectDB.php";

	if(count($_POST) == 9
		&& !empty($_POST["lastname"])
		&& !empty($_POST["firstname"])
		&& !empty($_POST["pwd"])
		&& !empty($_POST["pwd2"])
		&& !empty($_POST["email"])
		&& !empty($_POST["legacy"])
		&& !empty($_POST["captcha"])
		&& !empty($_POST["phone"])
		&& !empty($_POST["secret"])){
		
		$error = false;
		$listOfError = [];

		$_POST["lastname"] = trim($_POST["lastname"]);
		$_POST["firstname"] = trim($_POST["firstname"]);
		$_POST["email"] = trim($_POST["email"]);

		if(strlen($_POST["lastname"]) < 2 || strlen($_POST["lastname"]) > 50){
			$error = true;
			$listOfError[] = $listOfErrors[1];
		}

		if(strlen($_POST["firstname"]) < 2 || strlen($_POST["firstname"]) > 50){
			$error = true;
			$listOfError[] = $listOfErrors[2];
		}

		if(!preg_match($phoneRegex, $_POST["phone"])){
			$error = true;
			$listOfError[] = $listOfErrors[11];
		}

		if(strlen($_POST["pwd"]) < 8 || strlen($_POST["pwd"]) > 64){
			$error = true;
			$listOfError[] = $listOfErrors[3];
		}

		if($_POST["pwd"] != $_POST["pwd2"]){
			$error = true;
			$listOfError[] = $listOfErrors[4];
		}

		if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
			$error = true;
			$listOfError[] = $listOfErrors[5];
		}
		if($_POST["captcha"] != $_SESSION["captcha"]){
			$error = true;
			$listOfError[] = $listOfErrors[6];
		}

		$user = new User([
						'email' => $_POST["email"], 
						'pwd' => $_POST["pwd"], 
						'firstname' => $_POST["firstname"], 
						'lastname' => $_POST["lastname"],
						'secret' => $_POST["secret"],
						'phoneN' => $_POST["phone"],
						'statut' => false,
						'subscription' => "",
						'id' => 0,
						'admin' => false
						]);

		$db = new ConnectDB($dbConnection);

		$db = $db->connectToDB();
		$userManager = new UserManager($db);
		if($userManager->checkEmail($user->getEmail()) != false){
			$error = true;
			$listOfError[] = $listOfErrors[7];
		}
		if($error){
			$_SESSION["errors_form"] = $listOfError;
			$_SESSION["data_form"] = $_POST;
			echo json_encode($listOfError);
		}else{
			$userManager->addUser($user);
		}

	}else{
			$listOfError[] = $listOfErrors[42];
			$_SESSION["errors_form"] = $listOfError;
			$_SESSION["data_form"] = $_POST;
			echo json_encode($listOfError);		
	}

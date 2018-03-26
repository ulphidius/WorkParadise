<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	
	session_start();

	if(!isset($_SESSION["connection"]) || !isset($_SESSION["timeout"])){
		header("Location: connectionForm.php");
	}
	else if($_SESSION["timeout"] <= time()){
		unset($_SESSION["connection"]);
		header("Location: connectionForm.php");
	}
	
	require "conf.php";
	require "UserManager.php";
	require "ConnectDB.php";

	if(isset($_POST["email"])
		&& isset($_POST["pwd"])
		&& isset($_POST["pwd2"])
		&& isset($_POST["lastname"])
		&& isset($_POST["firstname"])
		&& isset($_POST["phone"])){

		$listOfError = [];
		$error = false;

		$db = new ConnectDB($dbConnection);
		$db = $db->connectToDB();

		$usermanager = new UserManager($db);
		$user = $usermanager->getUser($_SESSION["connection"]);

		if(!empty($_POST["email"])){
			if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
				$error = true;
				$listOfError[] = $listOfErrors[5];
			}else{
				$user->setEmail($_POST["email"]);
			}
		}
		if(!empty($_POST["firstname"])){
			if(strlen($_POST["firstname"]) < 2 || strlen($_POST["firstname"]) > 50){
				$error = true;
				$listOfError[] = $listOfErrors[2];
			}else{
				$user->setFirstname($_POST["firstname"]);
			}
		}
		if(!empty($_POST["lastname"])){
			if(strlen($_POST["lastname"]) < 2 || strlen($_POST["lastname"]) > 50){
				$error = true;
				$listOfError[] = $listOfErrors[1];
			}else{
				$user->setLastname($_POST["lastname"]);
			}
		}
		if(!empty($_POST["phone"])){
			if(!preg_match($phoneRegex, $_POST["phone"])){
				$error = true;
				$listOfError[] = $listOfErrors[11];
			}else{
				$user->setPhoneN($_POST["phone"]);

			}
		}
		if(!empty($_POST["pwd"])){
			if(strlen($_POST["pwd"]) < 8 || strlen($_POST["pwd"]) > 64){
				$error = true;
				$listOfError[] = $listOfErrors[3];
			}else if($_POST["pwd"] != $_POST["pwd2"]){
				$error = true;
				$listOfError[] = $listOfErrors[4];
			}else{
				$user->setPwd($_POST["pwd"]);
			}
		}

		if($error){
			$_SESSION["errors_form"] = $listOfError;
			$_SESSION["data_form"] = $_POST;
			echo json_encode($listOfError);
		}else{
			echo $user->getSecret();
			$user->setId($_SESSION["connection"]);
			echo $user;

			$usermanager->updateUser($user);
		}

	}else{
		$listOfError[] = $listOfErrors[42];
		$_SESSION["errors_form"] = $listOfError;
		$_SESSION["data_form"] = $_POST;
		echo json_encode($listOfError);	
	}
<?php
	session_start();
	
	required "conf.php";
	required "UserManager.php";

	if(count($_POST) == 7
		&& !empty($_POST["lastname"])
		&& !empty($_POST["firstname"])
		&& !empty($_POST["pwd"])
		&& !empty($_POST["pwd2"])
		&& !empty($_POST["email"])
		&& !empty($_POST["legacy"])
		&& !empty($_POST["captcha"])){
		
		$error = false;
		$listOfError = [];

		$_POST["lastname"] = trim($_POST["lastname"]);
		$_POST["firstname"] = trim($_POST["firstname"]);
		$_POST["email"] = trim($_POST["email"]);

		if(strlen($_POST["lastname"]) < 2 || strlen($_POST["lastname"]) > 50){
			$error = true;
			listOfError[] = 1;
		}

		if(strlen($_POST["firstname"]) < 2 || strlen($_POST["firstname"]) > 50){
			$error = true;
			listOfError[] = 2;
		}

		if(strlen($_POST["pwd"]) < 8 || strlen($_pwd["pwd"]) > 64){
			$error = true;
			listOfError[] = 3;
		}

		if($_POST["pwd"] != $_POST["pwd2"]{
			$error = true;
			listOfError[] = 4;
		}

		if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
			$error = true;
			$listOfErrors[] = 5;
		}
		/*
		$user = new User([$_POST["email"], $_POST["pwd"], $_POST["firstname"], $_POST["lastname"]]);
		$db = new ConnectDB([]);
		$db->connectToDB();
		$userManager = new UserManager($db);
		if($userManager->checkEmail($user->email) == false){
			$error = true;
			listOfError[] = 7;
		}
		*/
		if($error){
			$_SESSION["errors_form"] = $listOfErrors;
			$_SESSION["data_form"] = $_POST;
			header("Location: inscriptionForm.php");
		}else{
			$userManager->
		}

	}else{
		die("Erreur tentative, formulaire altérer ou erreur interne !");
	}

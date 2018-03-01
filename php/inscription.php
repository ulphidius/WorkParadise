<?php
	session_start();

	required "conf.php";

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

		if(){
			
		}

	}else{
		die("Erreur tentative, formulaire altérer ou erreur interne !");
	}

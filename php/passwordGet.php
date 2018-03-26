<?php
	
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	
	session_start();

	require "UserManager.php";
	require "ConnectDB.php";
	require "conf.php";
	require_once "../asset/swiftmailer-master/vendor/autoload.php";
	require_once "../asset/swiftmailer-master/lib/swift_required.php";

	if(count($_POST) == 2
		&& !empty($_POST["email"])
		&& !empty($_POST["secret"])){

		$error = false;
		$listOfError = [];

		$db = new ConnectDB($dbConnection);
		$db = $db->connectToDB();
		$userManager = new UserManager($db);
		
		if($userManager->checkEmail($_POST["email"]) == false){
			$error = true;
			$listOfError[] = $listOfErrors[10];
		
		}

		if($userManager->checkSecret($_POST["email"], $_POST["secret"]) == false){
			$error = true;
			$listOfError[] = $listOfErrors[10];
		}

		if($error == true){
			$_SESSION["errors_form"] = $listOfError;
			$_SESSION["data_form"] = $_POST;
			echo json_encode($listOfError);

		}else{
			$name = $userManager->getName($_POST["email"]);
			$password = uniqid();
			try{
				$transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, "ssl"))->setUsername($MAILNAME)->setPassword($MAILPASSWORD);
				$mailer = (new Swift_Mailer($transport));

			     // Plusieurs destinataires	
			     $to  = $_POST["email"];

			     // Sujet
			     $subject = 'Mot de passe de récupération';

			     // message
			     $message = 'Voici le mot de passe de récupération
Nous vous recommandons de changer au plus vite votre mot de passe depuis 
Voici votre mot de passe : ' . $password . '
			     ';

			     // Envoi
			     $message = (new Swift_Message($subject))->setFrom(array("testworkparadise@gmail.com"))->setTo(array($to=>$name[0]." ".$name[1]))->setBody($message);
			     $result = $mailer->send($message);
			 }catch(Exception $e){
			 	var_dump($e->getMessage(), $e->getTraceAsString()); 
			 }
			 $password = password_hash($password, PASSWORD_DEFAULT);
		     $userManager->updatePwd($_POST["email"], $password);

		}

	}else{
			$listOfError[] = $listOfErrors[42];
			$_SESSION["errors_form"] = $listOfError;
			$_SESSION["data_form"] = $_POST;
			echo json_encode($listOfError);		
	}
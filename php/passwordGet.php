<?php
	
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	
	session_start();

	require "UserManager.php";
	require "ConnectDB.php";
	require "conf.php";

	if(count($_POST) == 3
		&& !empty($_POST["email"])
		&& !empty($_POST["firstname"])
		&& !empty($_POST["lastname"])){

		$error = false;
		$listOfError = [];

		$db = new ConnectDB($dbConnection);
		$db = $db->connectToDB();
		$userManager = new UserManager($db);
		
		if($userManager->checkEmail($_POST["email"]) == false){
			$error = true;
			$listOfError[] = $listOfErrors[10];
		
		}else if($userManager->checkLastname($_POST["email"], $_POST["lastname"]) == false){
			$error = true;
			$listOfError[] = $listOfErrors[10];

		}else if($userManager->checkfirstname($_POST["email"], $_POST["firstname"]) == false){
			$error = true;
			$listOfError[] = $listOfErrors[10];

		}

		if($error == true){
			$_SESSION["errors_form"] = $listOfError;
			$_SESSION["data_form"] = $_POST;
			echo json_encode($listOfError);

		}else{

			$password = uniqid();
		     // Plusieurs destinataires
		     $to  = $_POST["email"];

		     // Sujet
		     $subject = 'Mot de passe de récupération';

		     // message
		     $message = '
		     <html>
		      <head>
		       <title>Voici le mot de passe de récupération</title>
		      </head>
		      <body>
		      	<div>
		      		<p>
		      			Nous vous recommandons de changer au plus vite votre mot de passe depuis 
		      		</p>
		      		<p>
		      			Voici votre mot de passe : <b>' . $password . '</b>
		      		</p>
		      	</div>
		      </body>
		     </html>
		     ';

		     // Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
		     $headers  = 'MIME-Version: 1.0' . "\r\n";
		     $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

		     // En-têtes additionnels
		     $headers .= 'To: ' . $_POST["name"] . ' <' . $_POST["email"] . '>' . "\r\n";
		     $headers .= 'From: WorkParadise <workparadise@gmail.com>' . "\r\n";
		     // Envoi
		     mail($to, $subject, $message, $headers);

		     $userManager->updatePwd($_POST["email"], $password);
		     header("connectionForm.php");

		}

	}else{
			$listOfError[] = $listOfErrors[42];
			$_SESSION["errors_form"] = $listOfError;
			$_SESSION["data_form"] = $_POST;
			echo json_encode($listOfError);		
	}
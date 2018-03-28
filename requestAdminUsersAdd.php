<?php
session_start();  
include('utilities_functions.php');

$db = connectDb();

echo $_POST["firstname"]."</br>";
echo $_POST["lastname"]."</br>";
echo $_POST["email"]."</br>";
echo $_POST["phone"]."</br>";
echo $_POST["pwd"]."</br>";
echo $_POST["secret"]."</br>";
echo $_POST["statut"]."</br>";


	$query = $db->prepare("INSERT INTO users (firstname,lastname,email,phoneN,pwd,statut,secret,admin)
							VALUES (:firstname,:lastname,:email,:phoneN,:pwd,:statut,:secret,:admin)");

	$pwd = password_hash($_POST["pwd"], PASSWORD_DEFAULT);

	$query->execute([
			"firstname"=>$_POST["firstname"],
			"lastname"=>$_POST["lastname"],
			"email"=>$_POST["email"],
			"phoneN"=>$_POST["phone"],
			"pwd"=>$pwd,
			"statut"=>$_POST["statut"],
			"secret"=>$_POST["secret"],
			"admin"=>"0"
	]);

	
	

<?php
session_start();  
include('utilities_functions.php');

$db = connectDb();

echo $_POST["id"]."<br/>";
echo $_POST["firstname"]."</br>";
echo $_POST["lastname"]."</br>";
echo $_POST["email"]."</br>";
echo $_POST["phone"]."</br>";
echo $_POST["pwd"]."</br>";
echo $_POST["secret"]."</br>";
echo $_POST["statut"]."</br>";


	$query = $db->prepare("UPDATE users SET 
							firstname=:firstname, lastname=:lastname, email=:email, phoneN=:phoneN, pwd=:pwd, statut=:statut, secret=:secret WHERE id=:id");

	if(strlen($_POST["pwd"]) != 64){
		$pwd = password_hash($_POST["pwd"], PASSWORD_DEFAULT);
	}else{
		$pwd = $_POST["pwd"];
	}
	

	$query->execute([
			"firstname"=>$_POST["firstname"],
			"lastname"=>$_POST["lastname"],
			"email"=>$_POST["email"],
			"phoneN"=>$_POST["phone"],
			"pwd"=>$pwd,
			"statut"=>$_POST["statut"],
			"secret"=>$_POST["secret"],
			"id"=>$_POST["id"]
	]);

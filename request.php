<?php
session_start();  
include('utilities_functions.php');

$db = connectDb();



if($_POST["id"] == 0){
	$id = selectLastId($db)+1;
	$modif = false;
}else{
	$id = $_POST["id"];
	$modif = true;
}

echo $_POST["name"]."</br>";
echo $_POST["description"]."</br>";
echo $_POST["dayRate"]."</br>";
echo $_POST["hourRate"]."</br>";
echo $_POST["studentRate"]."</br>";
echo $_POST["engagementRate"]."</br>";
echo $_POST["notEngagementRate"]."</br>";
echo $_POST["engagementTime"]."</br>";


if ($modif){
	$query = $db->prepare("UPDATE subscription SET 
								name=:name, description=:description, dayRate=:dayRate, hourRate=:hourRate, studentRate=:studentRate, engagementRate=:engagementRate, notEngagementRate=:notEngagementRate, engagementTime=:engagementTime 
								WHERE id=:id");

	$query->execute([
			"name"=>$_POST["name"],
			"description"=>$_POST["description"],
			"dayRate"=>$_POST["dayRate"],
			"hourRate"=>$_POST["hourRate"],
			"studentRate"=>$_POST["studentRate"],
			"engagementRate"=>$_POST["engagementRate"],
			"notEngagementRate"=>$_POST["notEngagementRate"],
			"engagementTime"=>$_POST["engagementTime"],
			"id"=>$id
	]);
	
}else{

	$query = $db->prepare("INSERT INTO subscription 
								(id, name, description, dayRate, hourRate, studentRate, engagementRate, notEngagementRate, engagementTime) 
								VALUES 
								(:id, :name, :description, :dayRate, :hourRate, :studentRate, :engagementRate, :notEngagementRate, :engagementTime)");


	$query->execute([
			"id"=>$id,
			"name"=>$_POST["name"],
			"description"=>$_POST["description"],
			"dayRate"=>$_POST["dayRate"],
			"hourRate"=>$_POST["hourRate"],
			"studentRate"=>$_POST["studentRate"],
			"engagementRate"=>$_POST["engagementRate"],
			"notEngagementRate"=>$_POST["notEngagementRate"],
			"engagementTime"=>$_POST["engagementTime"]
	]);
}



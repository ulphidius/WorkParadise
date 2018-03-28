<?php 
 	error_reporting(E_ALL);
 	ini_set('display_errors', 1);
	session_start();
	
	require "conf.php";
	require "RoomManager.php";
	require "ConnectDB.php";

	//launch bdd + tests bdd
	$db = new ConnectDB($dbConnection);
	$db = $db->connectToDB();
	$roomManager = new RoomManager($db);

	$room = new Room([
						'type' => "type1",
						'description' => "omagad",
						'roomNumber' => 15,
						'site' => "basti"
						
						]);

	$roomManager->addRoom($room);

	echo $room;
	//echo $roomManager->addRoom($room);



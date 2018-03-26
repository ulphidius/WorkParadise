<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 1);

	session_start();

	require "UserManager.php";
	require "ConnectDB.php";
	require "conf.php";

	$db = new ConnectDB($dbConnection);
	$db = $db->connectToDB();

	$usermanager = new UserManager($db);

	$user = $usermanager->getUser($_SESSION["connection"]); 

	echo json_encode($user);

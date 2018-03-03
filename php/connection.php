<?php
	session_start();

	require "UserManager.php";
	require "ConnectDB.php";
	require "conf.php";

	if(count($_POST) == 2
		&& !empty($_POST["email"])
		&& !empty($_POST["pwd"])){

		$db = new ConnectDB($dbConnection);
		$db = $db->connectToDB();
	}else(){

	}
<?php

define("DB_USER", "root");
define("DB_PWD", "");
define("DB_NAME", "projet");
define("DB_HOST", "localhost");


function connectDb(){
	try{
			$db = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER , DB_PWD );
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}catch(Exception $e){
			//Si ca ne marche pas die
			die("Erreur SQL : ". $e->getMessage() );
		}

		return $db;
}

function selectLastId($db){


  $query = $db->prepare("SELECT MAX(id) FROM subscription");
  $query->execute();

  $last = $query->fetch(PDO::FETCH_ASSOC);

  return $last['MAX(id)'];

}
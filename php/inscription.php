<?php
	if(count($_POST) == 6
		&& !empty($_POST["lastname"])
		&& !empty($_POST["firstname"])
		&& !empty($_POST["pwd"])
		&& !empty($_POST["pwd2"])
		&& !empty($_POST["email"])
		&& !empty($_POST["legacy"])){
		
		if(strcmp(pwd, pwd2) !== 0){
			echo "Erreur les deux entrées de mot de passe ne sont pas égaux";

		}
	}
?>
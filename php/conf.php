<?php

$listOfErrors = [
					1=>"Le nom doit faire entre 2 et 50 caractères",
					2=>"Le prénom doit faire entre 2 et 50 caractères",
					3=>"Le mot de passe doit faire entre 8 et 64 caractères",
					4=>"Le mot de passe de confirmation ne correspond pas",
					5=>"L'email n'est pas valide",
					6=>"Le captcha n'est pas valide",
					7=>"L'email existe déjà",
					//idée contraintes reservations
					8=>"Le format de date n'est pas valide",
					9=>"Le format d'heure d'arrivée/départ n'est pas valide",
					10=>"Cette salle n'existe pas",
					11=>"La réponse à votre question secrète doit faire entre 2 et 50 caractères",
					12=>"La salle n'existe pas",
					13=>"La salle est deja occupée sur ce créneau horaire",
					14=>"L'heure de départ doit être supérieure à la date d'arrivée"
				];

/*$listOfErrorsReservs = [
					1=>"le numéro salle doit être compris entre 1 et 100"
					2=>"L'email n'est pas valide",
					3=>"Le captcha n'est pas valide",
					4=>"Le mot de passe et le mail ne correspondent pas"
					
				];*/


$dbConnection = ['hostname' => 'localhost',
							'dbname' => 'BDD_LOUIS',
							'charset' => 'utf8',
							'userName' => 'root',
							'pwd' => ''
							];

$listOfSites =[
					"basti"=>"Bastille",
					"ode"=>"Odeon",
					"placeI"=>"Place d'italie",
					"repu"=>"Republique",
					"tern"=>"Ternes",
					"beaub"=>"Beaubourg" 
				];



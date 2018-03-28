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
					14=>"L'heure de départ doit être supérieure à la date d'arrivée",
					15=>"Vous ne pouvez pas réserver sur une période de plus de 48 heures",
					16=>"quantité trop élevé, plus assez de stock pour gérer votre demande",
					17=>"Le site n'existe pas",
					18=>"erreur lors de l'obtention de la date",
					19=>"date invalide pour le site choisi au jour séléectionné",
					20=>"vous ne pouvez réserver que 14 jours à l'avance maximum"
				];

/*$listOfErrorsReservs = [
					1=>"le numéro salle doit être compris entre 1 et 100"
					2=>"L'email n'est pas valide",
					3=>"Le captcha n'est pas valide",
					4=>"Le mot de passe et le mail ne correspondent pas"
					
				];*/


$dbConnection = ['hostname' => 'localhost',
							'dbname' => 'BDD_LOUIS2',
							'charset' => 'utf8',
							'userName' => 'root',
							'pwd' => ''
							];

$listOfSites =[
					"bastille"=>"site de Bastille",
					"odeon"=>"site d'Odeon",
					"placeItalie"=>"site de Place d'italie",
					"republique"=>"site de Republique",
					"ternes"=>"site de Ternes",
					"beaubourg"=>"site de Beaubourg" 
				];

$listOfHardware =[
					"ordi_bureau"=>"ordinateurs",
					"projecteurs"=>"video_projecteurs",
					"laptop"=>"ordinateurs protables",
					"numeric_board"=>"tableaux_numériques"
				];

$listOfService =[
					"popcorn"=>"livraison de popcorns",
					"soda"=>"livraison de soda",
					"fastfood"=>"livraison de fastfood"
				];


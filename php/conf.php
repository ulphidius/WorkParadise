<?php

$listOfErrors = [
					1=>"Le nom doit faire entre 2 et 50 caractères",
					2=>"Le prénom doit faire entre 2 et 50 caractères",
					3=>"Le mot de passe doit faire entre 8 et 64 caractères",
					4=>"Le mot de passe de confirmation ne correspond pas",
					5=>"L'email n'est pas valide",
					6=>"Le captcha n'est pas valide",
					7=>"L'email existe déjà",
					8=>"L'email ou/et le mot de passe est/sont invalide/s",
					9=>"Votre compte n'a pas était validé par un un administrateur veillez attendre",
					10=>"L'email et/ou la réponse à la question secrète est incorrecte",
					11=>"Le numero de téléphone est incorrecte entrer le sous ce format : 0612345678",
					42=>"Vous avez tentez de valider sans avoir tout remplis ou avez envoyer un formulaire alterré"
				];

$dbConnection = ['hostname' => 'localhost',
							'dbname' => 'WORKPARADISE',
							'charset' => 'utf8',
							'userName' => 'test',
							'pwd' => 'test'
							];

$phoneRegex = '/[^0[1-9]{1}((?.)[0-9]{2}){4}]/';
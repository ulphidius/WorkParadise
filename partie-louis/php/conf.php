<?php

$listOfErrors = [
					1=>"Le nom doit faire entre 2 et 50 caractères",
					2=>"Le prénom doit faire entre 2 et 50 caractères",
					3=>"Le mot de passe doit faire entre 8 et 64 caractères",
					4=>"Le mot de passe de confirmation ne correspond pas",
					5=>"L'email n'est pas valide",
					6=>"Le captcha n'est pas valide",
					7=>"L'email existe déjà"
				];

$dbConnection = ['hostname' => 'localhost',
							'dbname' => 'WORKPARADISE',
							'charset' => 'utf8',
							'userName' => 'root',
							'pwd' => ''
							];

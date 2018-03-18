<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset = "UTF-8">
		<title>Connection</title>
		<link href="../asset/css/css/bootstrap.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="../css/inscription.css">
	  	<script src="https://code.jquery.com/jquery-3.3.1.js"></script> 
	</head>
	<body>
		<header class="page-header">

			<div class="row align-items-center">
				<div class="col-md-2">
					<img src="../ressources/logoProjet.png">
				</div>
				<div class="offset-md-1 col-md-1 text-center">
					<button class="btn btn-primary" id="header_button">test1</button>
				</div>
				
				<div class="offset-md-1 col-md-1 text-center">
					<button class="btn btn-primary" id="header_button">test2</button>
				</div>
				
				<div class="offset-md-1 col-md-1 text-center" id="header_button2">
					<button class="btn btn-primary" id="header_button">test3</button>
				</div>
				
				<div class="offset-md-1 col-md-1 text-center" id="header_button3">
					<button class="btn btn-primary" id="header_button">test4</button>
				</div>
			</div>
		</header>
			<section class="container-fluid" id="main">
				<ul id="listOfError">
				</ul>
				<form class="form-horizontal col-md-8" id="form_">
						<div class="form-group row">
							<label for="1" class="offset-md-3 col-md-2"> Email : </label>
							<div class="col-md-7">
								<input id="1" type="email" name="email" placeholder="Entrée votre email" class="form-control">
							</div>
						</div>
						<div class="form-group row">
							<label for="2" class="offset-md-3 col-md-2"> Mot de passe : </label>
							<div class="col-md-7">
								<input id="2" type="password" name="pwd" placeholder="Entrée votre mot de passe" class="form-control">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="offset-md-6 col-md-2">
							<input type="submit" value="Envoyer" class="form-control">
						</div>
						<div class="col-md-2">
							<input type="submit" value="Mot de passe oublié" class="form-control">
						</div>
					</div>
				</form>
				<script src="../js/connection.js"></script>
			</section>
			<footer class="page-footer">
					<div class="row align-items-end" id="network">
						<div class="offset-md-9 col-md-1">
						 	<a href="https://facebook.com"><img src="../ressources/facebook.png" width="100" height="100" /></a> 
						</div>
						<div class="col-md-1">
						 	<a href="https://twitter.com"><img src="../ressources/twitter.jpeg" width="100" height="100" /></a> 
						</div>
						<div class="col-md-1">
						   	<a href="https://instagram.com"><img src="../ressources/instagram.png" width="100" height="100" /></a> 
				   		</div>
				   </div>
			</footer>
		</body>
</html>

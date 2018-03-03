<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset = "UTF-8">
		<title>Inscription</title>
		<link href="../asset/css/bootstrap.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="../css/inscription.css">
	  	<script src="https://code.jquery.com/jquery-3.3.1.js"></script> 
	</head>
	<body>
		<header class="page-header">
			<img src="../ressources/logoProjet.png">
		</header>
			<section class="container-fluid" id="main">
				<ul id="listOfError">
				</ul>
				<form class="form-horizontal col-md-8" id="form_">
					<aside class="col-md-3"></aside>
					<div class="row">
						<div class="form-group">
							<label for="1" class="col-md-2"> Email : </label>
							<div class="col-md-6">
								<input id="1" type="email" name="email" placeholder="Entrée votre email" class="form-control">
							</div>
						</div>
					</div>

					<div class="row">
						<aside class="col-md-3"></aside>
						<div class="form-group">
							<label for="2" class="col-md-2"> Mot de passe : </label>
							<div class="col-md-6">
								<input id="2" type="password" name="pwd" placeholder="Entrée votre mot de passe" class="form-control">
							</div>
						</div>
					</div>
					<div class="col-md-offset-6 col-md-2">
						<input type="submit" value="Envoyer" class="form-control">
					</div>
					<div class="col-md-2">
						<input type="submit" value="Mot de passe oublié" class="form-control">
					</div>
				</form>
				<script src="../js/inscription.js"></script>
			</section>
			<footer class="page-footer">
				<button> Facebook </button>
			</footer>
		</body>
</html>

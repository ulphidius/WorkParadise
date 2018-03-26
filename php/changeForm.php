<?php
	session_start();
	
	if(!isset($_SESSION["connection"]) || !isset($_SESSION["timeout"])){
		header("Location: connectionForm.php");
	}
	else if($_SESSION["timeout"] <= time()){
		unset($_SESSION["connection"]);
		header("Location: connectionForm.php");
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Formulaire de changement de données</title>
		<link href="../asset/css/css/bootstrap.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="../css/inscription.css">
	  	<script src="https://code.jquery.com/jquery-3.3.1.js"></script> 
	</head>
	<body>
		<?php
			//require "header.php";
		?>
			<section class="container-fluid" id="main">
				<ul id="listOfError">
				</ul>
				<form class="form-horizontal col-md-8" id="form_">
						<div class="form-group row">
							<label for="1" class="offset-md-3 col-md-2"> Changement email : </label>
							<div class="col-md-7">
								<input id="1" type="email" name="email" placeholder="Entrée votre email" minlength="5" maxlength="150" class="form-control">
							</div>
						</div>
						<div class="form-group row">
							<label for="1" class="offset-md-3 col-md-2"> Changement nom : </label>
							<div class="col-md-7">
								<input id="1" type="text" name="lastname" placeholder="Entrée votre nouveau nom" class="form-control">
							</div>
						</div>
						<div class="form-group row">
							<label for="1" class="offset-md-3 col-md-2"> Changement prenom : </label>
							<div class="col-md-7">
								<input id="1" type="text" name="firstname" placeholder="Entrée votre nouveau prenom" class="form-control">
							</div>
						</div>
						<div class="form-group row">
							<label for="1" class="offset-md-3 col-md-2"> Changement Tél: </label>
							<div class="col-md-7">
								<input id="1" type="text" name="phone" placeholder="Entrée votre nouveau téléphone" class="form-control">
							</div>
						</div>
						<div class="form-group row">
							<label for="2" class="offset-md-3 col-md-2"> Mot de passe : </label>
							<div class="col-md-7">
								<input id="2" type="password" name="pwd" placeholder="Entrée votre mot de passe" minlength="8" maxlength="64" class="form-control">
							</div>
						</div>
						<div class="form-group row">
							<label for="2" class="offset-md-3 col-md-2"> Entrée de nouveau le mot de passe : </label>
							<div class="col-md-7">
								<input id="2" type="password" name="pwd2" placeholder="Entrée votre mot de passe" minlength="8" maxlength="64" class="form-control">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="offset-md-6 col-md-2">
							<input type="submit" value="Envoyer" class="form-control">
						</div>
						<div class="col-md-2">
							<a class="btn btn-primary" href="userForm.php"> Retour </a>
						</div>
				</form>
				<script src="../js/change.js"></script>
			</section>
			<?php
				//require "footer.php";
			?>
	</body>
</html>
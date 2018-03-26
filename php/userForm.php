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
		<title>Page de compte utilisateur</title>
		<link href="../asset/css/css/bootstrap.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="../css/inscription.css">
	  	<script src="https://code.jquery.com/jquery-3.3.1.js"></script> 
	</head>
	<?php
		require "header.php";
	?>
	<body>
		<section class="container-fluid" id="main">
			<form class="form-horizontal col-md-8" id="form_">
				<div class="row">
					<h2 class="offset-md-4">Bienvenu sur votre espace compte</h2>
				</div>
				<br>
				<br>
				<div class="row">
					<a href="changeForm.php" class="offset-md-3 col-md-3 btn btn-primary">Voulez-vous prendre un abonnement ?</a>
					<a href="changeForm.php" class="offset-md-1 col-md-3 btn btn-primary">Voulez-vous passer une réservation ?</a>
				</div>
				<br>
				<br>
				<div class="row">
					<label class="offset-md-5">Votre addresse mail : </label>
					<label id="email"></label>
				</div>
				<div class="row">
					<label class="offset-md-5">Votre nom : </label>
					<label id="lastname"></label>
				</div>
				<div class="row">
					<label class="offset-md-5">Votre prenom : </label>
					<label id="firstname"></label>
				</div>
				<div class="row">
					<label class="offset-md-5">Votre numéro de téléphone : </label>
					<label id="phone"></label>
				</div>
				<br>
				<br>
				<div class="row">
					<a href="changeForm.php" class="offset-md-5 btn btn-primary">Voulez-vous changer vos information ?</a>
				</div>
			</form>
			<script src="../js/user.js"></script>
		</section>
		<?php
			require "footer.php";
		?>
	</body>
</html>
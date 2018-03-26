<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset = "UTF-8">
		<title>Inscription</title>
		<link href="../asset/css/css/bootstrap.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="../css/inscription.css">
	  	<script src="https://code.jquery.com/jquery-3.3.1.js"></script> 
	</head>
	<body>
		<?php
			require "header.php";
		?>
			<section class="container-fluid" id="main">
				<ul id="listOfError">
				</ul>
				<form class="form-horizontal col-md-8" id="form_">
						<div class="form-group row">
							<label for="1" class="offset-md-3 col-md-2"> Nom : </label>
							<div class="col-md-7">
								<input id="1" type="text" name="lastname" placeholder="Entrée votre nom" minlength="2" maxlength="50" class="form-control">
							</div>
						</div>

						<div class="form-group row">
							<label for="2" class="offset-md-3 col-md-2 col-form-label"> Prénom : </label>
							<div class="col-md-7">
								<input id="2" type="text" name="firstname" placeholder="Entrée votre prénom" minlength="2" maxlength="50" class="form-control">
							</div>
						</div>
						<div class="form-group row">
							<label for="3" class="offset-md-3 col-md-2 col-form-label"> Numéro de téléphone </label>
							<div class="col-md-7">
								<input id="3" type="text" name="phone" placeholder="votre numéros de téléphone" minlength="10" class="form-control">
							</div>
						</div>
						<div class="form-group row">
							<label for="3" class="offset-md-3 col-md-2 col-form-label"> Email : </label>
							<div class="col-md-7">
								<input id="3" type="email" name="email" placeholder="Entrée votre email" minlength="5" maxlength="150" class="form-control">
							</div>
						</div>						
						<div class="form-group row">
							<label for="4" class="offset-md-3 col-md-2 col-form-label"> Mot de passe : </label>
							<div class="col-md-7">
								<input id="4" type="password" name="pwd" placeholder="Entrée votre mot de passe" minlength="8" maxlength="64" class="form-control">
							</div>
						</div>
						<div class="form-group row">
							<label for="5" class="offset-md-3 col-md-2 col-form-label"> Entrée de nouveau votre mot de passe : </label>
							<div class="col-md-7">
								<input id="5" type="password" name="pwd2" class="form-control">
							</div>
						</div>
						<div class="form-group row">
							<select for="4" class="offset-md-3 col-md-2 col-form-label">
								<option>Le nom de jeune fille de votre mère</option>
								<option>Le nom  de votre ville de naissance</option>
								<option>Le nom de votre animal de companie</option>
								<option>Autre</option> 
							</select>
							<div class="col-md-7">
								<input id="4" type="text" name="secret" placeholder="Entrée votre réponse à la question secrete" class="form-control">
							</div>
						</div>
						<div class="form-group row">
							<label for="6" class="offset-md-3 col-md-2 col-form-label"> J'accepte les CGUs</label>
							<div>
								<input id="6" type="checkbox" name="legacy" class="form-control">
							</div>
						</div>
						<div class="form-group row">
							<img class="offset-md-3 col-md-2" src="captcha.php">
							<div class="col-md-7">
								<input id="7" type="text" name="captcha" placeholder="Saisissez les caractères" class="form-control">
							</div>
						</div>
					<div class="offset-md-7 col-md-2">
						<input type="submit" value="Envoyer" class="form-control">
					</div>
				</form>
				<script src="../js/inscription.js"></script>
			</section>
			<?php
				require "footer.php";
			?>
		</body>
</html>

<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset = "UTF-8">
		<title>Recupération de mot de passe</title>
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
							<label for="1" class="offset-md-3 col-md-2"> Email : </label>
							<div class="col-md-7">
								<input id="1" type="email" name="email" placeholder="Entrée votre email" class="form-control">
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
								<input id="2" type="text" name="secret" placeholder="Entrez votre réponse" class="form-control">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="offset-md-6 col-md-2">
							<input type="submit" value="Envoyer" class="form-control">
						</div>
					</div>
				</form>
				<script src="../js/passwordGet.js"></script>
			</section>
			
		</body>
</html>

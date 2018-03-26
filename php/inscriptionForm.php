<?php
	session_start();
	include "../html/index.html";
?>

	<body>

		

	<div class="container-fluid" id="main">
		<div class="row" style="margin-top: 30px;">
	

			<div class="col-lg-6">
					<div class="row">
						<div class="col-lg-2"></div>
						<div class="col-lg-8">
						
						<h2>Ou inscrivez vous !</h2>

						<ul id="listOfError">
						</ul>
						
						<form class="form" id="form_">
							
							
								<div class="form-group">
									<label for="1"> Nom : </label>
									
										<input id="1" type="text" name="lastname" placeholder="Entrée votre nom" class="form-control">
									
								</div>
							

							
								
								<div class="form-group">
									<label for="2"> Prénom : </label>
									<div>
										<input id="2" type="text" name="firstname" placeholder="Entrée votre prénom" class="form-control">
									</div>
								</div>
							
							
							
								
								<div class="form-group">
									<label for="3"> Email : </label>
									<div>
										<input id="3" type="email" name="email" placeholder="Entrée votre email" class="form-control">
									</div>
								</div>
							
								<!--<div class="form-group">
									<label for="4"> Numéro de téléphone : </label>
									<div>
										<input id="4" type="text" class=" form-control input-medium bfh-phone" data-country="US">
									</div>
								</div>
								-->
								<div class="form-group">
									<label for="4"> Question secrète : </label>
									<div>
										<input id="4" type="text" placeholder="Quel est le nom de votre professeur favori ?" name="secret" class=" form-control">
									</div>
								</div>
							

							
								
								<div class="form-group">
									<label for="5"> Mot de passe : </label>
									<div>
										<input id="5" type="password" name="pwd" placeholder="Entrée votre mot de passe" class="form-control">
									</div>
								</div>
							
							
								<div class="form-group">
									<label for="6"> Entrée de nouveau votre mot de passe : </label>
									<div>
										<input id="6" type="password" name="pwd2" class="form-control">
									</div>
								</div>
							
							
								<div class="form-group">
									<label for="7"> J'accepte les CGUs</label>
									<div>
										<input id="7" type="checkbox" name="legacy" class="form-control">
									</div>
								</div>
							
							
								<div class="form-group">
									<img src="captcha.php">

									<div>
										<input id="8" type="text" name="captcha" placeholder="Saisissez les caractères" class="form-control">
									</div>
								</div>
							

							
							
							<div>
								<input type="submit" value="Envoyer" class="form-control">
							</div>
						</form>
						<!--<script src="../js/inscription.js"></script>-->
					</div>
					<div class="col-lg-2"></div>
				</div>
			</div>

				

			</div>

		




	</div>

</body>

<script src="../js/inscription.js"></script>

<br> <br>

<?php
	include "footer.php";
?>
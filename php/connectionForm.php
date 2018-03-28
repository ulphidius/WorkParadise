<?php
	session_start();
	//header("Location : coworking.php");
	include "indHead.php"


		
	
?>

<body>

		

	<div class="container-fluid" id="main">
		<div class="row" style="margin-top: 30px;">

				
				

			<div class="col-lg-6">
					<div class="row">
						<div class="col-lg-2"></div>
						<div class="col-lg-8">
						<!--<div class="col-lg-1"></div>-->
							<h3>Connectez vous !</h3>

							<ul id="listOfError"></ul>

							<form class="form" id="form_">
												
								<!--<div class="row">-->
									<div>
										<div class="form-group">
											<label for="1"> Email : </label>
												<div>
													<input id="1" type="email" name="email" placeholder="Entrée votre email" class="form-control">
												</div>
										</div>
									</div>
								
							

								<!--<div class="row">-->
									<div>
												
										<div class="form-group">
											<label for="2"> Mot de passe : </label>
											<div>
												<input id="2" type="password" name="pwd" placeholder="Entrée votre mot de passe" class="form-control">
											</div>
										</div>
									</div>
								<!--</div>-->
												
								<div class="row">
									<div class="col-lg-1"></div>
									<div class="col-lg-5">
										<input type="submit" value="Envoyer" class="form-control btn-primary">
									</div>
									<div class="col-lg-5">
										<input type="submit" value="Mot de passe oublié" class="form-control btn-secondary">
									</div>
									<div class="col-lg-1"></div>
								</div>
											
							</form>
						</div>

	<div class="col-lg-1"></div>
		<!--<div class="col-lg-1"></div>-->

					</div>

				</div>

				

				<div class="col-lg-6">
					<div class="row">
						<div class="col-lg-2"></div>
						<div class="col-lg-8">
						
						<h2>Ou inscrivez vous !</h2>

						<button class="col-md-6 form-control btn-danger" onclick="window.location.href='inscriptionForm.php'">INSCRIPTION</button>

						<!--<div class="button_header">
				             <a class="nav-link" href="../php/inscriptionForm.php"><i>Connexion</i><span class="sr-only navBlocks">(current)</span></a>
				       	</div>-->
						<!--
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
							

							
								
								<div class="form-group">
									<label for="4"> Mot de passe : </label>
									<div>
										<input id="4" type="password" name="pwd" placeholder="Entrée votre mot de passe" class="form-control">
									</div>
								</div>
							
							
								<div class="form-group">
									<label for="5"> Entrée de nouveau votre mot de passe : </label>
									<div>
										<input id="5" type="password" name="pwd2" class="form-control">
									</div>
								</div>
							
							
								<div class="form-group">
									<label for="6"> J'accepte les CGUs</label>
									<div>
										<input id="6" type="checkbox" name="legacy" class="form-control">
									</div>
								</div>
							
							
								<div class="form-group">
									<img src="captcha.php">

									<div>
										<input id="7" type="text" name="captcha" placeholder="Saisissez les caractères" class="form-control">
									</div>
								</div>
							
							<div>
								<input type="submit" value="Envoyer" class="form-control">
							</div>
						</form>-->
						<!--<script src="../js/inscription.js"></script>-->
						<br> <br> <br>
					</div>
					<div class="col-lg-2"></div>
				</div>
			</div>



				

			</div>

		




	</div>

</body>
<script src="../js/connection.js"></script>
<!--<script src="../js/inscription.js"></script>-->

<br> <br>

<?php
	include "footer.php";
?>

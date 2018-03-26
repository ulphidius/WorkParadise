<?php
/*
*Mettre une regex pour obtenir un bon numéro de téléphone / ou gérer dans le conf.inc futur

*/
//include '../html/head.html';
include "../html/index.html";
?>

<body>
		<!--<div class="container col-lg-12">-->
		<div class="container-fluid" id="main">
			<br> 
			<div class="row">
				<div class="col-lg-5">
			 		
				</div>

				<div class="col-lg-5">
					<h2 id="presentDiapo">CONTACTS</h2>
				</div>

			</div>

			<div class="row">
				
			</div>

			<div class="row">
				
			</div>

			<div class="row">
				<div class="col-lg-2">
					
				</div>

				<div class="col-lg-8">
					
					<br> <br> <br>
					<p style="font-family: Ma Super Font; font-size: 25px;">Si vous avez la moindre question, nous serions ravis de vous répondre ! Connectez vous et laissez un message dans le formulaire dédié à cet effet.</p>
					<!--<h3>Contactez nous !</h3>-->
				
			
					<form>
						<div class="form-row">
						   
						   <!--<div class="form-group col-md-6">
						    <label for="inputNickName">Votre prénom</label>
						    <input type="text" class="form-control" id="inputNickName" placeholder="Jean">
						  </div>
						

						  <div class="form-group col-md-6">
						    <label for="inputName">Votre nom</label>
						    <input type="text" class="form-control" id="inputName" placeholder="Dupont">
						  </div>

						</div>

					  <div class="form-row">
					    <div class="form-group col-md-6">
					      <label for="inputEmail4">Email</label>
					      <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
					    </div>
					    <div class="form-group col-md-6">
					      <label for="inputTelephone">Téléphone</label>
					      <input type="text" class="form-control" id="inputTelephone" placeholder="0604879642">
					    </div>
					  </div>-->


					  <div class="form-group col-md-12">
					    <label for="exampleFormControlTextarea1">Message:</label>
					    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
					  </div>
					  
					  <button type="submit" class="btn btn-primary col-md-12">envoyer</button>
					  	</div>
					</form>

					<br> <br>
					<h2 style="font-family: Ma Super Font">Vous pouvez aussi directement nous contacter par mail</h2>
					<br>
					<button><a href="mailto:?to=workandsharecontact@gmail.com &subject=questions%20pour%20workAndShare" style="font-family: Ma Super Font";>Envoyez nous un mail !</a></button>

					<br> <br>

					
					
					<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1372.992239094133!2d6.6251511768868685!3d46.508417623524196!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x478c2fd00e4c4163%3A0x4971c3c4716c1c45!2sWork&#39;n&#39;Share!5e0!3m2!1sfr!2sfr!4v1520113797543" width="1240" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
					

					<br> <br> <br>



				</div>

			</div>
						
		
		</div>
	</div>

</body>






<?php 
include 'footer.php'
?>
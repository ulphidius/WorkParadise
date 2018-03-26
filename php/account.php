<?php
	session_start();
	require "conf.php"; //mon fichier de config
	include "../html/index.html"; // mon header

?>

	<body>

		

	<div class="container-fluid" id="main">
		<div class="row" style="margin-top: 30px;">
	

			<div class="col-lg-6">
					<div class="row">
						<div class="col-lg-2"></div>
						<div class="col-lg-8">
						
						<h2>Réservez pour être sur d'avoir une place !</h2>


						<ul id="listOfError">
						</ul>
						
						<form class="form" id="form_">
							
							
								<!--<div class="form-group">
									<label for="1"> Nom : </label>
									
										<input id="1" type="text" name="lastname" placeholder="Entrée votre nom" class="form-control">
									
								</div>
							

							
								
								<div class="form-group">
									<label for="2"> Prénom : </label>
									<div>
										<input id="2" type="text" name="firstname" placeholder="Entrée votre prénom" class="form-control">
									</div>
								</div>-->

								<div class="form-group">
									<label for="1"> Choissisez le site : </label>
									<select id="1" name="site">

									<?php
										$siteDefault = (isset($dataForm["site"]))?$dataForm["site"]:"basti";

										foreach ($listOfSites as $key => $site) {
										echo '<option value="'.$key.'"';
										echo ($siteDefault == $key)?'selected="selected"':'';
										echo' >'.$site.'</option>';
										}
									?>
									
										</select><br>
								</div>
							
								<div class="form-group">
									
									<label for="2">La salle que vous souhaitez reserver : </label>
									<input id="2" type="number" name="roomNumber"> <br>
									

								</div>

								
							
								
								<!--<div class="form-group">
									<label for="3"> Email : </label>
									<div>
										<input id="3" type="email" name="email" placeholder="Entrée votre email" class="form-control">
									</div>
								</div>-->
								<div id="dates">
									<?php 
									//obtient une date au format valide
									$date = date("Y-m-d");
									//$time = time("H:i:s");
									
									$time = $date . 'T' . (date("H")+1) .date(":i");
									//echo (time("H:i:s"));
									//echo($time);

									?>

									<div class="form-group">
										<label for="3"> Choissisez la date de votre arrivée  : </label>
										<input id="3" type="datetime-local" name="dateStart" placeholder="la date que vous souhaitez" min= <?php echo($time) ?>  required="required">

									</div>


									<?php $time2 = $date . 'T' . (date("H")+2) .date(":i"); ?>

									<div class="form-group">
										<label for="4"> Choissisez la date où vous quittez l'établissement : </label>
										<input id="4" type="datetime-local" name="dateEnd" placeholder="la date que vous souhaitez" min=<?php echo($time2) ?> required="required">

									</div>
								</div>

							<div> <!-- fin div des dates -->
								<input type="submit" value="Envoyer" class="form-control">
							</div>
						</form>

						<!--<script>
							//reset des heures du form toutes les 50 sec
							$(document).ready(function() { /// Wait till page is loaded

								setInterval(timingLoad, 60000);
								function timingLoad() {
								

								$('#dates').load('account.php #dates', function() {
									
							/// can add another function here
									});
								}
							}); //// End of Wait till page is loaded
						</script>-->

						<!--<script> function refresh() {
							$.ajax({
							    url: "account.php", // Ton fichier ou se trouve ton chat
							    success:
							        function(retour){
							        	$('main').html(retour); // rafraichi toute ta DIV "bien sur il lui faut un id "

							    	}
							});
							 
							}
							 
							setInterval(refresh(), 5000) // Répète la fonction toutes les 10 sec
						</script>-->
						<!--<script src="../js/inscription.js"></script>-->
					</div>
					<div class="col-lg-2"></div>
				</div>
			</div>

			<div class="col-lg-6">
				<h2>Vos réservations actuelles :</h2>
		
		<?php	
		if(!empty($_SESSION["connection"])){ 
			echo("bonsoir, c'est cool"); ?>
		<?php }else{ 
			echo("c'est pas fou mec"); ?>
			<script type="text/javascript">window.location.replace("accueil.php");</script>
			<?php 
			} 
			?>
		

	
				<!-- reservations correspondant à l'id -->
				
			</div>

				

			</div>

		




	</div>

</body>

<script src="../js/reservation.js"></script>

<br> <br>

<?php
	include "footer.php";
?>
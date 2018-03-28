<?php
	session_start();
	require "conf.php"; //my config file
	include "indHead.php"

?>

	<body>

		

	<div class="container-fluid" id="main">
		<div class="row" style="margin-top: 30px;">
	

			<div class="col-lg-6"> <!-- classic reservation-->
					<div class="row">
						<div class="col-lg-2"></div>
						<div class="col-lg-8">
						
						<h2>Réservez du matériel</h2>


						<ul id="listOfError"> <!-- if there are errors they will be print here-->
						</ul>
						
						<form class="form" id="form_"> <!-- form with site, room, dateStart, dateEnd -->
							
							
								<!-- we select the site -->
								<div class="form-group">
									<label for="1"> Choissisez le site : </label>
									<select id="1" name="serviceType" class="form-control">
									<!--we get  sites in conf.php  -->
									<?php
										$serviceDefault = (isset($dataForm["serviceType"]))?$dataForm["serviceType"]:"popcorn";

										foreach ($listOfService as $key => $service) {
										echo '<option value="'.$key.'"';
										echo ($serviceDefault == $key)?'selected="selected"':'';
										echo' >'.$service.'</option>';
										}
									?>
									
										</select><br>
								</div>
							
								<!-- indicate the room -->
								<div class="form-group">
									
									<label for="2">La quantité que vous souhaitez reserver : </label>
									<input id="2" type="number" name="quantity" class="form-control"> <br>
									

								</div>

								
							
								
								<!-- div with all dates -->
								<div id="dates">
									<?php 
									//create a valid date for inputs
									$date = date("Y-m-d");

									$dateI = date("H")+1;
									if(intval($dateI) < 10){
										$dateI = "0".$dateI;
									}
									
									$time = $date . 'T' . $dateI .date(":i");
									

									?>
									<!-- date need to be > current date -->
									<div class="form-group">
										<label for="3"> Choissisez la date de votre arrivée  : </label>
										<input id="3" type="datetime-local" class="form-control" name="dateStart" placeholder="la date que vous souhaitez" min=<?php echo($time) ?>  required="required">

									</div>


									<!-- create a 2 time with +1 hour to reserve at least an hour -->
									<?php 
									$dateI = date("H")+2;
									if(intval($dateI) < 10){
										$dateI = "0".$dateI;
									}
									$time2 = $date . 'T' . $dateI .date(":i"); ?>

									<!-- final hour -->
									<div class="form-group">
										<label for="4"> Choissisez la date où vous quittez l'établissement : </label>
										<input id="4" type="datetime-local" name="dateEnd" class="form-control" placeholder="la date que vous souhaitez" min=<?php echo($time2) ?> required="required">

									</div>
								</div>

							<div> <!-- end div dates -->
								<input type="submit" value="Envoyer" class="form-control">
							</div>
						</form>

						<!--<script>
							//reset hours of form every  50 sec
							$(document).ready(function() { /// Wait till page is loaded

								setInterval(timingLoad, 60000);
								function timingLoad() {
								

								$('#dates').load('account.php #dates', function() {
									
							/// can add another function here
									});
								}
							}); //// End of Wait till page is loaded
						</script>-->

						
					</div>
					<div class="col-lg-2"></div>
				</div>
			</div>
		

	
				
				
			</div>

				

			<!--</div>-->

		




	</div>

</body>
<!-- we active reservation.js when le form is submit -->
<script src="../js/serviceCommand.js"></script>

<br> <br>

<?php
	include "footer.php";
?>
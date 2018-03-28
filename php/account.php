<?php
	session_start();
	require "conf.php"; //my config file
	include "indHead.php"; // my header

?>

	<body>

		

	<div class="container-fluid" id="main">
		<div class="row" style="margin-top: 30px;">
	

			<div class="col-lg-6"> <!-- classic reservation-->
					<div class="row">
						<div class="col-lg-2"></div>
						<div class="col-lg-8">
						
						<h2>Réservez pour être sur d'avoir une place !</h2>


						<ul id="listOfError"> <!-- if there are errors they will be print here-->
						</ul>
						
						<form class="form" id="form_"> <!-- form with site, room, dateStart, dateEnd -->
							
							
								<!-- we select the site -->
								<div class="form-group">
									<label for="1"> Choissisez le site : </label>
									<select id="1" name="site" class="form-control">
									<!--we get  sites in conf.php  -->
									<?php
										$siteDefault = (isset($dataForm["site"]))?$dataForm["site"]:"bastille";

										foreach ($listOfSites as $key => $site) {
										echo '<option value="'.$key.'"';
										echo ($siteDefault == $key)?'selected="selected"':'';
										echo' >'.$site.'</option>';
										}
									?>
									
										</select><br>
								</div>
							
								<!-- indicate the room -->
								<div class="form-group">
									
									<label for="2">La salle que vous souhaitez reserver : </label>
									<input id="2" type="number" name="roomNumber" class="form-control"> <br>
									

								</div>

								
							
								
								<!-- div with all dates -->
								<div id="dates">
									<?php 

									//create a valid date for inputs
									$date = date("Y-m-d"); 


									/*list($y,$m,$d)= explode("-",$date);
									$date = mktime(0,0,0,$m,$d+14,$y);
									$date=gmdate("Y-m-d", $date);
									echo $date;*/

									/*$dateI = date("H")+1;
									if(intval($dateI) < 10){
										$dateI = "0".$dateI;
									}
									
									$time = $date . 'T' . $dateI .date(":i");
									*/

									?>
								

									<!-- date need to be > current date -->
									<div class="form-group">
										<label for="3"> Choissisez la date de votre arrivée  : </label>
										<input id="3" type="date" class="form-control" name="dateR" placeholder="la date que vous souhaitez" min=<?php echo($date) ?>  required="required">

									</div>


									<!-- create a 2 time with +1 hour to reserve at least an hour -->
									<?php 
									$dateI = date("H")+1;
									/*if(intval($dateI) < 10){
										$dateI = "0".$dateI;
									}*/
									$time = ($dateI). (date(":i"));
									$time2 = ($dateI+1). (date(":i"));
									 ?>

									<!-- final hour -->
									<div class="form-group">
										<label for="4"> Choissisez l'heure où vous entrez dans l'établissement : </label>
										<input id="4" type="time" name="dateStart" class="form-control" placeholder="la date que vous souhaitez" required="required">

									</div>

									<div class="form-group">
										<label for="5"> Choissisez la date où vous quittez l'établissement : </label>
										<input id="5" type="time" name="dateEnd" class="form-control" placeholder="la date que vous souhaitez" required="required">

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

			<div class="col-lg-6">
				<h2>Vos réservations actuelles :</h2>
				<!-- Reservations of user, need to try it with object format -->
		
		<?php	
		if(!empty($_SESSION["connection"])){ 
			// if user is connected
			echo("Vous êtes connecté"); 
			require "conf.php";
			require "ReservationManager.php";
			require "ConnectDB.php";

		//go test with db
			$db = new ConnectDB($dbConnection);

			$db = $db->connectToDB();
			$reservationManager = new ReservationManager($db);

			$connect = $reservationManager->_db->prepare('SELECT * FROM reservationroom WHERE idUser = :id');

			$str3 = implode(" ",$_SESSION["connection"]);

			$str4 = explode(" ", $str3);

			$connect->execute([":id"=>intval($str4[0])]);

			while($c = $connect->fetch()) { ?>
		    <li> <u>id</u>: <?= $c['id'] ?> : <u>idUser</u> : <?= $c['idUser'] ?> : <u>idRoom</u> : <?= $c['idRoom'] ?> : <u>dateStart</u> : <?= $c['dateStart'] ?> : <u>dateEnd</u> : <?= $c['dateEnd'] ?> <br><br>
	         
	               </li>
	                <?php } ?>
				
			<!--<script src="../js/user_reservation.js"></script>-->

		
			<h2>Les horaires des différents sites :</h2>
			<?php
				$connect = $reservationManager->_db->prepare('SELECT * FROM 
					site');
				$connect->execute();

		?> <table class="table table-hover">
		  <thead>
		    	<tr>
		    	  <th scope="col">nom</th>
		    	  <th scope="col">heure ouverture semaine</th>
		    	  <th scope="col">heure fermeture semaine</th>
		    	  <th scope="col">heure ouverture vendredi</th>
		    	  <th scope="col">heure fermeture vendredi</th>
		    	  <th scope="col">heure ouverture weekend</th>
		    	  <th scope="col">heure fermeture weekend</th>
		    	</tr>
  			</thead> 

  			<tbody>

  			<?php 

					while($c = $connect->fetch()) { ?>
		    <tr>  <td><i><?= $c['name'] ?></td> <td><?= $c['openHourWeek'] ?></td> <td><?= $c['endHourWeek'] ?></td> <td><?= $c['openHourFriday'] ?></td> <td><?= $c['endHourFriday'] ?></td> <td><?= $c['openHourWeekend'] ?></td> <td><?= $c['endHourWeekend'] ?></td>
	         
	               </tr>
	               <?php } ?>
	           		</tbody>
	               </table>


		<?php }else{ 
			//else go back to homepage
			echo("Accès interdit"); ?>
			<script type="text/javascript">window.location.replace("accueil.php");</script>
			<?php 
			} 
			?>
		


	
				
				
			</div>

				

			</div>

		




	</div>

</body>
<!-- we active reservation.js when le form is submit -->
<script src="../js/reservation.js"></script>

<br> <br>

<?php
	include "footer.php";
?>
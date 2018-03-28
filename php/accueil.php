<?php
  session_start();
  include "indHead.php"; //header
?>


	
		<div class="container col-lg-10" id="main"> <!-- content of the page -->
			<div class="row">

				
				<div class="col-lg-2"></div>

				<div class="col-lg-8">

					<center><h1>Vous avez dit WORK AND SHARE ?</h1></center>

					<p id="intro">
					Work’n’Share c’est votre espace de coworking au coeur de la Suisse Romande à Lausanne Ouchy. Cet espace est dédié aux entrepreneurs, start ups, indépendants, salariés de tout horizon qui veulent travailler et recevoir leurs clients dans un cadre dynamique, convivial et professionnel.
					</p>

				</div>

				
				<div class="col-lg-2">
					
				</div>

			</div>


			<div class="row">

				<div class="col-lg-2"></div> 
				<div class="col-lg-8">

					<!-- advandages of work and share -->
					
					
					<br>
					<p>_________________________________________________________________________________</p>
					<div class="row"> <!-- a row for each part -->
						<div class="col-lg-4 col-sm-4 col-xs-3">
							<img src="../img/community.png" width="50%">
						</div>
						<div class="col-lg-8 col-sm-8">
							<p style="font-family: Ma Super Font">Work And Share c'est avant tout une communauté soudée toujours prête à vous aider ! De nombreux évènements sont organisés pour faire plus ample connaissance avec vos voisins coworkeurs !</p>
						</div>
					</div>



					
					<br><br>
					<p>_________________________________________________________________________________</p>
					<div class="row">
						<div class="col-lg-4 col-sm-4 col-xs-3">
							<img src="../img/refuge_icon.png" width="50%">
						</div>
						<div class="col-lg-8 col-sm-8">
							<p style="font-family: Ma Super Font">Marre de travailler dans des endroits inconfortables au possible ? Work And Share est fait pour vous ! Vous pouvez paisiblement vous installer pour travailler, commander une boisson chaude ou un petit snack, c'est un vrai refuge pour tous les coworkeurs !</p>
						</div>
					</div>
					
					<br><br>
					<p>_________________________________________________________________________________</p>
					<div class="row">
						<div class="col-lg-4 col-sm-4 col-xs-3">
							<img src="../img/equipment.png" width="50%">
						</div>
						<div class="col-lg-8 col-sm-8">
							<p style="font-family: Ma Super Font">Vous voulez travailler mais vous n'avez pas le matériel adéquat sur vous ? Ne vous inquiétez pas, Work And Share met à votre disposition tout le matériel nécessaire pour travailler confortablement ou encore organiser une réunion professionnelle.</p>
						</div>
					</div>
					


					<br> <br> <br>
					<!-- Diapo image scroller -->

					<center><h2 id="presentDiapo">Voici quelques images de nos différents sites !</h2></center>

					<div id="contain">
						<img class="slides" src="../img/imgDiapo/siteBastille.jpg" >
						<img class="slides" src="../img/imgDiapo/siteBeaubourg.jpg" >
						<img class="slides" src="../img/imgDiapo/siteOdeon.jpg" >
						<img class="slides" src="../img/imgDiapo/sitePlaceItalie.jpeg" >
						<img class="slides" src="../img/imgDiapo/siteRepublique.jpg"  >
						<img class="slides" src="../img/imgDiapo/siteTernes.jpg" >
						<button class="bttn" onclick="plusIndex(-1)" id="bttn1">&#10094;</button>
						<button class="bttn" onclick="plusIndex(1)"  id="bttn2">&#10095;</button>

					</div>
					<br> <br> <br>
					<h2 class="presentDiapo">Ici icones des principaux services / matériels qu'on peut commander</h2>


				</div>
				<div class="col-lg-2"></div> 

			
			</div>
			
			<div class="row">

				
				<div class="col-lg-6"> <!-- snacks part -->
					<br>
					<img src="../img/snacks.png" width="15%" style="margin-left: 25%;">
					<img src="../img/donut.png" width="15%" style="margin-left: 25%;">
					<br><br>
					<p>N'hésitez pas à commander divers snacks et boissons ! Nous avons un tarif préférentiel pour nos abonnés !</p>
					
				</div>

				<div class="col-lg-6"> <!-- hardware part -->
					<br>
					<img src="../img/hardware1.png" width="15%" style="margin-left: 25%;">
					<img src="../img/micro.jpg" width="15%" style="margin-left: 25%;">
					<br> <br> 
					<p>Nous avons également beaucoup de matériel informatique, des vidéo-projecteurs, des enceintes stéréos, ... et bien d'autres outils pour rendre votre expérience work'n share encore plus intense !</p>

					
					

				</div>

				<br>

			
				</div>	
				<!--<h2>google map</h2>-->
			<div class="row">

				
				<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1372.992239094133!2d6.6251511768868685!3d46.508417623524196!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x478c2fd00e4c4163%3A0x4971c3c4716c1c45!2sWork&#39;n&#39;Share!5e0!3m2!1sfr!2sfr!4v1520113797543" width="1640" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>

			</div>

		
		</div> <!-- end of container-->
	

	</body>
	

	<script type="text/javascript"> /* script for image slider */
		var index = 1;

		function plusIndex(n){
			index = index + n;
			showImage(index);
		}

		showImage(1);

		function showImage(n){
			var i;
			var x = document.getElementsByClassName("slides");
			if(n > x.length){
				index = 1;
			}

			if(n < 1){
				index = x.length;
			}

			for(i=0; i<x.length; i++){
				x[i].style.display = "none";
				//alert(x.length);
			}

			x[index-1].style.display = "block";
		}
		autoSlide();

		function autoSlide(){
			var i;
			var x = document.getElementsByClassName("slides");
			for(i=0; i<x.length; i++){
				x[i].style.display = "none";
				//alert(x.length);
			}
			if(index > x.length){
				index = 1;
			}
			x[index-1].style.display = "block";
			index++;
			setTimeout(autoSlide, 9000); // change image every 9 sec
		}
	</script>
<?php
	include "footer.php"
?>


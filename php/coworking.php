<?php
  session_start();
  include "../html/index.html";
  //include "../html/head.html";
?>

	<body>
		<!--<div class="container">-->
		<div class="container-fluid" id="main">

			<div class="row" style="margin-top: 30px;margin-bottom: 30px;">

				<div class="col-lg-1">
					
				</div>

				<div class="col-lg-5">


					<br>
					
					<h4>A chacun sa définition du coworking</h4>
					<p>
					Pour aller au plus simple, nous pourrions dire que le coworking est un espace de travail pour des professionnels de différents horizons.

					A Work’n’Share nous approuvons, mais nous savons aussi que le coworking c’est bien plus qu’un espace de travail, c’est une expérience. Comme nous aimons dire, vous venez pour une place de travail, vous restez pour l’atmosphère.
					</p>


					<h4>Un cadre de travail idéal</h4>
					<p>
						Au début, les gens recherchent souvent un bureau car ils en ont marre de travailler depuis chez eux, parce qu’ils ont besoin d’accueillir leurs clients dans un environnement professionnel ou bien parce qu’ils ont besoin de certains services tels que salle de conférences ou imprimantes… Dans cette situation, on se retrouve souvent face à deux options : un magnifique bureau lumineux qui nous coûte un bras ou bien un placard en sous-sol qui arrive à entrer dans le budget. A Work’n’Share beaucoup sont passés par là et nous savons que le coworking regroupe le meilleur des deux : un bel espace de travail à un prix abordable.
					</p>

					<h4>Travailler au coeur d’un réseau</h4>
					
					<p>
						Certes avoir un beau bureau c’est bien, mais un beau bureau entouré de personnes innovantes et créatives c’est encore mieux. Pourquoi pensons-nous ça ? Parce que les coworkers rendent l’espace vivant, dynamique, et riche en nouvelles idées. Un espace de coworking est le meilleur endroit pour commencer à faire du networking et partager des projets. Votre créativité y est constamment stimulée. Il est aussi intéressant de noter que même si les personnes travaillent dans des domaines différents, chacun passe par des expériences professionnelles similaires et peut s’apporter un soutien.
					</p>
					
					<h4>Partager des moments</h4>
					<p>
						Chacun devient plus qu’un simple coworker. Des évènements spontanés sont souvent organisés. Cela peut aller de boire un verre en fin de journée à organiser des conférences, workshops, ou même des activités en plein air.

						Au final, il y a toujours une bonne excuse pour se retrouver et c’est là que la magie du coworking opère !

					</p> 

				</div>

				<div class="col-lg-6">

					<div id="contain">
						<img class="slides" src="../img/imgDiapo2/cowork.jpg" >
						<img class="slides" src="../img/imgDiapo2/workplace.jpg" >
						<img class="slides" src="../img/imgDiapo2/people_network.jpg" >
						<img class="slides" src="../img/imgDiapo2/funAtWork1.jpg" >
						
						<button class="bttn" onclick="plusIndex(-1)" id="bttn1">&#10094;</button>
						<button class="bttn" onclick="plusIndex(1)"  id="bttn2">&#10095;</button>

					</div>

				</div>
			
			</div>
		
		</div>

	</body>
	<script type="text/javascript"> /* script pour le slider d'images */
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
			setTimeout(autoSlide, 9000); // toutes les 9 secondes on change d'image
		}
	</script>

<?php
	include "footer.php"
?>
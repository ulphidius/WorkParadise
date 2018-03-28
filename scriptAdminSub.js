function verifFormSub(id){
	var name = document.getElementById("inputName"+id);
	var description = document.getElementById("inputDescription"+id);
	var hourRate = document.getElementById("inputHourRate"+id);
	var dayRate = document.getElementById("inputDayRate"+id);
	var studentRate = document.getElementById("inputStudentRate"+id);
	var engagementRate = document.getElementById("inputEngagementRate"+id);
	var notEngagementRate = document.getElementById("inputNoEngagementRate"+id);
	var engagementTime = document.getElementById("inputEngagementTime"+id);


	var errors = 0;
	var isModif;
	var nameError = "";
	var hourRateError = "";
	var dayRateError = "";
	var engagementRateError = "";
	var studentRateError = "";
	var notEngagementRateError = "";
	var engagementTimeError = "";



	if(id > 0){
		isModif = "modification";
	}else{
		isModif = "création";
	}

	if(name.value.length < 8){
		errors++;
		nameError = "\n- Le titre est trop court"; 
	}else if(name.value.length > 50){
		errors++;
		nameError = "\n- Le titre est trop long"; 
	}

	if(isNaN(parseInt(hourRate.value))){
		errors++;
		hourRateError = "\n- valeur de hour Rate invalide"; 
	}

	if(isNaN(parseInt(dayRate.value))){
		errors++;
		dayRateError = "\n- valeur de day Rate invalide";
	}

	if(isNaN(parseInt(studentRate.value))){
		errors++;
		studentRateError = "\n- valeur de student Rate invalide";
	}

	if(isNaN(parseInt(engagementRate.value))){
		errors++;
		engagementRateError = "\n- valeur de engagement Rate invalide";
	}

	if(isNaN(parseInt(notEngagementRate.value))){
		errors++;
		notEngagementRateError = "\n- valeur de not engagement Rate invalide";
	}

	if(isNaN(parseInt(engagementTime.value))){
		errors++;
		engagementTimeError = "\n- valeur de engagement Time invalide";
	}


	if(errors > 0){

		alert("Votre formulaire de "+isModif+" a une erreur, voici vos erreur : "+nameError+hourRateError+dayRateError+studentRateError+engagementRateError+notEngagementRateError+engagementTimeError+"\n merci de modifier les champs correspondant :)");
	
	}else{

		if (  confirm("Voulez-vous vraiment modifier cet abonnement ?")  )
		{
			console.log('ok');

			var xhr = getXMLHttpRequest();

			xhr.open("POST", "requestAdminSub.php", true);
			xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			xhr.send("id=" + id + "&name=" + name.value + "&description=" + description.value + "&hourRate=" + hourRate.value + "&dayRate=" + dayRate.value + "&studentRate=" + studentRate.value + "&engagementRate=" + engagementRate.value + "&notEngagementRate=" + notEngagementRate.value + "&engagementTime=" + engagementTime.value);


			document.location.href="./adminSubscription.php";

		}else{
			console.log('nok');
		}


	}	


	console.log(name.value);
	console.log(description.value);
	console.log(hourRate.value);
	console.log(dayRate.value);
	console.log(studentRate.value);
	console.log(engagementRate.value);
	console.log(notEngagementRate.value);
	console.log(engagementTime.value);
	console.log(isModif);
}

function getXMLHttpRequest() {
	var xhr = null;
	
	if (window.XMLHttpRequest || window.ActiveXObject) {
		if (window.ActiveXObject) {
			try {
				xhr = new ActiveXObject("Msxml2.XMLHTTP");
			} catch(e) {
				xhr = new ActiveXObject("Microsoft.XMLHTTP");
			}
		} else {
			xhr = new XMLHttpRequest(); 
		}
	} else {
		alert("Votre navigateur ne supporte pas l'objet XMLHTTPRequest...");
		return null;
	}
	
	return xhr;
}

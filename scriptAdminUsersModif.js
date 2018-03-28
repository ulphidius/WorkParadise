function verifFormUser(id){
	var firstname = document.getElementById("inputFirstname");
	var lastname = document.getElementById("inputLastname");
	var email = document.getElementById("inputMail");
	var phone = document.getElementById("inputPhone");
	var pwd = document.getElementById("inputPwd");
	var statut = document.getElementById("inputStatut");
	var secret = document.getElementById("inputSecret");
	
	var errors = 0;
	var valideEmail = /^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/;
	var validePhone = /^0[1-9]\d{8}$/;//regex pour validateion numéro de téléphone

	var firstnameError = "";
	var lastnameError = "";
	var emailError = "";
	var phoneError = "";
	var pwdError = "";
	var secretError = "";



	if(firstname.value.length < 5){
		errors++;
		firstnameError = "\n- The firstname is too short"; 
	}else if(firstname.value.length > 50){
		errors++;
		firstnameError = "\n- The firstname is too long"; 
	}

	if(lastname.value.length < 5){
		errors++;
		lastnameError = "\n- The lastname is too short"; 
	}else if(lastname.value.length > 50){
		errors++;
		lastnameError = "\n- The lastname is too long"; 
	}

	if(!valideEmail.test(email.value)){
		errors++;
		emailError = "\n- The email is not correct"; 
	}

	if(pwd.value.length < 5){
		errors++;
		pwdError = "\n- The passwordd is too short"; 
	}else if(pwd.value.length > 64){
		errors++;
		pwdError = "\n- The password is too long"; 
	}
	
    if(!validePhone.test(phone.value)){
        errors++;
		pwdError = "\n- The phone number is not correct"; 
    }

    if(pwd.value.length < 5){
		errors++;
		pwdError = "\n- The secret answer is too short"; 
	}else if(pwd.value.length > 100){
		errors++;
		pwdError = "\n- The secret answer is too long"; 
	}

	if(errors > 0){

		alert("Votre formulaire de "+" a une erreur, voici vos erreur : "+lastnameError+firstnameError+emailError+phoneError+pwdError+secretError+"\n merci de modifier les champs correspondant :)");
	
	}else{
		if (  confirm("Voulez-vous vraiment modifier cet utilisateur ?")  )
		{
			console.log('ok');

			var xhr = getXMLHttpRequest();

			xhr.open("POST", "requestAdminUsersModif.php", true);
			xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			xhr.send("id=" + id + "&firstname=" + firstname.value + "&lastname=" + lastname.value + "&email=" + email.value + "&pwd=" + pwd.value + "&phone=" + phone.value + "&statut=" + statut.value + "&secret=" + secret.value);

			document.location.href="./adminUsers.php";
		}else{
			console.log("nok");
		}

	}	

	

	console.log(firstname.value);
	console.log(lastname.value);
	console.log(email.value);
	console.log(pwd.value);
	console.log(phone.value);
	console.log(statut.value);
	console.log(secret.value);
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
function confirmDelete(id){
	console.log(id)

	if (  confirm("Voulez-vous vraiment supprimer l'utilisateur d'id "+ id +" ?")  )
	{
		console.log('ok');

		var xhr = getXMLHttpRequest();

		xhr.open("POST", "adminUsersDelete.php", true);
		xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		xhr.send("id=" + id);

		document.location.href="./adminUsers.php";

	}else{
		console.log('nok');
	}

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

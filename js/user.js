
$.ajax({url: "user.php", type: "GET", success: function(user){

	var data = JSON.parse(user);

	$("#email").text(data["email"]);
	$("#phone").text(data["phone"]);
	$("#firstname").text(data["firstname"]);
	$("#lastname").text(data["lastname"]);

}});
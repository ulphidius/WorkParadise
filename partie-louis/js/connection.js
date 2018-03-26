function sendForm(e){
    e.preventDefault();
    var data = new FormData(document.getElementById('form_'));
    $.ajax({url: "connection.php", data:data, processData:false, contentType:false, type:"POST", error:errorForm, success:successForm}); 
}

function errorForm(){
    alert('Ajax error send data form !');
}

function successForm(listError){
    if(listError){
        var error = JSON.parse(listError);
        var html = "";
        if(error == false){ 
            $('#listOfError').html("<li>L'email ou/et le mot de passe est/sont invalide/s</li>");            
        }else{
            // Le lien vers le compte de l'utilisateur
            //window.location.replace("");
        }

    }
}

$('#form_').on('submit', sendForm);


function sendForm(e){
    e.preventDefault();
    var data = new FormData(document.getElementById('form_'));
    $.ajax({url: "reservations.php", data:data, processData:false, contentType:false, type:"POST", error:errorForm, success:successForm}); 
}

function errorForm(){
    alert('Ajax error send data form !');
}

function successForm(listError){
    if(listError && 0 !== listError.length){
        var error = JSON.parse(listError);
        var html = "";
        $.each(error, function (index, value){html += "<li>" + value + "</li>"}); 
        $('#listOfError').html(html);
    }else{
        //go to the main page, or user's page
         window.location.replace("account.php");
    }
}

$('#form_').on('submit', sendForm);
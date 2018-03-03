/*
function newXmlHttpRequest(){
    if(window.XMLHttpRequest){
        return new XMLHttpRequest();
    }
    return new ActiveXObject("Microsoft.XMLHTTP");
}

function sendForm(){
    var str = $( "form" ).serialize();
    var request = newXmlHttpRequest();
    request.onreadystatechange = function(){
        if(request.readyState == 4 && request.status == 200){
            alert(resquest.responseText);
        }
    }
    request.open("POST", "WorkParadise/php/inscription.php");
    resuest.send(str);
}
*/

function sendForm(e){
    e.preventDefault();
    var data = new FormData(document.getElementById('form_'));
    $.ajax({url: "inscription.php", data:data, processData:false, contentType:false, type:"POST", error:errorForm, success:successForm}); 
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
    }
}

$('#form_').on('submit', sendForm);
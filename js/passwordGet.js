function sendFormConnect(e){
    e.preventDefault();
    var data = new FormData(document.getElementById('form_'));
    $.ajax({url: "passwordGet.php", data:data, processData:false, contentType:false, type:"POST", error:errorForm, success:successForm}); 
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

$('#form_').on('submit', sendFormConnect);
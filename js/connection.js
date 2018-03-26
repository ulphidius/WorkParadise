function sendFormConnect(e){
    e.preventDefault();
    var data = new FormData(document.getElementById('form_'));
    $.ajax({url: "connection.php", data:data, processData:false, contentType:false, type:"POST", error:errorForm, success:successForm}); 
}

function errorForm(){
    alert('Ajax error send data form !');
}

function successForm(listError){
    if(listError && 0 !== listError.length){
        var error = JSON.parse(listError);
        var html = "";
        console.log(error);
        $.each(error, function (index, value){html += "<li>" + value + "</li>"}); 
        $('#listOfError').html(html);
    }else{
        document.location.href="userForm.php";
    }
}

$('#form_').on('submit', sendFormConnect);
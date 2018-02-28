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
    request.open("POST", "../php/inscription.php");
    resuest.send(str);
}

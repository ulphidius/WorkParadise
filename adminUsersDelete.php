<?php
    require "./utilities_functions.php";

$db = connectDb();
// On place dans une variable l'id transmit dans l'url
$id = $_POST["id"];

echo "c'est bon!! nous avons l'id : ".$_POST["id"];

// on se connecte à la base de données

$result = $db->prepare("DELETE from makereservation WHERE idUser = :idUser");
$result->execute([
                      "idUser"=>$id
                ]);

$result = $db->prepare("DELETE from hardwarecommandlist WHERE idUser = :idUser");
$result->execute([
                      "idUser"=>$id
                ]);

$result = $db->prepare("DELETE from servicecommandlist WHERE idUser = :idUser");
$result->execute([
                      "idUser"=>$id
                ]);


$result = $db->prepare("DELETE from subuser WHERE idUser = :idUser");
$result->execute([
                      "idUser"=>$id
                ]);


$result2 = $db->prepare("DELETE from users WHERE id = :id");
$result2->execute([
    		          "id"=>$id
                ]);
     

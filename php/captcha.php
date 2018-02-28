<?php
session_start();
header("Content-type: image/png"); 

$image = imagecreate(200, 60);

$back = imagecolorallocate($image, rand(0,100),rand(0,100),rand(0,100));
$color = imagecolorallocate($image, rand(150,255), rand(150,255), rand(150,255));

//Créer une chaine alphanumerique  aléatoire d'une longueur aléatoire entre 4 et 6
$charAuthorized = "azertyuiopqsdfghjklmwxcvbn1234567890";
//Mélanger la chaine de caractère
$charAuthorized = str_shuffle($charAuthorized);
//Définir une longueur aléatoire entre 4 et 6
$length = rand(4,6);
//Couper la chaine de 0 à cette valeur aléatoire
$captcha = substr($charAuthorized, 0, $length);
$_SESSION["captcha"] = $captcha;

//Insérer le texte dans l'image
//imagestring($image, 5, 80, 25, $captcha, $color);

//Fonction permettant de lister tous les fichiers
//se trouvant dans le dossier fonts et ayant
//l'extension .ttf
$listOfFonts = glob("fonts/*.ttf");
shuffle($listOfFonts);
$font = $listOfFonts[0];
$angle = rand(-20, 20);

imagettftext($image, 20, $angle, 80, 35, $color, $font, $captcha);


for($i=0; $i<2; $i++){
	//Ajouter une ligne à l'image, couleur du texte et position aléatoire
	imageline($image, rand(0,200), rand(0,60), rand(0,200), rand(0,60), $color);

	//Ajouter un rond à l'image, couleur du texte et position aléatoire
	imageellipse($image, rand(0,200), rand(0,60), rand(0,200), rand(0,200), $color);

	//Ajouter un rectangle à l'image, couleur du texte et position aléatoire
	imagerectangle($image, rand(0,200), rand(0,60), rand(0,200), rand(0,60), $color);
}

imagepng($image);
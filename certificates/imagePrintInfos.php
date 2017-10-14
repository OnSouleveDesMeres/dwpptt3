<?php
/**
 * Created by PhpStorm.
 * User: sylvain
 * Date: 10/09/17
 * Time: 22:49
 */
/*
$name = 'sjbefkjsebf';
$place = 'ksjfbsjkebf';
$code = 'qdqlkzdkbdzd';
$phone = 'jksebfksbf';
$rempla = true;
*/

function generateImage($name, $place, $code, $phone, $rempla)
{
// Définition du content-type
    header('Content-Type: image/png');

// Création de l'image
    $im = imagecreate(180, 67);
    if($rempla){
        $im = imagecreate(220, 54);
    }

// Création de quelques couleurs
    $white = imagecolorallocate($im, 255, 255, 255);

// On rend l'arrière-plan transparent

    $grey = imagecolorallocate($im, 128, 128, 128);

// Le texte à dessiner
    $text = $name;
    $text1 = 'Médecin remplaçante';
    $text2 = $place;
    $text3 = $code;
    $text4 = $phone;
// Remplacez le chemin par votre propre chemin de police
    $font = '/usr/share/fonts/cantarell/Cantarell-Regular.otf';
    $save = "../img/" . $name . ".png";

    if($rempla == false){

// Ajout du texte
        imagettftext($im, 12, 0, 5, 13, $grey, $font, $text);
        imagettftext($im, 12, 0, 5, 26, $grey, $font, $text1);
        imagettftext($im, 12, 0, 5, 39, $grey, $font, $text2);
        imagettftext($im, 12, 0, 5, 52, $grey, $font, $text3);
        imagettftext($im, 12, 0, 5, 65, $grey, $font, $text4);

    }
    else{

// Ajout du texte
        imagettftext($im, 12, 0, 5, 13, $grey, $font, $text);
        imagettftext($im, 12, 0, 5, 26, $grey, $font, $text2);
        imagettftext($im, 12, 0, 5, 39, $grey, $font, $text3);
        imagettftext($im, 12, 0, 5, 52, $grey, $font, $text4);

    }

// Utiliser imagepng() donnera un texte plus claire,
// comparé à l'utilisation de la fonction imagejpeg()
    imagepng($im, $save);
}

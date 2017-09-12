<?php
/**
 * Created by PhpStorm.
 * User: sylvain
 * Date: 10/09/17
 * Time: 22:49
 */

function generateImage($st, $ci, $cp, $nu)
{
// Définition du content-type
    header('Content-Type: image/png');

// Création de l'image
    $im = imagecreatetruecolor(180, 67);

// Création de quelques couleurs
    $white = imagecolorallocate($im, 255, 255, 255);
    $grey = imagecolorallocate($im, 128, 128, 128);
    $black = imagecolorallocate($im, 0, 0, 0);
    imagefilledrectangle($im, 0, 0, 399, 100, $white);

// Le texte à dessiner
    $text = 'Dr. DUCHAUSSOY B.';
    $text1 = 'Médecin remplaçante';
    $text2 = $nu . ' ' . $st;
    $text3 = $cp . ' ' . $ci;
    $text4 = 'N° Ordre : 015 215 632';
// Remplacez le chemin par votre propre chemin de police
    $font = '/usr/share/fonts/cantarell/Cantarell-Regular.otf';
    $save = "../img/" . $ci . ".png";

// Ajout du texte
    imagettftext($im, 12, 0, 5, 13, $black, $font, $text);
    imagettftext($im, 12, 0, 5, 26, $black, $font, $text1);
    imagettftext($im, 12, 0, 5, 39, $black, $font, $text2);
    imagettftext($im, 12, 0, 5, 52, $black, $font, $text3);
    imagettftext($im, 12, 0, 5, 65, $black, $font, $text4);

// Utiliser imagepng() donnera un texte plus claire,
// comparé à l'utilisation de la fonction imagejpeg()
    imagepng($im, $save);
}

<!--<?php

session_start();

$_SESSION['captcha'] = rand(1000,9999);
$img = imagecreatetruecolor(70,30);
$fill_color = imagecolorallocate($img,230,230,230);
imagefilledrectangle($img,0,0,70,30,$fill_color);

$text_color = imagecolorallocate($img, 10,10,10);
$font = '.police.ttf';
imagettftext($img,23,0,5,30,$text_color,$font,$_SESSION['captcha']);

header("Content-type:img/png");
imagejpeg($img);
imagedestroy($img);


?>
-->
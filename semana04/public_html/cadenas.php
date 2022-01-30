<?php
$nombres="luis curo ccc";


$longitud=strlen($nombres);
echo $longitud;

echo "<br>";

$wc=str_word_count($nombres);
echo $wc;

echo "<br>";

$str1=strrev($nombres);
echo $str1;


echo "<br>";

$str1=strpos($str1,"c");
echo $str1;

echo "<br>";
$str2=str_replace("cu","x",$nombres);
echo $str2;


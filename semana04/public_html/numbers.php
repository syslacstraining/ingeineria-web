<?php

echo PHP_INT_MAX;


$int_max = 9223372036854775807;

$int_max1=$int_max+1;

echo "<br>";
echo $int_max1;


echo "<br>";
echo PHP_INT_SIZE;

echo "<br>";
echo is_int(12);

echo "<br>";
echo is_int(12.1);

echo "<br>";
echo is_int("data");

echo "<br>";
//echo is_infinite(1/0);


echo pi();

echo "<br>";
echo round(12.55,1,PHP_ROUND_HALF_DOWN);


echo "<br>";
echo rand();



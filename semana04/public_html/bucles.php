<?php

for($i=0;$i<10;$i++)
{
	echo $i."<br>";
}

echo "<br>";

$arr1=["hola","homa1","!"];

foreach($arr1 as $item) {
	
	echo $item."<br>";
}


echo "<br>imprimiento usando while";

$j=0;
while($j<0)
{
	echo "<br> valor ".$j;
	$j++;
}

echo "<br>imprimiento usando do-while";

$j=0;
do
{
	echo "<br> valor ".$j;
	$j++;
}
while($j<0);
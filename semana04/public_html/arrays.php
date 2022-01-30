<?php

$arr1 = [2,3,5];

$arr2 = array(2,3,4);

$arr3 = array("item1"=>2,"item2"=>3,"item3"=>4);

$arr4 = array("item1"=> array(100,101),"item2"=>3,"item3"=>4);


echo "arr1 - posision 2 = ".$arr2[2];

echo "<br>";

echo "arr3 - item1 = ".$arr3["item1"];

echo "<br>";

echo "arr4 - item1 = ".$arr4["item1"][0];

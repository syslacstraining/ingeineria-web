<?php 

include "_producto.php";

use ventas\productos\Producto;


$producto = new Producto("P003","PRODUCTO 3");

//$producto->setCodigo("P002");
//$producto->setNombre("PRODUCTO 2");


//echo $producto->getCodigo();


echo print_r($producto,1);

echo "<br>";

$lista = $producto->obtenerListaCompleta();

echo print_r($lista,1);


echo "<br>";
echo print_r(Producto::obtenerListaCompletaStatica(),1);

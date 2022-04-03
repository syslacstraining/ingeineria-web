
function agregarProducto(producto)
{
	var producto_agregar=producto;
	var carrito = localStorage.getItem("carrito");
	
	if(carrito)
		carrito=JSON.parse(carrito);

	if(!carrito)
	{
		carrito={}
		carrito.total=0;
		carrito.detalle=[];
	}

	var total =0;	
	for(i=0;i<carrito.detalle.length;i++)
	{


		if(carrito.detalle[i].producto.id==producto.id)
		{
			carrito.detalle[i].cantidad++;
			carrito.detalle[i].sub_total=Number(carrito.detalle[i].cantidad)*Number(carrito.detalle[i].producto.precio);
			producto_agregar=null;
		}

		total+=Number(carrito.detalle[i].sub_total);
	}

	if(producto_agregar)
	{
		carrito_item={};
		carrito_item.cantidad=1;
		carrito_item.sub_total=Number(producto_agregar.precio);
		carrito_item.producto=producto_agregar;

		carrito.detalle.push(carrito_item);
	}

 	carrito.total=math.round(total,2);
	console.log(carrito);
	localStorage.setItem("carrito", JSON.stringify(carrito));
}

function obtenerCarrito()
{
	return  JSON.parse(localStorage.getItem("carrito"));
}
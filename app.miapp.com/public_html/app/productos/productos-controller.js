
function obtenerProductos(callback)
{
	 $.ajax({
          method: "GET",
          url: APIS_URL+"/api/v1/productos"
        })
        .done(function( response ) {

        		if(response.success)
        		{
        			if(callback)
        			{
        				callback(response.data);
        			}	
        		}

          });
}
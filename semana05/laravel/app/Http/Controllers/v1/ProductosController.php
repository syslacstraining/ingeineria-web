<?php 
namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Models\v1\Producto;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
	function obtenerLista()
	{
		$productos =  Producto::all();


		$response = new \stdClass();
		$response->success=true;
		$response->data=$productos;

		return response()->json($response,200);
	}

	function obtenerItem($id)
	{
		$producto =  Producto::find($id);


		$response = new \stdClass();
		$response->success=true;
		$response->data=$producto;

		return response()->json($response,200);
	}

	function update(Request $request)
	{
		$producto =  Producto::find($request->id);

		if($producto)
		{
			$producto->codigo=$request->codigo;
			$producto->nombre=$request->nombre;
			$producto->save();
		}

		$response = new \stdClass();
		$response->success=true;
		$response->data=$producto;

		return response()->json($response,200);
	}

	function patch(Request $request)
	{
		$producto =  Producto::find($request->id);

		if($producto)
		{
			
			if(isset($request->codigo))
			$producto->codigo=$request->codigo;

			if(isset($request->nombre))
			$producto->nombre=$request->nombre;
		
			$producto->save();
		}

		$response = new \stdClass();
		$response->success=true;
		$response->data=$producto;

		return response()->json($response,200);
	}


	function store(Request $request)
	{
		$producto = new Producto();
		$producto->codigo = $request->codigo;
		$producto->nombre = $request->nombre;
		$producto->save();

		$response = new \stdClass();
		$response->success=true;
		$response->data=$producto;

		return response()->json($response,200);
	}

	function delete($id)
	{
		$response = new \stdClass();
		$response->success=true;
		$response_code=200;


		$producto = Producto::find($id);
		
		if($producto)
		{
			$producto->delete();
			$response->success=true;
			$response_code=200;
		}
		else
		{
			$response->error=["El elemento ya ha sido eliminado"];
			$response->success=false;
			$response_code=500;
		}
		

		return response()->json($response,$response_code);

	}

}
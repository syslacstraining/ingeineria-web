<?php 
namespace App\Http\Controllers\v2;

use App\Http\Controllers\Controller;
use App\Models\v1\Producto;
use Illuminate\Http\Request;
use Culqi\Culqi;

use App\Models\v1\Pago;

use App\Models\v1\Pedido;

use App\Models\v1\DetallePedido;

use Carbon\Carbon;

class PedidosController extends Controller
{
	function pagarCulqi(Request $request)
	{

		$SECRET_KEY = "sk_test_30d7e0f71bc7d095";
		$culqi = new Culqi(array('api_key' => $SECRET_KEY));

		/*
		$charge = $culqi->Charges->create(
					 array(
					     "amount" => $request->pago["culqi"]["amount"],
					     "currency_code" => $request->pago["culqi"]["currency_code"],
					     "email" => $request->pago["culqi"]["email"],
					     "source_id" => $request->pago["culqi"]["source_id"]
					   )
					);
	
		*/

		$currentTime = Carbon::now();

		$pago = new Pago();
		$pago->tipo=$request->pago["tipo"];
		//$pago->codigo_pago=$charge->authorization_code;
		$pago->estado="PAGADO";
		$pago->fecha_pago = $currentTime->toDateTimeString();
		$pago->save();


		$pedido=new Pedido();
		$pedido->cliente_id=$request->cliente_id;
		$pedido->estado=$request->estado;
		$pedido->fecha_pedido=$currentTime;
		$pedido->pago_tipo=$request->pago["tipo"];
		$pedido->pago_id=$pago->id;
		$pedido->save();

		
		foreach($request->detalles as $detalle)
		{
			
			$detalle_pedido=new DetallePedido();
			$detalle_pedido->pedido_id=$pedido->id;
			$detalle_pedido->producto_id=$detalle["producto_id"];
			$detalle_pedido->cantidad=$detalle["cantidad"];
			$detalle_pedido->precio=$detalle["precio"];
			$detalle_pedido->sub_total=$detalle["sub_total"];

			$detalle_pedido->save();
		}

		$response = new \stdClass();
		$response->success=true;

		return response()->json($response,200);
	}

}
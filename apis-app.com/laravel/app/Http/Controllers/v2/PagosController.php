<?php 
namespace App\Http\Controllers\v2;

use App\Http\Controllers\Controller;
use App\Models\v1\Producto;
use Illuminate\Http\Request;
use Culqi\Culqi;

use App\Models\v1\Pago;

use Carbon\Carbon;

class PagosController extends Controller
{
	function pagarCulqi(Request $request)
	{

		$SECRET_KEY = "sk_test_30d7e0f71bc7d095";
		$culqi = new Culqi(array('api_key' => $SECRET_KEY));

		$charge = $culqi->Charges->create(
					 array(
					     "amount" => $request->culqi["amount"],
					     "currency_code" => $request->culqi["currency_code"],
					     "email" => $request->culqi["email"],
					     "source_id" => $request->culqi["source_id"]
					   )
					);


		$currentTime = Carbon::now();

		$pago = new Pago();
		$pago->tipo="TARJETA";
		$pago->codigo_pago=$charge->authorization_code;
		$pago->estado="PAGADO";
		$pago->fecha_pago = $currentTime->toDateTimeString();
		$pago->save();

		return $charge;
	}

}
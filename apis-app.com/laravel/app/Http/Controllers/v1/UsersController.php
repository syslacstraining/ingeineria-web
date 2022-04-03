<?php 
namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

use App\Models\v1\Cliente;

class UsersController extends Controller
{


	function getUser(Request $request)
	{
		$user= auth('api')->user();

		$response=new \stdClass();
		$response->success=true;
		$response->data=$user;

		return response()->json($response,200);
	}


	function store(Request $request)
	{
		$response = new \stdClass();
		$response_code = 0;

		$user_db=User::where("email","=",$request->email)->first();

		if($user_db)
		{
			$response_code=404;
			$response->success=false;
			$response->errors=[];
			$response->errors[]="El usuario ya esta registrado";

		}
		else
		{
			$user = new User();
			$user->name=$request->name;
			$user->email=$request->email;
			$user->password=$request->password;
			$user->roles=$request->roles;
			$user->save();

			$response_code=200;
			
			$response->success=true;
			$response->data = $user;
		}



		return response()->json($response,$response_code);
	}



	function guardarCliente(Request $request)
	{
		$response = new \stdClass();
		$response_code = 0;

		$user_db=User::where("email","=",$request->email)->first();

		if($user_db)
		{
			$response_code=404;
			$response->success=false;
			$response->errors=[];
			$response->errors[]="El usuario ya esta registrado";

		}
		else
		{
			$cliente = new Cliente();
			$cliente->tipo ="PERSONA";
			$cliente->nombres =$request->name;
			$cliente->email =$request->email;
			$cliente->save();


			$user = new User();
			$user->name=$request->name;
			$user->email=$request->email;
			$user->password=$request->password;
			$user->roles="CLIENTE";
			$user->cliente_id=$cliente->id;
			$user->save();

			$response_code=200;
			
			$response->success=true;
			$response->data = $user;
		}



		return response()->json($response,$response_code);
	}
}
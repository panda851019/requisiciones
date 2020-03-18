<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller {
	/*
		    |--------------------------------------------------------------------------
		    | Register Controller
		    |--------------------------------------------------------------------------
		    |
		    | This controller handles the registration of new users as well as their
		    | validation and creation. By default this controller uses a trait to
		    | provide this functionality without requiring any additional code.
		    |
	*/

	use RegistersUsers;

	/**
	 * Where to redirect users after registration.
	 *
	 * @var string
	 */
	protected $redirectTo = '/home';

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('guest');
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param Request
	 * @return App\Models\Usuarios\Users;
	 */
	protected function create(Request $request) {
		//dd($request->all());
		$datos = DB::table('users')->where('rfc', '=', strtoupper($request->rfc))->first();
		//dd($datos);
		if ($datos != null) {
			$respuesta = ['resp' => false, 'message' => 'RFC ya registrado'];
			return $respuesta;
		}
		$array = $request->all();
		$email = $request->email;
		$subject = "Alta de usuario";
		Mail::send('emails.registro', compact('array'), function ($message) use ($subject, $email) {
			$message->from('requisiciones@finanzas.cdmx.gob.mx', 'Alta de Usuario');
			$message->to('requisiciones@finanzas.cdmx.gob.mx');
			$message->subject($subject);
		});

		$subject = "Instrucciones del sistema de requisiciones";
		Mail::send('emails.instrucciones', compact('array'), function ($message) use ($subject, $email) {
			$message->from('requisiciones@finanzas.cdmx.gob.mx', 'Gobierno de la Ciudad de México');
			$message->to($email);
			$message->subject($subject);
		});

	}
	/**
	 * Validate User Email registration.
	 *
	 * @param Request
	 * @return json
	 */
	public function validemail(Request $request) {
		$rfc = $request->rfc;
		//dd($rfc);
		$email = $request->remail;
		$datos = User::validaCorreo($email);
		if ($datos == null) {
			\Log::info(__METHOD__ . ' valida existencia de email');
			try {
				return response()->json(['status' => 'valido'], 200);
			} catch (\Exception $th) {
				return response()->json(['status' => 'error al consultar'], 200);
			}
		} else {
			return response()->json(['status' => 'ya existe el correo'], 200);
		}
	}

	/**
	 * Validate User registration in BD.
	 *
	 * @param Request
	 * @return json
	 */

	public function validUser(Request $request) {
		$user = $request->user;
		$datos = User::validUser($user);
		if ($datos == null) {
			\Log::info(__METHOD__ . ' valida existencia de usuario');
			try {
				return response()->json(['status' => 'valido'], 200);
			} catch (\Exception $th) {
				return response()->json(['status' => 'error al consultar'], 200);
			}
		} else {
			return response()->json(['status' => 'no_valido'], 200);
		}
	}
}

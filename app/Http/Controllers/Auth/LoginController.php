<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Http\Controllers\eFirma;
use App\PermisosUsuarios;
use App\User;
use App\Usuarios;
//use App\Usuarios;
use Auth;
use File;
use GuzzleHttp\Client;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class LoginController extends Controller {
	/*
		                    |--------------------------------------------------------------------------
		                    | Login Controller
		                    |--------------------------------------------------------------------------
		                    |
		                    | This controller handles authenticating users for the application and
		                    | redirecting them to your home screen. The controller uses a trait
		                    | to conveniently provide its functionality to your applications.
		                    |
	*/
	use AuthenticatesUsers;
	/**
	 * Where to redirect users after login.
	 *
	 * @var string
	 */
	protected $redirectTo = '/home';
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {}
	public function login(Request $request) {
		//dd($request);
		#Obtenigo información del cliente su Ip y navegador web utilizado
		$infoClient['Navegador'] = $request->server('HTTP_USER_AGENT');
		$infoClient['Ip'] = $request->server('REMOTE_ADDR');
		#Valida que los campos no vengan nulos, esto solo puede ocurrir si alguien quita los "Require" de HTML
		$this->validaCerKey($request); //Aquí podría hacer una validación para iniciar un contador de veces que se intento violar en HTML
		#Arreglo para iniciar sesión vía WS

		$dataUser = array(
			'key' => $request->file('key')->get(),
			'cer' => $request->file('cer')->get(),
			'password' => $request->password);

		#Instancio un objeto de la clase eFirma para utilizar el webService eFirmaLogin
		$eFirma = new eFirma();
		$wsResponse = $eFirma->eFirmaLogin($dataUser);

		#Validamos el tipo de respuesta del WS ****Error preliminal, cambiar una vista nueva de errores generales.****
		if ($wsResponse->error->code != 0) {
			return $wsResponse->error->msg;
			if ($wsResponse->error->msg == "" || $wsResponse->error->msg == null || $wsResponse->error->msg == 'undefined') {
				return $response = ['success' => false, 'error' => 'Error de Conexión'];
			} else {
				return $response = ['success' => false, 'error' => $wsResponse->error->msg];
			}
		} elseif ($wsResponse == false) {
			return 'Ocurrió un error en el servidor, intente nuevamente en un unos minutos. Si el problema persiste reportelo';
			return $response = ['success' => false, 'error' => $wsResponse->error->msg];
		} else {

			$password = session()->put('password', $dataUser['password']);

			$key = session()->put('key', $dataUser['key']);

			$cer = session()->put('cer', $dataUser['cer']);

			$RfcUsuario = $wsResponse->data->RFC; //usuario en sistema
			//dd("$RfcUsuario");
			//$RfcUsuario= 'TOJE880602HG7';//RENATA
			//$RfcUsuario= 'PIHS721018D9A';//SALVADOR
			//$RfcUsuario= 'CASP760715V20';//PEDRO
			//$RfcUsuario= 'GARX761118QW3';//XIMENA
			//$RfcUsuario = 'MADE901128RM4'; //proveedor real
			//$RfcUsuario='ABCD212121ABC'; // proveedor sin constancia

			$datosUsuario = DB::table('users')->where('rfc', '=', $RfcUsuario)->where('modulo', 1)->first();
			//dd(Auth::loginUsingId($datosUsuario->id));

			if ($datosUsuario && Auth::loginUsingId($datosUsuario->id) !== null) {
				$datosUsuario = DB::table('users')->where('rfc', '=', $RfcUsuario)->first();

				//dd($datosUsuario);
				$id = $datosUsuario->id;
				//dd($data_proveedor_api['estatus']);
				//dd($id);
				/*********************************SEGMENTO PERMISOS**********************************/
				$Usuario = Usuarios::select('users.dependencia', 'users.area', 'cat_dependencias.descripcion', 'cat_areas.descripcion as areaDesc', 'users.nivel', 'modulo')
					->join('cat_dependencias', 'cat_dependencias.clave_num', '=', 'users.dependencia')
					->join('cat_areas', 'cat_areas.id_area', '=', 'users.area')
					->where('users.status', true)->where('users.id', $id)
					->get()->toArray();
				//dd($Usuario);
				$depSS = $Usuario[0]['dependencia'];
				Session::put('depD', $depSS);
				$areaSS = $Usuario[0]['area'];
				Session::put('areaSS', $areaSS);

				$depDescSS = $Usuario[0]['descripcion'];
				Session::put('depDescSS', $depDescSS);

				$areaDesc = $Usuario[0]['areaDesc'];
				Session::put('areaDesc', $areaDesc);

				$nivelSes = $Usuario[0]['nivel'];
				Session::put('nivel', $nivelSes);
				$modulSes = $Usuario[0]['modulo'];
				Session::put('modulo', $modulSes);
				$almacenSes = 101;
				Session::put('almacenSes', $almacenSes);
				$depSess = Session::get('dept');

				$datos = PermisosUsuarios::select('seccion')->where('status', true)->where('user_id', $id)
					->get()->toArray();
				/*********************************SEGMENTO PERMISOS**********************************/
				/*  $modelHasRol=DB::table('model_has_roles')->where('model_id', '=', $id)->first();
					                                                            $idRol=$modelHasRol->role_id; //id del rol
					                                                            $role_permissions=User::role_permissions($idRol);
					                                                            $id_permission=$role_permissions->permission_id;
				*/

				return view('/home');
				$response = ['success' => true,
					'admin' => true];

			} else #ENTRA A REVISAR AL WEBSERVICE DE LA AGENCIA
			{
				$data_proveedor_api = $this->search_provider_api($RfcUsuario); // return false

				if ($data_proveedor_api['estatus'] == "true") {
					//dd($data_proveedor_api);
					$Usuario = DB::table('users')->where('rfc', $RfcUsuario)->count();

					if ($Usuario != 1) {
						$insert = DB::table('users')->insert(
							[
								'dependencia' => 0,
								'area' => 0,
								'nombre' => $data_proveedor_api['nombre_proveedor'],
								'email' => $RfcUsuario . '@prueba.com',
								'email_verified_at' => null,
								'password' => '123abc',
								'status' => true,
								'remember_token' => null,
								'created_at' => null,
								'updated_at' => null,
								'nivel' => 2,
								'modulo' => 2,
								'almacen' => null,
								//'rfc'=> 'PES101116UH4']);
								'rfc' => $RfcUsuario]);

						$new_proveedor = DB::table('cat_proveedores')->insert(
							[
								'rfc' => $RfcUsuario,
								'tipo' => $data_proveedor_api['tipo_proveedor'],
								'nombre' => $data_proveedor_api['nombre_proveedor']]);
						//dd($new_proveedor);
					}

					$datosUsuario = DB::table('users')->where('rfc', '=', $RfcUsuario)
						->where('modulo', 2)
						->first();

					//dd($datosUsuario);
					Auth::loginUsingId($datosUsuario->id);

					//dd("rfrf");
					$proveedor = DB::table('users')->where('rfc', $RfcUsuario)->get()->toArray();
					//dd($proveedor);
					$nivel = $proveedor[0]->nivel;
					$modulo = $proveedor[0]->modulo;
					//dd($nivel);
					$nivelSes = $proveedor[0]->nivel;
					Session::put('nivel', $nivelSes);

					$moduloSes = $proveedor[0]->modulo;
					Session::put('modulo', $moduloSes);

					/*$nivelSes = $nivel;
						                                                                        Session::put('nivel', $nivelSes);
						                                                                        $modulSes = $modulo;
					*/
					//return view('requisiciones/registrarCotizaciones');
					return view('layouts/app_MenuProveedores');
					$response = ['success' => true,
						'admin' => true];
				} else {
					//Provedor no registrado
					$Usuario = DB::table('users')->where('rfc', $RfcUsuario)->count();
					//dd($Usuario);
					$data_proveedor_api = $this->search_provider_api($RfcUsuario);
					//dd($data_proveedor_api);
					if ($Usuario == 0 && $data_proveedor_api['estatus'] == 'false') {
						$consulta = DB::table('users')->where(['rfc' => $wsResponse->data->RFC, 'modulo' => '4'])->count();
						if ($consulta != '1') {
							$insert = DB::table('users')->insert(
								[

									'dependencia' => 0,
									'area' => 0,

									'nombre' => $wsResponse->data->name,
									'email' => $wsResponse->data->RFC . '@prueba.com',
									'email_verified_at' => null,
									'password' => '123abc',
									'status' => true,
									'remember_token' => null,
									'created_at' => null,
									'updated_at' => null,
									'nivel' => 3,
									'modulo' => 4,
									'almacen' => null,
									'rfc' => $wsResponse->data->RFC]);
							//'rfc'=> $wsResponse->data->RFC]);
							//dd("dweded");
						}
					}

					$datosUsuario = DB::table('users')->where('rfc', '=', $wsResponse->data->RFC)
						->where('modulo', 4)
						->first();
					//dd($datosUsuario);
					Auth::loginUsingId($datosUsuario->id);
					//dd("rfrf");
					$proveedor = DB::table('users')->where('rfc', $datosUsuario->rfc)->get()->toArray();

					$nivel = $proveedor[0]->nivel;
					//dd();
					$modulo = $proveedor[0]->modulo;
					//dd($nivel , $modulo);
					$nivelSes = $nivel;
					Session::put('nivel', $nivelSes);
					$modulSes = $modulo;
					Session::put('modulo', $modulSes);

					//return view('requisiciones/registrarCotizaciones');
					return view('/layouts/app_MenuProveedores');
					$response = ['success' => true,
						'admin' => true];
				}
			}

			/*
				                                                elseif($data_proveedor_api['estatus'] == 'false' &&   $datosUsuario == null)
				                                                {
				                                                        return view('/registrartianguis');
				                                                        $response=['success'=>true,
				                                                        'admin'=>false];
			*/
			// else {
			//    $response=['success'=>false, 'error' => 'El usuario no existe'];
			// }
			return $response;
			//return View('home')->with('dataUser',$dataUser); estos datos ya existen en sesion
		}
	}
	public function logout(Request $request) {
		Auth::logout();
		//Sentry::logout();
		session()->flush();
		return redirect('/login');
	}
	public function verify($code) {
		$user = User::where('confirmation_code', $code)->first();
		if (!$user) {
			return redirect('/');
		}

		$user->confirmed = true;
		$user->confirmation_code = null;
		$user->estatus = 1;
		$user->rol_id = 5;
		$user->save();
		return redirect('/home')->with('notification', 'Has confirmado correctamente tu correo!');
	}

	private function validaCerKey(Request $request) {

		return $request->validate([
			'password' => 'required|string',
			'key' => 'required',
			'cer' => 'required',

		]);
	}
	#funciones nuevas de proveedores
	########################################################

	public function search_provider_api($rfc) {
		// $client = new Client();

		$client = new Client(['proxy' => 'http://10.1.16.108:3128/']);

		$response = $client->request('GET', 'https://datos.cdmx.gob.mx/api/records/1.0/search/', [
			'query' => ['dataset' => 'tabla-padron-de-proveedores-vigente-sheet1', 'q' => $rfc],
		]);
		$data_prov = $response->getBody();
		$data = json_decode($data_prov, true);

		if (count($data['records']) > 0) {
			$nombre_proveedor = $data['records'][0]['fields']['fullname'];
			$tipo_proveedor = $data['records'][0]['fields']['tipo'];

			return ['nombre_proveedor' => $nombre_proveedor, 'tipo_proveedor' => $tipo_proveedor, 'tipo_busqueda' => 'API', 'estatus' => 'true', 'message' => ''];
		}

		return ['nombre_proveedor' => '', 'tipo_proveedor' => '', 'tipo_busqueda' => 'API', 'estatus' => 'false',
			'message' => 'No se encontró el RFC en el padrón de Proveedores de la CDMX'];
	}

	public function search_provider_db($rfc) {
		//dd($rfc);
		$data_proveedor = CatProveedores::where('rfc', $rfc)->first();

		if ($data_proveedor) {
			return ['nombre_proveedor' => $data_proveedor['nombre_proveedor'], 'tipo_proveedor' => $data_proveedor['tipo_proveedor'],
				'tipo_busqueda' => 'DB', 'estatus' => 'true', 'message' => 'El RFC ya se encuentra registrado en el sistema!'];
		}

		return ['estatus' => 'false'];
	}
	###########################################################
}
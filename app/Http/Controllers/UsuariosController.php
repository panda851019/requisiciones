<?php

namespace App\Http\Controllers;

use App\AreaEnlace;

//Haciendo uso de modelos:
use App\PermisosUsuarios;
use App\Procesos;
use App\Seccion;
use App\Usuarios;
use Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Mail;
use Session;

class UsuariosController extends Controller {
	public function registraUsuarios() {
		$sesDep = Session::get('depD');
		$areaSS = Session::get('areaSS');
		$AreaEnlace = AreaEnlace::where('status', true)
			->where('dependencia', $sesDep)
			->orderBy('descripcion', 'ASC')
			->get()
			->toArray();
		$Usuario = Usuarios::where('status', true)->where('dependencia', $sesDep)->orderBy('nombre', 'ASC')
			->get()->toArray();

		return view('admonUsuarios.registraUsuarios', ['AreaEnlace' => $AreaEnlace, 'Usuario' => $Usuario]);
	}

	public function modificaUsuarios() {

		$nivelSes = Session::get('nivel');
		//dd($nivelSes);
		$sesDep = Session::get('depD');
		$areaSS = Session::get('areaSS');

		$Usuario = Usuarios::where('status', true)->where('dependencia', $sesDep)->orderBy('nombre', 'ASC')
			->get()->toArray();
		//dd($Usuario);
		$AreasEn = AreaEnlace::where('status', true)
			->where('dependencia', $sesDep)
		//->where('id_area', '>', $areaSS)
			->orderBy('descripcion', 'ASC')
			->get()
			->toArray();
		return view('admonUsuarios.modificaUsuarios', ['Usuario' => $Usuario, 'AreasEn' => $AreasEn]);
	}

	public function segABDF_ACentral() {

		return view('admonUsuarios.segABDF_ACentral');
	}

	/***PERMISSIONS   -  PERMISSIONS***/
	public function asignarPermisos() {
		$sesDep = Session::get('depD');
		$Usuario = Usuarios::where('status', true)->where('dependencia', $sesDep)->orderBy('nombre', 'ASC')
			->get()->toArray();
		return view('admonUsuarios.asignarPermisos', ['Usuario' => $Usuario]);
	}

	public function userRegister(Request $request) {

		$sesDep = Session::get('depD');
		$areaSS = Session::get('areaSS');

		$users = new Usuarios;
		$users->dependencia = $sesDep;
		$users->area = $request->cve_area;
		$users->nombre = $request->nombre;
		$users->email = $request->email;
		$users->nivel = $request->nivel;
		$users->rfc = $request->rfc;
		$users->modulo = 1;
		$users->password = Hash::make($request->password);
		$users->save();

		$id_user = $users->id;
		$process = Procesos::select('*')
			->where('cat_procesos.seccion', '>=', 300)
			->get()->toArray();

		foreach ($process as $reg) {
			$permisos = new PermisosUsuarios;
			$permisos->user_id = $id_user;
			$permisos->seccion = $reg['seccion'];
			$permisos->proceso = $reg['proceso'];
			$permisos->status = false;
			$permisos->save();

		}
		$email = $request->email;
		$array = $request->all();
		$subject = "Registro terminado en Requisiciones";
		Mail::send('emails.bienvenida', compact('array'), function ($message) use ($subject, $email) {
			$message->from('requisiciones@finanzas.cdmx.gob.mx', 'Gobierno de la Ciudad de México');
			$message->to($email);
			$message->subject($subject);

		});

		return redirect()->back()->with('msg', 'Usuario registrado exitosamente.');
	}

	public function getUserdata(Request $request) {
		//dd($request);
		$Usuario = Usuarios::select('area', 'email', 'nombre', 'nivel', 'rfc')->where('status', true)
			->where('id', $request->id_user)->orderBy('nombre', 'ASC')
			->get()->toArray();
		//dd($Usuario);
		return response()->json($Usuario);
	}

	public function userUpdate(Request $request) {
		//dd($request);
		$data = $request->except('_token');
		$campos = Usuarios::where('id', '=', $data['id_user'])->first();
		//dd($campos);
		//dd($data['id_user']);
		//dd($request->nivel);
		$campos->update(
			[

				'nivel' => $request->nivel,
				'area' => $request->cve_area,
				//'nombre' => $request->nombre,
				'email' => $request->email,
				'rfc' => $request->rfc,
			]);
		return response()->json("Registros actualizados correctamente!");
	}

	public function getCatProcesos() {
		//print_r($request);
		//dd($request->codigo_cambs);

		$contratos = Procesos::select('proceso', 'descripcion')
			->where('seccion', 1)->where('proceso', '>', 100)->orderBy('proceso', 'ASC')
			->get()->toArray();
		$inventario = Procesos::select('proceso', 'descripcion')
			->where('seccion', 2)->where('proceso', '>', 200)->orderBy('proceso', 'ASC')
			->get()->toArray();
		$controlAreas = Procesos::select('proceso', 'descripcion')
			->where('seccion', 3)->where('proceso', '>', 300)->orderBy('proceso', 'ASC')
			->get()->toArray();
		$areasEnlace = Procesos::select('proceso', 'descripcion')
			->where('seccion', 4)->where('proceso', '>', 400)->orderBy('proceso', 'ASC')
			->get()->toArray();
		$procesoBajas = Procesos::select('proceso', 'descripcion')
			->where('seccion', 5)->where('proceso', '>', 500)->orderBy('proceso', 'ASC')
			->get()->toArray();
		$consultas = Procesos::select('proceso', 'descripcion')
			->where('seccion', 6)->where('proceso', '>', 600)
			->get()->toArray();
		$reportes = Procesos::select('proceso', 'descripcion')
			->where('seccion', 7)->where('proceso', '>', 700)
			->get()->toArray();
		$catalogos = Procesos::select('proceso', 'descripcion')
			->where('seccion', 8)->where('proceso', '>', 800)
			->get()->toArray();
		$administrador = Procesos::select('proceso', 'descripcion')
			->where('seccion', 9)->where('proceso', '>', 900)
			->get()->toArray();

		return response()->json(["contratos" => $contratos, "inventario" => $inventario, "controlAreas" => $controlAreas,
			"areasEnlace" => $areasEnlace, "procesoBajas" => $procesoBajas, "consultas" => $consultas,
			"reportes" => $reportes, "catalogos" => $catalogos, "administrador" => $administrador]);

	}

	public function asignarModulos($idSeccion, $id_user) {
		//dd($idSeccion);
		// $rr = $this->getMySeccion($id_user);
		//dd($rr);

		$seccion = DB::table('permisos_usuarios')->select('seccion')->where('user_id', $id_user)
			->where('seccion', $idSeccion)->where('status', true)->groupBy('seccion')->count();
		//dd($seccion);

		if ($seccion > 0) {
			$permisos = new PermisosUsuarios;

			$arrayPermisos = $permisos->select('status')->where('user_id', $id_user)->where('seccion', $idSeccion);
			//dd($arrayPermisos);
			//$arrayPermisos->update(['status' => false]);
			$arrayPermisos->delete();

		} else {
			$permisos = new PermisosUsuarios;
			$permisos->user_id = $id_user;
			$permisos->seccion = $idSeccion;
			//$permisos->proceso = $sesDep;
			$permisos->status = true;
			$permisos->save();
		}

		return response()->json($permisos->id);

	}

	public function getMySeccion($id_user) {
		//$users = DB::table('users')->count();
		$seccion = DB::table('permisos_usuarios')->select('seccion')->where('user_id', $id_user)->where('status', true)
			->groupBy('seccion')->get()->toArray();
		//->where('seccion',$idSeccion)

		//dd($seccion);
		return response()->json($seccion);

	}

	public function getMyProcess($idProceso, $id_user) {
		//$users = DB::table('users')->count();
		$process = DB::table('permisos_usuarios')->where('user_id', $id_user)->where('status', true)
			->where('proceso', $idProceso)->count();

		//dd($seccion);
		return response()->json($process);

	}

	public function getMenuSeccion() {
		$id_user = Auth::user()->id;
		//dd($users);

		$seccion1 = DB::table('permisos_usuarios')->where('user_id', $id_user)->where('status', true)
			->where('seccion', 1)->count();

		$seccion2 = DB::table('permisos_usuarios')->where('user_id', $id_user)->where('status', true)
			->where('seccion', 2)->count();

		$seccion3 = DB::table('permisos_usuarios')->where('user_id', $id_user)->where('status', true)
			->where('seccion', 3)->count();

		$seccion4 = DB::table('permisos_usuarios')->where('user_id', $id_user)->where('status', true)
			->where('seccion', 4)->count();

		$seccion5 = DB::table('permisos_usuarios')->where('user_id', $id_user)->where('status', true)
			->where('seccion', 5)->count();

		$seccion6 = DB::table('permisos_usuarios')->where('user_id', $id_user)->where('status', true)
			->where('seccion', 6)->count();

		$seccion7 = DB::table('permisos_usuarios')->where('user_id', $id_user)->where('status', true)
			->where('seccion', 7)->count();

		$seccion8 = DB::table('permisos_usuarios')->where('user_id', $id_user)->where('status', true)
			->where('seccion', 8)->count();

		$seccion9 = DB::table('permisos_usuarios')->where('user_id', $id_user)->where('status', true)
			->where('seccion', 9)->count();

		return response()->json(["seccion1" => $seccion1, "seccion2" => $seccion2, "seccion3" => $seccion3, "seccion4" => $seccion4,
			"seccion5" => $seccion5, "seccion6" => $seccion6, "seccion7" => $seccion7, "seccion8" => $seccion8, "seccion9" => $seccion9]);

	}

	/********/

	public function addPermissions() {
		$sesDep = Session::get('depD');
		$Usuario = Usuarios::where('status', true)
			->where('dependencia', $sesDep)
			->where('modulo', 1)
			->orderBy('id', 'ASC')
			->get()->toArray();
		$Seccion = Seccion::where('status', true)->orderBy('id_seccion', 'ASC')->get()->toArray();

		return view('admonUsuarios.asignarPermisos', ['Usuario' => $Usuario, 'Seccion' => $Seccion]);
	}

	public function getListPermissions($id_user, $idSeccion) {

		$compare = "=";
		$campo = "seccion";
		if ($id_user == 0 && $idSeccion == 0) {
			$id_user = auth()->user();
			$id_user = $id_user->id;
			//dd($id_user);
			$compare = ">";
			$idSeccion = 0;
			$campo = "proceso";

		}

		$permisos = PermisosUsuarios::select('permisos_usuarios.seccion', 'permisos_usuarios.proceso',
			'descripcion', 'permisos_usuarios.id', 'cat_procesos.ruta')
			->join('cat_procesos', 'cat_procesos.proceso', '=', 'permisos_usuarios.proceso')
			->where('permisos_usuarios.user_id', $id_user)
			->where('permisos_usuarios.' . $campo, $compare, $idSeccion)
			->where('permisos_usuarios.status', true)
			->orderBy('permisos_usuarios.proceso', 'ASC')
			->get()->toArray();

		/*
			        //dd($permisos);
		*/
		return response()->json($permisos);

	}

	public function getProcesos($id_user) {
		$permisos = PermisosUsuarios::select('permisos_usuarios.seccion', 'permisos_usuarios.proceso',
			'cat_procesos.descripcion', 'permisos_usuarios.id', 'cat_procesos.ruta',
			'cat_seccion.descripcion as descSec', 'permisos_usuarios.status')
			->join('cat_procesos', 'cat_procesos.proceso', '=', 'permisos_usuarios.proceso')
			->join('cat_seccion', 'cat_seccion.id_seccion', '=', 'permisos_usuarios.seccion')

			->where('permisos_usuarios.user_id', $id_user)
			->orderBy('permisos_usuarios.proceso', 'ASC')
			->get()->toArray();

		return response()->json($permisos);
	}

	public function addProcess(Request $request) {

		$todos = PermisosUsuarios::select('status')->where('user_id', '=', $request->id_user);
		//dd($permisos);
		$todos->update(['status' => false]);

		$permisos = $request->permisos;
		//dd($permisos);
		if ($permisos != '') {
			foreach ($permisos as $item) {
				//dd('11');
				//$item);
				$usersPer = PermisosUsuarios::where('id', '=', $item)->first();
				$usersPer->update(['status' => true]);
			}

		}

		return response()->json("Permisos Agregados");
	}

	public function deletePermission($idPermiso) {

		$registro = PermisosUsuarios::where('id', '=', $idPermiso)->first();
		$registro->delete();

		return response()->json("Permisos eliminado");
	}

}

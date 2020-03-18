<?php 
namespace App\Http\Controllers;
//Haciendo Uso de Modelos
use App\Almacenes;
use App\CambsTotal;
use App\CatProveedores;
use App\Cotizaciones;
use App\CotizacionesBienes;
use App\FoliosDepen;
use App\ParPreTotal;
use App\Requisiciones;
use App\RequisicionesBienes;
use App\Sellos;
use App\UnidadMedida;
use App\Usuarios;
use Auth;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Mail;
use Session;

class NewRequisicionesController extends Controller {

	public function captureReq() {
		//$sesDep = Session::get('depD');
		$sesDep = 60;//Session::get('depD');
		//$cabmsGRP = CambsTotal::select('cabms','descripcion')
		//->orderBy('descripcion', 'asc')->get()->toArray();

		$unidadM = UnidadMedida::select('id', 'descripcion')
			->orderBy('descripcion', 'asc')->get()->toArray();

		$almacenes = Almacenes::select('id', 'calle', 'colonia')
			->where('dependencia', $sesDep)
			->orderBy('calle', 'asc')
		//->groupBy('id','calle', 'colonia')
			->get()->toArray();
		//dd($almacenes);
		return view('requisiciones/createReq', ['unidadM' => $unidadM, 'almacenes' => $almacenes]);
	}

		public function storeRequisicion(Request $request) {
		//dd($request);
		$areaSS = 101;//Session::get('areaSS'); //Obtener id Area
		$sesDep = 60;//Session::get('depD'); //Obtener id Dependencia
		if ($request->id_folio == 0) {
			//dd("edfsadsad");
				$noFol = FoliosDepen::select('folio_req')->where('clave_num', $sesDep)
					->get()->toArray();
				$userId = auth()->user();
				//dd($noFol[0]['folio_req']);

				if ($request->tipo_req == 1) {
				$lugarEntrega = $request->almacen;
			} else {
				$lugarEntrega = $request->lugar_entrega;
			}
			$reqNew = new Requisiciones;
			$reqNew->dependencia = $sesDep;
			$reqNew->fecha_elabora = Carbon::now();
			$reqNew->fecha_requiere = $request->fecha_requiere;
			$reqNew->status_req = 0;
			$reqNew->no_requisicion = $noFol[0]['folio_req'] + 1;
			$reqNew->usr_solicita = $userId->id;
			$reqNew->tipo_req = $request->tipo_req;
			$reqNew->par_pre = $request->par_pre;
			$reqNew->observaciones = $request->observaciones;
			$reqNew->lugar_entrega = $lugarEntrega;
      		$reqNew->monto_estimado = $request->monto_estimado;
			$reqNew->adjunto = 0;
			$reqNew->status = 1;
			$reqNew->save();

			$folRequest = $noFol[0]['folio_req'] + 1;
			$folDepen = FoliosDepen::where('folio_req', '=', $noFol[0]['folio_req'])
				->where('clave_num', $sesDep)->first();
			//dd($folDepen);
			$noFolMas = $noFol[0]['folio_req'] + 1;
			$folDepen->update(['folio_req' => $noFolMas]);
		}
		else
		{
			$folRequest= $request->id_folio;
		}

		return response()->json($folRequest);

	}

	public function getParPreTotal(Request $request) {
		if ($request->tipo_req == 1) {
			$bienes1 = '2';
			$bienes2 = '5';
		} elseif ($request->tipo_req == 2) {
			$bienes1 = '1';
			$bienes2 = '3';
		} elseif ($request->tipo_req == 3) {
			$bienes1 = '3';
			$bienes2 = '0';
		}

		$par_preTot = ParPreTotal::select('par_pre', 'descripcion')
		//->whereRaw('capitulo',[$bienes1])
			->whereIn('capitulo', [$bienes1, $bienes2])
			->orderBy('descripcion', 'asc')->get()->toArray();
		//dd($par_preTot);
		return response()->json($par_preTot);
	}

	public function getUnidadTodos(Request $request) {

		//dd("few");
		if ($request->paramTipo > 1) {
			if ($request->paramTipo == 2) {$ff = 91;} elseif ($request->paramTipo == 3) {$ff = 92;}
			$campo = "id";
			$operador = "=";
			$filtro = $ff;
		} else {
			$campo = "id";
			$operador = "<";
			$filtro = 90;
		}

		$Unidad = UnidadMedida::select('descripcion', 'id')
			->where($campo, $operador, $filtro)
			->get()->toArray();
		return response()->json($Unidad);
	}

	public function getCabmsTotal(Request $request) {

		$cabmsGRP = CambsTotal::select('cabms', 'descripcion')
			->where('par_pre', $request->par_pre)
		//->whereIn('capitulo', [$bienes1, $bienes2])
			->orderBy('descripcion', 'asc')->get()->toArray();

		return response()->json($cabmsGRP);
	}

	public function getMyReqFol(Request $request) {

		$userId = auth()->user();
		//dd($userId);
		if ($request->user == "autoriza") {
			$campo = "solicitudes.status";
			$oper = "=";
			$filtro = true;
		} elseif ($request->user == "entrega") {
			$campo = "id_userautoriza";
			$oper = ">=";
			$filtro = 1;
		} else {
			$campo = "usr_solicita";
			$oper = "=";
			$filtro = $userId->id;

		}
		//     dd($filtro);
		//    dd($request);

		$myReg = Requisiciones::orderBy('no_requisicion', 'DESC')
		->join('users', 'requisiciones_new.usr_solicita', '=', 'users.id')
		->where($campo, $oper, $filtro)
		->where('requisiciones_new.status_req', 0)
		->get()->toArray();
		//dd($myReg);
		return response()->json($myReg);
	}

		public function storeRequisicionBienes(Request $request) {

		$sesDep = 60;//Session::get('depD'); //Obtener id Dependencia
		//dd($request);
		$nroEmp = $request->cabms_grp;
		$dato = explode("|", $nroEmp);
		//dd($request->no_requisicion);
		$BienesNewsol = new RequisicionesBienes;
		$BienesNewsol->dependencia = $sesDep;
		$BienesNewsol->no_requisicion = $request->no_requisicion;
		$BienesNewsol->id_cabmsgrp = $dato[0];
		$BienesNewsol->cantidad = $request->cantidad;
		$BienesNewsol->status = 1;
		$BienesNewsol->unidad = $request->u_medida;
		$BienesNewsol->save();

		return response()->json("OK");
	}
		public function getMyReqAlm(Request $request) {

		//->rightjoin('existencias','cat_cabmsgrp.clave_grp','=','existencias.id_cabmsgrp')
		$userId = auth()->user();
		$myReg = Requisiciones::select('requisiciones_bienes.id as idSolBien', 'requisiciones_bienes.id_cabmsgrp', 'cantidad', 'cat_cabmstotal.descripcion', 'cat_unidadalm.descripcion as descUnidad', 'fecha_requiere')
			->join('requisiciones_bienes', 'requisiciones_new.no_requisicion', '=', 'requisiciones_bienes.no_requisicion')
			->join('cat_cabmstotal', 'requisiciones_bienes.id_cabmsgrp', '=', 'cat_cabmstotal.cabms')
			->leftjoin('cat_unidadalm', 'cat_unidadalm.id', '=', 'requisiciones_bienes.unidad')
			->where('requisiciones_new.status', true)
			->where('requisiciones_bienes.no_requisicion', $request->folio)
			->orderBy('requisiciones_new.id', 'asc')->get()->toArray();

		return response()->json($myReg);
	}

}

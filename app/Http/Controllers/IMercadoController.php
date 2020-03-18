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
use App\SondeoBienes;
use App\SondeoServicios;
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

class IMercadoController extends Controller {
	
	/*public function captureReq()
	  {
	    return view('iMercado/createReq');
	  }*/

	public function tabsIMercado() {

		return view('iMercado.iMercadoTabs');
	}

	public function storeSondeoBienes(Request $request) {
		//dd($request);
		$areaSS = Session::get('areaSS'); //Obtener id Area
		$sesDep = Session::get('depD'); //Obtener id Dependencia
		//dd($request->all());
			$SBienes = SondeoBienes::create($request->all());
		return response()->json("OK");

	}


	public function storeSondeoServicios(Request $request) {
		//dd($request);
		$areaSS = Session::get('areaSS'); //Obtener id Area
		$sesDep = Session::get('depD'); //Obtener id Dependencia
		//dd($request->all());
			$SBienes = SondeoServicios::create($request->all());
		return response()->json("OK");

	}

	public function cart() {
		
		return view('iMercado.cart');

	}
}

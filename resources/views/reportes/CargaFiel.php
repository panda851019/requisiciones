<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CargaFiel extends Controller {
	public function index() {
		$acepto = DB::table('users')->where(['nombre' => Auth::user()->nombre])->update(['acepto' => true]);
		//dd($acepto);
		return view('carga_fiel.index');
	}

	public function store(Request $request) {

		$data = $request->except('_token');
		$rules = [
			'cer' => 'required',
			'key' => 'required',
			'password' => 'required',
		];
		$messages = [
			'required' => 'Campo obligatorio.',
		];
		$vData = Validator::make($data, $rules, $messages);
		if ($vData->fails()) {
			return redirect()->back()->withErrors($vData)->withInput();
		}

		$value = [
			'security' => [
				'tokenId' => 'FPRUPRUEBA',

			],
			'data' => [
				'cadena' => " ",
				'password' => base64_encode($request->password),
				'byteKey' => base64_encode(\File::get($request->key->path())),
				'bytecer' => base64_encode(\File::get($request->cer->path())),
			],
		];
		//dd(get_object_vars(Mule::callApi()));
		$response = Mule::callApi('POST', '/eFirma/validarCertificado', '9005', $value);
		//dd($response);
		$nombre_fiel = $response['data']['nombreCompleto'];

		if ($response['error']['code'] == 0) {
			Session::put('datasign', $value);
			Session::put('nombre', $nombre_fiel);
			return redirect()->back()->with('msg', $response['error']['msg'] . ' Recuerda que podras disponer de tu firma hasta que cierres tu sesion.');
		} else {
			return redirect()->back()->with('error', $response['error']['msg']);
		}

	}
}

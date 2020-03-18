<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Controllers\eFirma;
use Session;

class eFirma extends Controller {

	public function eFirmaLogin($data) {

		//dd($data);

		$key = base64_encode($data['key']);

		$cer = base64_encode($data['cer']);

		$password = base64_encode($data['password']);

		//$tokenId = strtoupper('fVEHdgtce0TVfBjESXsBtlvPGEUQ');

		$tokenId = strtoupper('FPRUPRUEBA');
		//dd($key, $cer, $password);

		$data = "{\r\n  \"security\":\r\n  {\r\n    \"tokenId\":\"" . $tokenId . "\"\r\n  },\r\n  \"data\":\r\n  {\r\n    \"password\":\"" . $password . "\",\r\n    \"cadena\":\"" . '||Valida e.Firma||' . "\",\r\n    \"byteKey\":\"" . $key . "\",\r\n    \"bytecer\":\"" . $cer . "\"\r\n  }\r\n}";

		//dd($data);

		$curl = curl_init();

		#Los campos editables solo son: CURLOPT_PORT, CURLOPT_URL y CURLOPT_CUSTOMREQUEST.

		curl_setopt_array($curl, array(

			CURLOPT_PORT => "9005",

			CURLOPT_URL => "10.1.181.25/eFirma/validarCertificado",
			//CURLOPT_URL => "http://10.1.181.25/eFirma/validarCertificado",

			CURLOPT_RETURNTRANSFER => true,

			CURLOPT_ENCODING => "",

			CURLOPT_MAXREDIRS => 10,

			CURLOPT_TIMEOUT => 30,

			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,

			CURLOPT_CUSTOMREQUEST => "POST",

			CURLOPT_POSTFIELDS => $data,

			CURLOPT_HTTPHEADER => array(

				"Content-Type: application/json; charset=utf-8",

				"Accept:application/json, text/javascript, */*; q=0.01"),

		));

		//dd($curl);

		#Se cacha la respuesta y el error si es que existiera en cuestiones de conectividad

		$response = curl_exec($curl);
		//dd($response);
		$err = curl_error($curl);
		//$response = true;
		// dd($response);

		#Se cierra el recurso cURL y se liberan recursos del sistema.

		curl_close($curl);

		#Validación de errores

		if ($err) {

			return false;

		} else {

			$key = Session()->get('key');
			$cer = Session()->get('cer');
			$password = Session()->get('password');
			//dd(json_decode($response));
			return json_decode($response);

		}

	}

	public function eFirmaAvanzada($data) {

		$key = Session()->get('key');

		$cer = Session()->get('cer');

		$password = Session()->get('password');

		//$tokenId = strtoupper('fSISdgtcw1vMVLs0QCmYntZz3Dno');

		$tokenId = strtoupper('FPRUPRUEBA');

		$data = "{\r\n  \"security\":\r\n  {\r\n    \"tokenId\":\"" . $tokenId . "\"\r\n  },\r\n  \"data\":\r\n  {\r\n    \"password\":\"" . $password . "\",\r\n    \"cadena\":\"" . base64_encode($data . '||') . "\",\r\n    \"byteKey\":\"" . $key . "\",\r\n    \"bytecer\":\"" . $cer . "\"\r\n  }\r\n}";

		//dd($data);

		$curl = curl_init();

		#Los campos editables solo son: CURLOPT_PORT, CURLOPT_URL y CURLOPT_CUSTOMREQUEST.

		curl_setopt_array($curl, array(

			CURLOPT_PORT => "9005",

			CURLOPT_URL => "10.1.181.25/eFirma/firmaCadena",

			CURLOPT_RETURNTRANSFER => true,

			CURLOPT_ENCODING => "",

			CURLOPT_MAXREDIRS => 10,

			CURLOPT_TIMEOUT => 30,

			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,

			CURLOPT_CUSTOMREQUEST => "POST",

			CURLOPT_POSTFIELDS => $data,

			CURLOPT_HTTPHEADER => array(

				"Content-Type: application/json; charset=utf-8",

				"Accept:application/json, text/javascript, */*; q=0.01"),

		));

		#Se cacha la respuesta y el error si es que existiera en cuestiones de conectividad

		$response = curl_exec($curl);
		//dd($response);
		$err = curl_error($curl);

		#Se cierra el recurso cURL y se liberan recursos del sistema.

		curl_close($curl);

		#Validación de errores

		if ($err) {

			return false;

		} else {

			return json_decode($response);

		}

	}

}

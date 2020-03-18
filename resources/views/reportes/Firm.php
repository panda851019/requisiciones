<?php

namespace App\Http\Controllers;

use App\Cargar;
use App\Efirma;
use App\Organigrama;
use Response;
//use App\Http\Controllers\pcntl_fork;



use App\user_ch;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade as PDF;
//use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class Firm extends Controller
{

    public function index()
    {
        $contactos = user_ch::where('active', true)->toArray();
        return view('bulk_load.index', ['contactos' => $contactos]);
    }


    #crea PDF
    public function signedNew(Request $request){


        if(isset($_POST['pdf'])) {

        if ($request['check1'] != null) {
            $copias = "'" . implode("','", $request['ccp']) . "'";
        }


        $check1 = $request['check1'];
        $check2 = $request['check2'];

        $data = $request->input();
        $array = array(
            'fecha' => $data['fecha'],
            'no_folio' => strtoupper($data['no_folio']),
            'editor1' => $data['editor1'],
            'editor2' => $data['editor2'],
        );

        $destinatario = $request['destinatario'];

        if ($request['check3'] != null) {
            $destinatario = strtoupper($request['otro_destinatario']);
        }



        if (!\Session::has('datasign')) {


            return redirect()->back()->with('error', 'Firma no cargada!!!')->withInput();
        }

        $cadena = implode('|', str_replace('"', '', $array));
        $param = [
            'security' => [
                'tokenId' => 'SDDGTCDRCD05LTMGOQIGXKYSU3'
            ],
            'data' => [
                'password' => \Session::get('datasign.data.password'),
                'cadena' => substr_replace($cadena . '||', '||', 0, 0),                
                'byteKey' => \Session::get('datasign.data.byteKey'),
                'bytecer' => \Session::get('datasign.data.bytecer')
            ]
        ];

        $sign = Mule::callApi('POST', '/eFirma/firmaCadena', '9005', $param);
		dd($sign);
        setlocale(LC_ALL, 'es_ES', 'esp_esp', 'Spanish_Spain', 'Spanish', 'es_MX.UTF-8', 'es_MX');
        $data['fecha'] = Carbon::now();
        $nombre = $sign['data']['nombreCompleto'];
        $nombre = 'GUILLERMO NATIVIDAD FLORES GARDUÑO';
        //dd($nombre);
        $folio_consulta = $sign['data']['folioConsulta'];
        $nombre_dividido = explode(" ", $nombre);
        $count_nombre = count($nombre_dividido);
        $nombre_login = Auth::user()->nombre;
        $nombre_login_dividido = explode(" ", $nombre_login);
        $count_login = count($nombre_login_dividido);
        $no_folio_dividido = explode("/", $data['no_folio']);
        $count_no_folio_dividido = count($no_folio_dividido);
        $qr = $data['qr'] = url('/') . '/validate_signed/' . base64_encode($folio_consulta);


        $prueba = true;


        $contactos = user_ch::where('nombre', '=', $request['destinatario'])->get()->toArray();

        if ($request['check3'] != null) {
            $puesto = strtoupper($request['otro_cargo']);
            $titulo_des = 'C.';
        } else {
            foreach ($contactos as $contacto)
                $puesto = $contacto['cargo'];
            $titulo_des = $contacto['titulo'];
        }

        if(($request['check1'])!=null) {
            $ccp = $data['ccp'];
            $count_ccp = count($ccp);
        }else{
            $ccp = null;
            $count_ccp = null;
        }

        $consulta = user_ch::where('nombre', '=', $nombre)->get()->toArray();
            //dd($consulta);
        foreach ($consulta as $value)
            $puesto_remitente = $value['cargo'];
        $unidad_administrativa = $value ['area_adscripcion'];
        $direccion = ($value['calle'] . ' ' . $value['num_exterior'] . ', ' . $value['num_interior'] . ', Col.' . $value['colonia'] . ', Alc.' . $value['alcaldia'] . ', ' . $value['estado'] . ', CP.' . $value['codigo_postal'] . '. Tel: ' . $value['telefono'] . ' Ext. ' . $value['extension'] . ', E-mail: ' . $value['correo']);
        $titulo_rem = $value['titulo'];
        $nombre_fiel = \Session::get('nombre');
        $namePathsigned = strtoupper($nombre_fiel . '/' . $data['no_folio']) . '.pdf';
        $folio = strtoupper($data['no_folio']);
        $fecha = $request['fecha'];
        $editor1 = $data['editor1'];
        $editor2 = $data['editor2'];
        $remitente = $sign['data']['nombreCompleto'];
        $ruta = $namePathsigned;
        $folio_consulta = $sign['data']['folioConsulta'];
        $cadena_original = $sign['data']['cadenaOriginal'];
        $fecha_firmado = $sign['data']['fechaFirma'];
        $sello = $sign['data']['sello'];



            $dependo =DB::table('organigrama')->where('cargo', 'ILIKE', strtoupper('%'. $puesto_remitente.'%'))->get()->toArray();
            //dd($dependo);

            if($dependo[0]->depende >= 1 ) {
                $depende = DB::table('organigrama')->where('id', '=', $dependo[0]->depende)->get()->toArray();
                if ($depende[0]->depende >= 1 ){
                    $depende2 = DB::table('organigrama')->where('id', '=', $depende[0]->depende)->get()->toArray();
                    if ($depende2[0]->depende >= 1 ){
                        $depende3 = DB::table('organigrama')->where('id', '=', $depende2[0]->depende)->get()->toArray();
                        if ($depende3[0]->depende >=1 ) {
                            $depende4 = DB::table('organigrama')->where('id', '=', $depende3[0]->depende)->get()->toArray();
                            if ($depende4[0]->depende >= 1) {
                                $depende5 = DB::table('organigrama')->where('id', '=', $depende4[0]->depende)->get()->toArray();
                            }else{
                            	$depende5= null;
                            }
                        }else{
                            $depende4= null;
                            }
                    }else{
                        $depende3= null;
                            }

                }else{
                 	$depende2= null;
                            }
            }else{
                $depende= null;
            }

            $qr = $data['qr'] = url('/') . '/validate_signed/' . base64_encode($folio_consulta);
        if ($request['check1'] != null) {
            $data = array('folio' => $folio, "fecha" => $fecha, "destinatario" => $destinatario, "copias" => $copias, "editor1" => $editor1, "editor2" => $editor2, "remitente" => $remitente, "ruta" => $ruta, "folio_consulta" => $folio_consulta, "cadena_original" => $cadena_original, "fecha_firmado" => $fecha_firmado, "sello" => $sello);
        } else {
            $data = array('folio' => $folio, "fecha" => $fecha, "destinatario" => $destinatario, "editor1" => $editor1, "editor2" => $editor2, "remitente" => $remitente, "ruta" => $ruta, "folio_consulta" => $folio_consulta, "cadena_original" => $cadena_original, "fecha_firmado" => $fecha_firmado, "sello" => $sello);
        }


        $existe = DB::table('documentos')->where('folio', '=', $folio)->exists();



        if ($existe == true) {

            if ($request['check1'] != null) {
                DB::table('documentos')->where('folio', '=', $folio)->update(["fecha" => $fecha, "destinatario" => $destinatario, "copias" => $copias, "editor1" => $editor1, "editor2" => $editor2, "remitente" => $remitente, "ruta" => $ruta, "folio_consulta" => $folio_consulta, "cadena_original" => $cadena_original, "fecha_firmado" => $fecha_firmado, "sello" => $sello]);

            }
            DB::table('documentos')->where('folio', '=', $folio)->update(["fecha" => $fecha, "destinatario" => $destinatario, "editor1" => $editor1, "editor2" => $editor2, "remitente" => $remitente, "ruta" => $ruta, "folio_consulta" => $folio_consulta, "cadena_original" => $cadena_original, "fecha_firmado" => $fecha_firmado, "sello" => $sello]);
        } else {

            DB::table('documentos')->insert($data);
        }


        if ($sign['error']['code'] != 0) {
            return redirect()->back()->withInput()->with('error', $sign['error']['msg'] . ' , verifica que tu certificado y contraseña sean validos.');
        }

        if ($prueba == true) {
            $pdf = PDF::loadView('pdf_saf.form_saf_signed', compact("array", "sign", "destinatario", "nombre_dividido", "count_nombre", "nombre_login_dividido", "count_login", "no_folio_dividido", "count_no_folio_dividido", "ccp", "count_ccp", "puesto", "check1", "check2", "puesto_remitente", "unidad_administrativa", "direccion", "titulo_des", "titulo_rem", "qr", "folio_consulta","dependo","depende", "depende2","depende3","depende4","depende5"))->setPaper('letter', 'portrait')->setWarnings(false)->stream();
            $b64Doc = chunk_split(base64_encode($pdf));
            //dd($b64Doc);
            DB::table('documentos')->where('folio', '=', $folio)->update(["b64doc" => $b64Doc]);
            return $pdf;
        }

    }else{

        if($request['check1'] != null){
            $copias = "'" . implode("','", $request['ccp']) . "'";
        }

        $check1 = $request['check1'];
        $check2 = $request['check2'];

        $data = $request->input();
        $array = array(
            'fecha'=> $data['fecha'],
            'no_folio'=> strtoupper($data['no_folio']),

            'editor1'=> $data['editor1'],
            'editor2'=> $data['editor2'],
        );

        $destinatario = $request['destinatario'];

        if($request['check3'] != null){
            $destinatario = strtoupper($request['otro_destinatario']);
        }


        if (!\Session::has('datasign')) {

            return redirect()->back()->with('error', 'Firma no cargada!!!')->withInput();
        }


        setlocale(LC_ALL, 'es_ES', 'esp_esp', 'Spanish_Spain', 'Spanish', 'es_MX.UTF-8', 'es_MX');
        $data['fecha'] = Carbon::now();
        $nombre= 'NOMBRE DE LA PERSONA QUE FIRMA';

        $nombre_dividido= explode (" ", $nombre);
        $count_nombre = count($nombre_dividido);
        $nombre_login = Auth::user()->nombre;
        $nombre_login_dividido = explode (" ", $nombre_login);
        $count_login = count($nombre_login_dividido);
        $no_folio_dividido = explode ("/", $data['no_folio']);
        $count_no_folio_dividido = count($no_folio_dividido);

        $prueba = true;

        $contactos = user_ch::where('nombre', '=',$request['destinatario'])->get()->toArray();

        if($request['check3'] != null){
            $puesto = strtoupper($request['otro_cargo']);
            $titulo_des = 'C.';
        }else {
            foreach ($contactos as $contacto)
                $puesto = $contacto['cargo'];
            $titulo_des = $contacto['titulo'];
        }

        if(($request['check1'])!=null) {
            $ccp = $data['ccp'];
            $count_ccp = count($ccp);
        }else{
            $ccp = null;
            $count_ccp = null;
        }


        $puesto_remitente = 'PUESTO DE LA PERSONA QUE REMITE EL DOCUMENTO';
        $unidad_administrativa = 'SECRETARIA DE FINANZAS DEPENDIENDO DE SU UNIDAD ADMINISTRATIVA';
        $direccion = 'Dr. Lavista 144 sotano, Alc. Cuahutemoc, Ciudad de Mexico, Tel. 5555555555 Ext.111 Email. ejemplo@ejemplo.com';
        $titulo_rem = 'C.';

        $folio = strtoupper($data['no_folio']);
        $fecha = $request['fecha'];

        $editor1 = $data['editor1'];
        $editor2 = $data['editor2'];
        $remitente = 'NOMBRE DE LA PERSONA QUE FIRMA';
        //$ruta = $namePathsigned;
        $folio_consulta = '101010101010101010';
        $cadena_original = '';
        $fecha_firmado =  '2019-08-28T16:23:30-05:00';
        $sello =  'Ejemplo:         GqDiRrea6 E2wQhqOCVzwME4866yVEME/8PD1S1g6AV48D8Vra61g6AV48D8VrLhKUDq0Sjqnp9IwfMAbX0ggwUCLRKa Hg5q8aYhya63If2HVqH1sA08poer080P1J6Z BwTrQkhcb5Jw8jENXoErkFE8qdOcIdFFAuZPVTGqDiRrea61g6AV48D8VrLhKUDq0Sjqnp9IwfMAbX0ggwUCLRKa Hg5q8aYhya63If2HVqH1sA08poer080P1J6Z BwTrQkhcb5Jw8jENXoErkFE8qdOcIdFFAuZPVTGqDiRrea6 E2wQhqOCVzwME4866yVEME/8PD1S1g6AV48D8VrLhKUDq0Sjqnp9IwfMAbX0ggwUCLRKa Hg5q8aYhya63If2HVqH1sA08poer080P1J6Z BwTrQkhcb5Jw8jENXoErkFE8qdOcIdFFAuZPVTGqDiRrea6 E2wQhqOCVzwME4866yVEME/8PD1S1g6AV48D8VrLhKUDq0Sjqnp9IwfMAbX0ggwUCLRKa Hg5q8aYhya63If2HVqH1sA08poer080P1J6Z BwTrQkhcb5Jw8jENXoErkFE8qdOcIdFFAuZPVT 9mkTb0Xn5Emu5U8=';
        $qr = $data['qr'] = url('/') . '/validate_signed/' . base64_encode($folio_consulta);

        if($request['check1'] != null) {
            $data = array('folio' => $folio, "fecha" => $fecha, "destinatario" => $destinatario, "copias" => $copias, "editor1" => $editor1, "editor2" => $editor2, "remitente" => $remitente, "folio_consulta" => $folio_consulta, "cadena_original" => $cadena_original, "fecha_firmado" => $fecha_firmado, "sello" => $sello);
        }else{
            $data = array('folio' => $folio, "fecha" => $fecha, "destinatario" => $destinatario, "editor1" => $editor1, "editor2" => $editor2, "remitente" => $remitente, "folio_consulta" => $folio_consulta, "cadena_original" => $cadena_original, "fecha_firmado" => $fecha_firmado, "sello" => $sello);
        }

        if($prueba==true){
            $pdf = PDF::loadView('pdf_saf.form_saf', compact("array",  "nombre", "puesto_remitente", "unidad_administrativa", "direccion", "titulo_rem", "folio", "fecha", "editor1", "editor2", "remitente", "folio_consulta", "cadena_original", "sello", "destinatario", "nombre_dividido", "count_nombre" , "nombre_login_dividido" , "count_login", "no_folio_dividido","count_no_folio_dividido", "ccp", "count_ccp", "puesto", "check1","check2","puesto_remitente", "unidad_administrativa","direccion", "titulo_des","titulo_rem", "qr","folio_consulta"))->setPaper('letter', 'portrait')->setWarnings(false)->stream();
            $b64Doc = chunk_split(base64_encode($pdf));
            DB::table('documentos')->where('folio', '=', $folio)->update(["b64doc" => $b64Doc]);
            return $pdf;
        }

    }

    }

    #Enlistar documentos firmados

    public function getAllDataWhithSign()
    {

        $nombre_fiel = \Session::get('nombre');
        $data = DB::table('documentos')->where('remitente','=',$nombre_fiel)->orderBy('fecha', 'des')->paginate(20);
        return view('signed_only_one.get_all_data_withsign',array('datos' => $data),compact("nombre_fiel"));

    }

    public function getSignedPdf($path)
    {
        return view('pdf_saf.get_pdf_signed', ['pdfSigned' => base64_encode(Storage::get(base64_decode($path)))]);
    }





}
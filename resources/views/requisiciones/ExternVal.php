<?php

namespace App\Http\Controllers;

use App\Efirma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ExternVal extends Controller
{
    public function index()
    {
        return view('check_signed_data.extern');
    }

    public function valid(Request $request)
        {
        $rules = [
            'folio_consulta' => 'required'
        ];
        $messages = [
            'folio_consulta.required' => 'campo obligatorio'
        ];
        $vData = Validator::make($request->all(), $rules, $messages);
        if ($vData->fails())
        {
            return redirect()->back()->withErrors($vData)->withInput();
        }
        $folio_mayuscula = strtoupper ($request->folio_consulta);

        $param = [
            'security' => [
                'tokenId' => 'FEMUDGTCMNBOKZBSXB8VOID8KZX1'
            ],
            'data'=> [
                'folioConsulta'=> $folio_mayuscula
            ]

        ];
        $sign = Mule::callApi('POST', '/eFirma/consultaFirmaCadena', '9005', $param);
//dd($sign);

        if ($sign['error']['code'] != 0) {
            return redirect()->back()->with('error', 'Folio no encontrado');
        }
            return view('check_signed_data.index', ['datos' => $sign]);
    }


    public function validLink($folio)
    {
        /*$data = Efirma::where(['folio_consulta' => str_replace(' ', '', base64_decode($folio)), 'active' => true, 'signed' => true])->get();
        return view('check_signed_data.extern', ['datos' => $data]);
    }*/

//dd($folio);
        $folio_mayuscula = strtoupper ($folio);

                $param = [
                    'security' => [
                        'tokenId' => 'FEFIDGTCYPID32PUMX6SZSZDUX6A'
                    ],
                    'data'=> [
                        'folioConsulta'=> str_replace(' ', '', base64_decode($folio))
                    ]

                ];
                $sign = Mule::callApi('POST', '/eFirma/consultaFirmaCadena', '9005', $param);
        //dd($sign);

                if ($sign['error']['code'] != 0) {
                    return redirect()->back()->with('error', 'Folio no encontrado');
                }
                    return view('check_signed_data.extern', ['datos' => $sign]);
            }




}

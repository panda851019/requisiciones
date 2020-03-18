<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta charset="UTF-8">
        <title></title>
        <style>
            @page {
                margin: 0cm 0cm;
            }
            body{
                font-family: Arial, Helvetica, sans-serif;
                margin-top: 120px;
                margin-left: 25px;
                margin-right: 25px;
                margin-bottom: 25px;
                /*background: #0c2702;*/
            }
            header {
                position: fixed;
                top: 0cm;
                left: 0cm;
                right: 0cm;
                height: 70px;

                /** Extra personal styles **/
                /*background-color: #333;*/
                color: #333333;
                vertical-align: middle;
                /*color: #fff5f7;*/
            }
            /*table.sec_table, th, td{*/
                /*border: 1px solid black;*/
            /*}*/
            table.blueTable {
                width: 100%;
                border-collapse: collapse;
                padding-top: 4px;
            }
            table.blueTable td, table.blueTable th {
                border: 1px solid #7F7F7F;
            }
            table.blueTable tbody td {
                font-size: 10px;
                color: #333333;
                text-align: justify;
                padding: 0 7px;
            }
            table.blueTable tr:nth-child(even) {
                background: #EFEFEF;
            }
            table.blueTable thead {
                background: #898989;
                background: -moz-linear-gradient(top, #a6a6a6 0%, #949494 66%, #898989 100%);
                background: -webkit-linear-gradient(top, #a6a6a6 0%, #949494 66%, #898989 100%);
                background: linear-gradient(to bottom, #a6a6a6 0%, #949494 66%, #898989 100%);
            }
            table.blueTable thead th {
                font-size: 11px;
                font-weight: bold;
                color: #000000;
                text-align: center;
            }
            footer { width: 100%; height: 100px; position: absolute; bottom: 20px; text-align: center; font-size: 10px;}
        </style>

    </head>
    <body>
    <header>
        <table width="100%">
            <tbody>
            <tr>
                <td rowspan="1" width="100%">
                    <p style="text-align: center;margin: 0px;font-size: 18px; margin-top: 60px;"><strong>PRE-COTIZACIÓN.<br> 
                    @if($data2[0]['modulo'] == 4 && $data2[0]['nivel'] == 3)
                    PROVEEDOR SIN CONSTANCIA DE REGISTRO.
                    @endif
                </strong></p>
                    <p style="text-align: center;margin: 0px;font-size: 18px;"><strong>No. {{$data[0]->folio_cot}}</strong></p>
                </td>
                
            </tr>

            </tbody>
        </table>
    </header>
    <main>

        
        <table width="100%">
            <tbody>
            <tr>
                <td rowspan="1" width="100%">
                    <p style="text-align: right;margin: 0px;font-size: 12px; "><strong>Ciudad de México a, {{$fecha}}.</strong></p><br>

                </td>
                
            </tr>
                    <tr>
                <td rowspan="1" width="100%">
                    <p style="text-align: left;margin: 0px;font-size: 12px; "><strong>P R E S E N T E:</strong></p>
                    <p style="text-align: left;margin: 0px;font-size: 12px; "><strong>C. XIMENA JACINTA GARCÍA RAMÍREZ</strong></p>
                    <p style="text-align: left;margin: 0px;font-size: 12px; "><strong>FOLIO CONSULTA:</strong> {{$folio_consulta}}</p><br>                   
                    <p style="font-size: 12px; text-align: justify; margin:5px">En atención a la requisicion(es) del Area de Adquisiciones de la <strong>Secretaria de Administración y Finanzas del Gobierno de la Ciudad de México</strong>, envio la cotización una vez revisadas nuestras existencias de los productos, bienes y/o servicios solicitados, les envío la siguiente información:</p>
                </td>
                
            </tr>

            </tbody>
        </table>

        <table width="100%" class="blueTable">
            <tr>
            <td width="15%"><strong><center>ID</strong></td>
            <td width="15%"><strong><center>CANTIDAD</strong></td>
            <td width="40%"><strong><center>DESCRIPCION DE LOS BIENES, SERVICIOS, O ARRENDAMIENTOS</strong></td>
            <td width="15%"><strong><center>PRECIO UNITARIO</strong></td>
            <td width="15%"><strong><center>PRECIO</strong></td>




          </tr>
        @foreach ($data as $dato)
         <tr width="100%">
            <td><center>{{@$dato->id_bienreq}}</td>
            <td><center>{{@$dato->cantidad}}</td>
            <td><center>{{@$dato->descripcion}}</td>
            <td style="text-align: right">{{money_format('%.2n',@$dato->precio_unit)}}</td>
            <td style="text-align: right">{{(money_format('%.2n',(@$dato->precio_unit)*(@$dato->cantidad)))}}</td>
        </tr>
        @endforeach


        <tr colspan="4" width="100%">

            <td rowspan="3"><center></center></td>
            <td rowspan="3"><center></center></td>
            <td rowspan="3"><center></center></td>
            <td style="text-align: right"><strong>SUBTOTAL</strong></td>
            <td style="text-align: right">{{(money_format('%.2n',$data[0]->subtotal))}}</td>



          </tr>
        <tr colspan="4" width="100%">

            <td style="text-align: right"><strong>IVA 16%</strong></td>
            <td style="text-align: right">{{(money_format('%.2n',$data[0]->iva))}}</td>


          </tr>
            <tr colspan="4" width="100%">


            <td style="text-align: right"><strong>TOTAL</strong></td>
            <td style="text-align: right"><strong>{{(money_format('%.2n',$data[0]->total))}}</strong></td>


          </tr>
           
          
        </table>
        <br>
        <table>
            <tr>
                <td rowspan="1" width="100%">
                <p style="font-size: 12px; text-align: justify; margin:5px">Estos precios estaran vigentes hasta el día <strong>{{$vigencia}}</strong> teniendo un plazo de entrega como maximo el día <strong>{{$plazo_entrega}}</strong> con garantia de <strong>{{$data[0]->garantia}}</strong> a partir de la entrega.</p>

            </td>
            </tr>
        </table>
        
    <!--<p style="font-size: 10px;" >{{$folio_consulta}}<br>{{$qr}}</p>-->
        <table width="100%">
             <tr>
                    <td width="15%">
                        <img src="data:image/png;base64, {!! base64_encode(\QrCode::format('png')->margin(0)->size(110)->generate($qr = url('http://qr-folioconsulta.finanzas.cdmx.gob.mx/efirma/public/index.php') . '/validate_signed/' . base64_encode($folio_consulta))) !!}" style="position: relative;display: block; alignment: center ">
                    </td>
                    <td width="75%">
                    <p style="font-size: 12px;font-weight: bold; letter-spacing: 2px; text-transform: uppercase; text-align: center">atentamente<br>{{$data[0]->repre_legal}} <br>REPRESENTANTE LEGAL DE<br>{{$nombre_completo}}</p><p style="font-size: 7px; text-align: center">{{$sello}}</p></td>
             </tr>
         </table>
    </main>
    <footer>
        @if($data2[0]['modulo'] != 4 && $data2[0]['nivel'] != 3)<p style="font-size: 8px; text-align: center; margin:40px; letter-spacing: 2px;">La entrega de tu Cotización se debe realizar al Área de Recursos Materiales, dirigida a la DGA en papel membretado, con nombre, fecha, domicilio fiscal, telefono y RFC; al siguiente día hábil de haber generado tu PRE-Cotizacion; de Lunes a Viernes en un horario de 09:00 a 15:00 horas.</p>@endif
        <script type="text/php">
         $text = 'page: {PAGE_NUM} / {PAGE_COUNT}';
         $font = Font_Metrics::get_font("helvetica", "bold");
         $pdf->page_text(36, 18, $text, $font, 9);
        </script>

    </footer>
    </body>
</html>

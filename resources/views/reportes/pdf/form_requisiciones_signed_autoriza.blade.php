<!--<html>
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
                height: 110px;

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
            footer { position: fixed; bottom: 20px; height:1cm; text-align: center; font-size: 10px;}
        </style>

    </head>
    <body>
    <header>
        <table width="100%">
        <tbody>
        <tr>
            <td rowspan="6" width="45%">
                <img src="././images/logo/cdmxLogoSolo.jpg" alt="" width="240px" style=" float:left; margin-left: 45px; margin-top: 30px;">
            </td>
            <td width="55%">
                <div style="margin-top: 25px; position: relative; height: 0px;font-size: 12px; float: left; margin-right: 25px">
                    <strong>SECRETARIA DE ADMINISTRACIÓN Y FINANZAS DE LA CIUDAD DE MÉXICO</strong>
                </div>
            </td>
        </tr>
        <tr>
            <td width="55%">
                <div style="margin-top:48px; position: relative; height: 0px; font-size: 10px; float: left;margin-right: 25px">DIRECCIÓN GENERAL DE ADMINISTRACIÓN Y FINANZAS</div>
            </td>
        </tr>
        <tr>
            <td width="55%">
                <div style="margin-top: 58px; position: relative; height: 0px; font-size: 10px; float: left;margin-right: 25px">DIRECCIÓN DE RECURSOS MATERIALES, ABASTECIMIENTOS Y SERVICIOS</div>
            </td>
        </tr>
        <tr>
            <td width="55%">
                <div style="margin-top: 68px; position: relative; height:0px; font-size: 10px; float: left;margin-right: 25px">SUBDIRECCIÓN DE RECURSOS MATERIALES, ABASTECIMIENTOS Y SERVICIOS</div>
            </td>
        </tr>
        <tr>
            <td width="55%">
                <div style="margin-top: 78px; position: relative; height: 0px; font-size: 10px; float: left;margin-right: 25px">UNIDAD DEPARTAMENTAL DE COMPRAS Y CONTROL DE MATERIALES</div>
            </td>
        </tr>
                <tr>
            <td width="55%">
                <div style="margin-top: 88px; position: relative; height: 0px; font-size: 10px; float: left;margin-right: 25px">"2020, AÑO DE LEONA VICARIO, BENEMÉRITA MADRE DE LA PATRIA"</div><br>
            </td>
        </tr>
        </tbody>
    </table>
   </header><br>
    <main>

        <table width="100%" class="blueTable">
            <tr width="50%">

            <td colspan="9"><strong><center>NÚMERO PROGRESIVO DE LA REQUISICIÓN</strong></td>
            <td colspan="5"><strong>SOLICITUD DE PEDIDO SAP-GRP</strong></td>


          </tr>
        @if($data[0]->tipo_req == '1')
          <tr width="50%">
            <td colspan="3"><center><strong>BIENES ( X )</strong></td>
            <td colspan="3"><center>SERVICIOS (  )</td>
            <td colspan="3"><center>ARRENDAMIENTOS (  )</td>
            <td colspan="5"><strong>NO. DE REQUISICIÓN: {{$data[0]->no_requisicion}}</strong></td>

          </tr>
            @endif
        @if($data[0]->tipo_req == '2')
          <tr width="50%">
            <td colspan="3"><center>BIENES (  ) </td>
            <td colspan="3"><center><strong>SERVICIOS ( X )</strong></td>
            <td colspan="3"><center>ARRENDAMIENTOS (  )</td>
            <td colspan="5"><strong>NO. DE REQUISICIÓN: {{$data[0]->no_requisicion}}</strong></td>

          </tr>
            @endif
        @if($data[0]->tipo_req == '3')
          <tr width="50%">
            <td colspan="3"><center>BIENES (  )</td>
            <td colspan="3"><center>SERVICIOS (  )</td>
            <td colspan="3"><center><strong>ARRENDAMIENTOS ( X )</strong></td>
            <td colspan="5"><strong>NO. DE REQUISICIÓN: {{$data[0]->no_requisicion}}</strong></td>

          </tr>
            @endif
          <tr width="100%">

            <td colspan="14"><strong><center>ESPACIO PARA EL SELLO DE LA UNIDAD DEPARTAMENTAL DE COMPRAS Y CONTROL DE MATERIALES</strong></td>

          </tr>
        <tr width="10%">

            <td colspan="14" rowspan="50"></td>
          </tr>
        </table>

        <table width="100%" class="blueTable">
            <tr>

            <td><strong><center>No. PARTIDA</strong></td>
            <td><strong><center>DESCRIPCION DE LOS BIENES, SERVICIOS, O ARRENDAMIENTOS</strong></td>
            <td><strong><center>DESCRIPCION PARTICULAR</strong></td>
            <td><strong><center>CANTIDAD</strong></td>
            <td><strong><center>UNIDAD DE MEDIDA</strong></td>
            <td><strong><center>EXISTENCIA ACTUAL Y/O SELLO DE NO EXISTENCIA</strong></td>
          </tr>
          @foreach($data as $dato)
          <tr width="100%">

            <td><center>{{@$dato->par_pre}}</td>
            <td><center>{{@$dato->ct_descripcion}}</td>
            <td><center>{{@$dato->caracteristicas}}</td>
            <td><center>{{@$dato->cantidad}}</td>
            <td><center>{{@$dato->uni_des}}</td>
            <td><center></td>

          </tr>
          @endforeach
        </table>
        <table width="100%" class="blueTable">
            <tr width="50%">

            <td colspan="9"><strong><center>FECHA DE ELABORACION</strong></td>
            <td colspan="9"><strong><center>FECHA EN QUE SE REQUIERE EL BIEN O SERVICIO</strong></td>
            <td rowspan="2" colspan="1"><strong><center>LUGAR DE ENTREGA DE BIENES O SERVICIOS</strong></td>


          </tr>
          <tr width="50%">

            <td colspan="3"><center><strong>DÍA</strong></td>
            <td colspan="3"><center><strong>MES</strong></td>
            <td colspan="3"><center><strong>AÑO</strong></td>
            <td colspan="3"><center><strong>DÍA</strong></td>
            <td colspan="3"><center><strong>MES</strong></td>
            <td colspan="3"><center><strong>AÑO</strong></td>


          </tr>

          <tr width="50%">

            <td colspan="3"><center>{{$dia_elabora}}</td>
            <td colspan="3"><center>{{$mes_elabora}}</td>
            <td colspan="3"><center>{{$anio_elabora}}</td>
            <td colspan="3"><center>{{$dia_requiere}}</td>
            <td colspan="3"><center>{{$mes_requiere}}</td>
            <td colspan="3"><center>{{$anio_requiere}}</td>
            <td colspan="1"><center>{{$data[0]->lugar_entrega}}</td>

          </tr>

        </table>
        <table width="100%" class="blueTable">
            <tr width="100%">

            <td colspan="1"><strong><center>JUSTIFICACIÓN Y USO DE LOS SOLICITADO Y OTRAS OBSERVACIONES</strong></td>
          </tr>
          <tr width="100%">
            <td style="text-align: justify;">{{$data[0]->observaciones}}</td>
          </tr>
        </table>

        <table class="blueTable">
            <tr width="100%">
                <td colspan="16"><strong><center>CLAVE PROGRAMÁTICA PRESUPUESTAL</strong></td>
            </tr>
            <tr>
                <td colspan="1"><center><strong>FI</strong></td>
                <td colspan="1"><center><strong>F</strong></td>
                <td colspan="1"><center><strong>SF</strong></td>
                <td colspan="1"><center><strong>AI</strong></td>
                <td colspan="1"><center><strong>PP</strong></td>
                <td colspan="1"><center><strong>FF</strong></td>
                <td colspan="1"><center><strong>FG</strong></td>
                <td colspan="1"><center><strong>FE</strong></td>
                <td colspan="1"><center><strong>AD</strong></td>
                <td colspan="1"><center><strong>OR</strong></td>
                <td colspan="1"><center><strong>PTDA</strong></td>
                <td colspan="1"><center><strong>TG</strong></td>
                <td colspan="1"><center><strong>DI</strong></td>
                <td colspan="1"><center><strong>DG</strong></td>
                <td colspan="1"><center><strong>PROYECTO</strong></td>
                <td colspan="1"><center><strong>MONTO ESTIMADO</strong></td>
            </tr>

            <tr>
                <td colspan="1"><center>1</td>
                <td colspan="1"><center>5</td>
                <td colspan="1"><center>2</td>
                <td colspan="1"><center>091</td>
                <td colspan="1"><center>E059</td>
                <td colspan="1"><center>11</td>
                <td colspan="1"><center>1</td>
                <td colspan="1"><center>1</td>
                <td colspan="1"><center>0</td>
                <td colspan="1"><center>0</td>
                <td colspan="1"><center>3181</td>
                <td colspan="1"><center>1</td>
                <td colspan="1"><center>1</td>
                <td colspan="1"><center>00</td>
                <td colspan="1"><center></td>
                <td colspan="1"><center>@if(!empty($data[0]->monto_estimado)){{money_format('%.2n',$data[0]->monto_estimado)}}@endif</td>
            </tr>
            <tr>
                <td colspan="14"><center></td>
                <td colspan="1"><center><strong>TOTAL</strong></td>
                <td colspan="1"><center><strong>@if(!empty($data[0]->monto_estimado)){{money_format('%.2n',$data[0]->monto_estimado)}}@endif</strong></td>
            </tr>
        </table>

        <table class="blueTable">
            <tr >
                <td width="100%" colspan="30"><strong><center>NO. Y NOMBRE DE LA PARTIDA PRESUPUESTAL A AFECTAR</strong></td>
            </tr>
            <tr width="100%">
                <td colspan="30"><center>{{$data[0]->par_pre}}, {{$data[0]->par_descripcion}}</td>
            </tr>
        </table>

        <table class="blueTable">
            <tr >
                <td width="100%" colspan="30"><strong><center>INFORMACIÓN ADICIONAL QUE SE ADJUNTA A LA REQUISICIÓN</strong></td>
            </tr>
            <tr width="100%">
                <td colspan="30"><strong><center>@if(!empty($adjunto))ARCHIVO: {{$adjunto}}@endif</strong></td>
            </tr>
        </table>
<br>
       <table class="blueTable">
            <tr >
                <td width="50%" ><strong><center>TRAMITA:</center></strong></p></td>
                <td width="50%" ><strong><center>SOLICITA:</strong></td>
            </tr>
            <tr >
                <td width="50%" ><p style="font-size: 12px"><center><strong>{{$data2[0]->nombre_solicita}}</strong></td>
                <td width="50%" ><p style="font-size: 12px"><center><strong>{{$data2[0]->nombre_tramita}}</strong></td>

            </tr>
            <tr >
                <td width="50%" ><p style="font-size: 12px"><center><strong>{{strtoupper($data2[0]->puesto_solicita)}}</strong></td>
                <td width="50%" ><p style="font-size: 12px"><center><strong>{{strtoupper($data2[0]->puesto_tramita)}}</strong></td>
            </tr>
            <tr >
                <td  width="50%" ><p style="font-size: 6px; text-align: center;">{{$data2[0]->sello_solicita}}</td>
                <td width="50%" ><p style="font-size: 6px; text-align: center;">{{$data2[0]->sello_tramita}}</td>

            </tr>
        </table>
        <table class="blueTable">
            <tr >
                <td width="50%" ><strong><center>AUTORIZA:</strong></td>
                <td width="50%" ><strong><center>AUTORIZACIÓN DIRECCIÓN DE FINANZAS:</strong></td>
            </tr>
            <tr >
                <td width="50%" ><center><strong>{{$nombreCompleto}}</strong></td>
                <td width="50%" ><center><strong></strong></td>

            </tr>
            <tr >
                <td width="50%" ><center><strong>{{strtoupper($puesto)}}</strong></td>
                <td width="50%" ><center><strong></strong></td>
            </tr>
            <tr >
                <td  width="50%" ><p style="font-size: 6px; text-align: center;">{{$sello}}</td>
                <td width="50%" ><p style="font-size: 6px; text-align: center;"></td>

            </tr>
        </table>
    </main>
    <footer><p>Dr. Lavista 144 Acceso 3, Sótano, Col. Doctores, Del. Cuauhtémoc C.P. 06720, Tel. 5134 2500 ext. 1053.</p>
<script type="text/php">
    if ( isset($pdf) ) {
        $pdf->page_script('
            $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
            $pdf->text(270, 817, "Pagina $PAGE_NUM de $PAGE_COUNT", $font, 8);
        ');
    }
</script>

    </footer>
    </body>
</html>
-->

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
                height: 110px;

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
            footer { position: fixed; bottom: 20px; height:1cm; text-align: center; font-size: 10px;}
        </style>

    </head>
    <body>
    <header>
        <table width="100%">
        <tbody>
        <tr>
            <td rowspan="6" width="45%">
                 <img src="././images/logo/cdmxLogoSolo.jpg" alt="" width="270px" style=" float:left; margin-left: 45px; margin-top: 40px;">
            </td>
            <td width="55%">
                <div style="margin-top: 25px; position: relative; height: 0px;font-size: 12px; float: left; margin-left: 0px"><strong>SECRETARIA DE ADMINISTRACIÓN Y FINANZAS DE LA CIUDAD DE MÉXICO</strong>
                </div>
            </td>
        </tr>
        <tr>
            <td width="55%">
                <div style="margin-top:48px; position: relative; height: 0px; font-size: 10px; float: left;margin-left: 0px">DIRECCIÓN GENERAL DE ADMINISTRACIÓN Y FINANZAS</div>
            </td>
        </tr>
        <tr>
            <td width="55%">
                <div style="margin-top: 58px; position: relative; height: 0px; font-size: 10px; float: left;margin-left: 0px">DIRECCIÓN DE RECURSOS MATERIALES, ABASTECIMIENTOS Y SERVICIOS</div>
            </td>
        </tr>
        <tr>
            <td width="55%">
                <div style="margin-top: 68px; position: relative; height:0px; font-size: 10px; float: left;margin-left: 0px">SUBDIRECCIÓN DE RECURSOS MATERIALES, ABASTECIMIENTOS Y SERVICIOS</div>
            </td>
        </tr>
        <tr>
            <td width="55%">
                <div style="margin-top: 78px; position: relative; height: 0px; font-size: 10px; float: left;margin-left: 0px">UNIDAD DEPARTAMENTAL DE COMPRAS Y CONTROL DE MATERIALES</div>
            </td>
        </tr>
        <tr>
            <td width="55%">
                <div style="margin-top: 88px; position: relative; height: 0px; font-size: 10px; float: left;margin-left: 0px">"2020, AÑO DE LEONA VICARIO, BENEMÉRITA MADRE DE LA PATRIA"</div>
            </td>
        </tr>
        <tr>
            <td width="55%">
                <div style="margin-top: 88px; position: relative; height: 0px; font-size: 10px; float: left;margin-left: 0px"></div>
            </td>
        </tr>


        </tbody>
    </table>
    </header><br>
    <main>

        <table class="blueTable">
            <tr width="100%">


            <td width="70%" style="text-align: right;"><strong>FECHA DE REALIZACIÓN: </strong></td>
            <td width="30%" style="text-align: right;">CIUDAD DE MÉXICO A 26 DE FECBRERO DE 2020.</td>


          </tr>

          <tr width="100%">

            <td width="70%" style="text-align: right;"><strong>NO. DE REQUISICIÓN DE BIENES:</strong></td>
            <td width="30%" style="text-align: right;"><strong>{{$data[0]->no_requisicion}}</strong></td>

          </tr>
        </table>
        <table class="blueTable">
          <tr>
            <td><strong>AREA REQUIRIENTE: </strong>XXXXXXXXXXXXXXXX XXXXXXXXXXXXX XXXXXXXXXX</td>
          </tr>
        </table>
        <table  class="blueTable">
        <tr >
            <td><strong>OBJETO DE LA REQUISICIÓN: </strong>xxxxxxxxxxxxxxxxxxxxxxxxxxx x xxxxxxxxxxxxxxxx xxxxxxxxxxxxxxxxxx xxxxxxxxxxxxxxxxxxxxxxxxxxxxx xxxxxxxxxxxxxxxxxxxxxxxxx xxxxxxxxxxxxxxxxxxxxxxxxxx xxxxxxxxxxxxxxxxx xxxxxxxxxxx xxxxxxxxxxxxxxxxxxxxxxxxx xxxxxxxxxxxxxxx xxxxxxxxxxxxxxxx xxxxxxxxxx xxxxxxxxxxxx xxxxxxx x
          </tr>
        </table>
        <table class="blueTable">
            <tr >
                <td width="100%" colspan="30"><strong><center>JUSTIFICACIÓN DE COMPRA Y/U OBSERVACIÓN</strong></td>
            </tr>
            <tr width="100%">
                <td colspan="30"><center>{{$data[0]->observaciones}}</td>
            </tr>
        </table>
        <table class="blueTable">
            <tr width="25%" >
                <td><strong>CLAVE PRESUPUESTAL</strong></td>
                <td>{{$data[0]->par_pre}}</td>
                <td rowspan="2" colspan="1"><strong><center>FECHA HASTA LA QUE SE REQUIERE EL SUMINISTRO<center></strong></td>
                <td rowspan="2" colspan="3"><strong><center>{{$dia_elabora}}/{{$mes_elabora}}/{{$anio_elabora}}</center></strong></td>
            </tr>
            <tr width="25%" >
                <td><strong>PAAAPS DE REGISTRO: </strong></td>
                <td>52103658</td>

            </tr>
            <tr width="25%" >
                <td><strong>PARTIDA PRESUPUESTAL EN PAAAPS: </strong></td>
                <td>2741</td>
                <td rowspan="2" colspan="1"><strong><center>FECHA HASTA QUE SE REQUIERE FINALIZAR EL SUMINISTRO</strong></td>
                <td rowspan="2" colspan="3"><strong><center>{{$dia_requiere}}/{{$mes_requiere}}/{{$anio_requiere}}</center></strong></td>
            </tr>
            <tr width="25%" >
                <td><strong>VALOR ESTIMADO EN PAAAPS: </strong></td>
                <td>$1500.00</td>

            </tr>
        </table>
        <table width="100%" class="blueTable">
            <tr>

            <td><strong><center>CLAVE CABMSCDMX CON DESCRIPCIÓN</strong></td>
            <td><strong><center>CARACTERÍSTICAS PARTICULARES</strong></td>
            <td><strong><center>UNIDAD DE MEDIDA</strong></td>
            <td><strong><center>CANTIDAD SOLICITADA</strong></td>
            <td><strong><center>EXISTENCIA ACTUAL Y/O SELLO DE NO EXISTENCIA</strong></td>
          </tr>
        @foreach($data as $dato)
          <tr width="100%">

            <td><center>xxxxxxx - {{@$dato->ct_descripcion}}</td>
            <td><center>{{@$dato->caracteristicas}}</td>
            <td><center>{{@$dato->uni_des}}</td>
            <td><center>{{@$dato->cantidad}}</td>
            <td><center></td>

          </tr>
        @endforeach

        </table>
        <table class="blueTable">
            <tr width="100%" >
                <td colspan="2"><strong><center>ESPECIFICACIONES DEL BIEN</strong></td>
            </tr>
            <tr width="100%" >
                <td>1. NORMAS DE REFERENCIA APLICABLES Y NORMAS DE CALIDAD: </td>
                <td><center>SI / NO</td>
            </tr>
            <tr width="100%" >
                <td>2. MEDIOS DE PRUEBA NECESARIOS: </td>
                <td><center>SI / NO</td>
            </tr>
            <tr width="100%" >
                <td>3. REQUIERE ASISTENCIA TÉCNICA Y CAPACITACIÓN SOBRE USO: </td>
                <td><center>SI / NO</td>
            </tr>
            <tr width="100%" >
                <td>4. REQUIERE GARANTIA: </td>
                <td><center>SI / NO</td>
            </tr>
            <tr width="100%" >
                <td>5. AUTORIZACIONES O CERTIFICACIONES: </td>
                <td><center>SI / NO</td>
            </tr>
            <tr width="100%" >
                <td>6. ANEXOS (DIBUJOS Y DOCUEMNTOS DE SOPORTE): </td>
                <td><center>SI / NO</td>
            </tr>
            <tr width="100%" >
                <td>7. OTROS: </td>
                <td><center>SI / NO</td>
            </tr>
        </table>

        <table class="blueTable">
            <tr width="100%" >
                <td colspan="2"><strong><center>CONDICIONES DE ENTREGA</strong></td>
            </tr>
            <tr width="100%" >
                <td width="35%" >8. REQUIERE DE ENTREGA EN ALMACENAMIENTO O INVENTARIO: </td>
                <td width="65%" ></td>
            </tr>
            <tr width="100%" >
                <td width="35%" >9. FORMA DE EMPAQUETADO O PRESENTACIÓN: </td>
                <td width="65%" ></td>
            </tr>
            <tr width="100%" >
                <td width="35%" >10. LUGAR DE ENTREGA: </td>
                <td width="65%" ></td>
            </tr>
        </table>
                 <table class="blueTable">
            <tr >
                <td width="50%" ><strong><center>TRAMITA:</center></strong></p></td>
                <td width="50%" ><strong><center>SOLICITA:</strong></td>
            </tr>
            <tr >
                <td width="50%" ><p style="font-size: 12px"><center><strong>{{$data2[0]->nombre_solicita}}</strong></td>
                <td width="50%" ><p style="font-size: 12px"><center><strong>{{$data2[0]->nombre_tramita}}</strong></td>

            </tr>
            <tr >
                <td width="50%" ><p style="font-size: 12px"><center><strong>{{strtoupper($data2[0]->puesto_solicita)}}</strong></td>
                <td width="50%" ><p style="font-size: 12px"><center><strong>{{strtoupper($data2[0]->puesto_tramita)}}</strong></td>
            </tr>
            <tr >
                <td  width="50%" ><p style="font-size: 6px; text-align: center;">{{$data2[0]->sello_solicita}}</td>
                <td width="50%" ><p style="font-size: 6px; text-align: center;">{{$data2[0]->sello_tramita}}</td>

            </tr>
        </table>
        <table class="blueTable">
            <tr >
                <td width="50%" ><strong><center>AUTORIZA:</strong></td>
                <td width="50%" ><strong><center>AUTORIZACIÓN DIRECCIÓN DE FINANZAS:</strong></td>
            </tr>
            <tr >
                <td width="50%" ><center><strong>{{$nombreCompleto}}</strong></td>
                <td width="50%" ><center><strong></strong></td>

            </tr>
            <tr >
                <td width="50%" ><center><strong>{{strtoupper($puesto)}}</strong></td>
                <td width="50%" ><center><strong></strong></td>
            </tr>
            <tr >
                <td  width="50%" ><p style="font-size: 6px; text-align: center;">{{$sello}}</td>
                <td width="50%" ><p style="font-size: 6px; text-align: center;"></td>

            </tr>
        </table>

    </main>
    <footer><p>Dr. Lavista 144 Acceso 3, Sótano, Col. Doctores, Del. Cuauhtémoc C.P. 06720, Tel. 5134 2500 ext. 1053.</p>
<script type="text/php">
    if ( isset($pdf) ) {
        $pdf->page_script('
            $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
            $pdf->text(270, 817, "Pagina $PAGE_NUM de $PAGE_COUNT", $font, 8);
        ');
    }
</script>

    </footer>
    </body>
</html>

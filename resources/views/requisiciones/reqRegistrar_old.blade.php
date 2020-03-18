@extends('layouts.app_SinMenu')
@section('content')

<head>
     <style type="text/css">

            .bootstrap-select .btn {
              background-color: white;
              //border-color: #000000; 
              //border-style: solid #000000;
              //border-left-width: 1px;
              //border-right-width: 1px;
              border-left-color: silver;
              //border-top: solid;
              border-top-color: silver;
              //border-bottom: solid;
              border-bottom-color: silver;
              //border-right: solid;
              border-right-color: silver;
              color: black;
              font-weight: 200;
              //padding: 12px 12px;
              font-size: 16px;
              //margin-bottom: 10px;
              //-webkit-appearance: none;
              //-moz-appearance: none;
              //appearance: none;
            }
            .bootstrap-select .dropdown-menu {
              //margin: 15px 0 0;
            }
            select::-ms-expand {
              /* for IE 11 */
              //display: none;
            }
        </style>
    </head>


 <div class="w-auto">        
        <div class="card bg-light">
            <div class="col-md-12 col-lg-11 col-xl-9 p-2 mx-auto">
                <table style="width:100%;" border="0">
                    <tr>
                    <td style="width: 30%; font-size: 16px; color: #04b404; " >■ Registrar Requisición</td>
                    <td style="width: 38%; text-align: center;">
                     <h5><u>Registrar Requisición</u></h5>
                    </td>
                    <td style="width: 40%" class="text-right">                       
                       <button type="button" class="btn btn-success btn-circle" data-toggle="modal" data-target="#myModal"><i class="fas fa-question-circle"></i></button>
                    </td>
                    </tr>
                </table>
                <br>

                <form class="form-horizontal" id="formId" role="form" accept-charset="UTF-8" enctype="multipart/form-data">
                    <input type="hidden" name="id_folio" id="id_folio" value="0">
                    @csrf

                    <div class="form-group row align-items-center mb-0">
                        <div class="col-sm-3 col-md-3 col-lg-3 col-xl-2 align-self-center">
                            <label class="col-form-label" for="solicita">Solicita: </label>
                        </div>
                        <div class="col-sm-7 col-md-5 col-lg-5 col-xl-5">
                            <input type="text" class="form-control form-control-sm" id="solicita" placeholder="Nombre del solicitante" name="solicita" value="{{ Auth::user()->nombre }} " readonly="">
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="col-sm-3 col-md-2 col-lg-2 col-xl-3 text-md-right">
                            <label class="col-form-label" for="folio"><b>Folio: </b></label>
                        </div>
                        <div class="col-sm-2 col-md-1 col-lg-1 col-xl-1">
                            <input type="text" class="form-control form-control-sm" id="folio" rows="2" name="cantidad" readonly="">
                        </div>
                    </div>
                    <div class="form-group row align-items-center mb-0">
                        <div class="col-sm-3 col-md-3 col-lg-3 col-xl-2 align-self-center">
                            <label class="col-form-label" for="area">Area Solicitante: </label>
                        </div>
                        <div class="col-sm-9 col-md-8 col-lg-6 col-xl-6">
                            <input type="text" class="form-control form-control-sm" id="area" placeholder="Área" name="area" onkeyup="mayus(this);" value="DIRECCIÓN GENERAL DE TECNOLOGÍAS Y COMUNICACIONES" readonly="">
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="form-group row align-items-center mb-0">
                        <div class="col-sm-3 col-md-3 col-lg-3 col-xl-2 align-self-center">
                            <label class="col-form-label" for="fecha">Fecha: </label>
                        </div>
                        <div class="col-sm-2 form-inline">
                            <input type="date" class="form-control form-control-sm" id="fecha" name="fecha">
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="form-group row align-items-center mb-0">
                        <div class="col-sm-3 col-md-3 col-lg-3 col-xl-2 align-self-center">
                            <label class="col-form-label" for="recibe">Recibe: </label>
                        </div>
                        <div class="col-sm-7 col-md-7 col-lg-5 col-xl-5">
                            <input type="text" class="form-control form-control-sm" id="recibe" placeholder="Nombre de quien recibe" name="recibe" onkeyup="mayus(this);">
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>

                    <div class="mb-0"><b><u>Bienes:</u></b></div>

                    <div class="form-group row align-items-center mb-0">
                        <div class="col-sm-3 col-md-3 col-lg-3 col-xl-2 align-self-center" >
                            <label class="col-form-label" for="cabms_grp">Consumible: </label>
                        </div>
                        <div class="col-sm-7 col-md-7 col-lg-7 col-xl-6">
                            
                            <select class="selectpicker form-control form-control-sm" id="cabms_grp" name="cabms_grp" data-show-subtext="true" data-live-search="true">
                                <option value="">Seleccione...</option>
                                @foreach($cabmsGRP as $cabmsgrp)  
                                    <option value="{{$cabmsgrp['clave_grp']}}|{{$cabmsgrp['cve_unidad']}}">{{$cabmsgrp['clave_grp']}} - {{ str_limit($cabmsgrp['descripcion'], $limit = 80, $end = '...') }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="col-sm-2 col-md-1 col-lg-1 col-xl-1">
                            <!-- <small id="uMedidaHelper" class="text-muted">
                                U. de Medida
                            </small> -->
                            <input type="text" class="form-control form-control-sm" id="u_medida" rows="2" name="u_medida" placeholder=""  readonly>
                            
                        </div>
                        <div class="col-sm-3 col-md-3 col-lg-3 col-xl-1 text-xl-right align-self-center text-nowrap" style="width: 30%; font-size: 13px">
                            <label class="col-form-label" for="cantidad">Cant. Solicitada: </label> 
                        </div>
                        <div class="col-sm-2 col-md-1 col-lg-1 col-xl-1">
                            <!-- <small id="passwordHelpInline" class="text-muted">
                                Cant. Solicitada
                            </small> -->
                            <input type="text" class="form-control form-control-sm" id="cantidad" rows="2" name="cantidad" placeholder=" " onkeypress="
                            return filterFloat2(event,this);">
                            <div class="invalid-feedback"></div>                            
                        </div>

                    </div>


                <hr color="#00b140">

                    <!-- GRUPO DE BOTONES -->
                    <div class="row align-items-center">
                         <div class="col" align="left">
                            <button type="button" class="btn btn-secondary" id="limpiar">
                                limpiar
                            </button>
                         </div>
                         <div class="col"></div>
                         <div class="col" align="center">
                            <button type="submit" id="agregar" class="btn btn-success " >Agregar</button>
                         </div>
                         <div class="col">
                             <!--<a href="{{ url('alm_solicitudes/verSolicitudCons') }}" class="btn btn-success-2" role="button" id="menu">Ver Solicitudes</a>-->
                         </div>
                         <div class="col align-self-center" align="right">
                            <a href="{{ url('/home') }}" class="btn btn-primary" role="button" id="menu">Menú</a>
                         </div>
                    </div>
                    
                    <!-- TERMINA GRUPO DE BOTONES -->

                    <!-- Modal de Confirmación Insert -->
                    <div class="modal fade" id="modalConfirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog  modal-sm modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-dark text-white ">

                                    <h5 class="modal-title" id="exampleModalLongTitle">¡CONFIRMACIÓN!</h5>

                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <span id="Mensaje"></span>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-success" data-dismiss="modal" id="insertMasivo">Aceptar</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </form> <!-- Termina Formulario -->
                
                
                <div class="mb-2"><b><u>Bienes de Solicitud:</u></b></div> 
                    <!-- <h4>Mis solicitudes</h4> -->
                

                <div class="table-responsive col-xl-11 text-nowrap"> 
                    <table class="table table-sm table-striped table-bordered" style="font-size: 13px; margin-bottom:0px;">
                        <thead style="background-color:#d5d6d2">
                            <tr class="primerFilaII" >
                                <th style="width: 5%" scope="col" class="text-left align-middle">Partida</th>
                                <th style="width: 10%" scope="col" class="text-left align-middle">Cabms GRP</th>
                                <th style="width: 57%" scope="col" class="text-left align-middle">Bien</th>
                                <th style="width: 5%" scope="col" class="text-left align-middle">Unidad</th>
                                <th style="width: 13%" scope="col" class="text-center align-middle">Cantidad Solicitada</th>
                                <th style="width: 10%" scope="col" class="text-center align-middle">Acción</th>
                            </tr>
                        </thead>
                    </table>
                    <div class="table-responsive pl-0" style="height: 200px; overflow-y:scroll;">
                        <table class="table-sm table-striped table-bordered" style="font-size: 11px; width: 100%" id="misSolicitudes">
                             
                        </table>
                    </div>

                </div>

                <hr color="#00b140">

                <div class="row align-items-center">                    
                     <div class="col" align="center">
                        <button  id="guardarSol" name="guardarSol" class="btn btn-success" >Nueva Solicitud</button>                       
                     </div>                     
                </div>

                
                <div class="mb-2"><b><u>Mis Solicitudes:</u></b></div> 
                    <!-- <h4>Mis solicitudes</h4> -->
                
                <div class="table-responsive col-xl-11 text-nowrap" > 
                    <table class="table table-sm table-striped table-bordered" style="font-size: 13px; margin-bottom:0px;">
                        <thead style="background-color:#d5d6d2">
                            <tr class="primerFilaII" >                                
                                <th style="width: 9%" scope="col"class="text-left align-middle">Fecha</th>
                                <th style="width: 9%" scope="col"class="text-left align-middle">Folio</th>
                                <th style="width: 9%" scope="col"class="text-left align-middle">Estatus</th>
                                <th style="width: 6%" scope="col"class="text-center align-middle">Seleccionar</th>
                                <th style="width: 6%" scope="col"class="text-center align-middle">Imprimir</th>
                                <th style="width: 6%" scope="col"class="text-center align-middle">Eliminar</th>
                            </tr>
                        </thead>
                    </table>   
                    <div class="table-responsive pl-0" style="height: 200px; overflow-y:scroll;">
                        <table class="table-sm table-striped table-bordered" style="font-size: 13px; width: 100%" id="misFolios">
                             
                        </table>
                    </div> 
                </div>
            </div>
        </div>
     
    
            <!-- Modal Registro Exitoso! -->
    <div class="modal fade" id="modalRegistro" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="exampleModalLongTitle">¡ATENCIÓN!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times; </span>
                    </button>
                </div>
                <div class="modal-body">
                    <span id="RegistroGuardado">Datos guardados correctamente!!!</span>
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>
</div>
   <br><br>
@endsection
<!--<script src="{{ asset('js/ajax_libs_jquery213_jquery_min.js') }}" ></script>
<script src="{{ asset('js/bootstrap_335_js_bootstrap_min.js') }}" ></script>-->

  <script src="{{ asset('js/ajax_libs_jquery213_jquery_min.js') }}"></script>  <!-- Jquery local V.2.1.3 -->
  <script src="{{ asset('js/popper-1_16_0_min.js') }}"></script>   <!-- popper local v.1.16.0 -->  
  <script src="{{ asset('js/bootstrap-4_4_1_min.js') }}"></script>   <!-- Boostrap local V.4.4.1 -->
  <script src="{{ asset('js/bootstrap-select-1_13_9_min.js') }}"></script>   <!-- Bootstrap-Select local V.1.13.9 -->

<script type="text/javascript">
    $( document ).ready(function() {
        //$('.date').mask('00/00/0000');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // ******** Validador de inputs vacios en Tiempo Real ************
        $("#fecha").change(function(){
            fecha = $("#fecha").val();
            if (fecha !== ""){
                $("#fecha").attr("class","form-control form-control-sm").parent().children("div").text("").show(); 
                }
                else if (fecha == "")
                {
                    $("#fecha").attr("class","form-control is-invalid form-control-sm").parent().children("div").text("Introduce una Fecha Correcta").show();
                }
        });

        $("#fecha").change(function(){
            fecha = $("#fecha").val();
            if (isValidDate(fecha) == true){
                $("#fecha").attr("class","form-control form-control-sm").parent().children("div").text("").show(); 
                }
                else if (isValidDate(fecha) == false)
                {
                    $("#fecha").attr("class","form-control is-invalid form-control-sm").parent().children("div").text("Introduce una Fecha Correcta").show();
                }
        });

        $("#recibe").keyup(function(){
            recibe = $("#recibe").val();
            if (recibe !== ""){
            $("#recibe").attr("class","form-control form-control-sm").parent().children("div").text("").show();
            }
            else if (recibe == "")
            {
                $("#recibe").attr("class","form-control is-invalid form-control-sm").parent().children("div").text("Introduce Nombre").show();
            }
        });

        $("#cabms_grp").change(function(){
            cabms_grp = $("#cabms_grp").val();
            if (cabms_grp !== ""){
            //$("#cabms_grp").attr("class","selectpicker form-control input-sm").parent().children("div").text("").show();
            }
            else if (cabms_grp == "")
            {
                $("#cabms_grp").attr("class","selectpicker form-control input-sm").parent().children("div").text("Seleccione Consumible").show();
            }
        });

        $("#cantidad").keyup(function(){
            cantidad = $("#cantidad").val();
            if (cantidad !== ""){
            $("#cantidad").attr("class","form-control form-control-sm").parent().children("div").text("").show();
            }
            else if (cantidad == "")
            {
                $("#cantidad").attr("class","form-control is-invalid form-control-sm").parent().children("div").text("Introduce Cantidad").show();
            }
        });

        // ******** Fin de Validadore en Tiempo Real *********************

        $('#formId').on('submit', function(e) {
    
            e.preventDefault();
            // agrego la data del form a formData
            var formData = new FormData(this);
            formData.append('_token', $('input[name=_token]').val());
                    
            fecha = $("#fecha").val();
            recibe = $("#recibe").val();
            cabms_grp = $("#cabms_grp").val();            
            cantidad = $("#cantidad").val();

            if (isValidDate(fecha) == false) {
                $("#fecha").attr("class","form-control is-invalid form-control-sm").parent().children("div").text("Introduce una Fecha Correcta").show();
                $("#fecha").focus();
            } else if(recibe == ''){
                $("#recibe").attr("class","form-control is-invalid form-control-sm").parent().children("div").text("Introduce Nombre").show();
                $("#recibe").focus();
            } else if(cabms_grp == ''){
                $("#cabms_grp").attr("class","selectpicker form-control input-sm").parent().children("div").text("Seleccione Consumible").show();
                $("#cabms_grp").focus();
            } else if(cantidad == ''){
                $("#cantidad").attr("class","form-control is-invalid form-control-sm").parent().children("div").text("Introduce Cantidad").show();
                $("#cantidad").focus();
            }
            else 
            {
                    $.ajax({
                        type: 'POST',
                        url: 'storeSolicitud',
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function (data) {
                            
                            $("#modalRegistro").modal({backdrop:'static',keyboard:false, show:true});
                            
                            //alert("Registro guardado: \n " + data);
                            setTimeout(function () {
                            $('#modalRegistro').modal("hide");
                            }, 1000);
                            //limpiarForm();
                             $("#cabms_grp").val("");            
                             $("#u_medida").val("");    
                             $("#cantidad").val("");
                            //console.log(data);
                            $("#acciones").prop('disabled',true);
                            //exractArchivos(data);
                            $('#id_folio').val(data);
                            exractmisSol();
                            exractmisFolios();

                        },
                        error: function (jqXHR, text, error) {

                        }
                    });
            }        
        });

       $("#cabms_grp").change(function() {
                cabms_grp = $("#cabms_grp").val();
               
                        $.ajax({
                            type: "POST",
                            dataType: "json",
                            url: "getUnidad",
                            data: {"cabms_grp": cabms_grp},
                            success: function( data ) {

                                $("#u_medida").val(data[0]['descripcion']);
                                $("#cantidad").focus();  //focus en cantidad después de seleccionar un consumible
                                },
                                    error: function (data)
                                    { 
                                        console.log(data);
                                    }
                                })
                        
        });

        exractDataSolForm = function() { 
            folio = $("#id_folio").val();
              $.ajax({
                type: "POST",
                dataType: "json",
                url: "getDataSol",
                data: {"folio":  folio},
                success: function (data) {
                    
                    $("#recibe").val(data[0]['recibe']);
                    $("#fecha").val(data[0]['fecha']);
                },
                error: function (data) {
                    console.log(data);
                }
            });
        };//Fin extract data table 

        exractmisSol = function() { //extract data table
            folio = $("#id_folio").val();
            console.log(folio);
            $(".otrasFilas").remove();
              $.ajax({
                type: "POST",
                dataType: "json",
                url: "getMySolAlm",
                data: {"folio":  folio},

                success: function (data) {
                    //console.log(data);desc_Fisico
                    numero =1;
                   $.each(data, function (idx, opt) {
                        // alert('Estoy recorriendo el registro numero: ' + idx);
                        $('#misSolicitudes').append(
                            '<tr class="otrasFilas">' +
                                '<td class="text-left align-middle" style="width: 5%">' + numero + '</td>' +
                                '<td class="text-left align-middle" style="width: 10%">' + opt.id_cambsgrp + '</td>' +
                                '<td class="text-left align-middle" style="width: 57%">' + opt.descripcion + '</td>' +
                                '<td class="text-left align-middle" style="width: 5%">' + opt.descUnidad+ '</td>' +
                                '<td class="text-right align-middle" style="width: 12%">' + opt.cantidad_solici + '</td>' +
                                '<td class="text-center align-middle" style="width: 9%"> <a href="javascript:eliminaBienSolicita(' + opt.idSolBien +')" class="btn btn-danger btn-sm" title="Eliminar"><i class="fas fa-trash-alt"></i></a> </td> ' +
                            '</tr>');
                            $("#folio").val(opt.id_folio );
                        numero++;
                    });
                    //console.log(data[0]['id']);
                },
                error: function (data) {
                    console.log(data);
                }
            });
        };//Fin extract data table 


        exractmisFolios = function() { //extract data table
            $(".otrasFilasFol").remove();
              $.ajax({
                type: "POST",
                dataType: "json",
                url: "getMySoFol",
                //data: {"no_oficio":  no_oficio},

                success: function (data) {
                    //console.log(data);desc_Fisico
                   $.each(data, function (idx, opt) {
                    statusFolio ="";
                    if(opt.status_sol == 1){ statusFolio = "Pendiente";}
                    if(opt.status_sol == 2){ statusFolio = "Autorizada";}
                    if(opt.status_sol == 3){ statusFolio = "Entregada";}
                        // alert('Estoy recorriendo el registro numero: ' + idx);
                        '<a href="getMisReguardosPDF/301996" target="_blank" role="button" id="imprimeResg" class="btn btn-success-2 btn-group-lg active">Imprimir Resguardo</a>';
                        $('#misFolios').append(
                            '<tr class="otrasFilasFol">' +
                                '<td style="width: 8%" class="text-left">' + opt.fecha + '</td>' +
                                '<td style="width: 8%" class="text-left">' + opt.folio + '</td>' +
                                '<td style="width: 8%" class="text-left">' + statusFolio + '</td>' +
                                '<td style="width: 5%" class="text-center align-middle"> <a href="javascript:editarFolio(' + opt.folio +')" class="btn btn-success btn-sm" title="Seleccionar"><i class="fas fa-binoculars"></i></a> </td>' +
                                '<td style="width: 5%" class="text-center">'+
                                    '<a href="getpdf/'+ opt.folio +'" target="_blank" role="button" id="imprimeResg" class="btn btn-info btn-sm"><i class="fas fa-print"></i></a>'+
                                '</td>' +
                                '<td style="width: 5%" class="text-center"> <a href="javascript:eliminaFolio(' + opt.folio +')" class="btn btn-danger btn-sm" title="Eliminar"><i class="fas fa-trash-alt"></i></a> </td>' +
                            '</tr>');

                    });
                    //console.log(data[0]['id']);
                },
                error: function (data) {
                    console.log(data);
                }
            });
        };//Fin extract data table 

        exractmisFolios();


        function isValidDate(dateString)
        {
            // revisar el patrón
            if(!/^\d{4}\-\d{1,2}\-\d{1,2}$/.test(dateString))
                return false;

            // convertir los numeros a enteros
            var parts = dateString.split("-");
            var day = parseInt(parts[2], 10);
            var month = parseInt(parts[1], 10);
            var year = parseInt(parts[0], 10);

            // Revisar los rangos de año y mes
            if( (year < 1000) || (year > 3000) || (month == 0) || (month > 12) )
                return false;

            var monthLength = [ 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31 ];

            // Ajustar para los años bisiestos
            if(year % 400 == 0 || (year % 100 != 0 && year % 4 == 0))
                monthLength[1] = 29;

            // Revisar el rango del dia
            return day > 0 && day <= monthLength[month - 1];
        };

        function validateDateEnd(fechaInicial,fechaFinal)
        {        
            valuesStart=fechaInicial.split("/");
            valuesEnd=fechaFinal.split("/");

            // Verificamos que la fecha no sea posterior a la actual
            var dateStart=new Date(valuesStart[2],(valuesStart[1]-1),valuesStart[0]);
            var dateEnd=new Date(valuesEnd[2],(valuesEnd[1]-1),valuesEnd[0]);
            if(dateStart >= dateEnd)
            {
                return 0;
            }
            return 1;
        };


        limpiarForm = function()
        {
            //location.reload();
            $("#folio").val(""); 
            $("#fecha").val("");
            $("#recibe").val("");
            //$("#cabms_grp").val("");            
            $("#u_medida").val("");    
            $("#cantidad").val("");
            $("#misSolicitudes").empty();

            //$("#fecha").attr("class","form-control input-sm").parent().children("div").text("").show(); 
            //$("#fecha").attr("class","form-control input-sm").parent().children("div").text("").show(); 
            //$("#recibe").attr("class","form-control input-sm").parent().children("div").text("").show();
            //$("#cabms_grp").attr("class","form-control input-sm").parent().children("div").text("").show();
            //$("#cantidad").attr("class","form-control input-sm").parent().children("div").text("").show();                               
        };

        $("#limpiar").click(function(){
            limpiarForm();
        });   

          $("#guardarSol").click(function(){
            
            $(".otrasFilas").remove();
            $('#id_folio').val(0);
            limpiarForm();


        });
});//Fin document ready

       function eliminaBienSolicita(idSolBien) {
      
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "deleteSolBien/"+idSolBien,
                success: function (data) {
                    $(".otrasFilas").remove(); 
                    exractmisSol();

                },
                error: function (data) {
                    console.log(data);
                }
            });
        };


       function eliminaFolio(folio) {
      
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "deleteFol/"+folio,
                success: function (data) {
                    $(".otrasFilasFol").remove(); 
                    exractmisSol();
                    exractmisFolios();
                     limpiarForm();
                },
                error: function (data) {
                    console.log(data);
                }
            });
        };

       function editarFolio(folio) {
            console.log(folio);
            $('#id_folio').val(folio);
            limpiarForm();
            exractmisSol();
            exractDataSolForm();
        };




/*****************************/
      function filterFloat2(evt,input){
        // Backspace = 8, Enter = 13, ‘0′ = 48, ‘9′ = 57, ‘.’ = 46, ‘-’ = 43
        var key = window.Event ? evt.which : evt.keyCode;
        var chark = String.fromCharCode(key);
        var tempValue = input.value+chark;
        if(key >= 48 && key <= 57){
            if(filter2(tempValue)=== false){
                return false;
            }else{
                return true;
            }
        }else{
            if(key == 8 || key == 13 || key == 0) {
                return true;
            }else if(key == 46){
                if(filter2(tempValue)=== false){
                    return false;
                }else{
                    return true;
                }
            }else{
                return false;
            }
        }
    };
   function filter2(__val__){
        var preg = /^[0-9]+$/;
        if(preg.test(__val__) === true){
            return true;
        }else{
            return false;
        }
        
    };

    //Formato Mayúsculas
    function mayus(e) {
        e.value = e.value.toUpperCase();
     };

</script>
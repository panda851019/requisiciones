@extends('home')
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

<script> // scrip que genera el spinner -
    function visible_div(){
        var elemento = document.getElementById("capa");
        elemento.style.display = 'block';
        var elemento2 = document.getElementById("capa2");
        elemento2.style.display = 'block';
    }
</script>
 <div class="w-auto">
        <div class="card bg-light">
                    <?php if (session('msg')): ?>
        <div class="alert alert-success" role="alert" align="center"><h3><?php echo e(session('msg')); ?></h3></div>
        <?php endif;?>
        <?php if (session('error')): ?>
        <div class="alert alert-danger" role="alert" align="center"><h4><?php echo e(session('error')); ?></h4></div>
        <?php endif;?>
            <div class="col-md-12 col-lg-11 col-xl-9 p-2 mx-auto">
                <table style="width:100%;" border="0">
                    <tr>
                    <td style="width: 30%; font-size: 16px; color: #04b404; " >■ Registrar Requisición </td>
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
                    <input type="" name="id_folio" id="id_folio" value="0">
                    @csrf


                    <div class="form-group row align-items-center mb-0">
                        <div class="col-sm-2">
                            <label class="col-form-label" for="solicita">Solicita: </label>
                        </div>
                        <div class="col-sm-6">
                            <input type="text" class="form-control form-control-sm" id="solicita" placeholder="Nombre del solicitante" name="solicita" value="{{ Auth::user()->nombre }} " readonly="">
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="col-sm-1">
                            <label class="col-form-label" for="folio"><b>Folio: </b></label>
                        </div>
                        <div class="col-sm-1">

                            <input type="text" class="form-control form-control-sm" id="folioMuestra" name="folioMuestra" readonly="" value>

                        </div>
                    </div>
                    <div class="form-group row align-items-center mb-0">
                        <div class="col-sm-2">
                            <label class="col-form-label" for="area">Area Solicitante: </label>
                        </div>
                        <div class="col-sm-6">
                            <input type="text" class="form-control form-control-sm" id="area" placeholder="Área" name="area" onkeyup="mayus(this);" value="DIRECCIÓN GENERAL DE TECNOLOGÍAS Y COMUNICACIONES" readonly="">
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-2">
                            <label for="fecha_elabora">Fecha: </label>
                        </div>
                        <div class="form-group col-sm-2">
                            <input type="date" class="form-control form-control-sm" id="fecha_elabora" name="fecha_elabora">
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="form-group col-sm-2">
                            <label  for="fecha_requiere">Fecha requiere: </label>
                        </div>
                        <div class="form-group col-sm-2">
                            <input type="date" class="form-control form-control-sm" id="fecha_requiere" name="fecha_requiere">
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>

                    <!--<div class="form-group row align-items-center mb-0">
                        <div class="col-sm-3 col-md-3 col-lg-3 col-xl-2 align-self-center">
                            <label class="col-form-label" for="fecha_requiere">Fecha requiere: </label>
                        </div>
                        <div class="col-sm-2 form-inline">
                            <input type="date" class="form-control form-control-sm" id="fecha_requiere" name="fecha_requiere">
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>-->

                    <div class="form-group row align-items-center mb-0">
                        <div class="col-sm-2">
                            <label class="col-form-label" for="tipo_req">Tipo Requisición: </label>
                        </div>
                        <div class="col-sm-6">
                            <select class="form-control form-control-sm" id="tipo_req"
                            name="tipo_req" data-show-subtext="true" data-live-search="true">
                                <option value="">Seleccione...</option>
                                <option value="1">Bienes</option>
                                <option value="2">Servicios</option>
                                <option value="3">Arrendamientos</option>
                            </select>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>

                    <div class="destinoAlma">
                    <div class="form-group row align-items-center mb-0">
                        <div class="col-sm-2" >
                            <label class="col-form-label" for="almacen">Destino Almacen: </label>
                        </div>
                        <div class="col-sm-6">

                            <select class="selectpicker form-control form-control-sm" id="almacen" name="almacen" data-show-subtext="true" data-live-search="true">
                                <option value="">Seleccione...</option>
                                @foreach($almacenes as $almacen)
                                    <option value="Col. {{$almacen['colonia']}}, {{ str_limit($almacen['calle'], $limit = 80, $end = '...') }}">Col. {{$almacen['colonia']}}, {{ str_limit($almacen['calle'], $limit = 80, $end = '...') }}</option>

                                @endforeach
                            </select>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    </div>
                    <div class="optionDestino">
                    <div class="form-group row align-items-center mb-0">
                        <div class="col-sm-2">
                            <label class="col-form-label" for="lugar_entrega">Lugar de Entrega: </label>
                        </div>
                        <div class="col-sm-6">
                           <input name="lugar_entrega" id="lugar_entrega" class="form-control form-control-sm" onkeyup="mayus(this);">
                           <div class="invalid-feedback"></div>
                        </div>
                    </div>
                  </div>
                     <div class="form-group row align-items-center mb-0">
                        <div class="col-sm-2">
                            <label class="col-form-label" for="observaciones">Justificación, observaciones:</label>
                        </div>
                         <div class="col-sm-6">
                            <textarea rows="3" maxlength="1000" class="form-control form-control-sm" name="observaciones" id="observaciones" cols="50" onkeyup="mayus(this);">
                            </textarea>
                            <div id="contador"></div>
                            <!--<input name="observaciones" id="observaciones" class="form-control form-control-sm" onkeyup="mayus(this);">-->

                            <div class="invalid-feedback"></div>
                        </div>
                    </div>



                    <div class="mb-0"><b><u>Bienes:</u></b></div>


                    <div class="form-group row align-items-center mb-0">
                        <div class="col-sm-2" >
                            <label class="col-form-label" for="par_pre">Partida Presupuestal: </label>
                        </div>
                        <div class="col-sm-6">
                            <select class="selectpicker form-control form-control-sm" id="par_pre" name="par_pre" data-show-subtext="true" data-live-search="true">
                                <option value="00">Seleccione...</option>
                            </select>
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="col-sm-1">
                            <div id="content"></div>
                        </div>
                    </div>

                    <div class="form-group row align-items-center mb-0">
                        <div class="col-sm-2" >
                            <label class="col-form-label" for="cabms_grp">Bien, Servicio: </label>
                        </div>
                        <div class="col-sm-6">
                            <select class="selectpicker form-control form-control-sm" id="cabms_grp" name="cabms_grp" data-show-subtext="true" data-live-search="true">
                                <option value="00">Seleccione...</option>
                            </select>
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="col-sm-1">
                            <div id="content2"></div>
                        </div>
                    </div>
                    <div class="form-group row align-items-center mb-0">
                        <div class="col-sm-2">
                            <label class="col-form-label" for="caracteristicas">Caracteristicas Particulares:</label>
                        </div>
                         <div class="col-sm-6">
                            <textarea rows="3" class="form-control form-control-sm" name="caracteristicas" id="caracteristicas" cols="50" onkeyup="mayus(this);">
                            </textarea>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <br>
                    <div class="form-group row align-items-center mb-0">
                        <div class="col-sm-2">
                            <label class="col-form-label" for="cantidad">Cantidad: </label>
                        </div>
                        <div class="col-sm-2">
                            <!-- <small id="passwordHelpInline" class="text-muted">
                                Cant. Solicitada
                            </small> -->
                            <input type="text" class="form-control form-control-sm" id="cantidad" rows="2" name="cantidad" placeholder=" " onkeypress="
                            return filterFloat2(event,this);">
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="col-sm-2">
                            <label class="col-form-label" for="tipoReq"> U. Medida </label>
                        </div>

                        <div class="col-sm-2">
                            <select class="form-control form-control-sm" id="u_medida" name="u_medida" >

                                <option value="">Seleccione...</option>

                            </select>
                            <div class="invalid-feedback"></div>
                        </div>

                    </div>
                    <div class="form-group row align-items-center mb-0">
                        <div class="col-sm-2">
                            <label class="col-form-label" for="monto">Monto estimado:</label>
                        </div>
                         <div class="col-sm-2">
                            <input name="monto_estimado" id="monto_estimado" class="form-control form-control-sm"
                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">

                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <br>
                     <div class="card col col-xl-8" style="border-width: 1px; border-color: grey">
                        <div class="card-body px-3 pt-4">
                            <div class="form-group row align-items-center">
                                <div class="col-auto">

                                    <label for="customFile" class="col-form-label">Adjuntar Documentos (PDF) </label>
                                </div>
                                <div class="col-sm-9 col-md-9 col-lg-7 col-xl-7">
                                        <input class="col-12 pl-0 pr-0 pt-0 pb-0 btn border " type="file" name="archivo" id="customFile" style="background-color: white">
                                        <label for="archivo"></label>
                                </div>
                                 <div class="col-1" align="center"></div>
                            </div>
                            <div class="form-group row align-items-center">

                                <table class="mx-3 mt-2" id="archivosTabla" border="1" style="width:40%; font-size: 12px; border-collapse: collapse; ">
                                    <thead style="background-color:#d5d6d2; font-size: 12px;">
                                        <tr>
                                            <th class="text-center align-middle">Nombre Archivo</th>
                                            <th class="text-center align-middle">Accion</th>
                                        </tr>
                                    </thead>
                                </table>

                           </div>
                        </div>
                    </div>

                <hr color="#00b140">

                    <!-- GRUPO DE BOTONES -->
                    <div class="row align-items-center">
                         <div class="col" align="left">
                            <button type="button" class="btn btn-secondary" id="limpiar">
                                Limpiar
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


                <div class="mb-2"><b><u>Bienes de Requisición:</u></b></div>
                    <!-- <h4>Mis solicitudes</h4> -->


                <div class="table-responsive col-xl-11 text-nowrap">
                    <table class="table table-sm table-striped table-bordered" style="font-size: 13px; margin-bottom:0px;">
                        <thead style="background-color:#d5d6d2">
                            <tr class="primerFilaII" >
                                <th style="width: 5%" scope="col" class="text-left align-middle">Partida</th>
                                <th style="width: 10%" scope="col" class="text-left align-middle">Código Cabms</th>
                                <th style="width: 56%" scope="col" class="text-left align-middle">Bien</th>
                                <th style="width: 5%" scope="col" class="text-left align-middle">Unidad</th>
                                <th style="width: 13%" scope="col" class="text-center align-middle">Cantidad</th>
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

                <div >
                     <div>
                        <table width="100%">
                            <tr>
                                <td width ="100%" align="center">
                                    <button  id="guardarSol" name="guardarSol" class="btn btn-success" >Nueva Requisición</button>
                                </td>

                                    </form>

                            </tr>
                        </table>
                     </div>
                </div>


                <div class="mb-2"><b><u>Mis Requisiciones:</u></b></div>

                <div role="status" id="capa2" style="display: none; text-align: center;" >
                    <font color="#006400"><h5><br>Firmando requisiciones, esto puede llevar un tiempo!!! </h5></font></div>
                <center><div class="spinner-border text-success" id="capa" role="status" style="display: none;"></div></center><br>

                    <!-- <h4>Mis solicitudes</h4> -->
                <form method="post" action="{{route('all')}}" enctype="multipart/form-data">
                    @csrf
                <div class="table-responsive col-xl-11 text-nowrap" >
                    <table class="table table-sm table-striped table-bordered" style="font-size: 13px; margin-bottom:0px;">
                        <thead style="background-color:#d5d6d2">
                            <tr class="primerFilaII" >
                                <th style="width: 1%" scope="col"class="text-left align-middle"><center>
                                <input type="checkbox" onclick="marcar(this);" /></th>
                                <th style="width: 9%" scope="col"class="text-left align-middle">Fecha</th>
                                <th style="width: 9%" scope="col"class="text-left align-middle">Tipo</th>
                                <th style="width: 9%" scope="col"class="text-left align-middle">Folio</th>
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

                        <input type="text" name="status_req" id="status_req" value="0" >
                        <input type="text" name="tipo" id="tipo" value="RR" >
                    <table width="100%">
                        <tr>
                            <center><input type="submit" class="btn btn-dark" id="all" value= "Firmar seleccionados" onclick="javascript:visible_div();"/></center>

                        </tr>

                    </table>

                </div>
            </form>
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
<script type="text/javascript">
    function marcar(source)
    {
        checkboxes=document.getElementsByTagName('input'); //obtenemos todos los controles del tipo Input
        for(i=0;i<checkboxes.length;i++) //recoremos todos los controles
        {
            if(checkboxes[i].type == "checkbox") //solo si es un checkbox entramos
            {
                checkboxes[i].checked=source.checked; //si es un checkbox le damos el valor del checkbox que lo llamó (Marcar/Desmarcar Todos)
            }
        }
    }
</script>
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
        $(".optionDestino").hide();
        $(".loading").hide();
        // ******** Validador de inputs vacios en Tiempo Real ************
        $("#fecha_requiere").change(function(){
            fecha = $("#fecha_requiere").val();
            if (fecha !== ""){
                $("#fecha_requiere").attr("class","form-control form-control-sm").parent().children("div").text("").show();
                }
                else if (fecha_requiere == "")
                {
                    $("#fecha_requiere").attr("class","form-control is-invalid form-control-sm").parent().children("div").text("Introduce una Fecha Correcta").show();
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
                //$("#cabms_grp").attr("class","selectpicker form-control input-sm").parent().children("div").text("Seleccione Consumible").show();
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

            fecha = $("#fecha_requiere").val();
            recibe = $("#recibe").val();
            cabms_grp = $("#cabms_grp").val();
            cantidad = $("#cantidad").val();
            if (isValidDate(fecha) == false) {
                $("#fecha_requiere").attr("class","form-control is-invalid form-control-sm").parent().children("div").text("Introduce una Fecha Correcta").show();
                $("#fecha_requiere").focus();
            } else if(recibe == ''){
                $("#recibe").attr("class","form-control is-invalid form-control-sm").parent().children("div").text("Introduce Nombre").show();
                $("#recibe").focus();
            } else if(cabms_grp == ''){
                //$("#cabms_grp").attr("class","selectpicker form-control input-sm").parent().children("div").text("Seleccione Consumible").show();
                $("#cabms_grp").focus();
            } else if(cantidad == ''){
                $("#cantidad").attr("class","form-control is-invalid form-control-sm").parent().children("div").text("Introduce Cantidad").show();
                $("#cantidad").focus();
            }
            else
            {
                    $.ajax({
                        type: 'POST',
                        url: 'storeRequisicion',
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
                             //$("#cabms_grp").val("");
                            //$('.selectpicker').selectpicker('refresh');
                            //console.log(data);
                            $("#acciones").prop('disabled',true);
                            //exractArchivos(data);
                            $('#id_folio').val(data);
                            exractmisSol();
                            exractArchivos();
                            exractmisRequisiciones();
                            $("#folioMuestra").val(data);

                            $("#tipo_req").prop('disabled',true);
                            $("#par_pre").prop('disabled',true);

                            limpiarForm();
                        },
                        error: function (jqXHR, text, error) {
                        }
                    });
            }
        });
       /*$("#cabms_grp").change(function() {
                cabms_grp = $("#cabms_grp").val();
               //console.log("dede");
                        $.ajax({
                            type: "POST",
                            dataType: "json",
                            url: "getUnidad",
                            data: {"cabms_grp": cabms_grp},
                            success: function( data ) {
                                //$("#u_medida").val(data[0]['descripcion']);
                                //$("#cantidad").focus();  //focus en cantidad después de seleccionar un consumible
                                },
                                    error: function (data)
                                    {
                                        console.log(data);
                                    }
                                })

        });*/
        exractDataSolForm = function() {
            folio = $("#id_folio").val();
              $.ajax({
                type: "POST",
                dataType: "json",
                url: "getDataSol",
                data: {"folio":  folio},
                success: function (data) {
                    //$("#recibe").val(data[0]['recibe']);
                    $("#fecha_elabora").val(data[0]['fecha_elabora']);
                    $("#fecha_requiere").val(data[0]['fecha_requiere']);
                    $("#lugar_entrega").val(data[0]['lugar_entrega']);
                    $("#observaciones").val(data[0]['observaciones']);
                    $("#tipo_req").val(data[0]['tipo_req']);
                },
                error: function (data) {
                    console.log(data);
                }
            });
        };//Fin extract data table

        //Ini get ParPre
        getParPre = function() {

            tipo_req = $("#tipo_req").val();
            $(".optParp").remove();
              $.ajax({
                type: "POST",
                dataType: "json",
                url: "getParPreTotal",
                data: {"tipo_req":  tipo_req},
                success: function (data) {
                    //console.log(data[0]['cabms']);
                    $(".selectpicker").selectpicker();

                    $.each(data, function (idx, opt){
                        //console.log(opt['cabms']);

                        $('#par_pre').append(
                        '<option class="optParp" value="' + opt['par_pre'] + '">' + opt['par_pre'] + ' - ' +opt['descripcion'] + '</option> '
                        );
                        $('.selectpicker').selectpicker('refresh');
                    });
                    $('#content').fadeIn(1000).html(data);
                },
                error: function (data) {
                    console.log(data);
                }
            });
        };//Fin get ParPre
        //Ini get cabms
        getCabms = function() {
            par_pre = $("#par_pre").val();
            $(".optCamb").remove();
              $.ajax({
                type: "POST",
                dataType: "json",
                url: "getCabmsTotal",
                data: {"par_pre":  par_pre},
                success: function (data) {
                    //console.log(data[0]['cabms']);
                    $(".selectpicker").selectpicker();

                    $.each(data, function (idx, opt){
                        //console.log(opt['cabms']);

                        $('#cabms_grp').append(
                        '<option class="optCamb" value="' + opt['cabms'] + '">' + opt['cabms'] + ' - ' +opt['descripcion'] + '</option> '
                        );
                        $('.selectpicker').selectpicker('refresh');
                    });
                    $('#content2').fadeIn(1000).html(data);
                },
                error: function (data) {
                    console.log(data);
                }
            });
        };//Fin get cabms
        exractmisSol = function() { //extract data table
            folio = $("#id_folio").val();
            //console.log(folio);
            $(".otrasFilas").remove();
              $.ajax({
                type: "POST",
                dataType: "json",
                url: "getMyReqAlm",
                data: {"folio":  folio},
                success: function (data) {
                    //console.log(data);desc_Fisico
                    numero =1;
                   $.each(data, function (idx, opt) {
                        // alert('Estoy recorriendo el registro numero: ' + idx);
                        $('#misSolicitudes').append(
                            '<tr class="otrasFilas">' +
                                '<td class="text-left align-middle" style="width: 5%">' + numero + '</td>' +
                                '<td class="text-left align-middle" style="width: 10%">' + opt.id_cabmsgrp + '</td>' +
                                '<td class="text-left align-middle" style="width: 57%">' + opt.descripcion + '</td>' +
                                '<td class="text-left align-middle" style="width: 5%">' + opt.descUnidad+ '</td>' +
                                '<td class="text-right align-middle" style="width: 12%">' + opt.cantidad + '</td>' +
                                '<td class="text-center align-middle" style="width: 9%"> <a href="javascript:eliminaBienSolicita(' + opt.idSolBien +')" class="btn btn-danger btn-sm" title="Eliminar"><i class="fas fa-trash-alt"></i></a> </td> ' +
                            '</tr>');
                //            $("#fecha_requiere").val(opt.fecha_requiere);
                            $("lugar_entrega").val(opt.lugar_entrega);
                            $("observaciones").val(opt.observaciones);
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
        exractmisRequisiciones = function() { //extract data table
            $(".otrasFilasFol").remove();
              $.ajax({
                type: "POST",
                dataType: "json",
                url: "getMyReqFol",
                //data: {"no_oficio":  no_oficio},
                success: function (data) {
                    //console.log(data);desc_Fisico
                    tipos ="";
                   $.each(data, function (idx, opt) {
                      if(opt.tipo_req == 1){ tipos = "Bienes";}
                      if(opt.tipo_req == 2){ tipos = "Servicios";}
                      if(opt.tipo_req == 3){ tipos = "Arrendamientos";}
                    statusFolio ="";
                    if(opt.status_req == 1){ statusFolio = "Pendiente";}
                    if(opt.status_req == 2){ statusFolio = "Tramitada";}
                    if(opt.status_req == 3){ statusFolio = "Autorizada RM";}
                    if(opt.status_req == 4){ statusFolio = "Autorizada DF";}
                        // alert('Estoy recorriendo el registro numero: ' + idx);

                        $('#misFolios').append(
                            '<tr class="otrasFilasFol">' +
                                '<td style="width: 1%" class="text-left"><center><input type="checkbox" name="checkbox[]" value="'+opt.no_requisicion+'"></center></td>' +
                                '<td style="width: 9%" class="text-left">' + opt.fecha_requiere + '</td>' +
                                '<td style="width: 9%" class="text-left">' + tipos + '</td>' +
                                '<td style="width: 9%" class="text-left">' + opt.no_requisicion + '</td>' +
                                //'<td style="width: 8%" class="text-left">' + statusFolio + '</td>' +
                                '<td style="width: 5%" class="text-center align-middle"> <a href="javascript:editarFolio(' + opt.no_requisicion +')" class="btn btn-success btn-sm" title="Seleccionar" ><i class="fas fa-binoculars"></i></a> </td>' +
                                '<td style="width: 5%" class="text-center">'+
                                    '<a href="getpdf/'+ opt.no_requisicion +'/'+0+'/RR" target="_self" role="button" id="imprimeResg" class="btn btn-info btn-sm" ><i class="fas fa-print"></i></a>'+
                                '</td>' +
                                '<td style="width: 5%" class="text-center"> <a href="javascript:eliminaFolio(' + opt.no_requisicion +')" class="btn btn-danger btn-sm" title="Eliminar"><i class="fas fa-trash-alt"></i></a> </td>' +
                            '</tr>');
                    });
                    //console.log(data[0]['id']);
                },
                error: function (data) {
                    console.log(data);
                }
            });
        };//Fin extract data table
        exractmisRequisiciones();
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
            $("#archivo").val("");
            $("#u_medida").val("");
            $("#cantidad").val("");
            $("#monto_estimado").val("");
            $("#caracteristicas").val("");
            $('select[name=cabms_grp]').val(1);
            $('.selectpicker').selectpicker('refresh');

        };
        $("#limpiar").click(function(){
            limpiarForm();
        });
          $("#guardarSol").click(function(){

             $("#tipo_req").prop('disabled',false);
            $("#par_pre").prop('disabled',false);

            $("#id_folio").val('');
            $("#folioMuestra").val('');
            $("#fecha_elabora").val('');
            $("#fecha_requiere").val('');
            $("#tipo_req").val('');
            $('select[name=almacen]').val(1);
            $('.selectpicker').selectpicker('refresh');
            $("#lugar_entrega").val('');
            $("#observaciones").val('');

            $(".otrasFilas").remove();
            $(".otrasFilasArchivo").remove();
            $('#id_folio').val(0);
            limpiarForm();
        });
          $("#tipo_req").change(function() {
             $('#content').html('<div class="loading"><img src="../images/logo/ajax-loader.gif" alt="loading" /></div>');
            tipo_req = $("#tipo_req").val();
            getParPre();
            getUnidadM(tipo_req);
            //getCabms();
            //console.log( tipo_req );
            emptyRemove(tipo_req);
        });
          $("#par_pre").change(function() {
            $('#content2').html('<div class="loading"><img src="../images/logo/ajax-loader.gif" alt="loading" /></div>');
            tipo_req = $("#tipo_req").val();
            tipo_req = $("#tipo_req").val();
            //getParPre();
            $('select[name=cabms_grp]').val(1);
            //$('.selectpicker').selectpicker('refresh');
            getCabms();
            //console.log( tipo_req );
            //emptyRemove(tipo_req);
        });

        getUnidadM = function(paramTipo)
        {
           console.log(paramTipo+"deded");
            observ =  $('#observ').val();
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "getUnidadTodos",
                data: {"paramTipo":paramTipo},
                success: function (data) {

                    $.each(data, function (idx, opt){
                        $('#u_medida').append(
                        '<option class="optParp" value="' + opt['id'] + '">' +opt['descripcion'] + '</option>'
                        );
                    });

                },
                error: function (data) {
                        console.log(data);
                }
            });



        }

        emptyRemove = function(param)
        {
            console.log(param);
            if(param == 1)
            {
                //$(".optCamb").remove();
                //$("#codigo_cambs").hide();
                 $(".destinoAlma").show();
                 $(".optionDestino").hide();
                 $("#lugar_entrega").val("");
            }
            else if(param ==2)
            {
                $(".destinoAlma").hide();
                $(".optionDestino").show();


            }
            else if(param ==3)
            {
                $(".destinoAlma").hide();
                $(".optionDestino").show();


            }
        }
        var max_chars = 1000;
        $('#max').html(max_chars);
        $('#observaciones').keyup(function() {
            var chars = $(this).val().length;
            var diff = max_chars - chars;
            $('#contador').html(diff);
        });
        exractArchivos = function() { //Busca Archivos
        $(".otrasFilasArchivo").remove();
        $("#adjuntaSubmit").prop('disabled', false);
        //modulo="AlmContratos";
        id_folio = $("#id_folio").val();
           $.ajax({
                type: "GET",
                dataType: "json",
                url: "getPDFRequisicion/"+id_folio,
               // data: {"idOficioBaja":  idOficioBaja},
                success: function (data) {
                    console.log(data);
                    if(data != "")
                    {
                        $("#adjuntaSubmit").prop('disabled', true);
                    }
                   $.each(data, function (idx, opt) {
                     res = opt.split('_')[0]; // segundo elemento del array que se obtiene al hacer spli
                        // alert('Estoy recorriendo el registro numero: ' + idx);
                        $("#archivosTabla").show();
                        $('#archivosTabla').append(
                            '<tr class="otrasFilasArchivo">' +
                                '<td class="text-left align-middle">' + opt + '</td>' +
                                '<td class="text-center align-middle"> <a href="viewPdfAnexoReq/' + res+'"  target="_blank" class="btn btn-success btn-sm" title="Ver"><i class="far fa-file-pdf "></i></a>&nbsp;&nbsp;&nbsp;'+
                                //'<a href="javascript:eliminarArchivoAdjunto(' + res +')" class="btn btn-danger btn-sm" title="Eliminar"><i class="fas fa-trash-alt"></i></a>'+
                                ' </td> ' +
                            '</tr>');
                    });
                    //console.log(data[0]['id']);
                },
                error: function (data) {
                    console.log(data);
                }
            });
        };//Fin Busca Archivos

});//Fin document ready
    function updateRecepcion(id)
    {
        observ =    $('#observ_'+id).val();
        dateAcept=  $('#dateAcept_'+id).val();
        console.log(observ);
        $("#modalConfirm").modal({backdrop: 'static', keyboard: false, show: true});
        $("#Mensaje").html("¿Desea autorizar el <b> Informe ABDF_" + id +"</b> ?");
        $("#Aceptar").click(function () {
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "validaRepo",
                data: {"id":id,"observ":observ,"status":3},
                success: function (data) {
                    $("#modalRegistro").modal({backdrop: 'static', keyboard: false, show: true});
                                        //alert("Datos cargados correctamente!!!");
                                        $("#RegistroGuardado").html("Registro Actualizado!!");
                                        setTimeout(function () {
                                            $('#modalRegistro').modal("hide");
                                        }, 2500);
                        eliminarFilasInv();
                        obtenerPendientes();
                },
                error: function (data) {
                        console.log(data);
                }
            });
        });
    }
       function eliminaBienSolicita(idSolBien) {

            $.ajax({
                type: "GET",
                dataType: "json",
                url: "deleteReqBien/"+idSolBien,
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
                url: "deleteReqFol/"+folio,
                success: function (data) {
                    $(".otrasFilasFol").remove();
                    exractmisSol();
                    exractmisRequisiciones();
                     limpiarForm();
                },
                error: function (data) {
                    console.log(data);
                }
            });
        };
       function editarFolio(folio) {
            console.log(folio);
            $("#id_folio").val(folio);
            $("#folioMuestra").val(folio);
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
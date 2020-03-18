@extends('layouts.app_SinMenu')
@section('content')
<style>
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
              font-size: 7px;
              //margin-bottom: 10px;
              //-webkit-appearance: none;
              //-moz-appearance: none;
              //appearance: none;

            }
            .bootstrap-select .dropdown-menu {
              //margin: 15px 0 0;            
            }
            .dropdown-item{
                padding: -4px;
                margin: -4px;
                font-size: 11px;
            }
            select::-ms-expand {
              /* for IE 11 */
              //display: none;
            }

.tableFixHead          { overflow-y: auto; height: 200px; }
.tableFixHead thead th { position: sticky; top: -1; background-color:#d5d6d2}
/* Just common table stuff. Really. */
table  { border-collapse: collapse; width: 100%; }
th, td { padding: 8px 16px; }
th     { background:#eee; }
</style>

<div class="w-auto">        
        <div class="card bg-light">
            <div class="col-md-9 p-2 mx-auto">
                <table style="width:100%" border="0">
                    <tr>
                    <td style="width: 30%; font-size: 16px; color: #04b404; " >■ Cotizaciones  </td>
                    <td style="width: 38%; text-align: center;">
                     <h5><u>Registrar Cotizaciones</u></h5>
                    </td>
                    <td style="width: 40%" class="text-right">                       
                       <button type="button" class="btn btn-success btn-circle" data-toggle="modal" data-target="#myModal"><i class="fas fa-question-circle"></i></button>
                    </td>
                    </tr>
                </table>

                <form class="form-horizontal" id="formId" role="form" accept-charset="UTF-8" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="">
                    @csrf
                    <input type="hidden" name="id_folio" id="id_folio" value="0">


        <!-- Relacion de Requisiciones -->
                            <div class="form-group row align-items-center mb-0">
                       
                        <div class="col-sm-2">
                            <label class="col-form-label" for="area">Capítulo: </label>
                            <select class="form-control form-control-sm" id="tipo_req" 
                            name="tipo_req" data-show-subtext="true" data-live-search="true">
                                <option value="">Seleccione...</option>
                                <option value="1">Bienes</option>
                                <option value="2">Servicios</option>
                                <option value="3">Arrendamientos</option>
                            </select>
                            <div class="invalid-feedback"></div>
                        </div>
                       
                        <div class="col-sm-6">
                            <label class="col-form-label" for="area">Partida Presupuestal: </label>
                            <select class="selectpicker form-control form-control-sm" id="par_pre" name="par_pre" data-show-subtext="true" data-live-search="true">
                                <option value="00">Todos...</option>
                            </select>
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="col-sm-1">
                            <div id="content"></div>
                        </div>
                        <div class="col-sm-1">
                            <label>&nbsp;&nbsp;&nbsp;&nbsp;</label>
                            <a href="javascript:buscarFolios()" class="btn btn-primary btn-sm" title="Seleccionar">Buscar</a>
                        </div>
                    </div>
                <div class="mt-3"><b><u>Requisiciones:</u></b></div>

                <div class="table-responsive col-xl-12 text-nowrap mx-auto"> 

                    
                <div class="tableFixHead">
                        <table class="table table-sm table-striped table-bordered" style="font-size: 13px; width: 100%; margin-bottom:0px;" id="misFolios">
                           <thead style="background-color:#d5d6d2">
                            <tr class="primerFilaI" >
                                <th style="width: 15%" scope="col"class="text-left align-middle">Fecha Requisición</th>
                                <th style="width: 10%" scope="col"class="text-left align-middle">Folio</th>
                                <th style="width: 15%" scope="col"class="text-left align-middle">Tipo</th>
                                <th style="width: 15%" scope="col"class="text-left align-middle">Par Pre</th>
                                <th style="width: 15%" scope="col"class="text-left align-middle">Fecha en que se requiere</th>
                                <th style="width: 30%" scope="col"class="text-left align-middle">Lugar de entrega</th>                                
                                <th style="width: 15%" scope="col"class="text-center align-middle">Seleccionar</th>
                              
                            </tr>
                        </thead>

                        <tbody>
                           
                        </tbody>
                    </table>
                    <span class="ceroRows"></span>

                </div>
                </div>
                <br>
        <!-- Fin Relacion de Requisiciones -->


        <!-- Relacion de Bienes de Requisiciones -->
                <div class="mb-0"><b><u>Bienes de Requisición:</u></b>  <span id="folioReq"></span></div>

                <div class="table-responsive col-xl-12 text-nowrap mx-auto mb-2"> 
                    
                    <div class="table-responsive pl-0" style="height: 170px; overflow-y:scroll;">
                        <table class="table-sm table-striped table-bordered" style="font-size: 11px; width: 100%" 
                        id="requisicionesBienes">
                         <thead style="background-color:#d5d6d2">
                            <tr class="primerFilaII" >
                                <!-- <th style="width: 5%" scope="col" class="text-left align-middle">Partida</th> -->
                                <th style="width: 8%" scope="col" class="text-left align-middle">Bien/Serv/Arrenda</th>
                                <!-- <th style="width: 10%" scope="col"class="text-left align-middle">Cabms GRP</th> -->
                                <th style="width: 9%" scope="col"class="text-left align-middle">Tipo</th>
                                <th style="width: 9%" scope="col"class="text-left align-middle">Fecha en que se requiere</th>
                                <th style="width: 30%" scope="col"class="text-left align-middle">Descripción</th>
                                <th style="width: 10%" scope="col"class="text-left align-middle">Unidad</th>
                                <th style="width: 12%" scope="col"class="text-left align-middle">Cantidad</th>
                                <th style="width: 16%" scope="col"class="text-left align-middle">Precio Unitario</th>
                                <th style="width: 16%" scope="col"class="text-center align-middle">Total</th>
                                <th style="width: 9%" scope="col"class="text-center align-middle">Cotizar</th>
                            </tr>
                        </thead>
                        </table>
                    </div>
                </div>
        <!-- Fin Relacion de Bienes de Requisiciones -->


        <!-- Cotización de Proveedor -->
                <div class="mb-0"><b><u>Mi Cotización:</u></b></div>
                <input type="hidden" name="id_folio" id="id_folio" value="0">
                <div class="table-responsive col-xl-12 text-nowrap mx-auto mb-2"> 
                    <div class="table-responsive pl-0" style="height: 170px; overflow-y:scroll;">
                        <table class="table-sm table-striped table-bordered" style="font-size: 11px; width: 100%" 
                        id="misCotizaciones">
                         <thead style="background-color:#d5d6d2">
                            <tr class="primerFilaII" >
                                <!-- <th style="width: 5%" scope="col" class="text-left align-middle">Partida</th> -->
                                <th style="width: 8%" scope="col" class="text-left align-middle">No. cotización</th>
                                <th style="width: 8%" scope="col" class="text-left align-middle">Bien/Serv/Arrenda</th>
                                <th style="width: 9%" scope="col"class="text-left align-middle">Tipo</th>
                                <th style="width: 9%" scope="col"class="text-left align-middle">Fecha en que se requiere</th>
                                <th style="width: 35%" scope="col"class="text-left align-middle">Descripción</th>
                                <th style="width: 16%" scope="col"class="text-left align-middle">Unidad</th>
                                <th style="width: 6%" scope="col"class="text-left align-middle">Cantidad</th>
                                <th style="width: 8%" scope="col"class="text-left align-middle">Precio Unitario</th>
                                <th style="width: 10%" scope="col"class="text-center align-middle">Total</th>
                                <!--<th style="width: 9%" scope="col"class="text-center align-middle">Cotizar</th>-->
                            </tr>
                        </thead>
                      
                            
                            
                            
                        </table>
                    </div>
                </div>
               
        <!-- Fin Cotización de Proveedor -->
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
                            <!-- <button type="button" id="autorizar" class="btn btn-success">Generar Cotización</button> -->
                            <a href="generarCotizacion/121" id="generaCot"  class="btn btn-success">Generar Cotización</a>
                         </div>
                         <div class="col"> </div>
                         <div class="col align-self-center" align="right">
                            <a href="{{ url('/') }}" class="btn btn-primary" role="button" id="menu">Menú</a>
                         </div>
                    </div>
                    <!-- TERMINA GRUPO DE BOTONES -->

                    <!-- Modal Solicitud Autorizada! -->
                    <div class="modal fade" id="modalAutorizado" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      <div class="modal-dialog  modal-sm modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header bg-success text-white">
                            <h5 class="modal-title" id="exampleModalLongTitle">¡ATENCIÓN!</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <span id="RegistroGuardado"></span>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-success-2" data-dismiss="modal" id="aceptar">Aceptar</button>
                            <!-- <button type="button" class="btn btn-success" data-dismiss="modal">Cerrar</button> -->
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Fin Modal Registro Exitoso! -->
                
                <br>
                

                </form> <!-- Termina Formulario -->

            </div>
        </div>
    </div>

     <!-- Modal Pregunta Aceptar -->
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
                                <button type="button" class="btn btn-success-2" data-dismiss="modal" id="Aceptar">Aceptar</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
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

@endsection

<script src="{{ asset('js/ajax_libs_jquery213_jquery_min.js') }}"></script>  <!-- Jquery local V.2.1.3 -->
<script src="{{ asset('js/popper-1_16_0_min.js') }}"></script>   <!-- popper local v.1.16.0 -->  
<script src="{{ asset('js/bootstrap-4_4_1_min.js') }}"></script>   <!-- Boostrap local V.4.4.1 -->
<script src="{{ asset('js/bootstrap-select-1_13_9_min.js') }}"></script>   <!-- Bootstrap-Select local V.1.13.9 -->

<script type="text/javascript">
$( document ).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
          $("#tipo_req").change(function() {
             $('#content').html('<div class="loading"><img src="../images/logo/ajax-loader.gif" alt="loading" /></div>');
            tipo_req = $("#tipo_req").val();
            getParPre();
        });

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
                        '<option class="optParp" value="' + opt['par_pre'] + '">' + opt['par_pre'] + ' - ' +opt['descripcion'].substr(0,85) + '...</option> '
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
       exractmisRequisiciones = function() { //extract data table
            tipo_req = $("#tipo_req").val();
            par_pre =$("#par_pre").val();

            //console.log(tipo_req);
            //console.log(par_pre);
            $(".otrasFilasFol").remove();
              $.ajax({
                type: "POST",
                dataType: "json",
                url: "getMyReqFolProveedor",
                data: {"tipo_req":  tipo_req,"par_pre":par_pre},
                success: function (data) {
                    //console.log(data);desc_Fisico
                    if(data ==''){
                        $(".ceroRows").text("0-0 Registros");
                    }
                    else
                    {

                       $.each(data, function (idx, opt) {
                          if(opt.tipo_req == 1){ tipos = "Bienes";}
                          if(opt.tipo_req == 2){ tipos = "Servicios";}
                          if(opt.tipo_req == 3){ tipos = "Arrendamiento";}
                       
                            // alert('Estoy recorriendo el registro numero: ' + idx);
                            $('#misFolios').append(
                                '<tr class="otrasFilasFol">' +
                                    '<td style="width: 8%" class="text-left">' + opt.fecha_requiere + '</td>' +
                                    '<td style="width: 8%" class="text-left">' + opt.no_requisicion + '</td>' +
                                    '<td style="width: 8%" class="text-left">' + tipos + '</td>' +
                                    '<td style="width: 8%" class="text-left">' + opt.parDesc + '</td>' +
                                    '<td style="width: 8%" class="text-left">' + opt.fecha_requiere + '</td>' +
                                    '<td style="width: 8%" class="text-left">' + opt.lugar_entrega + '</td>' +
                                    '<td style="width: 5%" class="text-center align-middle"> <a href="javascript:editarFolio(' + opt.no_requisicion +')" class="btn btn-success btn-sm" title="Seleccionar"><i class="fas fa-binoculars"></i></a> </td>' +
                                '</tr>');

                        });
                            $(".ceroRows").text("");
                    }
                    //console.log(data[0]['id']);
                },
                error: function (data) {
                    console.log(data);
                }
            });
        };//Fin extract data table 



        exractmisSol = function(folio) { //extract data table
           

            $(".otrasFilas").remove();
              $.ajax({
                type: "POST",
                dataType: "json",

                url: "getMyReqAlm",

                data: {"folio":  folio},

                success: function (data) {
                    //console.log(data);desc_Fisico
                    
                   $.each(data, function (idx, opt) {
                        // alert('Estoy recorriendo el registro numero: ' + idx);
                        $('#requisicionesBienes').append(
                            '<tr class="otrasFilas">' +
                                '<td class="text-left align-middle" >' + opt.idSolBien + '</td>' +
                                '<td class="text-left align-middle" >' + opt.id_cabmsgrp + '</td>' +
                                '<td class="text-left align-middle" >' + opt.fecha_requiere + '</td>' +
                                '<td class="text-left align-middle" >' + opt.descripcion + '</td>' +
                                '<td class="text-left align-middle" >' + opt.descUnidad+ '</td>' +
                                '<td class="text-right align-middle" >' + opt.cantidad + '</td>' +
                                '<td class="text-center align-middle" >'+
                                '<input type="text" class="form-control form-control-sm" id="precio_unit_'+opt.idSolBien+'" value="" onkeyup="calc(this,'+opt.cantidad+','+opt.idSolBien+');" name="precio_unit_'+opt.idSolBien+'" >' +
                                '</td> ' +
                                '<td class="text-center align-middle" >'+
                                '<input type="text" class="form-control form-control-sm" id="tot_'+opt.idSolBien+'" value=""  name="tot_'+opt.idSolBien+'"  readonly="">' +
                                '</td> ' +
                                '<td class="text-center align-middle" >'+
                                '<a href="javascript:addCotiza(' + opt.idSolBien +')" id="save_'+opt.idSolBien+'" class="btn btn-primary btn-sm" title="Seleccionar"><i class="fas fa-plus"></i></a> </td>' +

                               

                                '</td> ' +
                            '</tr>');
                            //$("#folio").val(opt.id_folio );
                       
                    });
                    //console.log(data[0]['id']);
                },
                error: function (data) {
                    console.log(data);
                }
            });
        };//Fin extract data table 

    getMisCotizaciones = function() { //extract data table
            id_folio = $('#id_folio').val();
            $(".otrasFilasCotiza").remove();
              $.ajax({
                type: "POST",
                dataType: "json",
                url: "getMisCotizaciones",
                data: {"id_folio":  id_folio},
                success: function (data) {
                    //console.log(data);desc_Fisico
                   $.each(data, function (idx, opt) {
                    
                        // alert('Estoy recorriendo el registro numero: ' + idx);
                      
                        $('#misCotizaciones').append(
                            '<tr class="otrasFilasCotiza">' +

                                '<td style="width: 5%" class="text-center">'+opt.no_requisicion +'</td>'+
                                //'<td style="width: 5%" class="text-center">'+opt.folio_cot +'</td>'+
                                '<td style="width: 5%" class="text-center">'+opt.id_bienreq +'</td>'+
                                '<td style="width: 8%" class="text-left">' + opt.tipo_req + '</td>' +
                                '<td style="width: 8%" class="text-left">' + opt.fecha_requiere + '</td>' +
                                '<td style="width: 8%" class="text-left">' + opt.descripcion + '</td>' +
                                '<td style="width: 8%" class="text-left">' + opt.descUni + '</td>' +
                                '<td style="width: 8%" class="text-left">' + opt.cantidad + '</td>' +
                                '<td style="width: 8%" class="text-left">' + opt.precio_unit + '</td>' +
                                '<td style="width: 8%" class="text-left">' + opt.precio_unit + '</td>' +
                                 +
                            '</tr>');
                    });
                    //console.log(data[0]['id']);
                },
                error: function (data) {
                    console.log(data);
                }
            });
        };//Fin extract data table 


    addCotiza= function(id)
    {

        console.log(id);
        cant =0;
        precio_unit     =    $('#precio_unit_'+id).val();
        id_folio = $("#id_folio").val();
        //dateAcept=  $('#dateAcept_'+id).val();
        //console.log(observ);

        $("#modalConfirm").modal({backdrop: 'static', keyboard: false, show: true});
        $("#Mensaje").html("¿Agregar el bien No. <b> " + id +"</b> ?");
        $("#Aceptar").click(function (e) {
             e.preventDefault()//evitas hacer el submit
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "agregarCotizacion",
                data: {"id":id,"precio_unit":precio_unit,"status":3,"id_folio":id_folio},
                success: function (data) {
                    if(data == "yaExiste")
                    {
                        console.log("ya existe este registro con este folio");
                        //alert("Ya has agregado el articulo con id: " + id);
                    }
                    else
                    {
                        $('#id_folio').val(data);

                        $("#modalRegistro").modal({backdrop: 'static', keyboard: false, show: true});
                        //alert("Datos cargados correctamente!!!");
                        $("#RegistroGuardado").html("Elemento agregado!!");
                        setTimeout(function () {
                            $('#modalRegistro').modal("hide");
                        }, 2500);
                        getMisCotizaciones();

                        $("#generaCot").attr("href", "generarCotizacion/"+ data);
                    }
                },
                error: function (data) {
                        console.log(data);
                }
            });

        });
    }


});//Fin document ready

       function buscarFolios() {
            //console.log(folio);
            exractmisRequisiciones();
        };

   function editarFolio(folio) {
        //console.log(folio);
        $("#folioReq").text(" Folio-> " + folio);
        exractmisSol(folio);
    };

    function calc(e,cantidad,idRB)
    {
        console.log(idRB);
        //console.log(e.value);
        a=e.value;
        b= cantidad;
        c= a * b;
        //console.log(c);
        $("#tot_"+idRB).val(c);

    };
//Formato Mayúsculas
function mayus(e) {
    e.value = e.value.toUpperCase();
};
</script>
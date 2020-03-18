@extends('layouts.app_SinMenu')
@section('content')
<style>
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
                    <thead>
                        <tr>
                        <td style="width: 30%; font-size: 16px; color: #04b404; " >■ Cotizaciones  </td>
                        <td style="width: 38%; text-align: center;">
                         <h5><u>Generar Cotización</u></h5>
                        </td>
                        <td style="width: 40%" class="text-right">                       
                           <button type="button" class="btn btn-success btn-circle" data-toggle="modal" data-target="#myModal"><i class="fas fa-question-circle"></i></button>
                        </td>
                        </tr>
                    </thead>
                    
                </table>



                   <!-- <div class="form-group row align-items-center mb-0">
                        <div class="col-sm-3 col-md-3 col-lg-3 col-xl-2 align-self-center">
                            <label class="col-form-label" for="fecha_cotizacion">Fecha: </label>
                        </div>
                        <div class="col-sm-2 form-inline">
                            <input type="date" class="form-control form-control-sm" id="fecha_cotizacion" name="fecha_cotizacion">
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>-->


            <!-- Cotización de Proveedor -->
                    <div class="mb-0"><b><u>Mi Cotización:</u></b></div>

                <div class="table-responsive col-xl-12 text-nowrap mx-auto"> 
                    <div class="tableFixHead">
                        <table class="table table-sm table-striped table-bordered" style="font-size: 13px; width: 100%; margin-bottom:0px;">
                            <thead style="background-color:#d5d6d2">
                                <tr class="primerFilaIII" >
                                    <th style="width: 8%" scope="col" class="text-left align-middle">Partida</th>
                                    <!-- <th style="width: 10%" scope="col"class="text-left align-middle">Cabms GRP</th> -->
                                    <th style="width: 40%" scope="col"class="text-left align-middle">Descripción</th>
                                    <th style="width: 13%" scope="col"class="text-left align-middle">Unidad</th>
                                    <!-- <th style="width: 5%" scope="col"class="text-left align-middle">Existencia</th> -->
                                    <th style="width: 13%" scope="col"class="text-center align-middle">Cantidad</th>
                                    <th style="width: 13%" scope="col"class="text-center align-middle">Precio Unitario</th>
                                    <th style="width: 13%" scope="col"class="text-center align-middle">Total</th>
                                    <!-- <th style="width: 9%" scope="col"class="text-center align-middle">Autorizar</th> -->
                                </tr>
                            </thead>
                            <tbody><?php 
                                        $nro =1;
                                        $subtotal =0;
                                    ?>
                                @foreach($misCot as $val)
                                    <tr>
                                        <td>
                                            {{ $nro}}
                                        </td>
                                        <td>
                                            {{ $val['descripcion']}} 
                                        </td>
                                        <td>
                                            {{ $val['descUni']}} 
                                        </td>
                                        <td>
                                            {{ $val['cantidad']}} 
                                        </td>
                                        <td>
                                            ${{ $val['precio_unit']}} 
                                        </td>
                                        <td>
                                            <?php 
                                                $total = $val['cantidad'] * $val['precio_unit'];
                                                echo "$" . number_format($total,2);
                                            ?>
                                            
                                        </td>
                                   </tr>

                                   <?php 
                                        $nro++; 
                                        $subtotal =$subtotal + $total;
                                   ?>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-10">                            
                        </div>                           
                        <div class="col-1">
                             Subtotal:
                        </div>
                        <div class="col-1">
                            <!--<input type="number" class="form-control form-control-sm" style="text-align: right;" id="precio_unit" value="<?php echo $subtotal;?>" name="precio_unit" readonly="">-->
                            <?php echo "$".number_format($subtotal,2);?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-10">                            
                        </div>                           
                        <div class="col-1">
                             I.V.A.:
                        </div>
                        <div class="col-1">
                            <!--<input type="number" class="form-control form-control-sm" style="text-align: right;" id="precio_unit" value="1200" name="precio_unit" readonly="">-->
                            <?php 
                                $iva =$subtotal * .16;
                            echo "$".number_format($iva,2);?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-10">                            
                        </div>                           
                        <div class="col-1">
                             Total:
                        </div>
                        <div class="col-1">
                            <!--<input type="number" class="form-control form-control-sm" style="text-align: right;" id="precio_unit" value="1200" name="precio_unit" readonly="">-->
                            <?php 
                                $total = $subtotal + $iva;
                                echo "$".number_format($total,2);
                            ?>
                        </div>
                    </div>



             



                </div>

                          
            <!-- Fin Cotización de Proveedor -->

                    <br>

                <form class="form-horizontal" id="formId" role="form" accept-charset="UTF-8" enctype="multipart/form-data">
                    
                    @csrf
                    <input type="hidden" name="id_folio" id="id_folio" value="{{$id_folio}}">
                        <input type="text" id="subtotal" name="subtotal" value="{{$subtotal}}" hidden>
                        <input type="text" id="iva" name="iva" value="{{$iva}}" hidden>
                        <input type="text" id="total" name="total" value="{{$total}}" hidden>
                    <div class="mb-0"><b><u>Datos de la Cotización:</u></b></div>
                    <div class="form-group row align-items-center mb-0">
                        <div class="col-sm-3 col-md-3 col-lg-3 col-xl-2 align-self-center">
                            <label for="no_cotizacion" class="col-form-label">No. de Cotización: </label>
                        </div>
                        <div class="col-sm-2 col-md-2 col-lg-1 col-xl-2">
                            <input type="text" class="form-control form-control-sm" id="no_cotizacion" name="no_cotizacion">
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="form-group row align-items-center mb-0">
                        <div class="col-sm-3 col-md-3 col-lg-3 col-xl-2 align-self-center">
                            <label for="vigencia" class="col-form-label">Vigencia al: </label>
                        </div>
                        <div class="col-sm-2 col-md-2 col-lg-1 col-xl-6">
                            <input type="date" class="form-control form-control-sm" id="vigencia" name="vigencia">
                            <div class="invalid-feedback"></div>
                        </div>

                    </div>
                    <div class="form-group row align-items-center mb-0">
                        <div class="col-sm-3 col-md-3 col-lg-3 col-xl-2 align-self-center">
                            <label for="plazo_entrega" class="col-form-label">Plazo Entrega: </label>
                        </div>
                        <div class="col-sm-7 col-md-7 col-lg-5 col-xl-6">

                            <input type="date" class="form-control form-control-sm" id="plazo_entrega" name="plazo_entrega">

                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="form-group row align-items-center mb-0">
                        <div class="col-sm-3 col-md-3 col-lg-3 col-xl-2 align-self-center">
                            <label for="garantia" class="col-form-label">Garantía: </label>
                        </div>
                        <div class="col-sm-7 col-md-7 col-lg-5 col-xl-6">
                            <input type="text" class="form-control form-control-sm" id="garantia"  name="garantia" onkeyup="mayus(this);">
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="form-group row align-items-center mb-0">
                        <div class="col-sm-3 col-md-3 col-lg-3 col-xl-2 align-self-center">
                            <label for="integr_nac" class="col-form-label">Grado de Integración Nacional: </label>
                        </div>
                        <div class="col-sm-7 col-md-7 col-lg-5 col-xl-6">
                            <input type="text" class="form-control form-control-sm" id="integr_nac"  name="integr_nac" onkeyup="mayus(this);">
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="form-group row align-items-center mb-0">
                        <div class="col-sm-3 col-md-3 col-lg-3 col-xl-2 align-self-center">
                            <label for="pais_origen" class="col-form-label">País de Origen (Sólo para caso de Bienes): </label>
                        </div>
                        <div class="col-sm-7 col-md-7 col-lg-5 col-xl-6">
                            <input type="text" class="form-control form-control-sm" id="pais_origen"  name="pais_origen" onkeyup="mayus(this);">
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="form-group row align-items-center mb-0">
                        <div class="col-sm-3 col-md-3 col-lg-3 col-xl-2 align-self-center">
                            <label for="forma_pago" class="col-form-label">Forma de pago: </label>
                        </div>
                        <div class="col-sm-7 col-md-7 col-lg-5 col-xl-6">
                            <!-- <input type="text" class="form-control form-control-sm" id="forma_pago" name="forma_pago" onkeyup="mayus(this);"> -->
                            <select class="form-control form-control-sm" id="forma_pago" name="forma_pago">
                               <option value="">Seleccione...</option>
                               <option value="TRANSFERENCIA BANCARIA">TRANSFERENCIA BANCARIA</option>
                               <option value="CHEQUE">CHEQUE</option>
                            </select>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>

                     <div class="form-group row align-items-center">
                        <div class="col-sm-3 col-md-3 col-lg-3 col-xl-2 align-self-center">
                            <label for="rep_legal" class="col-form-label">Representante Legal: </label>
                        </div>
                        <div class="col-sm-7 col-md-7 col-lg-5 col-xl-6">
                            <input type="text" class="form-control form-control-sm" id="rep_legal" name="rep_legal" onkeyup="mayus(this);">
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>

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
                            <button type="submit" id="agregar" class="btn btn-success " >Guardar</button>
                         </div>
                         <div class="col">
                            <a href="{{route('cotizacion', [$id_folio])}}" class="btn btn-danger" role="button" id="menu">Imprimir</a>
                         </div>
                         <div class="col align-self-center" align="right">
                            <a href="{{ url('requisiciones/registrarCotizaciones') }}" class="btn btn-primary" role="button" id="menu">Regresar</a>
                         </div>
                    </div>
                    
                    <!-- TERMINA GRUPO DE BOTONES -->

                </form> <!-- Termina Formulario -->

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


    $('#formId').on('submit', function(e) {
        console.log("deded ");
        e.preventDefault();
        var formData = new FormData(this);
        formData.append('_token', $('input[name=_token]').val());

        //contrato = $("#contrato").val();

        $.ajax({
            type: 'POST',
            url: '../addDatosCotizacion',//Actualiza campos 
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                $("#modalRegistro").modal({backdrop:'static',keyboard:false, show:true});
                //alert("Registro guardado: \n " + data);
                setTimeout(function () {
                $('#modalRegistro').modal("hide");
                }, 1500);
                $(".otrasFilas").remove();
                //extractContratoReg();
                //limpiarForm();
                console.log(data);
                $("#acciones").prop('disabled',true);
                exractArchivos();
                $("#idContratoMod").val(data);
            },
            error: function (jqXHR, text, error) {

            }
        });
    });

        exractArchivos = function() { //Busca Archivos
        $(".otrasFilasArchivo").remove();
        $("#adjuntaSubmit").prop('disabled', false);
        //modulo="AlmContratos";
        id_folio = $("#id_folio").val();
           $.ajax({
                type: "GET",
                dataType: "json",
                url: "../getPDF/"+id_folio,
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
                                '<td class="text-center align-middle"> <a href="../viewPdfAnexo/' + res+'"  target="_blank" class="btn btn-success btn-sm" title="Ver"><i class="far fa-file-pdf "></i></a>&nbsp;&nbsp;&nbsp;'+
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

//Formato Mayúsculas
function mayus(e) {
    e.value = e.value.toUpperCase();
};

</script>
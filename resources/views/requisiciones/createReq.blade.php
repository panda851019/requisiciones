{{-- \resources\views\users\index.blade.php --}}

@extends('home')

@section('title', '| Users')

@section('content')
<!-- begin:: Content -->
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <div class="kt-portlet kt-portlet--tabs">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-toolbar">
                <ul class="nav nav-tabs nav-tabs-space-xl nav-tabs-line nav-tabs-bold nav-tabs-line-3x nav-tabs-line-brand" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#kt_user_edit_tab_1" role="tab">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon id="Shape" points="0 0 24 0 24 24 0 24" />
                                    <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" id="Mask" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                    <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" id="Mask-Copy" fill="#000000" fill-rule="nonzero" />
                                </g>
                            </svg> Datos Generales
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#kt_user_edit_tab_3" role="tab">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect id="bound" x="0" y="0" width="24" height="24" />
                                    <path d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z" id="Path-50" fill="#000000" opacity="0.3" />
                                    <path d="M12,11 C10.8954305,11 10,10.1045695 10,9 C10,7.8954305 10.8954305,7 12,7 C13.1045695,7 14,7.8954305 14,9 C14,10.1045695 13.1045695,11 12,11 Z" id="Mask" fill="#000000" opacity="0.3" />
                                    <path d="M7.00036205,16.4995035 C7.21569918,13.5165724 9.36772908,12 11.9907452,12 C14.6506758,12 16.8360465,13.4332455 16.9988413,16.5 C17.0053266,16.6221713 16.9988413,17 16.5815,17 C14.5228466,17 11.463736,17 7.4041679,17 C7.26484009,17 6.98863236,16.6619875 7.00036205,16.4995035 Z" id="Mask-Copy" fill="#000000" opacity="0.3" />
                                </g>
                            </svg> Bienes
                        </a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#kt_user_edit_tab_4" role="tab">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect id="bound" x="0" y="0" width="24" height="24" />
                                    <path d="M6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,12 C19,12.5522847 18.5522847,13 18,13 L6,13 C5.44771525,13 5,12.5522847 5,12 L5,3 C5,2.44771525 5.44771525,2 6,2 Z M7.5,5 C7.22385763,5 7,5.22385763 7,5.5 C7,5.77614237 7.22385763,6 7.5,6 L13.5,6 C13.7761424,6 14,5.77614237 14,5.5 C14,5.22385763 13.7761424,5 13.5,5 L7.5,5 Z M7.5,7 C7.22385763,7 7,7.22385763 7,7.5 C7,7.77614237 7.22385763,8 7.5,8 L10.5,8 C10.7761424,8 11,7.77614237 11,7.5 C11,7.22385763 10.7761424,7 10.5,7 L7.5,7 Z" id="Combined-Shape" fill="#000000" opacity="0.3" />
                                    <path d="M3.79274528,6.57253826 L12,12.5 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 Z" id="Combined-Shape" fill="#000000" />
                                </g>
                            </svg> Configuración
                        </a>
                    </li>

            
                </ul>
            </div>
        </div>
        <div class="kt-portlet__body">
            
                <div class="tab-content">
                    <div class="tab-pane active" id="kt_user_edit_tab_1" role="tabpanel">
                        <div class="kt-form kt-form--label-right">
                            @include('requisiciones.datosGenerales')


                                    </div>
                                </div>
                            </div>
                        
                        </div>
                    </div>

                    <div class="tab-pane" id="kt_user_edit_tab_3" role="tabpanel">
                        <form class="form-horizontal" id="formIdBienes" role="form" accept-charset="UTF-8" enctype="multipart/form-data">
                        <div class="kt-form kt-form--label-right">
                            
                                <div class="kt-form__body">
                                
                                    <div class="kt-section kt-section--first">
                                        <div class="kt-section__body">

                                            <div class="row">
                                                <label class="col-xl-3"></label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <h3 class="kt-section__title kt-section__title-sm">Agregar Bienes</h3>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                {{ Form::label('par_pre', 'Partida Presupuestal', array('class' => 'col-xl-3 col-lg-3 col-form-label')) }}
                                                <div class="col-lg-9 col-xl-6">
                                                    <select class="selectpicker form-control form-control-sm" id="par_pre" name="par_pre" data-show-subtext="true" data-live-search="true">
                                                        <option value="00">Seleccione...</option>
                                                    </select>
                                                    <div class="invalid-feedback"></div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                {{ Form::label('cabms_grp', 'Bien, Servicio', array('class' => 'col-xl-3 col-lg-3 col-form-label')) }}
                                                <div class="col-lg-9 col-xl-6">
                                                    <select class="selectpicker form-control form-control-sm" id="cabms_grp" name="cabms_grp" data-show-subtext="true" data-live-search="true">
                                                        <option value="00">Seleccione...</option>
                                                    </select>
                                                    <div class="invalid-feedback"></div>
                                                </div>
                                            </div>
                                            <div class="form-group form-group-last row">
                                                {{ Form::label('cantidad', 'Cantidad', array('class' => 'col-xl-3 col-lg-3 col-form-label')) }}
                                                <div class="col-lg-9 col-xl-6">
                                                   <input type="text" class="form-control form-control-sm" id="cantidad" rows="2" name="cantidad" placeholder=" " onkeypress="
                                                    return filterFloat2(event,this);">
                                                    <div class="invalid-feedback"></div>
                                                </div>
                                            </div>
                                            <div class="form-group form-group-last row">
                                                {{ Form::label('u_medida', 'U. Medida', array('class' => 'col-xl-3 col-lg-3 col-form-label')) }}
                                                <div class="col-lg-9 col-xl-6">
                                                   <input type="text" class="form-control form-control-sm" id="u_medida" rows="2" name="u_medida" placeholder=" " onkeypress="
                                                    return filterFloat2(event,this);">
                                                    <div class="invalid-feedback"></div>
                                                </div>
                                            </div>
                                            <div class="form-group form-group-last row">
                                                {{ Form::label('monto_estimado', 'Monto Estimado', array('class' => 'col-xl-3 col-lg-3 col-form-label')) }}
                                                <div class="col-lg-9 col-xl-6">
                                                   <input name="monto_estimado" id="monto_estimado" class="form-control form-control-sm" 
                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                                    <div class="invalid-feedback"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                
                                </div>
                            <div class="kt-separator kt-separator--space-lg kt-separator--fit kt-separator--border-solid">
                            </div>
                            <div class="kt-form__actions">
                                <div class="row">
                                    <div class="col-xl-3"></div>
                                    <div class="col-lg-9 col-xl-6">
                                    <!--<button type="submit" id="agregar" class="btn btn-success " >Guardar</button>-->
                                    <button type="submit" id="agregar" class="btn btn-brand">Guardar</button>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                        </form>
                        <div class="table-responsive col-xl-11 text-nowrap"> 
                    <div class="table-responsive pl-0" style="height: 200px; overflow-y:scroll;">
                        <table class="table-sm table-striped table-bordered" style="font-size: 11px; width: 100%" id="misSolicitudes">
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
                    </div>

                </div>
                    </div>

                  
                    <div class="tab-pane" id="kt_user_edit_tab_4" role="tabpanel">
                        <div class="kt-form kt-form--label-right">
                            <div class="kt-form__body">
                                <div class="kt-section kt-section--first">
                                    <div class="kt-section__body">
                                        <div class="row">
                                            <label class="col-xl-3"></label>
                                            <div class="col-lg-9 col-xl-6">
                                                <h3 class="kt-section__title kt-section__title-sm">Setup Email
                                                            Notification:</h3>
                                            </div>
                                        </div>
    <form class="kt-form kt-form--label-right">
        <div class="kt-portlet__body">                                        
            <div class="form-group row">
                <label class="col-form-label col-lg-3 col-sm-12">Single File Upload</label>
                <div class="col-lg-4 col-md-9 col-sm-12">
                    <div class="dropzone dropzone-default" id="kt_dropzone_1">
                        <div class="dropzone-msg dz-message needsclick">
                            <h3 class="dropzone-msg-title">Drop files here or click to upload.</h3>
                            <span class="dropzone-msg-desc">This is just a demo dropzone. Selected files are <strong>not</strong> actually uploaded.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
                                    </div>
                                </div>

                                <div class="kt-separator kt-separator--border-dashed kt-separator--portlet-fit kt-separator--space-lg">
                                </div>

                                <div class="kt-section kt-section--first">
                                    <div class="kt-section__body">
                                        <div class="row">
                                            <label class="col-xl-3"></label>
                                            <div class="col-lg-9 col-xl-6">
                                                <h3 class="kt-section__title kt-section__title-sm">Activity
                                                            Related
                                                            Emails:</h3>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">When To Email
                                            </label>
                                            <div class="col-lg-9 col-xl-6">
                                                <div class="kt-checkbox-list">
                                                    <label class="kt-checkbox">
                                                        <input type="checkbox"> You have new notifications.
                                                        <span></span>
                                                    </label>
                                                    <label class="kt-checkbox">
                                                        <input type="checkbox"> You're sent a direct message
                                                        <span></span>
                                                    </label>
                                                    <label class="kt-checkbox">
                                                        <input type="checkbox" checked="checked"> Someone adds you as a connection
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                      
                                </div>

                                <div class="kt-separator kt-separator--border-dashed kt-separator--portlet-fit kt-separator--space-lg">
                                </div>


                            </div>
                        </div>
                    </div>
                 

                </div>
            
        </div>
    </div>
</div>
        
                  
<!-- end:: Content -->
@section('scripts')


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
        $("#tipo_req").change(function() {
            $('#content1').html('<div class="loading"><img src="../images/logo/ajax-loader.gif" alt="loading" /></div>');
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

        getParPre = function() 
        {    
            tipo_req = $("#tipo_req").val();
            $(".optParp").remove();
              $.ajax({
                type: "POST",
                dataType: "json",
                url: "newRequisiciones/getParPreTotal",
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
                    $('#content1').fadeIn(1000).html(data);
                    $('#content').fadeIn(1000).html(data);
                },
                error: function (data) {
                    console.log(data);
                }
            });
        };//Fin get ParPre 
        getUnidadM = function(paramTipo)
        {
           console.log(paramTipo+"deded");
            observ =  $('#observ').val();
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "newRequisiciones/getUnidadTodos",
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
        getCabms = function() { 
            par_pre = $("#par_pre").val();
            $(".optCamb").remove();
              $.ajax({
                type: "POST",
                dataType: "json",
                url: "newRequisiciones/getCabmsTotal",
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
        exractmisRequisiciones = function() { //extract data table
            $(".otrasFilasFol").remove();
              $.ajax({
                type: "POST",
                dataType: "json",
                url: "newRequisiciones/getMyReqFol",
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

        $('#formId').on('submit', function(e) {
            e.preventDefault();
            // agrego la data del form a formData
            var formData = new FormData(this);
            formData.append('_token', $('input[name=_token]').val());
                    //console.log(formData);
            fecha = $("#fecha_requiere").val();
            recibe = $("#recibe").val();
            cabms_grp = $("#cabms_grp").val();            
            cantidad = $("#cantidad").val();
            if (isValidDate(fecha) == false) {
                $("#fecha_requiere").attr("class","form-control is-invalid form-control-sm").parent().children("div").text("Introduce una Fecha Correcta").show();
                $("#fecha_requiere").focus();
            }
            else 
            {
                    $.ajax({
                        type: 'POST',
                        url: 'newRequisiciones/storeNewRequ',
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function (data) {
                            
                         //   $("#modalRegistro").modal({backdrop:'static',keyboard:false, show:true});
                            Swal.fire('¡Correcto!','Registro exitoso!','success');
                $("#table-roles-permisos").load(" #table-roles-permisos"); 
                            //alert("Registro guardado: \n " + data);

                             //$("#cabms_grp").val("");
                            //$('.selectpicker').selectpicker('refresh');
                            //console.log(data);
                            $("#acciones").prop('disabled',true);
                            //exractArchivos(data);
                            $('#id_folio').val(data);
                            //exractmisSol();
                            //exractArchivos();
                            exractmisRequisiciones();
                            $("#folioMuestra").val(data);
                            
                            $("#tipo_req").prop('disabled',true);
                            //$("#par_pre").prop('disabled',true);
                            
                            $("#agregarFol").prop('disabled',true);
                            
                            //limpiarForm();
                        },
                        error: function (jqXHR, text, error) {
                        }
                    });
            }        
        });

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


        /*********SEGUNDO SEGMENTO************/

        $('#formIdBienes').on('submit', function(e) {
            e.preventDefault();
            // agrego la data del form a formData
            var formData = new FormData(this);
            formData.append('_token', $('input[name=_token]').val());
            formData.append('no_requisicion', $('#id_folio').val());
            
                    console.log(formData);
            fecha = $("#fecha_requiere").val();
            recibe = $("#recibe").val();
            cabms_grp = $("#cabms_grp").val();            
            cantidad = $("#cantidad").val();
            if (isValidDate(fecha) == false) {
                $("#fecha_requiere").attr("class","form-control is-invalid form-control-sm").parent().children("div").text("Introduce una Fecha Correcta").show();
                $("#fecha_requiere").focus();
            }
            else 
            {
                    $.ajax({
                        type: 'POST',
                        url: 'newRequisiciones/storeNewRequBienes',
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function (data) {
                            
                            Swal.fire('¡Correcto!','Registro exitoso!','success');
                            $("#table-roles-permisos").load(" #table-roles-permisos"); 
                            //$("#cabms_grp").val("");
                            //$('.selectpicker').selectpicker('refresh');
                            //console.log(data);
                            $("#acciones").prop('disabled',true);
                            //exractArchivos(data);
                            //$('#id_folio').val(data);
                            exractmisSol();
                            //exractArchivos();
                            exractmisRequisiciones();
                            //$("#folioMuestra").val(data);
                            
                            $("#tipo_req").prop('disabled',true);
                            //$("#par_pre").prop('disabled',true);
                            
                            //$("#agregar").prop('disabled',true);
                            
                            //limpiarForm();
                        },
                        error: function (jqXHR, text, error) {
                        }
                    });
            }        
        });

        exractmisSol = function() { //extract data table
            folio = $("#id_folio").val();
            //console.log(folio);
            $(".otrasFilas").remove();
              $.ajax({
                type: "POST",
                dataType: "json",
                url: "newRequisiciones/getMyReqAlm",
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



    });//Fin Document Ready

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

    function mayus(e) {
        e.value = e.value.toUpperCase();
     };

</script>


@endsection	
@endsection
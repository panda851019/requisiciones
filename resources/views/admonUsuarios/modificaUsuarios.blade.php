
@extends('home')
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
                            </svg> Modificar Usuarios
                        </a>
                    </li>


                    @can('SupersAdmin')
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

                    @endCan
                </ul>
            </div>
        </div>
        <div class="kt-portlet__body">

                <div class="tab-content">
                    <div class="tab-pane active" id="kt_user_edit_tab_1" role="tabpanel">
                        <div class="kt-form kt-form--label-right">
                         <form class="form-horizontal" id="formId" role="form" accept-charset="UTF-8" enctype="multipart/form-data">
                                        @csrf
                            <div class="kt-form__body">
                                <div class="kt-section kt-section--first">
                                    <div class="kt-section__body">
                                        <div class="row">
                                            <label class="col-xl-3"></label>
                                            <div class="col-lg-9 col-xl-6">
                                                <h3 class="kt-section__title kt-section__title-sm">
                                                    Editar usuarios:
                                                </h3>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-xl-3 col-lg-3 col-form-label">
                                                 <div style="text-align: right;">Selecciona usuario </div>
                                            </div>
                                            <div class="col-lg-9 col-xl-6">
                                                <div class="input-group">

                                                    <select class="selectpicker form-control form-control" id="id_user" name="id_user" data-show-subtext="true" data-live-search="true">
                                                    <option value="">Seleccione...</option>
                                                    @foreach($Usuario as $val)
                                                      <option value="{{ $val['id'] }}" style="text-transform: uppercase;">{{$val['id']}} - {{strtoupper($val['nombre'])}}
                                                      </option>
                                                    @endforeach
                                                </select>
                                                    <div class="invalid-feedback"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="nivel">
                                        <div class="form-group row">
                                            <div class="col-xl-3 col-lg-3 col-form-label">
                                                <div style="text-align: right;">Nivel </div>
                                            </div>
                                              <div class="col-lg-9 col-xl-6">
                                                <select class="selectpicker form-control form-control" id="nivel" name="nivel" data-show-subtext="true" data-live-search="true" >
                                                    <option value="">Seleccione...</option>
                                                    <option value="1">Administrador</option>
                                                    <option value="2">Operador</option>
                                                </select>
                                                <div class="invalid-feedback"></div>
                                              </div>
                                        </div>
                                        </div>
                                        <div class="cve_area">
                                        <div class="form-group row">
                                            <div class="col-xl-3 col-lg-3 col-form-label">
                                                <div style="text-align: right;">Área de Adscripción </div>
                                            </div>
                                              <div class="col-lg-9 col-xl-6">
                                                <select class="selectpicker form-control form-control" id="cve_area" name="cve_area" data-show-subtext="true" data-live-search="true" >
                                                    <option value="">Seleccione...</option>
                                                    @foreach($AreasEn as $valor)
                                                     <option value="{{ $valor['id_area'] }}">{{ $valor['descripcion'] }}</option>
                                                    @endforeach

                                                </select>
                                                <div class="invalid-feedback"></div>
                                              </div>
                                        </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-xl-3 col-lg-3 col-form-label">
                                                <div style="text-align: right;">RFC </div>
                                            </div>
                                        <div class="col-lg-9 col-xl-6">
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span class="input-group-text"><i class="flaticon-open-box"></i></span></div>
                                                <input type="text" class="form-control"  placeholder="RFC con Homoclave" aria-describedby="basic-addon1" maxlength="13" style="text-transform: uppercase;" id="rfc" name="rfc" >
                                            </div>
                                        </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-xl-3 col-lg-3 col-form-label">
                                                <div style="text-align: right;">Correo Electrónico </div>
                                            </div>
                                        <div class="col-lg-9 col-xl-6">
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span class="input-group-text"><i class="flaticon-email"></i></span></div>
                                                <input type="text" class="form-control"  placeholder="Email" aria-describedby="basic-addon1" style="text-transform: lowercase"  id="email" name="email">
                                            </div>
                                        </div>
                                        </div>

                                        <div class="kt-separator kt-separator--space-lg kt-separator--fit kt-separator--border-solid"> </div>

                                        <div class="kt-form__actions">
                                            <div class="row">
                                                <div class="col-xl-3"></div>
                                                <div class="col-lg-9 col-xl-6">
                                                    <button type="submit" class="btn btn-clean btn-icon-sm" id="acciones" >Guardar</button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                    <div class="modal fade" id="modalDatosActualizados" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header bg-success text-white">
                            <h5 class="modal-title" id="exampleModalLongTitle">¡ATENCIÓN!</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <span id="DatosActualizados"></span>
                          </div>
                          <div class="modal-footer">
                            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Aceptar</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button> -->
                          </div>
                        </div>
                      </div>
                    </div>

                    @can('SupersAdmin')
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
                                        <div class="form-group form-group-sm row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">Email Notification
                                            </label>
                                            <div class="col-lg-9 col-xl-6">
                                                <span class="kt-switch">
                                                            <label>
                                                                <input type="checkbox" checked="checked"
                                                                    name="email_notification_1">
                                                                <span></span>
                                                </label>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group form-group-last row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">Send Copy To Personal Email
                                            </label>
                                            <div class="col-lg-9 col-xl-6">
                                                <span class="kt-switch">
                                                            <label>
                                                                <input type="checkbox" name="email_notification_2">
                                                                <span></span>
                                                </label>
                                                </span>
                                            </div>
                                        </div>
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
                                        <div class="form-group form-group-last row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">When To Escalate Emails
                                            </label>
                                            <div class="col-lg-9 col-xl-6">
                                                <div class="kt-checkbox-list">
                                                    <label class="kt-checkbox kt-checkbox--brand">
                                                        <input type="checkbox"> Upon new order.
                                                        <span></span>
                                                    </label>
                                                    <label class="kt-checkbox kt-checkbox--brand">
                                                        <input type="checkbox"> New membership approval
                                                        <span></span>
                                                    </label>
                                                    <label class="kt-checkbox kt-checkbox--brand">
                                                        <input type="checkbox" checked="checked"> Member registration
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="kt-separator kt-separator--border-dashed kt-separator--portlet-fit kt-separator--space-lg">
                                </div>

                                <div class="kt-section kt-section--first">
                                    <div class="kt-section__body">
                                        <div class="row">
                                            <label class="col-xl-3"></label>
                                            <div class="col-lg-9 col-xl-6">
                                                <h3 class="kt-section__title kt-section__title-sm">Updates From
                                                            Keenthemes:</h3>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">Email You With
                                            </label>
                                            <div class="col-lg-9 col-xl-6">
                                                <div class="kt-checkbox-list">
                                                    <label class="kt-checkbox">
                                                        <input type="checkbox"> News about Metronic product and feature updates
                                                        <span></span>
                                                    </label>
                                                    <label class="kt-checkbox">
                                                        <input type="checkbox"> Tips on getting more out of Keen
                                                        <span></span>
                                                    </label>
                                                    <label class="kt-checkbox">
                                                        <input type="checkbox" checked="checked"> Things you missed since you last logged into Keen
                                                        <span></span>
                                                    </label>
                                                    <label class="kt-checkbox">
                                                        <input type="checkbox" checked="checked"> News about Metronic on partner products and other services
                                                        <span></span>
                                                    </label>
                                                    <label class="kt-checkbox">
                                                        <input type="checkbox" checked="checked"> Tips on Metronic business products
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endCan

                </div>

        </div>
    </div>
</div>
<!-- end:: Content -->
@endsection
@section('scripts')

<script src="{{ asset('js/ajax_libs_jquery213_jquery_min.js') }}" ></script>
<script src="{{ asset('js/bootstrap_335_js_bootstrap_min.js') }}" ></script>
<script type="text/javascript">
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        limpiarForm = function()
        {
            $("#id_user").val("");
            $("#nivel").val("");
            $("#nombre").val("");
            $("#rfc").val("");
            $("#cve_area").val("");
            $("#email").val("");

        }

        $("#limpiar").click(function(){
            limpiarForm();
        });

        $("#id_user").change(function() {
        id_user = $("#id_user").val();
        //console.log(id_user);
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "admonUsuarios/getUserdata",
            data: {"id_user": id_user},

            success: function( data ) {
                //console.log(data[0]['nombre']);
                console.log(data);

                $("#email").val(data[0]['email']);
                $("#rfc").val(data[0]['rfc']);
                $("#cve_area").val(data[0]['area']); //Combo select
                $("#nivel").val(data[0]['nivel']); //Combo select
                $("#nombre").val(data[0]['nombre']); //Combo select
                location.reload();
            },
           /* success: function (data)
            {
                alert(data);
            },*/
            error: function (data)
            { console.log(data);
                //alert( console.log(data));
            }
        })
    });
    // ******** Validador de inputs vacios en Tiempo Real ************
        $("#id_user").change(function(){
            id_user = $("#id_user").val();
            if (id_user !== ""){
            $("#id_user").attr("class","form-control form-control-sm").parent().children("div").text("").show();
            }
            else if (id_user == "")
            {
                $("#id_user").attr("class","form-control is-invalid form-control-sm").parent().children("div").text("Debes elegir area").show();
            }
        });
        $("#cve_area").change(function(){
            cve_area = $("#cve_area").val();
            if (cve_area !== ""){
            $("#cve_area").attr("class","form-control form-control-sm").parent().children("div").text("").show();
            }
            else if (cve_area == "")
            {
                $("#cve_area").attr("class","form-control is-invalid form-control-sm").parent().children("div").text("Debes elegir area").show();
            }
        });
        $("#email").keyup(function(){
            email = $("#email").val();
            if (email !== ""){
            $("#email").attr("class","form-control form-control-sm").parent().children("div").text("").show();
            }
            else if (email == "")
            {
                $("#email").attr("class","form-control is-invalid form-control-sm").parent().children("div").text("Debes ingresar email").show();
            }
        });

        // ******** Fin de Validadore en Tiempo Real *********************


      $('#formId').on('submit', function(e) {
            // evito que propague el submit
            e.preventDefault();
            // agrego la data del form a formData
            var formData = new FormData(this);
            formData.append('_token', $('input[name=_token]').val());
            //id = $("#id_mass").val();
            id_user = $("#id_user").val();
            nivel = $("#nivel").val();
            cve_area = $("#cve_area").val();
            password = $("#password").val();
            password2 = $("#password2").val();
            email = $("#email").val();
            email2 = $("#email2").val();

            contrato = $("#contrato").val();
            if (id_user == ''){
                $("#id_user").attr("class","form-control is-invalid form-control-sm").parent().children("div").text("Debes elegir Usuario").show();
                $("#id_user").focus();
            }
            else if (nivel == '') {
                $("#nivel").attr("class","form-control is-invalid form-control-sm").parent().children("div").text("Debes elegir area").show();
                $("#nivel").focus();
                //alert("Fecha Inicial erronea");
            }
            else if (cve_area == '') {
                $("#cve_area").attr("class","form-control is-invalid form-control-sm").parent().children("div").text("Debes elegir area").show();
                $("#cve_area").focus();
                //alert("Fecha Inicial erronea");
            }

            else{
                $.ajax({
                    type: 'POST',
                    url: 'admonUsuarios/userUpdate',
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        //console.log(data);
                        $("#modalDatosActualizados").modal({backdrop:'static',keyboard:false, show:true});
                        $("#DatosActualizados").html(data);
                        setTimeout(function () {
                        $('#modalDatosActualizados').modal("hide");
                        }, 2500);
                        nroContrato = $("#nroContrato").val();

                        //limpiarForm();
                        //$("#menu").click();
                        // alert("Registro guardado: \n " + data);
                    },
                    error: function (jqXHR, text, error) {
                    }
                });
            }
        });
    });
function mayus(e) {
            e.value = e.value.toUpperCase();
            }
</script>
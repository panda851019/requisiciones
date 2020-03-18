 @extends('home') @section('content')

<style type="text/css">

</style>
<script>
    // scrip que genera el spinner -
    function visible_div() {
        var elemento = document.getElementById("capa");
        elemento.style.display = 'block';
        var elemento2 = document.getElementById("capa2");
        elemento2.style.display = 'block';
    }

    function handleSelect(elm) {
        window.location = elm.value + ".php";
    }
</script>
<div class="kt-portlet kt-portlet--mobile">

    <div class="kt-portlet__head kt-portlet__head--lg">

        <div class="kt-portlet__head-label">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <rect x="0" y="0" width="24" height="24"></rect>
                    <path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z" fill="#000000"></path>
                    <rect fill="#000000" opacity="0.3" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519) " x="16.3255682" y="2.94551858" width="3" height="18" rx="1"></rect>
                </g>
            </svg>
            <h3 class="kt-portlet__head-title">
                Autorizar Requisiciones Recursos Materiales
            </h3>

        </div>

        <div class="kt-portlet__head-toolbar">

            <div class="kt-portlet__head-wrapper">
                <?php if (session('msg')): ?>
                    <div class="alert alert-outline-success fade show" role="alert" align="center">
                        <h7>
                            <?php echo e(session('msg')); ?>
                        </h7>
                    </div>
                    <?php endif;?>
                        <div role="status" id="capa2" style="display: none; text-align: center;">
                            <font color="#006400"><h7><br>Firmando requisiciones, esto puede llevar un tiempo!!! </h7></font></div>
                        <center>
                            <div class="spinner-border text-success" id="capa" role="status" style="display: none;"></div>
                        </center>
                        <br>
                        <?php if (session('error')): ?>
                            <div class="alert alert-outline-danger fade show" role="alert" align="center">
                                <h7>
                                    <?php echo e(session('error')); ?>
                                </h7>
                            </div>
                            <?php endif;?>
                                <a onClick="history.back()" class="btn btn-clean btn-icon-sm">
                                    <i class="la la-long-arrow-left"></i> Back
                                </a>
                                &nbsp;

            </div>
        </div>
    </div>
    <form method="post" action="{{route('all')}}" enctype="multipart/form-data">
        @csrf
        <div class="kt-portlet__body">
            <!--begin: Search Form -->
            <div class="kt-form kt-form--label-right kt-margin-t-20 kt-margin-b-10">
                <div class="row align-items-center">
                    <div class="col-xl-8 order-2 order-xl-1">
                        <div class="row align-items-center">

                            <div class="col-md-4 kt-margin-b-20-tablet-and-mobile">
                                <div class="kt-form__group kt-form__group--inline">
                                    <div class="kt-form__label">
                                        <label>Estatus:</label>
                                    </div>
                                    <div class="kt-form__control">
                                        <div class="dropdown bootstrap-select form-control dropup">
                                            <select class="form-control bootstrap-select" id="kt_form_status" tabindex="-98" onchange="javascript:handleSelect(this)">
                                                <option value="0">Seleccione...</option>
                                                <option value="1">Pendiente</option>
                                                <option value="2">Tramitadas</option>
                                                <option value="3">Canceladas</option>

                                            </select>
                                            <input type="text" name="status_req" id="status_req" value="2" hidden>
                                            <input type="text" name="tipo" id="tipo" value="RM" hidden>
                                            <button type="button" class="btn dropdown-toggle btn-light" data-toggle="dropdown" role="combobox" aria-owns="bs-select-1" aria-haspopup="listbox" aria-expanded="false" data-id="kt_form_status" title="Seleccione...">
                                                <div class="filter-option">
                                                    <div class="filter-option-inner">
                                                        <div class="filter-option-inner-inner">Seleccione...</div>
                                                    </div>
                                                </div>
                                            </button>
                                            <div class="dropdown-menu" style="max-height: 437.594px; overflow: hidden; min-height: 144px;">
                                                <div class="inner show" role="listbox" id="bs-select-1" tabindex="-1" aria-activedescendant="bs-select-1-0" style="max-height: 411.594px; overflow-y: auto; min-height: 118px;">
                                                    <ul class="dropdown-menu inner show" role="presentation" style="margin-top: 0px; margin-bottom: 0px;">
                                                        <li><a href="../requisiciones/reqAutorizaRM?statusReq=2" role="option" class="dropdown-item" id="bs-select-1-1" tabindex="0"><span class="text">Pendiente</span></a></li>
                                                        <li><a href="../requisiciones/reqAutorizaRM?statusReq=3" role="option" class="dropdown-item" id="bs-select-1-2" tabindex="0"><span class="text">Tramitadas</span></a></li>
                                                        <li><a href="../requisiciones/reqAutorizaRM?statusReq=6" role="option" class="dropdown-item" id="bs-select-1-3" tabindex="0"><span class="text">Canceladas</span></a></li>

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 kt-margin-b-20-tablet-and-mobile">
                                <div class="kt-form__group kt-form__group--inline">
                                    <div class="kt-form__label">
                                        <label></label>
                                    </div>

                                    <div class="kt-form__control">

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 kt-margin-b-20-tablet-and-mobile">
                                <div class="kt-input-icon kt-input-icon--right">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @if($status_req == 2)
                <div class="col" align="right">
                    <button type="submit" class="btn btn-clean btn-icon-sm" id="all" onclick="javascript:visible_div();">Firmar &nbsp;<i class="flaticon-edit"></i></button>

                </div>
                <br> @endif
            </div>
            <!--end: Search Form -->
        </div>
        <div class="kt-portlet__body kt-portlet__body--fit">
            <!--begin: Datatable -->
            <div class="kt-datatable kt-datatable--default kt-datatable--brand kt-datatable--loaded" id="local_data" style="">
                <table class="kt-datatable__table" style="display: block; text-align: center">
                    <thead class="kt-datatable__head">
                        <tr class="kt-datatable__row" style="left: 0px;">
                            @if($status_req == 2)
                            <th width="2%" data-field="RecordID" class="kt-datatable__cell--center kt-datatable__cell kt-datatable__cell--check">
                                <span>
                            <label >
                                <input type="checkbox" onclick="marcar(this);">&nbsp;<span></span>
                                </label>
                                </span>
                            </th>
                            @endif
                            <th width="8%" class="kt-datatable__cell kt-datatable__cell--sort"><span><center>Folio</center></span>
                            </th>

                            <th width="15%" class="kt-datatable__cell kt-datatable__cell--sort"><span><center>Tipo Requisición</center></span>
                            </th>

                            <th width="35%" class="kt-datatable__cell kt-datatable__cell--sort"><span><center>Partida</center></span>
                            </th>

                            <th width="20%" class="kt-datatable__cell kt-datatable__cell--sort"><span><center>Tramitó</center></span>
                            </th>

                            <th width="10%" class="kt-datatable__cell kt-datatable__cell--sort"><span><center>Fecha Tramitó</center></span>
                            </th>
                            @if($status_req == 2 || $status_req == 3)
                            <th width="10%" colspan="3" class="kt-datatable__cell kt-datatable__cell--sort" style="text-align: center;"><span>Acciones</span>
                            </th>
                            @elseif($status_req == 6 )
                            <th width="10%" colspan="3" class="kt-datatable__cell kt-datatable__cell--sort" style="text-align: center;"><span>Motivo</span>
                            </th>
                            @endif

                        </tr>

                    </thead>

                    <tbody class="kt-datatable__body" style="">
                        @foreach ($data as $value)
                        <tr data-row="0" class="kt-datatable__row" style="left: 0px;">
                            @if($status_req == 2)
                            <td width="2%" class="kt-datatable__cell">
                                <span>
                                        <label>
                                            <input type="checkbox" name="checkbox[]" value="{{ $value->no_requisicion }}" >&nbsp;<span></span>
                                </label>
                                </span>
                            </td>
                            @endif
                            <td width="8%" class="kt-datatable__cell">
                                <span>{{ $value->no_requisicion }}</span>
                            </td>
                            <td width="15%" class="kt-datatable__cell">
                                <span>
                                    @if( $value->tipo_req == 1 ) Bienes  @endif
                                    @if( $value->tipo_req == 2 ) Servicios  @endif
                                    @if( $value->tipo_req == 3 ) Arrendamientos  @endif
                                    </span>
                            </td>
                            <td width="35%" class="kt-datatable__cell">
                                <span>{{ $value->par_pre }} - {{ @$value->descripcion_parpre}}</span>
                            </td>
                            <td width="20%" class="kt-datatable__cell">
                                <span>{{ $value->nombresol  }}</span>
                            </td>
                            <td width="10%" class="kt-datatable__cell">
                                <span>{{ $value->fecha_elabora }}</span>
                            </td>
                            @if($status_req == 2 || $status_req == 3)
                            <td style="text-align: right;" width="4%"><span>
                                        <a href="getpdf/{{ $value->no_requisicion }}/{{ $value->status_req }}/RM" title="PDF" target="_self" role="button" id="imprimeResg">
                                            <i class="fas fa-file-pdf"></i>
                                        </a>
                                    </span>
                            </td>
                            <td width="2%">
                                </span>
                            </td>
                            <td style="text-align: left;" width="4%">
                                <span>
                                        @if($value->adjunto != 0)
                                        <a href="viewPdfAnexoReq/{{ $value->no_requisicion }}" title="Anexo"
                                        target="_blank" role="button" id="imprimeResg" >
                                    <i class="fas fa-paperclip"></i>
                                    </a>
                                    @endif
                                </span>
                            </td>
                            @elseif($status_req == 6)
                            <td style="text-align: right;" width="2%"></td>
                            <td style="text-align: right;" width="6%">
                                <center><a href="javascript:motivo_autrorizaRM({{ $value->no_requisicion }})" id="cancelados"><i class="flaticon2-notification"></i></a></center>
                            </td>
                            <td style="text-align: right;" width="2%"></td>
                            @endif

                        </tr>
                        @endforeach
                    </tbody>

                </table>
                <div class="kt-datatable__pager kt-datatable--paging-loaded">
                    <ul class="kt-datatable__pager-nav">
                        <li>
                            <a title="First" class="kt-datatable__pager-link kt-datatable__pager-link--first kt-datatable__pager-link--disabled" data-page="1" disabled="disabled">
                                <i class="flaticon2-fast-back"></i>
                            </a>
                        </li>
                        <li>
                            <a title="Previous" class="kt-datatable__pager-link kt-datatable__pager-link--prev kt-datatable__pager-link--disabled" data-page="1" disabled="disabled">
                                <i class="flaticon2-back"></i>
                            </a>
                        </li>
                        <li style="">

                        </li>
                        <li style="">
                            <input type="text" class="kt-pager-input form-control" title="Page number">
                        </li>
                        <li style="display: none;"><a class="kt-datatable__pager-link kt-datatable__pager-link-number kt-datatable__pager-link--active" data-page="1" title="1">1</a>
                        </li>
                        <li style="display: none;"><a class="kt-datatable__pager-link kt-datatable__pager-link-number" data-page="2" title="2">2</a>
                        </li>
                        <li style="display: none;"><a class="kt-datatable__pager-link kt-datatable__pager-link-number" data-page="3" title="3">3</a>
                        </li>
                        <li style="display: none;"><a class="kt-datatable__pager-link kt-datatable__pager-link-number" data-page="4" title="4">4</a>
                        </li>
                        <li style="display: none;"><a class="kt-datatable__pager-link kt-datatable__pager-link-number" data-page="5" title="5">5</a>
                        </li>
                        <li></li>
                        <li><a title="Next" class="kt-datatable__pager-link kt-datatable__pager-link--next" data-page="2"><i class="flaticon2-next"></i></a>
                        </li>
                        <li><a title="Last" class="kt-datatable__pager-link kt-datatable__pager-link--last" data-page="10"><i class="flaticon2-fast-next"></i></a>
                        </li>
                    </ul>
                    <div class="kt-datatable__pager-info"><span class="kt-datatable__pager-detail">Showing 1 - 10 of 100</span>
                    </div>
                </div>
            </div>
            <!--end: Datatable -->
        </div>
</div>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <img src='../assets/media/logos/SAF_DGTC.png' width="50%">
                <h4 class="modal-title">MOTIVO DEL RECHAZO</h4>

            </div>
            <div class="modal-body" style="height: 100%">
                <!--<p></p>-->
                <div class="kt-portlet__body">
                    <div class="form-group form-group-last">
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-2 col-form-label">No. Requisición</label>
                        <div class="col-10">
                            <input class="form-control" type="text" id="no_requisicion" name="no_requisicion" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-search-input" class="col-2 col-form-label">Solicitó</label>
                        <div class="col-10">
                            <input class="form-control" type="search" id="solicita" name="solicita" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-tel-input" class="col-2 col-form-label">Motivo</label>
                        <div class="col-10">
                            <textarea class="form-control" name="textarea" rows="8" cols="20" id="motivo" name="motivo" readonly></textarea>
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>

        </div>
        </form>
    </div>
    <!-- Modal large-->

    @endsection

    <script src="{{ asset('js/ajax_libs_jquery213_jquery_min.js') }}"></script>
    <!-- Jquery local V.2.1.3 -->
    <script src="{{ asset('js/popper-1_16_0_min.js') }}"></script>
    <!-- popper local v.1.16.0 -->
    <script src="{{ asset('js/bootstrap-4_4_1_min.js') }}"></script>
    <!-- Boostrap local V.4.4.1 -->

    <script type="text/javascript">
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

        });

        function motivo_autrorizaRM(noReq) {
            //console.log(noReq);
            //console.log("rfrfr");
            $(".detalleFilas").remove();
            $(".bd-example-modal-lg").modal({
                backdrop: 'static',
                keyboard: false,
                show: true
            });
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "requisiciones/cancelados/" + noReq,
                success: function(data) {
                    console.log(data.cancelados[0]['id']);
                    $("#no_requisicion").val(data.cancelados[0]['no_requisicion'])
                    $("#solicita").val(data.cancelados[0]['nombre'])
                    $("#motivo").val(data.cancelados[0]['motivo'])
                    $("#usr_rechazo").val(data.cancelados[0]['usr_rechazo'])
                        /*$("#cancelados").click(function () {
                        $("#no_requisicion").val(data[0].no_requisicion)
                        $("#solicita").val()=data[0].usr_solicita;
                        $("#motivo").val(data[0].motivo)
                        });*/
                },
                error: function(data) {
                    console.log('no llegue');
                }
            });
        };
    </script>
    <script type="text/javascript">
        function marcar(source) {
            checkboxes = document.getElementsByTagName('input'); //obtenemos todos los controles del tipo Input
            for (i = 0; i < checkboxes.length; i++) //recoremos todos los controles
            {
                if (checkboxes[i].type == "checkbox") //solo si es un checkbox entramos
                {
                    checkboxes[i].checked = source.checked; //si es un checkbox le damos el valor del checkbox que lo llamó (Marcar/Desmarcar Todos)
                }
            }
        }
    </script>
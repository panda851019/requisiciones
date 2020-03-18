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
                    <rect id="bound" x="0" y="0" width="24" height="24"></rect>
                    <path d="M2.56066017,10.6819805 L4.68198052,8.56066017 C5.26776695,7.97487373 6.21751442,7.97487373 6.80330086,8.56066017 L8.9246212,10.6819805 C9.51040764,11.267767 9.51040764,12.2175144 8.9246212,12.8033009 L6.80330086,14.9246212 C6.21751442,15.5104076 5.26776695,15.5104076 4.68198052,14.9246212 L2.56066017,12.8033009 C1.97487373,12.2175144 1.97487373,11.267767 2.56066017,10.6819805 Z M14.5606602,10.6819805 L16.6819805,8.56066017 C17.267767,7.97487373 18.2175144,7.97487373 18.8033009,8.56066017 L20.9246212,10.6819805 C21.5104076,11.267767 21.5104076,12.2175144 20.9246212,12.8033009 L18.8033009,14.9246212 C18.2175144,15.5104076 17.267767,15.5104076 16.6819805,14.9246212 L14.5606602,12.8033009 C13.9748737,12.2175144 13.9748737,11.267767 14.5606602,10.6819805 Z" id="Combined-Shape" fill="#000000" opacity="0.3"></path>
                    <path d="M8.56066017,16.6819805 L10.6819805,14.5606602 C11.267767,13.9748737 12.2175144,13.9748737 12.8033009,14.5606602 L14.9246212,16.6819805 C15.5104076,17.267767 15.5104076,18.2175144 14.9246212,18.8033009 L12.8033009,20.9246212 C12.2175144,21.5104076 11.267767,21.5104076 10.6819805,20.9246212 L8.56066017,18.8033009 C7.97487373,18.2175144 7.97487373,17.267767 8.56066017,16.6819805 Z M8.56066017,4.68198052 L10.6819805,2.56066017 C11.267767,1.97487373 12.2175144,1.97487373 12.8033009,2.56066017 L14.9246212,4.68198052 C15.5104076,5.26776695 15.5104076,6.21751442 14.9246212,6.80330086 L12.8033009,8.9246212 C12.2175144,9.51040764 11.267767,9.51040764 10.6819805,8.9246212 L8.56066017,6.80330086 C7.97487373,6.21751442 7.97487373,5.26776695 8.56066017,4.68198052 Z" id="Combined-Shape" fill="#000000"></path>
                </g>
            </svg>
            <h3 class="kt-portlet__head-title">
                Tramitar Requisiciones
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
                                            <input type="text" name="status_req" id="status_req" value="1" hidden>
                                            <input type="text" name="tipo" id="tipo" value="TR" hidden>
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
                                                        <li><a href="../requisiciones/reqTramitar?statusReq=1" role="option" class="dropdown-item" id="bs-select-1-1" tabindex="0"><span class="text">Pendiente</span></a></li>
                                                        <li><a href="../requisiciones/reqTramitar?statusReq=2" role="option" class="dropdown-item" id="bs-select-1-2" tabindex="0"><span class="text">Tramitadas</span></a></li>
                                                        <li><a href="../requisiciones/reqTramitar?statusReq=5" role="option" class="dropdown-item" id="bs-select-1-3" tabindex="0"><span class="text">Canceladas</span></a></li>

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

                @if($status_req == 1)
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
                            @if($status_req == 1)
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

                            <th width="20%" class="kt-datatable__cell kt-datatable__cell--sort"><span><center>Solicita</center></span>
                            </th>

                            <th width="10%" class="kt-datatable__cell kt-datatable__cell--sort"><span><center>Fecha Solicitó</center></span>
                            </th>
                            @if($status_req == 1 || $status_req == 2)
                            <th width="10%" colspan="3" class="kt-datatable__cell kt-datatable__cell--sort" style="text-align: center;"><span>Acciones</span>
                            </th>
                            @elseif($status_req == 5 )
                            <th width="10%" colspan="3" class="kt-datatable__cell kt-datatable__cell--sort" style="text-align: center;"><span>Motivo</span>
                            </th>
                            @endif

                        </tr>

                    </thead>

                    <tbody class="kt-datatable__body" style="">
                        @foreach ($data as $value)
                        <tr data-row="0" class="kt-datatable__row" style="left: 0px;">
                            @if($status_req == 1)
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
                            @if($status_req == 1 || $status_req == 2)
                            <td style="text-align: right;" width="4%"><span>
                                                        <a href="getpdf/{{ $value->no_requisicion }}/{{ $value->status_req }}/TR" title="PDF" target="_self" role="button" id="imprimeResg">
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
                            @elseif($status_req == 5)
                            <td style="text-align: right;" width="2%"></td>
                            <td style="text-align: right;" width="6%">
                                <center><a href="javascript:motivo_tramita({{ $value->no_requisicion }})" id="cancelados"><i class="flaticon2-notification"></i></a></center>
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

        function motivo_tramita(noReq) {
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
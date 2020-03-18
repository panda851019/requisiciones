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
        <rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5"></rect>
        <rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5"></rect>
        <rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5"></rect>
        <rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5"></rect>
    </g>            </svg>
            <h3 class="kt-portlet__head-title">
                &nbsp;Motivo del Rechazo.
            </h3>

        </div>

        <div class="kt-portlet__head-toolbar">

            <div class="kt-portlet__head-wrapper">

            </div>
        </div>
    </div>
    <form action="{{ url('requisiciones/rechazar/rechazado') }}" accept-charset="UTF-8" enctype="multipart/form-data" method="post">
        @csrf
                    <input type="text" name="id" id="id" value="{{$id}}" hidden>
                    <input type="text" name="status_req" id="status_req" value="{{$status_req}}" hidden>
                    <input type="text" name="tipo" id="tipo" value="{{$tipo}}" hidden>
        <div class="kt-portlet__body">
            <!--begin: Search Form -->
            <div class="kt-form kt-form--label-right kt-margin-t-20 kt-margin-b-10">
                <div class="row align-items-center">
                    <div class="col-xl-8 order-2 order-xl-1">
                        <div class="row align-items-center">

							<label>Breve descripción del motivo y/o razón.</label>
                            </div>
                            <div class="col-md-4 kt-margin-b-20-tablet-and-mobile">
                                <div class="kt-form__group kt-form__group--inline">
                                    <div class="kt-form__label">
                                       <textarea name="motivo" id="motivo" rows="5" cols="80" style ="text-transform: uppercase;"></textarea>
                                    </div>

                                    <div class="kt-form__control">

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 kt-margin-b-20-tablet-and-mobile">
                                <div class="kt-input-icon kt-input-icon--right">
									<br>
										<button type="submit" class="btn btn-clean btn-icon-sm"><i class="flaticon-paper-plane"></i>&nbsp;Guardar</button>

                                </div>
                            </div>

                        </div>



            </div>

            <!--end: Search Form -->
        </form>
        </div>

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
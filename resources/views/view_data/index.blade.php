
@extends('home')
@section('content')
    @if($pdf)
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-md-12 py-2 text-center">
                    <table align="center">
                    <tr>
                        <td>
<div class="kt-portlet__head-toolbar">
	                                <div class="kt-portlet__head-wrapper">
	                                    <a onClick="history.back()" class="btn btn-clean btn-icon-sm">
	                                    <i class="la la-long-arrow-left"></i>
	                                    Atras
	                                    </a>
	                                    &nbsp;
	                                </div>
                            	</div>
                        </td>
                        <td>

                       	<form action="{{ url('requisiciones/rechazar') }}" method="POST">
                            @csrf
                                <input type="text" value="{{ $id }}" name="id" hidden>
                                <input type="text" value="{{ $status_req }}" name="status_req" hidden>
                                <input type="text" value="{{ $tipo }}" name="tipo" hidden>
                                @if(($status_req == 1 && $tipo == 'TR')||($status_req == 2 && $tipo == 'RM')||($status_req == 3 && $tipo == 'DF'))
                                <button class="btn btn-clean btn-icon-sm"><i class="flaticon-cancel"></i>&nbsp;Rechazar</button>
                                @endif
                            </form>

                        </td>
                        <td>
                        <form action="{{ url('requisiciones/data_validation') }}" method="POST">
                            @csrf
                            <div class="kt-portlet__head-toolbar">
                                <div class="kt-portlet__head-wrapper">
                                <input type="text" value="{{ $id }}" name="id" hidden>
                                <input type="text" value="{{ $status_req }}" name="status_req" hidden>
                                <input type="text" value="{{ $tipo }}" name="tipo" hidden>
                                @if(($status_req == 0 && $tipo == 'RR')||($status_req == 1 && $tipo == 'TR')||
                                    ($status_req == 2 && $tipo == 'RM')||($status_req == 3 && $tipo == 'DF'))
                                     <button type="submit" class="btn btn-clean btn-icon-sm">Firmar &nbsp;<i class="flaticon-edit"></i></button>
                                	@endif

                                </div>
                            </div>
                        </form>
                        </td>
                    </tr>
                    </table>
                    <iframe src="data:application/pdf;base64,{{ $pdf }}" frameborder="0" class="flex-column py-2" allowfullscreen width="100%" style="height: 70vh !important;"></iframe>
                </div>
            </div>
        </div>
    @else
        <script type="text/javascript">
            window.location = "{{ url('/') }}";
        </script>
    @endif
@stop




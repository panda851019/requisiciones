@extends('home')
@section('content')
    @if($pdfSigned)
        <div class="container">
            <div class="row justify-content-center">
                @if (session('msg'))
                    <div class="alert alert-success" role="alert"><h3>{{ session('msg') }}</h3></div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger" role="alert"><h4>{{ session('error') }}</h4></div>
                @endif
                <div class="col-md-12 py-2 text-center">
                    <a href="{{ url('requisiciones/reqTramitar?statusReq=1') }}" class="btn btn-clean btn-icon-sm"><i class="la la-long-arrow-left"></i>&nbsp;Regresar</a>
                </div>
                <iframe src="data:application/pdf;base64,{{ $pdfSigned }}" frameborder="0" class="flex-column py-2" allowfullscreen width="100%" style="height: 90vh !important;"></iframe>
            </div>
        </div>
    @else
        <script type="text/javascript">
            window.location = "{{ url('/') }}";
        </script>
    @endif
@stop
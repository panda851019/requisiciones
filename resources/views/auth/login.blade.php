<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <title>SECRETARIA DE ADMINISTRACIÓN Y FINANZAS.</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="Sistema de Facturaccion" name="description" />
    <meta content="" name="author" />
    <link rel="icon" type="image/vnd.microsoft.icon" href="{{ asset('assets/media/logos/favicon.ico') }}" sizes="48X16">
    @include('layouts/css/css_header_login')
</head>

<body
    class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">
    <!-- begin:: Page -->
    <div class="kt-grid kt-grid--ver kt-grid--root">
        <div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v6 kt-login--signin" id="kt_login">
            <div
                class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--desktop kt-grid--ver-desktop kt-grid--hor-tablet-and-mobile">
                <div
                    class="kt-grid__item  kt-grid__item--order-tablet-and-mobile-2  kt-grid kt-grid--hor kt-login__aside">
                    <div class="kt-login__wrapper">
                        <div class="kt-login__container">
                            <div class="kt-login__body">
                                <div class="kt-login__logo">
                                    <a href="#">
                                        <img src="assets/media/company-logos/SAF_logo_header.svg" width="100%">
                                    </a>
                                </div>
                                <div class="kt-login__signin">
                                    <div class="kt-login__head">
                                        <h3 class="kt-login__title">Ingresar</h3>
                                    </div>
                                    <div class="kt-login__form">
                                        <form method="POST" enctype="multipart/form-data" class="kt-form">
                                            @csrf
                                                    <div class="custom-file" style="overflow: hidden">
                                                        <input type="file" class="custom-file-input " id="cer" name="cer" accept=".cer" required>
                                                        <label class="custom-file-label" for="inputGroupFile04">Seleccionar archivo .cer</label>
                                                    </div>
                                                    <div class="custom-file" style="overflow: hidden">
                                                        <input type="file" class="custom-file-input " id="key" name="key" accept=".key" required>
                                                        <label class="custom-file-label" for="inputGroupFile04">Seleccionar archivo .key</label>
                                                    </div>

                                            <div class="form-group">
                                                <input class="form-control form-control-last" type="password"
                                                    placeholder="Contraseña" name="password" required>
                                            </div>
                                            <div class="kt-login__extra">
                                                <label class="kt-checkbox">
                                                    <input type="checkbox" name="remember"> Recordarme
                                                    <span></span>
                                                </label>

                                            </div>
                                            <div class="kt-login__actions">
                                                <button id="kt_login_signin_submit"
                                                    class="btn btn-brand btn-success btn-success">Iniciar Sesión</button>
                                                   <!-- <button id="kt_login_correo"  class="btn btn-brand btn-pill btn-elevate">correo</button>-->
                                                <!--<button  class="btn btn-brand btn-pill btn-elevate"xtype="submit" class="btn green pull-right"> Entrar </button>-->
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                                                <div class="kt-login__signup">
                                    <div class="kt-login__head">
                                        <h3 class="kt-login__title">Registar</h3>
                                        <div class="kt-login__desc">Ingrese sus datos para crear su cuenta:</div>
                                    </div>
                                    <div class="kt-login__form">
                                        <!--<form class="kt-form" action="#">-->
                                        <form method="POST" class="kt-form" action="{{ route('create') }}">

                                            <div class="form-group">
                                                <input class="form-control" type="text" placeholder="Nombre Completo"
                                                    name="nombre" style="text-transform:uppercase;">
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control" type="text" placeholder="Apellido Paterno"
                                                    name="apaterno" style="text-transform:uppercase;">
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control" type="text" placeholder="Apellido Materno"
                                                    name="amaterno" style="text-transform:uppercase;">
                                            </div>
                                            <div class="form-group">
                                                 <input class="form-control" type="text" placeholder="Correo electrónico" id="email"name="email" autocomplete="off">
                                            </div>
                                             <div class="form-group">
                                                <input class="form-control" type="text" placeholder="RFC"
                                                    name="rfc" id="rfc" maxlength="13" style="text-transform:uppercase;" required>
                                            </div>
                                             <?php
use Illuminate\Support\Facades\DB;

$areas = DB::table('cat_areas')->orderBy('descripcion', 'ASC')->get();
//dd($consulta);

?>
                                            <div class="form-group">
                                                <select class="custom-select form-control" required name="area" id="area">
                                                                            <option selected="">Elige tu area</option>
                                                                            @foreach ($areas as $value)
                                                                            <option value="{{$value->descripcion}}">{{$value->descripcion}}</option>
                                                                           @endforeach
                                                </select>
                                            </div>


                                            <div class="kt-login__actions">
                                                <button id="kt_login_signup_submit"
                                                    class="btn btn-brand btn-success btn-success">Registrar</button>
                                                <button id="kt_login_signup_cancel"
                                                    class="btn btn-danger btn-danger">Cancelar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="kt-login__forgot">
                                    <div class="kt-login__head">
                                        <h3 class="kt-login__title">¿ Contraseña Olvidada ?</h3>
                                        <div class="kt-login__desc">Ingrese su correo electrónico para restablecer su
                                            contraseña:</div>
                                    </div>
                                    <div class="kt-login__form">
                                        <form class="kt-form" action="#">
                                            <div class="form-group">
                                                <input class="form-control" type="text" placeholder="Correo" name="email"
                                                    id="kt_email" autocomplete="off">
                                            </div>
                                            <div class="kt-login__actions">
                                                <button id="kt_login_forgot_submit"
                                                    class="btn btn-brand btn-pill btn-elevate">Enviar</button>
                                                <button id="kt_login_forgot_cancel"
                                                    class="btn btn-outline-brand btn-pill">Cancelar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="kt-login__account">
                            <span class="kt-login__account-msg">
                                ¿Aún no tienes una cuenta?
                            </span>&nbsp;&nbsp;
                            <a href="javascript:;" id="kt_login_signup" class="kt-login__account-link">Regístrate!</a>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" id="_token">
                        </div>
                    </div>
                </div>
                <div class="kt-grid__item kt-grid__item--fluid kt-grid__item--center kt-grid kt-grid--ver kt-login__content"
                    style="background-image: url(assets/media/bg/bg-5.jpg);  background-repeat: no-repeat; background-position: center; ">

                    <div class="kt-login__section">
                        <div class="kt-login__block" style="font-family: 'Nunito'">
                            <h3 class="kt-login__title">SISTEMA DE REQUISICIONES.</h3>
                            <div class="kt-login__desc">
                                <center>DIRECCION GENERAL DE TECNOLOGIAS Y COMUNICACIONES.<br><br>
                                <img src="assets/media/bg/Logo-CDMX-blanco.svg" width="30%"></center>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- end:: Page -->

    <!-- begin::Global Config(global config for global JS sciprts) -->
    <script>
        // var global URL
    var url = '{!! URL::asset('') !!}';

    var KTAppOptions = {
        "colors": {
            "state": {
                "brand": "#5d78ff",
                "dark": "#282a3c",
                "light": "#ffffff",
                "primary": "#5867dd",
                "success": "#34bfa3",
                "info": "#36a3f7",
                "warning": "#ffb822",
                "danger": "#fd3995"
            },
            "base": {
                "label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
                "shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
            }
        }
    };
    </script>
    <!-- end::Global Config -->
    <!--begin::Global Theme Bundle(used by all pages) -->
    @include('layouts/scripts/js_header_login')

    <!--end::Global Theme Bundle -->
</body>

</html>

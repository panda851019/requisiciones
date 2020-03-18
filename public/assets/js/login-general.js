"use strict";
var KTLoginGeneral = function() {

    var t = $("#kt_login"),
        i = function(t, i, e) {
            var n = $('<div class="kt-alert kt-alert--outline alert alert-' + i + ' alert-dismissible" role="alert">\t\t\t<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>\t\t\t<span></span>\t\t</div>');
            t.find(".alert").remove(), n.prependTo(t), KTUtil.animateClass(n[0], "fadeIn animated"), n.find("span").html(e)
        },
        e = function() {
            t.removeClass("kt-login--forgot"), t.removeClass("kt-login--signup"), t.addClass("kt-login--signin"), KTUtil.animateClass(t.find(".kt-login__signin")[0], "flipInX animated")
        },
        n = function() {
            $("#kt_login_forgot").click(function(i) {
                i.preventDefault(), t.removeClass("kt-login--signin"), t.removeClass("kt-login--signup"), t.addClass("kt-login--forgot"), KTUtil.animateClass(t.find(".kt-login__forgot")[0], "flipInX animated")
            }), $("#kt_login_forgot_cancel").click(function(t) {
                t.preventDefault(), e()
            }), $("#kt_login_signup").click(function(i) {
                i.preventDefault(), t.removeClass("kt-login--forgot"), t.removeClass("kt-login--signin"), t.addClass("kt-login--signup"), KTUtil.animateClass(t.find(".kt-login__signup")[0], "flipInX animated")
            }), $("#kt_login_signup_cancel").click(function(t) {
                t.preventDefault(), e()
            })
        };
    return {
        init: function() {

            n(), $("#kt_login_signup_submit").click(function(e) {
                var message = '';
                e.preventDefault();
                var token = $('#_token').val();
                var s = $(this),
                    r = $(this).closest("form");
                r.validate({
                    onfocusout: false,
                    onkeyup: false,
                    onclick: false,
                    rules: {
                        rrfc: {
                            required: true,
                            rfc: !0,
                                    remote: {
                                        headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        },
                                        url: url+'users/validEmail', type: 'POST', cache: false, dataType: 'json', data: {
                                            remail: function() {
                                                return $('#rrfc').val();
                                            }
                                        },
                                        dataFilter: function(response) {
                                            response=$.parseJSON(response);
                                            if (response.status==='valido') {
                                                return true;
                                            }
                                            else {
                                                message="El Correo ya existe";
                                                return false;
                                            }
                                        },
                                        error: function(respuesta) {
                                        }
                            },
                        },
                        user: {
                            required: true,
                                remote: {
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    url: url+'users/validUser', type: 'POST', cache: false, dataType: 'json', data: {
                                        user: function() {
                                            return $('#user').val();
                                        }
                                    },
                                    dataFilter: function(response) {
                                        response=$.parseJSON(response);
                                        if (response.status==='valido') {
                                            return true;
                                        }
                                        else {
                                            message="El usuario ya existe";
                                            return false;
                                        }
                                    },
                                    error: function(respuesta) {

                                    }
                                }
                        },
                        nombre: {
                            required: true,
                        },
                        apaterno: {
                            required: true,
                        },
                        password: {
                            required: true,
                        },
                        password_confirmation: {
                            required: '#password',
                            required: true,
                            minlength: 3,
                            equalTo: "#password"
                        },

                        agree: {
                            required: true,
                        },
                    },
                    messages: {
                        user: {
                            remote: function(){ return message; }
                        },
                        remail: {
                            remote: function(){ return message; }
                        },
                        nombre: "Nombre requerido.",
                        apaterno: "Apellido Paterno requerido.",
                        password: "Contraseña requerida.",
                        password_confirmation: {
                             required: 'Debe ingresar la contraseña',
                             minlength: 'La contraseña debe tener mínimo 3 caracteres',
                             equalTo: 'Debe ingresar la misma constraseña'
                             },
                        agree: "Debe de aceptar los términos y condiciones .",
                        }
                }), r.valid() && (s.addClass("kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light").attr("disabled", !0), r.ajaxSubmit({
                    url: "register",
                    type: 'POST',
                    data: {
                        "_token": $("meta[name='csrf-token']").attr("content"),
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data,n, a, l, o) {
                    console.log(data);
                        if(data.resp == false){
                            console.log('es falso');
                       // Swal.fire('El Correo ya existe!','Verifique el correo','error');
                         s.removeClass("kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light").attr("disabled", !1)
                        , i(r, "danger", "Este RFC ya se encuentra registrado en el sistema, por favor verifica la información"),
                          e();
                        }
                        else{
                            console.log('es verdadedo');
                           Swal.fire('¡Aviso!','Las instrucciones se han enviado a su correo.','warning');
                             s.removeClass("kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light").attr("disabled", !1), r.clearForm(), r.validate().resetForm(), e();
                            var n = t.find(".kt-login__signin form");
                            n.clearForm(), n.validate().resetForm(), i(n, "success", "Las instrucciones se han enviado a su correo.")
                        }
                    },
                    error: function() {
                    }
                })
                )
            }), $("#kt_login_forgot_submit").click(function(n) {
                n.preventDefault();
                var s = $(this),
                    r = $(this).closest("form");

                r.validate({
                    onfocusout: false,
                    onkeyup: false,
                    onclick: false,
                    rules: {
                        email: {
                            required: !0,
                            email: !0
                        }
                    }, messages: {
                        email: "Email requerido"}
                }), r.valid() && (s.addClass("kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light").attr("disabled", !0), r.ajaxSubmit({
                    url: "passForgot",
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        "_token": $("meta[name='csrf-token']").attr("content"),
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data,n, a, l, o) {
                       if(data.resp == false){
                            console.log('es falso');
                        s.removeClass("kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light").attr("disabled", !1)
                        , i(r, "danger", "Verifique el correo")
                        }
                        else{
                            console.log('es verdadedo');
                            s.removeClass("kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light").attr("disabled", !1), r.clearForm(), r.validate().resetForm(), e();
                            var n = t.find(".kt-login__signin form");
                            n.clearForm(), n.validate().resetForm(), i(n, "success", "Las instrucciones se han enviado a su correo.")
                        }
                    },error: function() {
                        Swal.fire('El Correo no existe!','Verifique el correo','error');
                        e.removeClass("kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light").attr("disabled", !1)
                        , i(n, "danger", "El correo no existe, Verifique el correo"), r.validate().resetForm()
                    }
                }))
            }),
            //correo
            $("#kt_login_correo").click(function(n) {
                n.preventDefault();
                var s = $(this),
                    r = $(this).closest("form");
                r.validate({
                    onfocusout: false,
                    onkeyup: false,
                    onclick: false,

                 }), r.valid() && (s.addClass("kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light").attr("disabled", !0), r.ajaxSubmit({
                    url: "register",
                    type: 'POST',
                    data: {
                        "_token": $("meta[name='csrf-token']").attr("content"),
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(datos,n, a, l, o) {
                        if(datos.resp == false){
                            console.log('es falso');
                            Swal.fire('El Correo no existe!','Verifique el correo','error');
                        s.removeClass("kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light").attr("disabled", !1)
                        , i(r, "danger", "Verifique el correo"), r.validate().resetForm()
                        }
                        else{
                            console.log('es verdadedo');
                            Swal.fire('Correo!','Correo enviado','warning');
                            s.removeClass("kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light").attr("disabled", !1), r.clearForm(), r.validate().resetForm(), e();
                            var n = t.find(".kt-login__signin form");
                            n.clearForm(), n.validate().resetForm(), i(n, "success", "Las instrucciones se han enviado a su correo.")
                        }
                    },
                    error: function() {
                        e.removeClass("kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light").attr("disabled", !1)
                        , i(n, "danger", "Algo salio mal, Intentar en otro momento"), n.validate().resetForm()
                    }
                }))
            })
        }
    }
}();
jQuery(document).ready(function() {
   KTLoginGeneral.init()
    $("#termCond").on('click',function(t){
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: 'condTerminos',
            dataType: 'html',
            success: function(resp_success) {
                var modal = resp_success;
                $(modal).modal().on('shown.bs.modal', function() {

                }).on('hidden.bs.modal', function() {
                    $(this).remove();
                });
            },
            error: function(respuesta) {
                Swal.fire('¡Alerta!','Error de conectividad de red USR-03','warning');
            }
        });




        });

});
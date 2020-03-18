

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
                     </svg>
                     Asignar permisos
                  </a>
               </li>
               @can('SupersAdmin')
               <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#kt_user_edit_tab_4" role="tab">
                     <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                           <path d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z" id="Path-50" fill="#000000" opacity="0.3"></path>
                           <path d="M12,11 C10.8954305,11 10,10.1045695 10,9 C10,7.8954305 10.8954305,7 12,7 C13.1045695,7 14,7.8954305 14,9 C14,10.1045695 13.1045695,11 12,11 Z" id="Mask" fill="#000000" opacity="0.3"></path>
                           <path d="M7.00036205,16.4995035 C7.21569918,13.5165724 9.36772908,12 11.9907452,12 C14.6506758,12 16.8360465,13.4332455 16.9988413,16.5 C17.0053266,16.6221713 16.9988413,17 16.5815,17 C14.5228466,17 11.463736,17 7.4041679,17 C7.26484009,17 6.98863236,16.6619875 7.00036205,16.4995035 Z" id="Mask-Copy" fill="#000000" opacity="0.3"></path>
                        </g>
                     </svg>
                     Configuración
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
                                       Permisos usuarios:
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
                              <div class="panel">
                                 <div></div>
                                 <!-- Inicio Rows-->
                                 <div class="kt-portlet__body kt-portlet__body--fit">
                                    <!--begin: Datatable -->
                                    <div class="kt-datatable kt-datatable--default kt-datatable--brand kt-datatable--loaded" id="local_data" style="">
                                       <table class="kt-datatable__table" style="display: block; text-align: center">
                                          <thead class="kt-datatable__head">
                                             <tr class="kt-datatable__row" style="left: 0px;">
                                                <th width="8%" class="kt-datatable__cell kt-datatable__cell--sort">
                                                   <span>
                                                      <center>ID</center>
                                                   </span>
                                                </th>
                                                <th width="15%" class="kt-datatable__cell kt-datatable__cell--sort">
                                                   <span>
                                                      <center>Sección</center>
                                                   </span>
                                                </th>
                                                <th width="35%" class="kt-datatable__cell kt-datatable__cell--sort">
                                                   <span>
                                                      <center>Proceso</center>
                                                   </span>
                                                </th>
                                                <th width="2%" data-field="RecordID" class="kt-datatable__cell--center kt-datatable__cell kt-datatable__cell--check">
                                                   <span>
                                                   <label >
                                                   <input type="checkbox" onclick="marcar(this);">&nbsp;<span></span>
                                                   </label>
                                                   </span>
                                                </th>
                                             </tr>
                                          </thead>
                                          <tbody class="kt-datatable__body" style="">
                                             <tr data-row="0" class="kt-datatable__row" style="left: 0px;">
                                                <td width="8%" class="kt-datatable__cell">
                                                   <span>1</span>
                                                </td>
                                                <td width="15%" class="kt-datatable__cell">
                                                   <span>Solicitar Requisicion
                                                   </span>
                                                </td>
                                                <td width="35%" class="kt-datatable__cell">
                                                   <span>Registrar requisicion</span>
                                                </td>
                                                <td width="2%" class="kt-datatable__cell">
                                                   <span>
                                                   <label>
                                                   <input type="checkbox" name="checkbox[]" value="" >&nbsp;<span></span>
                                                   </label>
                                                   </span>
                                                </td>
                                             </tr>

                                             <tr data-row="0" class="kt-datatable__row" style="left: 0px;">
                                                <td width="8%" class="kt-datatable__cell">
                                                   <span>2</span>
                                                </td>
                                                <td width="15%" class="kt-datatable__cell">
                                                   <span>Tramitar requisiciones
                                                   </span>
                                                </td>
                                                <td width="35%" class="kt-datatable__cell">
                                                   <span>Tramitar requisicion</span>
                                                </td>
                                                <td width="2%" class="kt-datatable__cell">
                                                   <span>
                                                   <label>
                                                   <input type="checkbox" name="checkbox[]" value="" >&nbsp;<span></span>
                                                   </label>
                                                   </span>
                                                </td>
                                             </tr>

                                             <tr data-row="0" class="kt-datatable__row" style="left: 0px;">
                                                <td width="8%" class="kt-datatable__cell">
                                                   <span>3</span>
                                                </td>
                                                <td width="15%" class="kt-datatable__cell">
                                                   <span>Tramitar requisiciones
                                                   </span>
                                                </td>
                                                <td width="35%" class="kt-datatable__cell">
                                                   <span>Requisiciones pendientes</span>
                                                </td>
                                                <td width="2%" class="kt-datatable__cell">
                                                   <span>
                                                   <label>
                                                   <input type="checkbox" name="checkbox[]" value="" >&nbsp;<span></span>
                                                   </label>
                                                   </span>
                                                </td>
                                             </tr>

                                             <tr data-row="0" class="kt-datatable__row" style="left: 0px;">
                                                <td width="8%" class="kt-datatable__cell">
                                                   <span>4</span>
                                                </td>
                                                <td width="15%" class="kt-datatable__cell">
                                                   <span>Tramitar requisiciones
                                                   </span>
                                                </td>
                                                <td width="35%" class="kt-datatable__cell">
                                                   <span>Requisiciones tramitadas</span>
                                                </td>
                                                <td width="2%" class="kt-datatable__cell">
                                                   <span>
                                                   <label>
                                                   <input type="checkbox" name="checkbox[]" value="" >&nbsp;<span></span>
                                                   </label>
                                                   </span>
                                                </td>
                                             </tr>

                                             <tr data-row="0" class="kt-datatable__row" style="left: 0px;">
                                                <td width="8%" class="kt-datatable__cell">
                                                   <span>5</span>
                                                </td>
                                                <td width="15%" class="kt-datatable__cell">
                                                   <span>Tramitar requisiciones
                                                   </span>
                                                </td>
                                                <td width="35%" class="kt-datatable__cell">
                                                   <span>Requisiciones canceladas</span>
                                                </td>
                                                <td width="2%" class="kt-datatable__cell">
                                                   <span>
                                                   <label>
                                                   <input type="checkbox" name="checkbox[]" value="" >&nbsp;<span></span>
                                                   </label>
                                                   </span>
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                 </div>
                                 <!-- fin Rows-->
                                 <div class="table-responsive">
                                 </div>
                                 <div class="row align-items-center">
                                    <div class="col align-self-center" align="right">
                                       <button type="submit" class="btn btn-clean btn-icon-sm" id="acciones" >Guardar</button>
                                    </div>
                                 </div>
                  </form>
                  </div>
                  <div class="kt-form__actions">
                  <div class="row">
                  <div class="col-xl-3"></div>
                  <div class="col-lg-9 col-xl-6">
                  </div>
                  </div>
                  </div>
                  </div>
                  </div>
                  </div>
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
                                    Notification:
                                 </h3>
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
                                    Emails:
                                 </h3>
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
                                    Keenthemes:
                                 </h3>
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
@section('scripts')
<script>
   $( document).ready(function() {
       $.ajaxSetup({
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
           });
       $(".optionDestino").hide();
      $(".loading").hide();
           // ******** Validador de inputs vacios en Tiempo Real ************
           $("#fecha_requiere").change(function(){
               fecha = $("#fecha_requiere").val();
               if (fecha !== ""){
                   $("#fecha_requiere").attr("class","form-control form-control-sm").parent().children("div").text("").show();
                   }
                   else if (fecha_requiere == "")
                   {
                       $("#fecha_requiere").attr("class","form-control is-invalid form-control-sm").parent().children("div").text("Introduce una Fecha Correcta").show();
                   }
           });
           $("#recibe").keyup(function(){
               recibe = $("#recibe").val();
               if (recibe !== ""){
               $("#recibe").attr("class","form-control form-control-sm").parent().children("div").text("").show();
               }
               else if (recibe == "")
               {
                   $("#recibe").attr("class","form-control is-invalid form-control-sm").parent().children("div").text("Introduce Nombre").show();
               }
           });
           $("#cabms_grp").change(function(){
               cabms_grp = $("#cabms_grp").val();
               if (cabms_grp !== ""){
               //$("#cabms_grp").attr("class","selectpicker form-control input-sm").parent().children("div").text("").show();
               }
               else if (cabms_grp == "")
               {
                   //$("#cabms_grp").attr("class","selectpicker form-control input-sm").parent().children("div").text("Seleccione Consumible").show();
               }
           });
           $("#cantidad").keyup(function(){
               cantidad = $("#cantidad").val();
               if (cantidad !== ""){
               $("#cantidad").attr("class","form-control form-control-sm").parent().children("div").text("").show();
               }
               else if (cantidad == "")
               {
                   $("#cantidad").attr("class","form-control is-invalid form-control-sm").parent().children("div").text("Introduce Cantidad").show();
               }
           });
           // ******** Fin de Validadore en Tiempo Real *********************
           $('#formId').on('submit', function(e) {

               e.preventDefault();
               // agrego la data del form a formData
               var formData = new FormData(this);
               formData.append('_token', $('input[name=_token]').val());

               fecha = $("#fecha_requiere").val();
               recibe = $("#recibe").val();
               cabms_grp = $("#cabms_grp").val();
               cantidad = $("#cantidad").val();
               if (isValidDate(fecha) == false) {
                   $("#fecha_requiere").attr("class","form-control is-invalid form-control-sm").parent().children("div").text("Introduce una Fecha Correcta").show();
                   $("#fecha_requiere").focus();
               } else if(recibe == ''){
                   $("#recibe").attr("class","form-control is-invalid form-control-sm").parent().children("div").text("Introduce Nombre").show();
                   $("#recibe").focus();
               } else if(cabms_grp == ''){
                   //$("#cabms_grp").attr("class","selectpicker form-control input-sm").parent().children("div").text("Seleccione Consumible").show();
                   $("#cabms_grp").focus();
               } else if(cantidad == ''){
                   $("#cantidad").attr("class","form-control is-invalid form-control-sm").parent().children("div").text("Introduce Cantidad").show();
                   $("#cantidad").focus();
               }
               else
               {
                       $.ajax({
                           type: 'POST',
                           url: 'storeRequisicion',
                           data: formData,
                           cache: false,
                           contentType: false,
                           processData: false,
                           success: function (data) {

                               $("#modalRegistro").modal({backdrop:'static',keyboard:false, show:true});

                               //alert("Registro guardado: \n " + data);
                               setTimeout(function () {
                               $('#modalRegistro').modal("hide");
                               }, 1000);
                                //$("#cabms_grp").val("");
                               //$('.selectpicker').selectpicker('refresh');
                               //console.log(data);
                               $("#acciones").prop('disabled',true);
                               //exractArchivos(data);
                               $('#id_folio').val(data);
                               exractmisSol();
                               exractArchivos();
                               exractmisRequisiciones();
                               $("#folioMuestra").val(data);

                               $("#tipo_req").prop('disabled',true);
                               $("#par_pre").prop('disabled',true);

                               limpiarForm();
                           },
                           error: function (jqXHR, text, error) {
                           }
                       });
               }
           });
          /*$("#cabms_grp").change(function() {
                   cabms_grp = $("#cabms_grp").val();
                  //console.log("dede");
                           $.ajax({
                               type: "POST",
                               dataType: "json",
                               url: "getUnidad",
                               data: {"cabms_grp": cabms_grp},
                               success: function( data ) {
                                   //$("#u_medida").val(data[0]['descripcion']);
                                   //$("#cantidad").focus();  //focus en cantidad después de seleccionar un consumible
                                   },
                                       error: function (data)
                                       {
                                           console.log(data);
                                       }
                                   })

           });*/
           exractDataSolForm = function() {
               folio = $("#id_folio").val();
                 $.ajax({
                   type: "POST",
                   dataType: "json",
                   url: "getDataSol",
                   data: {"folio":  folio},
                   success: function (data) {
                       //$("#recibe").val(data[0]['recibe']);
                       $("#fecha_elabora").val(data[0]['fecha_elabora']);
                       $("#fecha_requiere").val(data[0]['fecha_requiere']);
                       $("#lugar_entrega").val(data[0]['lugar_entrega']);
                       $("#observaciones").val(data[0]['observaciones']);
                       $("#tipo_req").val(data[0]['tipo_req']);
                   },
                   error: function (data) {
                       console.log(data);
                   }
               });
           };//Fin extract data table

           //Ini get ParPre
           getParPre = function() {

               tipo_req = $("#tipo_req").val();
               $(".optParp").remove();
                 $.ajax({
                   type: "POST",
                   dataType: "json",
                   url: "getParPreTotal",
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
                       $('#content').fadeIn(1000).html(data);
                   },
                   error: function (data) {
                       console.log(data);
                   }
               });
           };//Fin get ParPre
           //Ini get cabms
           getCabms = function() {
               par_pre = $("#par_pre").val();
               $(".optCamb").remove();
                 $.ajax({
                   type: "POST",
                   dataType: "json",
                   url: "getCabmsTotal",
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
           exractmisSol = function() { //extract data table
               folio = $("#id_folio").val();
               //console.log(folio);
               $(".otrasFilas").remove();
                 $.ajax({
                   type: "POST",
                   dataType: "json",
                   url: "getMyReqAlm",
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
           exractmisRequisiciones = function() { //extract data table
               $(".otrasFilasFol").remove();
                 $.ajax({
                   type: "POST",
                   dataType: "json",
                   url: "/newRequisiciones/getMyReqFol/",
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
           limpiarForm = function()
           {
               $("#archivo").val("");
               $("#u_medida").val("");
               $("#cantidad").val("");
               $("#monto_estimado").val("");
               $('select[name=cabms_grp]').val(1);
               $('.selectpicker').selectpicker('refresh');

           };
           $("#limpiar").click(function(){
               limpiarForm();
           });
             $("#guardarSol").click(function(){

                $("#tipo_req").prop('disabled',false);
               $("#par_pre").prop('disabled',false);

               $("#id_folio").val('');
               $("#folioMuestra").val('');
               $("#fecha_elabora").val('');
               $("#fecha_requiere").val('');
               $("#tipo_req").val('');
               $('select[name=almacen]').val(1);
               $('.selectpicker').selectpicker('refresh');
               $("#lugar_entrega").val('');
               $("#observaciones").val('');

               $(".otrasFilas").remove();
               $(".otrasFilasArchivo").remove();
               $('#id_folio').val(0);
               limpiarForm();
           });
             $("#tipo_req").change(function() {
                $('#content').html('<div class="loading"><img src="../images/logo/ajax-loader.gif" alt="loading" /></div>');
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

           getUnidadM = function(paramTipo)
           {
              console.log(paramTipo+"deded");
               observ =  $('#observ').val();
               $.ajax({
                   type: "POST",
                   dataType: "json",
                   url: "getUnidadTodos",
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
           var max_chars = 1000;
           $('#max').html(max_chars);
           $('#observaciones').keyup(function() {
               var chars = $(this).val().length;
               var diff = max_chars - chars;
               $('#contador').html(diff);
           });
           exractArchivos = function() { //Busca Archivos
           $(".otrasFilasArchivo").remove();
           $("#adjuntaSubmit").prop('disabled', false);
           //modulo="AlmContratos";
           id_folio = $("#id_folio").val();
              $.ajax({
                   type: "GET",
                   dataType: "json",
                   url: "getPDFRequisicion/"+id_folio,
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
                                   '<td class="text-center align-middle"> <a href="viewPdfAnexoReq/' + res+'"  target="_blank" class="btn btn-success btn-sm" title="Ver"><i class="far fa-file-pdf "></i></a>&nbsp;&nbsp;&nbsp;'+
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
       function updateRecepcion(id)
       {
           observ =    $('#observ_'+id).val();
           dateAcept=  $('#dateAcept_'+id).val();
           console.log(observ);
           $("#modalConfirm").modal({backdrop: 'static', keyboard: false, show: true});
           $("#Mensaje").html("¿Desea autorizar el <b> Informe ABDF_" + id +"</b> ?");
           $("#Aceptar").click(function () {
               $.ajax({
                   type: "POST",
                   dataType: "json",
                   url: "validaRepo",
                   data: {"id":id,"observ":observ,"status":3},
                   success: function (data) {
                       $("#modalRegistro").modal({backdrop: 'static', keyboard: false, show: true});
                                           //alert("Datos cargados correctamente!!!");
                                           $("#RegistroGuardado").html("Registro Actualizado!!");
                                           setTimeout(function () {
                                               $('#modalRegistro').modal("hide");
                                           }, 2500);
                           eliminarFilasInv();
                           obtenerPendientes();
                   },
                   error: function (data) {
                           console.log(data);
                   }
               });
           });
       }
          function eliminaBienSolicita(idSolBien) {

               $.ajax({
                   type: "GET",
                   dataType: "json",
                   url: "deleteReqBien/"+idSolBien,
                   success: function (data) {
                       $(".otrasFilas").remove();
                       exractmisSol();
                   },
                   error: function (data) {
                       console.log(data);
                   }
               });
           };
          function eliminaFolio(folio) {

               $.ajax({
                   type: "GET",
                   dataType: "json",
                   url: "deleteReqFol/"+folio,
                   success: function (data) {
                       $(".otrasFilasFol").remove();
                       exractmisSol();
                       exractmisRequisiciones();
                        limpiarForm();
                   },
                   error: function (data) {
                       console.log(data);
                   }
               });
           };
          function editarFolio(folio) {
               console.log(folio);
               $("#id_folio").val(folio);
               $("#folioMuestra").val(folio);
               limpiarForm();
               exractmisSol();
               exractDataSolForm();
           };
   /*****************************/
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
       //Formato Mayúsculas
       function mayus(e) {
           e.value = e.value.toUpperCase();
        };
</script>
@endsection
@endsection


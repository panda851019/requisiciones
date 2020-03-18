                <form class="form-horizontal" id="formId" role="form" accept-charset="UTF-8" enctype="multipart/form-data">
                    <input type="hidden" name="id_folio" id="id_folio" value="0">
                    @csrf
                            <div class="kt-form__body">
                                <div class="kt-section kt-section--first">
                                    <div class="kt-section__body">
                                        <div class="row">
                                            <label class="col-xl-3"></label>
                                            <div class="col-lg-9 col-xl-6">
                                                <h3 class="kt-section__title kt-section__title-sm">
                                                    Captura de Datos Requisición:
                                                </h3>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            {{ Form::label('solicita', 'Solicita', array('class' => 'col-xl-3 col-lg-3 col-form-label')) }}
                                            <div class="col-lg-9 col-xl-6">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="la la-user kt-font-brand"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control form-control-sm" id="solicita" placeholder="Nombre del solicitante" name="solicita" value="{{ Auth::user()->email }} " readonly="">
                            <div class="invalid-feedback"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            {{ Form::label('area', 'Area Solicitante', array('class' => 'col-xl-3 col-lg-3 col-form-label')) }}
                                            <div class="col-lg-9 col-xl-6">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="la-building-o kt-font-brand"></i></span>
                                                    </div>
                                                <input type="text" class="form-control form-control-sm" id="area" placeholder="Área" name="area" onkeyup="mayus(this);" value="DIRECCIÓN GENERAL DE TECNOLOGÍAS Y COMUNICACIONES" readonly="">
                                                <div class="invalid-feedback"></div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            {{ Form::label('fecha_elabora', 'Fecha', array('class' => 'col-xl-3 col-lg-3 col-form-label')) }}
                                            <div class="col-lg-9 col-xl-6">
                                                <input type="date" class="form-control form-control-sm" id="fecha_elabora" name="fecha_elabora">
                                                <div class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                                {{ Form::label('fecha_requiere', 'Fecha requiere', array('class' => 'col-xl-3 col-lg-3 col-form-label')) }}
                                            <div class="col-lg-9 col-xl-6">
                                                <input type="date" class="form-control form-control-sm" id="fecha_requiere" name="fecha_requiere">
                                                <div class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            {{ Form::label('tipo_req', 'Tipo Requisición:', array('class' => 'col-xl-3 col-lg-3 col-form-label')) }}
                                            <div class="col-lg-9 col-xl-6">
                                                <select class="form-control form-control-sm" id="tipo_req" 
                                                                            name="tipo_req" data-show-subtext="true" data-live-search="true">
                                                    <option value="">Seleccione...</option>
                                                    <option value="1">Bienes</option>
                                                    <option value="2">Servicios</option>
                                                    <option value="3">Arrendamientos</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="destinoAlma">
                                        <div class="form-group row">
                                              {{ Form::label('almacen', 'Destino Almacen', array('class' => 'col-xl-3 col-lg-3 col-form-label')) }}
                                              <div class="col-lg-9 col-xl-6">
                                                <select class="selectpicker form-control form-control-sm" id="almacen" name="almacen" data-show-subtext="true" data-live-search="true">
                                                    <option value="">Seleccione...</option>
                                                    @foreach($almacenes as $almacen)  
                                                        <option value="Col. {{$almacen['colonia']}}, {{ str_limit($almacen['calle'], $limit = 80, $end = '...') }}">Col. {{$almacen['colonia']}}, {{ str_limit($almacen['calle'], $limit = 80, $end = '...') }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="invalid-feedback"></div>
                                              </div>
                                        </div>
                                        </div>
                                        <div class="optionDestino">
                                        <div class="form-group row">
                                             {{ Form::label('lugar_entrega', 'Lugar de Entrega:', array('class' => 'col-xl-3 col-lg-3 col-form-label')) }}
                                            <div class="col-lg-9 col-xl-6">
                                                <input name="lugar_entrega" id="lugar_entrega" class="form-control form-control-sm" onkeyup="mayus(this);">
                                                <div class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="form-group row">
                                             {{ Form::label('observaciones', 'Justificación, observaciones', array('class' => 'col-xl-3 col-lg-3 col-form-label')) }}
                                             <div class="col-lg-9 col-xl-6">
                                                <textarea rows="3" maxlength="1000" class="form-control form-control-sm" name="observaciones" id="observaciones" cols="50" onkeyup="mayus(this);">
                                                </textarea>
                                            <div id="contador"></div>
                                             </div>
                                        </div>
                                        <div class="kt-form__actions">
                                            <div class="row">
                                                <div class="col-xl-3"></div>
                                                <div class="col-lg-9 col-xl-6">                                                    
                                                    <button type="submit" id="agregarFol"class="btn btn-brand" >Agregar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                          <div class="kt-separator kt-separator--space-lg kt-separator--fit kt-separator--border-solid"> </div>
                                        <div class="mb-2"><b><u>Mis Requisiciones:</u></b></div> 

                            <div role="status" id="capa2" style="display: none; text-align: center;" >
                                <font color="#006400"><h5><br>Firmando requisiciones, esto puede llevar un tiempo!!! </h5></font>
                            </div>
                            <center>
                            <div class="spinner-border text-success" id="capa" role="status" style="display: none;"></div>
                            </center>
                            <br>
                                            
                                <!-- <h4>Mis solicitudes</h4> -->
                            <form method="post"  enctype="multipart/form-data">
                                @csrf
                                <div class="table-responsive pl-0" style="height: 200px; overflow-y:scroll;">
                                <table class="table table-sm table-striped table-bordered" id="misFolios" style="font-size: 13px; margin-bottom:0px;">
                                    <thead style="background-color:#d5d6d2">
                                        <tr class="primerFilaII" >     
                                            <th style="width: 1%" scope="col"class="text-left align-middle"><center>
                                            <input type="checkbox" onclick="marcar(this);" /></th>                           
                                            <th style="width: 9%" scope="col"class="text-left align-middle">Fecha</th>
                                            <th style="width: 9%" scope="col"class="text-left align-middle">Tipo</th>
                                            <th style="width: 9%" scope="col"class="text-left align-middle">Folio</th>
                                            <th style="width: 6%" scope="col"class="text-center align-middle">Seleccionar</th>
                                            <th style="width: 6%" scope="col"class="text-center align-middle">Imprimir</th>
                                            <th style="width: 6%" scope="col"class="text-center align-middle">Eliminar</th>
                                        </tr>
                                    </thead>
                                </table>   
                                </div>
                                    <input type="text" name="status_req" id="status_req" value="0" hidden>
                                    <input type="text" name="tipo" id="tipo" value="RR" hidden>
                            </form>
                            <div class="kt-separator kt-separator--space-lg kt-separator--fit kt-separator--border-solid"> </div>
            <div class="row">
                <div class="col-lg-5">
                      
                    <div class="form-group">
                        <label  for="title" style="text-align: left;">1. Número de proveedores a quienes se les envió solicitud de cotización.</label>
                        <input id="title" type="text" class="form-control" placeholder="Enter a title ..." />
                    </div>
                    <div class="form-group">
                        <label  for="message" style="text-align: left;">2. Número proveedores que respondieron a la solicitud de cotización.</label>
                        <input id="title" type="text" class="form-control" placeholder="Enter a title ..." />
                    </div>
                    <div class="form-group">
                        <label  for="message" style="text-align: left;">3. Número proveedores que cumplen con las especificaciones requeridas en la solicitud de cotización (actividades relacionadas con objeto y capacidad de respuesta, con recuersos técnicos, financieros y demás requeridos).</label>
                        <input id="title" type="text" class="form-control" placeholder="Enter a title ..." />
                    </div>
                    <div class="form-group">
                        <label  for="message" style="text-align: left;">4. Número de proveedores que cuentan con registro en el Padrón de Proveedores de la Administración Pública de la Ciudad de México.</label>
                        <input id="title" type="text" class="form-control" placeholder="Enter a title ..." />
                    </div>
                    <div class="form-group">
                        <label  for="message" style="text-align: left;">5. La proveeduría es mayoritariamente productora, distribuidora o comercializadora.</label>
                        <input id="title" type="text" class="form-control" placeholder="Enter a title ..." />
                    </div>
                    
                    <div class="form-group">
                        <label  for="message" style="text-align: left;">6. Se consultó y recibieron propuestas de campesinos, grupos rurales, grupos urbanos en situación de marginación, sociedades cooperativas y / o proveedores alimentarios sociales, proveedores no habituales que en estado de liquidación o disolución.</label>
                        <select class="form-control form-control-sm" name="prov_urbanos" id="prov_urbanos">
                                <option value="">Seleccione...</option>
                                <option value="true">SI</option>
                                <option value="false">NO</option>
                            </select>
                            <br>
                         <textarea class="form-control form-control-sm" id="prov_urbanos_cual"  name="prov_urbanos_cual" onkeyup="mayus(this);"></textarea>
                    </div>
                    <div class="form-group">
                        <label  for="message" style="text-align: left;">7. Fuente (s) utilizada para la busqueda de proveedores (Padrón de proveedores, COMPRANET, contratos anteriores adjudicados por la misma institución, otras entidades, internet, recomendaciones, otros).</label>
                        <textarea class="form-control form-control-sm" id="prov_urbanos_cual"  name="prov_urbanos_cual" onkeyup="mayus(this);"></textarea>
                    </div>
                    <div class="form-group">
                        <label  for="message" style="text-align: left;">8. La solicitud de información realizada a las asociaciones o cámaras comerciales, industriales, empresariales o de servicios que corresponda a los bienes o servicios que se pretendan adquirir o contratar, y el resultado de dicha consulta.</label>
                        <select class="form-control form-control-sm" name="prov_urbanos" id="prov_urbanos">
                                <option value="">Seleccione...</option>
                                <option value="true">SI</option>
                                <option value="false">NO</option>
                            </select>
                            <br>
                         
                    </div>
                    <div class="mb-1">
                            <b><u>Bien:</u></b>
                    </div>
                    <div class="form-group">
                        <label style="text-align: left;" for="showEasing">1. Por su naturaleza.</label>
                        <input id="showEasing" type="text" class="form-control" placeholder="swing, linear"  value="swing" />
                    </div>
                    <div class="form-group">
                        <label style="text-align: left;"  for="hideEasing">2. Por su tipo consumo.</label>
                        <input id="hideEasing" type="text" class="form-control" placeholder="swing, linear"  value="linear" />
                    </div>
                    <div class="form-group">
                        <label style="text-align: left;"  for="showMethod">3. Por su tipo de vencimiento.</label>
                        <input id="showMethod" type="text" class="form-control" placeholder="show, fadeIn, slideDown"  value="fadeIn" />
                    </div>
                    <div class="form-group">
                        <label style="text-align: left;"  for="hideMethod">4. Por su país de origen.</label>
                        <input id="hideMethod" type="text" class="form-control" placeholder="hide, fadeOut, slideUp"  value="fadeOut" />
                    </div>
                    <div class="form-group">
                        <label style="text-align: left;"  for="hideMethod">5. Por su grado de integración nacional.</label>
                        <input id="hideMethod" type="text" class="form-control" placeholder="hide, fadeOut, slideUp"  value="fadeOut" />
                    </div>
                    <div class="form-group">
                        <label style="text-align: left;"  for="hideMethod">6. Frecuencia de compra del bien.</label>
                        <input id="hideMethod" type="text" class="form-control" placeholder="hide, fadeOut, slideUp"  value="fadeOut" />
                    </div>
                    <div class="form-group">
                        <label style="text-align: left;"  for="hideMethod">7. El bien requiere de productos complementarios.</label>
                        <input id="hideMethod" type="text" class="form-control" placeholder="hide, fadeOut, slideUp"  value="fadeOut" />
                    </div>
                    <div class="form-group">
                        <label style="text-align: left;"  for="hideMethod">8. El bien es objeto de titularidad o licenciamiento exclusivos de propiedad intelectual o similares.</label>
                        <input id="hideMethod" type="text" class="form-control" placeholder="hide, fadeOut, slideUp"  value="fadeOut" />
                    </div>
                   
                </div>
              
                <div class="col-lg-2">
                    
                </div>
                <div class="col-lg-5">
                    <div class="mb-1">
                            <b><u>Conclusiones del sondeo de mercado:</u></b>
                    </div>
                    <div class="form-group kt-form__grou">
                            <label style="text-align: left;" for="showDuration">1. El resultado del sondeo mercado sugiere licitación publica nacional o internacional.
                            Conforme a los resultados de la investigación se realizará licitación pública internacional por actualizarse alguno de los siguientes supuestos:
                            <small class="form-text text-muted">(Vigésimo cuarto, fraccion II, apartado E de los Lineamientos para la Determinación y Acreditación del grado de integración o contenido nacional, así como los Criterios para la Disminución u Omisión del porcentaje de integración o contenido nacional )</small></label>
                            <select class="form-control form-control-sm" name="con_internacional" id="con_internacional">
                                <option value="">Seleccione...</option>
                                <option value="1">No existe producción nacional de los bienes o servicios que se requieran</option>
                                <option value="2">La producción de en el país no garantiza las mejores condiciones de calidad, oportunidad, precio, financiamiento y servicio</option>
                            </select>
                    </div>
                    <div class="form-group kt-form__grou">

                            <label style="text-align: left;"  for="dos"><input type="checkbox" id="con_abastecimiento"  name="con_abastecimiento" id="dos" name="dos"> 2. El resultado del sondeo de mercado sugiere abastecimiento simultaneo.
                            <small class="form-text text-muted ">(Artículo 33 de la Ley de Adquisiciones para el Distrito Federal)</small>
                            </label>
                            <br>
                            
                            <div class="invalid-feedback"></div> 
                    </div>
                    <div class="form-group kt-form__grou">

                            <label style="text-align: left;"  for="timeOut"> <input type="checkbox" id="con_procedimiento" name="con_procedimiento"> 3. El resultado del sondeo de mercado sugiere un procedimiento excepcional a la licitación pública.
                            <small class="form-text text-muted ">(Articulo 54 de la Ley de Adquisciones para el Distrito Federal)
                            </small>
                            </label>
                            <br>
                            
                    </div>
                    <div class="form-group kt-form__grou">
                        <label style="text-align: left;"  for="extendedTimeOut"><input type="checkbox" id="con_procedimiento" name="con_procedimiento"> Por tratarse de obras de arte o de bienes y servicios para los cuales no existan alternativos o sustitutos 
                            técnicamente aceptables y el contrato sólo pueda celebrarse con una determinada persona porque posee la titularidad o licenciamiento exclusivo de patentes, 
                            derechos de autor u otros derechos exclusivos
                                <small class="form-text text-muted">(Articulo 54, Fraccion I de la Ley de Adquisciones para el Distrito Federal)</small></label>
                        
                    </div>
                    <div class="form-group kt-form__grou">
                        <label style="text-align: left;"  for="extendedTimeOut"><input type="checkbox" id="con_procedimiento" name="con_procedimiento"> Se demuestre que existen mejores condiciones en cuanto a precio, calidad, financiamiento u oportunidad.
                        <small class="form-text text-muted">(Articulo 54, Fraccion II BIS de la Ley de Adquisciones para el Distrito Federal)
                        </small>
                        </label>
                        
                    </div>
                    <div class="form-group kt-form__grou">
                        <label style="text-align: left;"  for="extendedTimeOut"><input type="checkbox" id="con_procedimiento" name="con_procedimiento"> Existan razones justificadas para la Adquisición y Arrendamiento o Prestación de Servicios de una marca determinada.
                                <small class="form-text text-muted">(Articulo 54, Fraccion V de la Ley de Adquisciones para el Distrito Federal)</small></label>
                        
                    </div>
                    <div class="form-group kt-form__grou">
                        <label style="text-align: left;"  for="extendedTimeOut"><input type="checkbox" id="con_procedimiento" name="con_procedimiento">  Se trate de Adquisiciones de bienes perecederos, alimentos preparados, granos y productos alimenticios básicos o semiprocesados, para uso o consumo inmediato, priorizando a aquellos que son producidos en la Ciudad de México.
                        <small class="form-text text-muted">(Articulo 54, Fraccion VI de la Ley de Adquisciones para el Distrito Federal)
                        </small></label>
                        
                    </div>
                   
                    <div class="form-group kt-form__grou">
                        <label style="text-align: left;"  for="extendedTimeOut"><input type="checkbox" id="con_procedimiento" name="con_procedimiento"> Se trate de adquisiciones provenientes de personas físicas o morales que, sin ser proveedores habituales y en razón de encontrarse en estado de liquidación o disolución o bien, bajo intervención judicial, ofrezcan bienes en condiciones excepcionalmente favorables.
                        <small class="form-text text-muted">(Articulo 54, Fraccion XI de la Ley de Adquisciones para el Distrito Federal)</small></label>
                        
                    </div>
                    <div class="form-group kt-form__grou">
                        <label style="text-align: left;"  for="extendedTimeOut"><input type="checkbox" id="con_procedimiento" name="con_procedimiento"> 
                            La contratación de personas físicas o morales de los que se adquieran bienes o proporcionen servicios de carácter cultural, artístico o científico, en los que no sea posible precisar la calidad, alcances o comparar resultados.
                            <small class="form-text text-muted">(Articulo 54, Fraccion XIII de la Ley de Adquisciones para el Distrito Federal)</small>
                        </label>
                        
                    </div>
                    <div class="form-group kt-form__grou">
                        <label style="text-align: left;"  for="extendedTimeOut"><input type="checkbox" id="con_procedimiento" name="con_procedimiento"> 
                            Se trate de armamento, vehículos, equipo, bienes o servicios de seguridad relacionado directamente con la seguridad pública, procuración de justicia y readaptación social.
                            <small class="form-text text-muted">(Articulo 54, Fraccion XIV de la Ley de Adquisciones para el Distrito Federal)</small>
                        </label>
                        
                    </div>
                    <div class="form-group kt-form__grou">
                        <label style="text-align: left;"  for="extendedTimeOut"><input type="checkbox" id="con_procedimiento" name="con_procedimiento"> 
                            Medicamentos, material de curación, y equipo especial para los hospitales, clínicas o necesarios para los servicios de salud.
                            <small class="form-text text-muted">(Articulo 54, Fraccion XV de la Ley de Adquisciones para el Distrito Federal)</small>
                        </label>
                        
                    </div>
                    <div class="form-group kt-form__grou">
                        <label style="text-align: left;"  for="extendedTimeOut"><input type="checkbox" id="con_procedimiento" name="con_procedimiento"> 
                            Bienes o servicios cuyo costo esté sujeto a precio oficial y en la contratación no exista un gasto adicional para la Administración Pública de la Ciudad de México.
                            <small class="form-text text-muted">(Articulo 54, Fraccion XVI de la Ley de Adquisciones para el Distrito Federal)</small>
                        </label>
                        
                    </div>
                    <div class="form-group kt-form__grou">
                        <label style="text-align: left;"  for="extendedTimeOut"><input type="checkbox" id="con_procedimiento" name="con_procedimiento"> 
                            El objeto del contrato sea para la prestación de servicios, arrendamientos o adquisición de bienes que conlleven innovaciones tecnológicas, siempre que se garantice la transferencia de tecnología en favor de la Ciudad y/o se promueva la inversión y/o la generación de empleos permanentes, ya sean directos o indirectos en el Distrito Federal. En estos casos se podrán asignar contratos multianuales debidamente detallados.
                            <small class="form-text text-muted">(Articulo 54, Fraccion XVII de la Ley de Adquisciones para el Distrito Federal)</small>
                        </label>
                        
                    </div>
                    <div class="form-group">
                        <label style="text-align: left;"  for="hideMethod">Justificación de la Excepción Elegida: </label>
                        <textarea class="form-control form-control-sm" rows="3" id="con_justificacion" name="con_justificacion"></textarea>
                    </div>
                    <div class="form-group">
                        <label style="text-align: left;"  for="hideMethod">Observaciones Generales: </label>
                        <textarea class="form-control form-control-sm" rows="3" id="con_observacion" name="con_observacion"></textarea>
                    </div>

                    

                    
                </div>
            </div> 
@extends('home')
@section('content')
<div class="kt-portlet kt-portlet--mobile">

  <!--Begin::Section-->
  <div class="row col-sm-6"> 
     <div class="col-sm-6">
        <div class="form-group">
                            <label  for="title" style="text-align: left;"> Requisición.</label>
                            <select class="form-control form-control-sm" id="area_enlace" name="area_enlace">
                                <option value="">Seleccione ...</option>             
                            </select> 
        </div>
    </div>
         <div class="col-sm-6">
        <div class="form-group">
                            <label  for="title" style="text-align: left;"> Cabms - Bienes.</label>
                                <select class="form-control form-control-sm" id="area_enlace" name="area_enlace">
                                    <option value="">Seleccione ...</option>         
                                </select> 
        </div>
    </div>
</div>                   
<div class="row">

    <div class="col-xl-6">
        <!--begin:: Widgets/User Progress -->

<div class="kt-portlet kt-portlet--height-fluid">

    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
                Cotizaciones:
            </h3>
        </div>
        <div class="kt-portlet__head-toolbar">
            <!--<ul class="nav nav-pills nav-pills-sm nav-pills-label nav-pills-bold" role="tablist">
                <li class="nav-item">                   
                    <a class="nav-link active" data-toggle="tab" href="#kt_widget31_tab1_content" role="tab">                   
                        Today
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#kt_widget31_tab2_content" role="tab">                  
                        Week
                    </a>
                </li>
            </ul>-->

        </div>
    </div>
    <div class="kt-portlet__body">
        <div class="tab-content">
            <div class="tab-pane active" id="kt_widget31_tab1_content">
                <div class="kt-widget31">
                    <div class="kt-widget31__item">
                        <div class="kt-widget31__content">
                            
                            <div class="kt-widget31__info">
                                <a href="#" class="kt-widget31__username">
                                    Officce Depot
                                </a>
                                <p class="kt-widget31__text">
                                    Precio unitario: $1,855.00 <br>
                                    $1,500.00 
                                </p>                                     
                            </div>                   
                        </div>

                        <div class="kt-widget31__content">
                            <div class="kt-widget31__progress">
                                <a href="#" class="kt-widget31__stats">
                                    <span>63%</span>
                                    <span>Media</span>                                                      
                                </a>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-brand" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>  
                            <a href="#" class="btn-label-brand btn btn-sm btn-bold">Ver Detalle</a>
                            <a href="#" class="btn-label-success btn btn-sm btn-bold">Agregar</a>                                                  
                        </div>                      
                    </div>

                    <div class="kt-widget31__item">
                        <div class="kt-widget31__content">
                            
                            <div class="kt-widget31__info">
                                <a href="#" class="kt-widget31__username">
                                    DABO
                                </a>
                                <p class="kt-widget31__text">
                                    Precio unitario: $1,855.00 <br>
                                    $2,300.00  
                                </p>                                     
                            </div>
                        </div>

                        <div class="kt-widget31__content">
                            <div class="kt-widget31__progress">
                                <a href="#" class="kt-widget31__stats">
                                    <span>33%</span>
                                    <span>Media</span>                                                       
                                </a>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>  
                            <a href="#" class="btn-label-brand btn btn-sm btn-bold">Ver Detalle</a>
                            <a href="#" class="btn-label-success btn btn-sm btn-bold">Agregar</a>                                                  
                        </div>                           
                    </div>

                    <div class="kt-widget31__item">
                        <div class="kt-widget31__content">
                            
                            <div class="kt-widget31__info">
                                <a href="#" class="kt-widget31__username">
                                    Papeleria Tony
                                </a>
                                <p class="kt-widget31__text">
                                    Precio unitario: $1,855.00 <br>
                                    $1,850.00 
                                </p>                                     
                            </div>
                        </div>
                        <div class="kt-widget31__content">
                            <div class="kt-widget31__progress">
                                <a href="#" class="kt-widget31__stats">
                                    <span>13%</span>
                                    <span>Media</span>                                                      
                                </a>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>  
                            <a href="#" class="btn-label-brand btn btn-sm btn-bold">Ver Detalle</a>
                            <a href="#" class="btn-label-success btn btn-sm btn-bold">Agregar</a>                                                  
                        </div>                      
                    </div>

                    <div class="kt-widget31__item">
                        <div class="kt-widget31__content">
                            
                            <div class="kt-widget31__info">
                                <a href="#" class="kt-widget31__username">
                                    Walmart
                                </a>
                                <p class="kt-widget31__text">
                                    Precio unitario: $1,855.00 <br>
                                    $1,500.00 
                                </p>                                     
                            </div>
                        </div>  
                        <div class="kt-widget31__content">
                            <div class="kt-widget31__progress">
                                <div class="kt-widget31__stats">
                                    <span>93%</span>
                                    <span>Media</span>                                                        
                                </div>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 45%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>  
                            <a href="#" class="btn-label-brand btn btn-sm btn-bold">Ver Detalle</a>
                            <a href="#" class="btn-label-success btn btn-sm btn-bold">Agregar</a>                                                  
                        </div>                      
                    </div>  

                    <div class="kt-widget31__item">
                        <div class="kt-widget31__content">
                            
                            <div class="kt-widget31__info">
                                <a href="#" class="kt-widget31__username">
                                    DABO
                                </a>
                                <p class="kt-widget31__text">
                                    Precio unitario: $1,855.00 <br>
                                    $1,550.00 
                                </p>                                     
                            </div>
                        </div>
                        <div class="kt-widget31__content">
                            <div class="kt-widget31__progress">
                                <div class="kt-widget31__stats">
                                    <span>50%</span>
                                    <span>Media</span>                                                        
                                </div>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>  
                            <a href="#" class="btn-label-brand btn btn-sm btn-bold">Ver Detalle</a>
                            <a href="#" class="btn-label-success btn btn-sm btn-bold">Agregar</a>                                                  
                        </div>                                                   
                    </div>  
                </div>            
            </div>
            <div class="tab-pane" id="kt_widget31_tab2_content">
                <div class="kt-widget31">
                    <div class="kt-widget31__item">
                        <div class="kt-widget31__content">
                            <div class="kt-widget31__pic kt-widget4__pic--pic">
                                <img src="./assets/media/users/100_11.jpg" alt="">    
                            </div>
                            <div class="kt-widget31__info">
                                <a href="#" class="kt-widget31__username">
                                    Nick Bold
                                </a>
                                <p class="kt-widget31__text">
                                    Precio unitario: $1,855.00 <br>
                                    Web Developer, Facebook Inc 
                                </p>                                     
                            </div>
                        </div>
                        <div class="kt-widget31__content">
                            <div class="kt-widget31__progress">
                                <a href="#" class="kt-widget31__stats">
                                    <span>13%</span>
                                    <span>Media</span>                                                      
                                </a>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>  
                            <a href="#" class="btn-label-brand btn btn-sm btn-bold">Ver Detalle</a>
                            <a href="#" class="btn-label-success btn btn-sm btn-bold">Agregar</a>                                                  
                        </div>                      
                    </div>

                    <div class="kt-widget31__item">
                        <div class="kt-widget31__content">
                            <div class="kt-widget31__pic kt-widget4__pic--pic">
                                <img src="./assets/media/users/100_1.jpg" alt="">    
                            </div>
                            <div class="kt-widget31__info">
                                <a href="#" class="kt-widget31__username">
                                    Wiltor Delton
                                </a>
                                <p class="kt-widget31__text">
                                    Precio unitario: $1,855.00 <br>
                                    Project Manager, Amazon Inc 
                                </p>                                     
                            </div>
                        </div>  
                        <div class="kt-widget31__content">
                            <div class="kt-widget31__progress">
                                <div class="kt-widget31__stats">
                                    <span>93%</span>
                                    <span>Media</span>                                                        
                                </div>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 45%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>  
                            <a href="#" class="btn-label-brand btn btn-sm btn-bold">Ver Detalle</a>
                            <a href="#" class="btn-label-success btn btn-sm btn-bold">Agregar</a>                                                  
                        </div>                      
                    </div>  

                    <div class="kt-widget31__item">
                        <div class="kt-widget31__content">
                            
                            <div class="kt-widget31__info">
                                <a href="#" class="kt-widget31__username">
                                    Milano Esco
                                </a>
                                <p class="kt-widget31__text">
                                    Precio unitario: $1,855.00 <br>
                                    Product Designer, Apple Inc 
                                </p>                                     
                            </div>
                        </div>

                        <div class="kt-widget31__content">
                            <div class="kt-widget31__progress">
                                <a href="#" class="kt-widget31__stats">
                                    <span>33%</span>
                                    <span>Media</span>                                                       
                                </a>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>  
                            <a href="#" class="btn-label-brand btn btn-sm btn-bold">Ver Detalle</a>
                            <a href="#" class="btn-label-success btn btn-sm btn-bold">Agregar</a>                                                  
                        </div>                           
                    </div>  
                    
                    <div class="kt-widget31__item">
                        <div class="kt-widget31__content">
                            
                            <div class="kt-widget31__info">
                                <a href="#" class="kt-widget31__username">
                                    Sam Stone
                                </a>
                                <p class="kt-widget31__text">
                                    Precio unitario: $1,855.00 <br>
                                    Project Manager, Kilpo Inc 
                                </p>                                     
                            </div>
                        </div>
                        <div class="kt-widget31__content">
                            <div class="kt-widget31__progress">
                                <div class="kt-widget31__stats">
                                    <span>50%</span>
                                    <span>Media</span>                                                        
                                </div>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>  
                            <a href="#" class="btn-label-brand btn btn-sm btn-bold">Ver Detalle</a>
                            <a href="#" class="btn-label-success btn btn-sm btn-bold">Agregar</a>                                                  
                        </div>                                                   
                    </div>

                    <div class="kt-widget31__item">
                        <div class="kt-widget31__content">
                            
                            <div class="kt-widget31__info">
                                <a href="#" class="kt-widget31__username">
                                    Anna Strong
                                </a>
                                <p class="kt-widget31__text">
                                    Precio unitario: $1,855.00 <br>
                                    Visual Designer,Google Inc 
                                </p>                                     
                            </div>                   
                        </div>

                        <div class="kt-widget31__content">
                            <div class="kt-widget31__progress">
                                <a href="#" class="kt-widget31__stats">
                                    <span>63%</span>
                                    <span>Media</span>                                                      
                                </a>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-brand" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>  
                            <a href="#" class="btn-label-brand btn btn-sm btn-bold">Ver Detalle</a>
                            <a href="#" class="btn-label-success btn btn-sm btn-bold">Agregar</a>                                                  
                        </div>                      
                    </div>                                          
                </div>          
            </div>
        </div>
    </div>
</div>
<!--end:: Widgets/User Progress -->    
</div>
<div class="col-xl-2">
    </div>
    <div class="col-xl-4">
        <!--begin:: Widgets/Sales States-->
<div class="kt-portlet kt-portlet--height-fluid">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
                Listos para I. Mercado
            </h3>
        </div>
        <div class="kt-portlet__head-toolbar">
            <div class="dropdown dropdown-inline">
                <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="flaticon-more-1"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <ul class="kt-nav">
    <li class="kt-nav__item">
        <a href="#" class="kt-nav__link">
            <i class="kt-nav__link-icon flaticon2-line-chart"></i>
            <span class="kt-nav__link-text">Reports</span>
        </a>
    </li>
    <li class="kt-nav__item">
        <a href="#" class="kt-nav__link">
            <i class="kt-nav__link-icon flaticon2-send"></i>
            <span class="kt-nav__link-text">Messages</span>
        </a>
    </li>
    <li class="kt-nav__item">
        <a href="#" class="kt-nav__link">
            <i class="kt-nav__link-icon flaticon2-pie-chart-1"></i>
            <span class="kt-nav__link-text">Charts</span>
        </a>
    </li>
    <li class="kt-nav__item">
        <a href="#" class="kt-nav__link">
            <i class="kt-nav__link-icon flaticon2-avatar"></i>
            <span class="kt-nav__link-text">Members</span>
        </a>
    </li>
    <li class="kt-nav__item">
        <a href="#" class="kt-nav__link">
            <i class="kt-nav__link-icon flaticon2-settings"></i>
            <span class="kt-nav__link-text">Settings</span>
        </a>
    </li>
</ul>               </div>
            </div>
        </div>
    </div>
    <div class="kt-portlet__body">
        <div class="kt-widget6">
            <div class="kt-widget6__head">
                <div class="kt-widget6__item">
                    <span>Proveedor</span>
                    <span>Precio</span>                  
                </div>
            </div>
            <div class="kt-widget6__body">
                <div class="kt-widget6__item">
                   
                    <span>Walmart</span>
                    <span class="kt-font-success kt-font-bold">$1,500.00</span>
                </div>
                <div class="kt-widget6__item">
                 
                    <span>DABO</span>
                    <span class="kt-font-brand kt-font-bold">$2,300</span>
                </div>
                <div class="kt-widget6__item">
                 
                    <span>OFFICCE DEPOT</span>
                    <span class="kt-font-warning kt-font-bold">$10,900</span>
                </div>
              
            </div>
            <div class="kt-widget6__foot">
                <div class="kt-widget6__action kt-align-right">
                    <a href="#" class="btn btn-label-brand btn-sm btn-bold">Export...</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end:: Widgets/Sales States-->    
</div>
</div>
<!--End::Section-->
@section('scripts')
<script src="{{ URL::asset('js/users.js')}}" type="text/javascript"></script>
@endsection
@endsection

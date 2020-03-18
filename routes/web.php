<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();
Route::resource('roles', 'RoleController');

Route::get('/error/{error}', 'ErrorController@error');
Route::post('/login', 'Auth\LoginController@login');
Route::get('/register/verify/{code}', 'Auth\LoginController@verify');
Route::post('/register', 'Auth\RegisterController@create')->name('create');
Route::post('/passReset', 'Auth\ResetPasswordController@resetPassword');
Route::get('/validator/{id}', 'Auth\RegisterController@validator')->name('validator');
Route::post('/password/reset', 'Auth\ResetPasswordController@reset');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/contactos', 'HomeController@contactoIndex')->name('home');
Route::get('/condTerminos', 'HomeController@condTerminos')->name('condTerminos');
Route::get('/contactos', 'HomeController@contactos')->name('contactos');
Route::post('/passReset', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::post('/passForgot', 'Auth\ForgotPasswordController@validateEmail')->name('passReset');
Route::post('/passUpdate', 'Auth\ForgotPasswordController@updatePass')->name('updatePass');
Route::get('/forgot/verify/{id}', 'Auth\ForgotPasswordController@validateTokenPassReset')->name('forgotPassW');

Route::get('/', function () {
    if (Auth::check()){
            if( Auth::user()->hasRole('admin') || Auth::user()->hasRole('SuperAdmin')){
                return redirect('/admin');
            }else{
                return redirect('/home');
            }
    }else{
        return redirect('/login');
    }
});

//Rutas con AUTH, todas las rutas deben de pasar por auth como validación
Route::group(['middleware' => ['auth']], function() {
    //Inicia Middleware de rol
    Route::group(['middleware' => ['role:SuperAdmin|admin']], function() {
    //editar usuarios
        Route::group(['prefix' => 'admin'], function() {
        Route::get('/', 'AdminController@dashboard');
        Route::get('/index', 'AdminController@index');
        Route::get('/listar_usuarios', 'AdminController@listar_usuarios');
        Route::get('/data_resumen_proveedores', 'AdminController@data_resumen_proveedores');
        Route::get('/data_listar_usuarios', 'AdminController@data_listar_usuarios');
        Route::get('/data_listar_roles', 'AdminController@data_listar_roles');
        Route::get('/data_licitaciones', 'AdminController@data_licitaciones');
        Route::get('/create', 'AdminController@create');
        Route::get('/edit', 'AdminController@edit');
        Route::post('/store', 'AdminController@store');
        Route::post('/update', 'AdminController@update');

        //Rutas Permisos
        Route::get('/listar_permisos', 'AdminController@listar_permisos');
        Route::get('/create_permiso', 'AdminController@create_permiso');
        Route::post('/store_new_permiso', 'AdminController@store_new_permiso');
        Route::get('/permiso/{id}/editar_permiso_modal', 'PermissionController@editar_permiso_modal');
        Route::post('/permiso/editar_permiso', 'PermissionController@update');
        
        //Rutas Role
        Route::get('/listar_roles', 'AdminController@listar_roles');
        Route::get('/roles/{id}/editar_roles_permisos', 'RoleController@editar_roles_permisos');
        Route::get('/create_rol', 'AdminController@create_rol');
        Route::post('/store_new_role', 'AdminController@store_new_role');
        });
    });

Route::group(['middleware' => ['role:SuperAdmin|admin']], function() {
    Route::group(['prefix' => 'requisiciones'], function() {

        /********************************************/
        Route::post('home','RequisicionesController@guardarCargo')->name('inicio');
        Route::get('/reqRegistrar', 'RequisicionesController@reqRegistrar');
        Route::post('/getDataSol','RequisicionesController@getDataSol');
        Route::post('/getMyReqAlm','RequisicionesController@getMyReqAlm');
        Route::get('/deleteReqBien/{idSolBien}', 'RequisicionesController@deleteReqBien');
        Route::get('/deleteReqFol/{folio}', 'RequisicionesController@deleteReqFol');
        Route::post('/storeSolicitud','RequisicionesController@storeMySolicitud');
        Route::post('/getUnidad','RequisicionesController@getUnidad');
        Route::post('/storeRequisicion','RequisicionesController@storeRequisicion');
        
        Route::post('/getMyReqFolProveedor','RequisicionesController@getMyReqFolProveedor');
        Route::post('/getParPreTotal','RequisicionesController@getParPreTotal');
        Route::post('/getCabmsTotal','RequisicionesController@getCabmsTotal');
        /*NEW REGISTER REQ*/
        Route::get('/captureReq', 'RequisicionesController@captureReq');
        /*FORMULARIO DE PROPUESTA - ANEXO TECNICO DE BIENES*/
        Route::get('/formAnexo','RequisicionesController@formAnexo');
        Route::get('/getpdf/{folio}/{status}/{tipo}', 'RequisicionesController@data')->name('pdf');
        Route::post('/data_validation','RequisicionesController@signed');
        Route::post('/rechazar','RequisicionesController@rechazar');
        Route::get('/data_validation/{path}/signed', 'RequisicionesController@getSignedPdf')->name('data_signed');
        /********************************************/

    });
});

Route::group(['middleware' => ['role:SuperAdmin|admin']], function() {
    Route::group(['prefix' => 'newRequisiciones'], function() {
        Route::get('/createReq', 'NewRequisicionesController@captureReq');
        Route::post('/getMyReqFol','NewRequisicionesController@getMyReqFol');
        Route::post('/getParPreTotal','NewRequisicionesController@getParPreTotal');
        Route::post('/getUnidadTodos','NewRequisicionesController@getUnidadTodos');
        Route::post('/storeNewRequ','NewRequisicionesController@storeRequisicion');
        Route::post('/getCabmsTotal','NewRequisicionesController@getCabmsTotal');
        Route::post('/storeNewRequBienes','NewRequisicionesController@storeRequisicionBienes');
        Route::post('/getMyReqAlm','NewRequisicionesController@getMyReqAlm');
        



    });
});

Route::group(['middleware' => ['role:SuperAdmin|admin']], function() {
    Route::group(['prefix' => 'IMercado'], function() {
        Route::get('/iMercado', 'IMercadoController@tabsIMercado');
        Route::post('/storeSondeoBienes', 'IMercadoController@storeSondeoBienes');
        Route::post('/storeSondeoServicios', 'IMercadoController@storeSondeoServicios');
        Route::get('/cart', 'IMercadoController@cart');
    });
});

    //editar usuarios
    Route::group(['prefix' => 'users'], function() {
        Route::get('/profile', 'UserController@profile');
        Route::get('/index', 'UserController@index');
        Route::get('/forgotpass', 'UserController@forgotpass');
        Route::post('/updatePassword', 'UserController@updatePassword');
        Route::post('/validPassword', 'UserController@validPassword');
        Route::post('/validUser', 'Auth\RegisterController@validUser');
        Route::post('/validEmail', 'Auth\RegisterController@validEmail');
        //Route::post('/editUser', 'UserController@editUser');
    });

    //Resource para subir archivo
    Route::resource('files', 'FileController');
    //Route::get('/files/show', 'FileController@show');
    /*Route::get('test', function() {
        dd(DB::connection()->getPdo());
    });*/

});


Route::get('/block_screen', function () {
  return view('usuarios/block_screen');
});
Route::post('/block_screen', function () {
    return response()
    ->json(['status' => 'true']);
});

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

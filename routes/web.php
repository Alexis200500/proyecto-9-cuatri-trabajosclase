<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PacientesController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\TipoUsuarioController;
use App\Http\Controllers\ConsultaEstudioController;
use App\Http\Controllers\EstudiosController;
use App\Http\Controllers\Tipo_sangreController;
use App\Http\Controllers\ConsultasController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\TratamientosController;
use App\Http\Controllers\MaterialesController;
use App\Http\Controllers\MunicipiosController;
use App\Http\Controllers\especialidadesController;
use App\Http\Controllers\TipoMedicamentosController;
use App\Http\Controllers\MedicamentosController;
use App\Http\Controllers\OdontologosController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\SinFotoController;


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
                                 /*Pacientes*/
Route::get('/altapacientes',[PacientesController::class,'altapacientes'])->name('altapacientes');
Route::post('/guardarpaciente',[PacientesController::class,'guardarpaciente'])->name('guardarpaciente');
Route::get('/reportepacientes',[PacientesController::class,'reportepacientes'])->name('reportepacientes');
Route::get('/desactivapaciente/{idpaciente}',[PacientesController::class,'desactivapaciente'])->name('desactivapaciente');
Route::get('/activapaciente/{idpaciente}',[PacientesController::class,'activapaciente'])->name('activapaciente');
Route::get('/borrarpaciente/{idpaciente}',[PacientesController::class,'borrarpaciente'])->name('borrarpaciente');
Route::get('/modificapacientes/{idpaciente}',[PacientesController::class,'modificapacientes'])->name('modificapacientes');
Route::post('/guardacambiospaciente',[PacientesController::class,'guardacambiospaciente'])->name('guardacambiospaciente');
//Route::get('/vistas',[PacientesController::class,'vistas'])->name('vistas');



                                /*Usuarios*/
Route::get('/altausuarios',[UsuariosController::class,'altausuarios'])->name('altausuarios');
Route::post('/guardarusuario',[UsuariosController::class,'guardarusuario'])->name('guardarusuario');
Route::get('/reporteusuarios',[UsuariosController::class,'reporteusuarios'])->name('reporteusuarios');
Route::get('/desactivausuario/{idusuario}',[UsuariosController::class,'desactivausuario'])->name('desactivausuario');
Route::get('/activausuario/{idusuario}',[UsuariosController::class,'activausuario'])->name('activausuario');
Route::get('/borrarusuario/{idusuario}',[UsuariosController::class,'borrarusuario'])->name('borrarusuario');
Route::get('/modificausuario/{idusuario}',[UsuariosController::class,'modificausuario'])->name('modificausuario');
Route::get('/guardacambiosusuario',[UsuariosController::class,'guardacambiosusuario'])->name('guardacambiosusuario');


                                //Tipo Usuarios//
Route::get('/altatipousuario',[TipoUsuarioController::class,'altatipousuario'])->name('altatipousuario');
Route::post('/guardartipou',[TipoUsuarioController::class,'guardartipou'])->name('guardartipou');
Route::get('/reportetipousuario',[TipoUsuarioController::class,'reportetipousuario'])->name('reportetipousuario');
Route::get('/desactivatipousuario/{idtipo_u}',[TipoUsuarioController::class,'desactivatipousuario'])->name('desactivatipousuario');
Route::get('/activatipousuario/{idtipo_u}',[TipoUsuarioController::class,'activatipousuario'])->name('activatipousuario');
Route::get('/borrartipousuario/{idtipo_u}',[TipoUsuarioController::class,'borrartipousuario'])->name('borrartipousuario');
Route::get('/modificatipousuario/{idtipo_u}',[TipoUsuarioController::class,'modificatipousuario'])->name('modificatipousuario');
Route::post('/guardacambiostipousuario',[TipoUsuarioController::class,'guardacambiostipousuario'])->name('guardacambiostipousuario');


                                //Consulta estudio//
Route::get('/altaconestudio',[ConsultaEstudioController::class, 'altaconestudio'])->name('altaconestudio');
Route::post('/guardarconestudio',[ConsultaEstudioController::class, 'guardarconestudio'])->name('guardarconestudio');
Route::get('/reporteconsultaes',[ConsultaEstudioController::class,'reporteconsultaes'])->name('reporteconsultaes');
Route::get('/desactivaconestudio/{idces}',[ConsultaEstudioController::class,'desactivaconestudio'])->name('desactivaconestudio');
Route::get('/activaconestudio/{idces}',[ConsultaEstudioController::class,'activaconestudio'])->name('activaconestudio');
Route::get('/borrarconestudio/{idces}',[ConsultaEstudioController::class,'borrarconestudio'])->name('borrarconestudio');
Route::get('/modificaconestudio/{idces}',[ConsultaEstudioController::class,'modificaconestudio'])->name('modificaconestudio');
Route::post('/guardacambiosconestudio',[ConsultaEstudioController::class,'guardacambiosconestudio'])->name('guardacambiosconestudio');
route::get('download/{archivo}',[ConsultaEstudioController::class, 'download'])->name('download');
                                //EStudios//
Route::get('/altaestudios',[EstudiosController::class, 'altaestudios'])->name('altaestudios');
Route::post('/guardarestudios',[EstudiosController::class, 'guardarestudios'])->name('guardarestudios');
Route::get('/reporteestudio',[EstudiosController::class,'reporteestudio'])->name('reporteestudio');
Route::get('/desactivaestudio/{idestudio}',[EstudiosController::class,'desactivaestudio'])->name('desactivaestudio');
Route::get('/activaestudio/{idestudio}',[EstudiosController::class,'activaestudio'])->name('activaestudio');
Route::get('/borrarestudio/{idestudio}',[EstudiosController::class,'borrarestudio'])->name('borrarestudio');
Route::get('/modificaestudio/{idestudio}',[EstudiosController::class,'modificaestudio'])->name('modificaestudio');
Route::post('/guardacambiosestudio',[EstudiosController::class,'guardacambiosestudio'])->name('guardacambiosestudio');

                                //Tiposangre//
Route::get('/altatiposangre',[Tipo_sangreController::class, 'altatiposangre'])->name('altatiposangre');
Route::post('/guardartiposan',[Tipo_sangreController::class, 'guardartiposan'])->name('guardartiposan');
Route::get('/reportetiposan',[Tipo_sangreController::class,'reportetiposan'])->name('reportetiposan');
Route::get('/desactivatiposangre/{idtipossan}',[Tipo_sangreController::class,'desactivatiposangre'])->name('desactivatiposangre');
Route::get('/activatiposangre/{idtipossan}',[Tipo_sangreController::class,'activatiposangre'])->name('activatiposangre');
Route::get('/borrartiposangre/{idtipossan}',[Tipo_sangreController::class,'borrartiposangre'])->name('borrartiposangre');
Route::get('/modificatiposangre/{idtipossan}',[Tipo_sangreController::class,'modificatiposangre'])->name('modificatiposangre');
Route::post('/guardacambiostiposangre',[Tipo_sangreController::class,'guardacambiostiposangre'])->name('guardacambiostiposangre');

///// Catalogo de consultas /////
route::get('altaconsulta',[ConsultasController::class,'altaconsulta'])->name('altaconsulta');
route::post('guardarconsulta',[ConsultasController::class,'guardarconsulta'])->name('guardarconsulta');
route::get('reporteconsultas',[ConsultasController::class,'reporteconsultas'])->name('reporteconsultas');
route::get('desactivaconsulta/{idconsulta}',[ConsultasController::class,'desactivaconsulta'])->name('desactivaconsulta');
route::get('activarconsulta/{idconsulta}',[ConsultasController::class,'activarconsulta'])->name('activarconsulta');
route::get('borraconsulta/{idconsulta}',[ConsultasController::class,'borraconsulta'])->name('borraconsulta');
route::get('modificarconsulta/{idconsulta}',[ConsultasController::class,'modificarconsulta'])->name('modificarconsulta');
route::post('guardacambios',[ConsultasController::class,'guardacambios'])->name('guardacambios');

///// Catalogo Status /////
route::get('altastatus',[StatusController::class,'altastatus'])->name('altastatus');
route::post('guardarestatus',[StatusController::class,'guardarestatus'])->name('guardarestatus');
route::get('reportestatus',[StatusController::class,'reportestatus'])->name('reportestatus');
route::get('desactivarstatus/{idstatus}',[StatusController::class,'desactivarstatus'])->name('desactivarstatus');
route::get('activarstatus/{idstatus}',[StatusController::class,'activarstatus'])->name('activarstatus');
route::get('borrarstatus/{idstatus}',[StatusController::class,'borrarstatus'])->name('borrarstatus');
route::get('modificarstatus/{idstatus}',[StatusController::class,'modificarstatus'])->name('modificarstatus');
route::post('guardacambioss',[StatusController::class,'guardacambioss'])->name('guardacambioss');

///// Catalogo Tratamientos /////
route::get('altatratamiento',[TratamientosController::class,'altatratamiento'])->name('altatratamiento');
route::post('guardartratamiento',[TratamientosController::class,'guardartratamiento'])->name('guardartratamiento');
route::get('reportetratamientos',[TratamientosController::class,'reportetratamientos'])->name('reportetratamientos');
route::get('desactivartratamiento/{idtratamiento}',[TratamientosController::class,'desactivartratamiento'])->name('desactivartratamiento');
route::get('activartratamiento/{idtratamiento}',[TratamientosController::class,'activartratamiento'])->name('activartratamiento');
route::get('borrartratamiento/{idtratamiento}',[TratamientosController::class,'borrartratamiento'])->name('borrartratamiento');
route::get('modificartratamiento/{idtratamiento}',[TratamientosController::class,'modificartratamiento'])->name('modificartratamiento');
route::post('guardacambiost',[TratamientosController::class,'guardacambiost'])->name('guardacambiost');

///// Catalogo de Material Odontologico /////
route::get('altamaterial',[MaterialesController::class,'altamaterial'])->name('altamaterial');
route::post('guardarmaterial',[MaterialesController::class,'guardarmaterial'])->name('guardarmaterial');
route::get('reportemateriales',[MaterialesController::class,'reportemateriales'])->name('reportemateriales');
route::get('desactivarmaterial/{idmaterial}',[MaterialesController::class,'desactivarmaterial'])->name('desactivarmaterial');
route::get('activarmaterial/{idmaterial}',[MaterialesController::class,'activarmaterial'])->name('activarmaterial');
route::get('borrarmaterial/{idmaterial}',[MaterialesController::class,'borrarmaterial'])->name('borrarmaterial');
route::get('modificarmaterial/{idmaterial}',[MaterialesController::class,'modificarmaterial'])->name('modificarmaterial');
route::post('guardacambiosm',[MaterialesController::class,'guardacambiosm'])->name('guardacambiosm');
route::get('download/{img}',[MaterialesController::class, 'download'])->name('download');
//municipios
Route::get('/alta_municipios',[MunicipiosController::class,'alta_municipios'])->name('alta_municipios');
Route::post('/guarda_municipios',[MunicipiosController::class,'guarda_municipios'])->name('guarda_municipios');
Route::get('/reportes_municipios',[MunicipiosController::class,'reportes_municipios'])->name('reportes_municipios');
Route::get('/modifica_municipios/{idmun}',[MunicipiosController::class,'modifica_municipios'])->name('modifica_municipios');
Route::post('/guardarcambios_municipios',[MunicipiosController::class,'guardarcambios_municipios'])->name('guardarcambios_municipios');
Route::get('/activar_municipios/{idmun}',[MunicipiosController::class,'activar_municipios'])->name('activar_municipios');
Route::get('/desactivar_municipios/{idmun}',[MunicipiosController::class,'desactivar_municipios'])->name('desactivar_municipios');
Route::get('/eliminar_municipios/{idmun}',[MunicipiosController::class,'eliminar_municipios'])->name('eliminar_municipios');


// especialidades
Route::get('/alta_especialidades',[especialidadesController::class,'alta_especialidades'])->name('alta_especialidades');
Route::post('/guarda_especialidades',[especialidadesController::class,'guarda_especialidades'])->name('guarda_especialidades');
Route::get('/reportes_especialidades',[especialidadesController::class,'reportes_especialidades'])->name('reportes_especialidades');
Route::get('/modifica_especialidades/{idesp}',[especialidadesController::class,'modifica_especialidades'])->name('modifica_especialidades');
Route::post('/guardarcambios_especialidades',[especialidadesController::class,'guardarcambios_especialidades'])->name('guardarcambios_especialidades');
Route::get('/activar_especialidades/{idesp}',[especialidadesController::class,'activar_especialidades'])->name('activar_especialidades');
Route::get('/desactivar_especialidades/{idesp}',[especialidadesController::class,'desactivar_especialidades'])->name('desactivar_especialidades');
Route::get('/eliminar_especialidades/{idesp}',[especialidadesController::class,'eliminar_especialidades'])->name('eliminar_especialidades');

//Tipo medicamentos
Route::get('/alta_tipomedicamentos',[TipoMedicamentosController::class,'alta_tipomedicamentos'])->name('alta_tipomedicamentos');
Route::post('/guarda_tipomedicamentos',[TipoMedicamentosController::class,'guarda_tipomedicamentos'])->name('guarda_tipomedicamentos');
Route::get('/reportes_tipomedicamentos',[TipoMedicamentosController::class,'reportes_tipomedicamentos'])->name('reportes_tipomedicamentos');
Route::get('/modifica_tipomedicamentos/{idtipomed}',[TipoMedicamentosController::class,'modifica_tipomedicamentos'])->name('modifica_tipomedicamentos');
Route::post('/guardarcambios_tipomedicamentos',[TipoMedicamentosController::class,'guardarcambios_tipomedicamentos'])->name('guardarcambios_tipomedicamentos');
Route::get('/activar_tipomedicamentos/{idtipomed}',[TipoMedicamentosController::class,'activar_tipomedicamentos'])->name('activar_tipomedicamentos');
Route::get('/desactivar_tipomedicamentos/{idtipomed}',[TipoMedicamentosController::class,'desactivar_tipomedicamentos'])->name('desactivar_tipomedicamentos');
Route::get('/eliminar_tipomedicamentos/{idtipomed}',[TipoMedicamentosController::class,'eliminar_tipomedicamentos'])->name('eliminar_tipomedicamentos');
 
//Medicamentos
Route::get('/alta_medicamentos',[MedicamentosController::class,'alta_medicamentos'])->name('alta_medicamentos');
Route::post('/guarda_medicamentos',[MedicamentosController::class,'guarda_medicamentos'])->name('guarda_medicamentos');
Route::get('/reportes_medicamentos',[MedicamentosController::class,'reportes_medicamentos'])->name('reportes_medicamentos');
Route::get('/modifica_medicamentos/{idmed}',[MedicamentosController::class,'modifica_medicamentos'])->name('modifica_medicamentos');
Route::post('/cambio_medicamentos',[MedicamentosController::class,'cambio_medicamentos'])->name('cambio_medicamentos');
Route::get('/activar_medicamentos/{idmed}',[MedicamentosController::class,'activar_medicamentos'])->name('activar_medicamentos');
Route::get('/desactivar_medicamentos/{idmed}',[MedicamentosController::class,'desactivar_medicamentos'])->name('desactivar_medicamentos');
Route::get('/eliminar_medicamentos/{idmed}',[MedicamentosController::class,'eliminar_medicamentos'])->name('eliminar_medicamentos');


//Odontologos
Route::get('/alta_odontologos',[OdontologosController::class,'alta_odontologos'])->name('alta_odontologos');
Route::post('/guardar_odontologos',[OdontologosController::class,'guardar_odontologos'])->name('guardar_odontologos');
Route::get('/reportes_odontologos',[OdontologosController::class,'reportes_odontologos'])->name('reportes_odontologos');
Route::get('/modifica_odontologos/{idodo}',[OdontologosController::class,'modifica_odontologos'])->name('modifica_odontologos');
Route::post('/cambio_odontologos',[OdontologosController::class,'cambio_odontologos'])->name('cambio_odontologos');
Route::get('/activar_odontologos/{idodo}',[OdontologosController::class,'activar_odontologos'])->name('activar_odontologos');
Route::get('/desactivar_odontologos/{idodo}',[OdontologosController::class,'desactivar_odontologos'])->name('desactivar_odontologos');
Route::get('/eliminar_odontologos/{idodo}',[OdontologosController::class,'eliminar_odontologos'])->name('eliminar_odontologos');
Route::get('/descarga_imagen/{img}',[OdontologosController::class,'descarga_imagen'])->name('descarga_imagen');



//Login//
Route::get('/',[LoginController::class,'login'])->name('login');

Route::get('/index',[PacientesController::class,'index'])->name('index');
Route::get('/menuprincipal',[PacientesController::class,'index'])->name('index');
Route::get('/eloquent',[PacientesController::class,'eloquent'])->name('eloquent');
Route::get('/reporte',[PacientesController::class, 'reporte'])->name('reporte');


//PDF
Route::name('pdfodontologos')->get('pdfodontologos',[OdontologosController::class, 'getPDFOdontologos']);
Route::name('pdfpacientes')->get('pdfpacientes',[PacientesController::class, 'getPDFPacientes']);

//DATATABLES
Route::name('odontologos')->get('odontologos',[OdontologosController::class, 'odontologos']);
Route::name('sinfoto')->get('sinfoto',[SinFotoController::class, 'sinfoto']);

// Route::name('odontologos.list')->get('odontologos/list',[OdontologosController::class, 'getOdontologos']);

Route::name('editar')->get('editar/{id}',[OdontologosController::class,'edit']);
Route::name('store')->post('store/',[OdontologosController::class,'store']);
Route::name('destroy')->delete('destroy/{id}',[OdontologosController::class,'destroy']);


Route::name('editarodo')->get('editarodo/{id}',[SinFotoController::class,'editarodo']);
Route::name('sin')->post('sin/',[SinFotoController::class,'sin']);
Route::name('destroyodo')->delete('destroyodo/{id}',[SinFotoController::class,'destroyodo']);





Route::name('export')->get('export',[OdontologosController::class,'export']);
Route::name('import')->post('import',[OdontologosController::class,'import']);


// -------------------------------------Carrito-------------------------------------
Route::name('productos')->get('productos',[ProductosController::class,'index']);
Route::name('carrito')->get('carrito',[ProductosController::class,'carrito']);
Route::name('agregar')->get('agregar/{id}',[ProductosController::class,'agregar']);
Route::name('actualizar')->patch('actualizar',[ProductosController::class,'actualizar']);

// -----------------------------------codigo qr-----------------------------------
Route::name('qrcode')->get('qrcode',[OdontologosController::class,'Qrcode']);
Route::view('escanerqr', 'escanerqr')->name('escanerqr');

Route::view('menu', 'menu')->name('menu');



<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\WooController;
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


Route::get('/', function () {
    return view('auth.login');
});


Route::get('public', function () {
    return view('auth.login');
});
Route::get('/public', function () {
    return view('auth.login');
});



// Route::post('login', [App\Http\Controllers\Auth\DobleLoginController::class, 'login'])->name('login');

/*Route::get('/ckdk', [CartController::class, 'shop'])->name('shop');
Route::get('/cart', [CartController::class, 'cart'])->name('cart.index');
Route::post('/add', [CartController::class, 'add'])->name('cart.store');
Route::post('/update', [CartController::class, 'update'])->name('cart.update');
Route::post('/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/clear', [CartController::class, 'clear'])->name('cart.clear');
*/

Route::get('/cupones', [WooController::class, 'cupones'])->name('cupones');
Route::get('/updateproducto', [WooController::class, 'updateproducto'])->name('updateproducto');
Route::get('/deleteproducto', [WooController::class, 'deleteproducto'])->name('deleteproducto');
Route::get('/createproducto', [WooController::class, 'createproducto'])->name('createproducto');

Auth::routes(['verify' => true]);
Route::get('enviosms', [App\Http\Controllers\Auth\RegisterController::class, 'enviosms'])->name('enviosms');
// E-mail verification

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home/refresh', [App\Http\Controllers\HomeController::class, 'refresh'])->name('home.refresh');

Route::get('usuarios', [App\Http\Controllers\Mantenimiento\UserController::class,'index'])->name('usuarios');
//Route::post('usuarios/crear', [App\Http\Controllers\Mantenimiento\UserController::class,'crear'])->name('usuarios.crear');
Route::get('usuarios/editar/{id}', [App\Http\Controllers\Mantenimiento\UserController::class,'editar'])->name('usuarios.editar');
Route::post('usuarios/actualizar', [App\Http\Controllers\Mantenimiento\UserController::class,'actualizar'])->name('usuarios.actualizar');
Route::get('usuarios/mired', [App\Http\Controllers\Mantenimiento\UserController::class,'mired'])->name('usuarios.mired');
Route::get('usuarios/misdatos', [App\Http\Controllers\Mantenimiento\UserController::class,'misdatos'])->name('usuarios.misdatos');
Route::post('usuarios/actualizar2', [App\Http\Controllers\Mantenimiento\UserController::class,'actualizar2'])->name('usuarios.actualizar2');

//Route::get('usuarios/anular', [App\Http\Controllers\Mantenimiento\UserController::class,'anular'])->name('usuarios.anular');

Route::get('planes', [App\Http\Controllers\Mantenimiento\PlanesController::class,'index'])->name('planes');
Route::post('planes/crear', [App\Http\Controllers\Mantenimiento\PlanesController::class,'crear'])->name('planes.crear');
Route::get('planes/editar', [App\Http\Controllers\Mantenimiento\PlanesController::class,'editar'])->name('planes.editar');
Route::get('planes/anular', [App\Http\Controllers\Mantenimiento\PlanesController::class,'anular'])->name('planes.anular');
 
Route::get('comprarplan', [App\Http\Controllers\Mantenimiento\PlanesController::class,'comprar'])->name('comprarplan');
Route::post('comprarplan/actualizar', [App\Http\Controllers\Mantenimiento\PlanesController::class,'compraractualizar'])->name('comprarplan.actualizar');
Route::get('comprarplan/pago', [App\Http\Controllers\Mantenimiento\PlanesController::class,'pago'])->name('comprarplan.pago');

Route::get('categoriacursos', [App\Http\Controllers\Mantenimiento\CategoriaCursoController::class,'index'])->name('categoriacursos');
Route::get('categoriacursos/crear', [App\Http\Controllers\Mantenimiento\CategoriaCursoController::class,'crear'])->name('categoriacursos.crear');
Route::post('categoriacursos/crear/nuevo', [App\Http\Controllers\Mantenimiento\CategoriaCursoController::class,'crearnuevo'])->name('categoriacursos.crear.nuevo');
Route::get('categoriacursos/editar/{id}', [App\Http\Controllers\Mantenimiento\CategoriaCursoController::class,'editar'])->name('categoriacursos.editar');
Route::post('categoriacursos/editarnuevo', [App\Http\Controllers\Mantenimiento\CategoriaCursoController::class,'editarnuevo'])->name('categoriacursos.editar.nuevo');
Route::get('categoriacursos/anular', [App\Http\Controllers\Mantenimiento\CategoriaCursoController::class,'anular'])->name('categoriacursos.anular');

Route::get('cursos', [App\Http\Controllers\Mantenimiento\CursosController::class,'index'])->name('cursos');
Route::get('cursos/crear', [App\Http\Controllers\Mantenimiento\CursosController::class,'crear'])->name('cursos.crear');
Route::post('cursos/crear/nuevo', [App\Http\Controllers\Mantenimiento\CursosController::class,'crearnuevo'])->name('cursos.crear.nuevo');
Route::get('cursos/editar/{id}', [App\Http\Controllers\Mantenimiento\CursosController::class,'editar'])->name('cursos.editar');
Route::post('cursos/editarnuevo', [App\Http\Controllers\Mantenimiento\CursosController::class,'editarnuevo'])->name('cursos.editar.nuevo');
Route::get('cursos/anular', [App\Http\Controllers\Mantenimiento\CursosController::class,'anular'])->name('cursos.anular');

Route::get('listadocursos', [App\Http\Controllers\Mantenimiento\CursosController::class,'listadocursos'])->name('listadocursos');
Route::get('academia', [App\Http\Controllers\Mantenimiento\CursosController::class,'academia'])->name('academia');
Route::get('listacursos', [App\Http\Controllers\Mantenimiento\CursosController::class,'listacursos'])->name('listacursos');
Route::get('listadocursos/cursocoaching', [App\Http\Controllers\Mantenimiento\CursosController::class,'cursocoaching'])->name('cursocoaching');

Route::get('listadocursos/cursoventas', [App\Http\Controllers\Mantenimiento\CursosController::class,'cursoventas'])->name('cursoventas');
Route::get('listadocursos/cursocontenidos', [App\Http\Controllers\Mantenimiento\CursosController::class,'cursocontenidos'])->name('cursocontenidos');
Route::get('listadocursos/cursomarketing', [App\Http\Controllers\Mantenimiento\CursosController::class,'cursomarketing'])->name('cursomarketing');
Route::get('listadocursos/cursoecommerce', [App\Http\Controllers\Mantenimiento\CursosController::class,'cursoecommerce'])->name('cursoecommerce');

Route::get('listadocursos/cursofinanzas', [App\Http\Controllers\Mantenimiento\CursosController::class,'cursofinanzas'])->name('cursofinanzas');
Route::get('listadocursos/cursomindset', [App\Http\Controllers\Mantenimiento\CursosController::class,'cursomindset'])->name('cursomindset');
Route::get('listadocursos/cursoredesociales', [App\Http\Controllers\Mantenimiento\CursosController::class,'cursoredesociales'])->name('cursoredesociales');
Route::get('listadocursos/cursoblockchain', [App\Http\Controllers\Mantenimiento\CursosController::class,'cursoblockchain'])->name('cursoblockchain');

Route::get('listadocursos/cursoia', [App\Http\Controllers\Mantenimiento\CursosController::class,'cursoia'])->name('cursoia');
Route::get('listadocursos/cursoviajes', [App\Http\Controllers\Mantenimiento\CursosController::class,'cursoviajes'])->name('cursoviajes');
Route::get('listadocursos/cursotrading', [App\Http\Controllers\Mantenimiento\CursosController::class,'cursotrading'])->name('cursotrading');
Route::get('listadocursos/cursoemprendimiento', [App\Http\Controllers\Mantenimiento\CursosController::class,'cursoemprendimiento'])->name('cursoemprendimiento');

Route::get('listadocursos/cursoreferencias', [App\Http\Controllers\Mantenimiento\CursosController::class,'cursoreferencias'])->name('cursoreferencias');
Route::get('listadocursos/cursoinmobiliarios', [App\Http\Controllers\Mantenimiento\CursosController::class,'cursoinmobiliarios'])->name('cursoinmobiliarios');
Route::get('listadocursos/cursomarketplace', [App\Http\Controllers\Mantenimiento\CursosController::class,'cursomarketplace'])->name('cursomarketplace');
Route::get('listadocursos/cursoseguros', [App\Http\Controllers\Mantenimiento\CursosController::class,'cursoseguros'])->name('cursoseguros');

Route::get('modulos', [App\Http\Controllers\Mantenimiento\ModulosController::class,'index'])->name('modulos');
Route::get('modulos/crear', [App\Http\Controllers\Mantenimiento\ModulosController::class,'crear'])->name('modulos.crear');
Route::post('modulos/crear/nuevo', [App\Http\Controllers\Mantenimiento\ModulosController::class,'crearnuevo'])->name('modulos.crear.nuevo');
Route::get('modulos/editar/{id}', [App\Http\Controllers\Mantenimiento\ModulosController::class,'editar'])->name('modulos.editar');
Route::post('modulos/editarnuevo', [App\Http\Controllers\Mantenimiento\ModulosController::class,'editarnuevo'])->name('modulos.editar.nuevo');
Route::get('modulos/anular', [App\Http\Controllers\Mantenimiento\ModulosController::class,'anular'])->name('modulos.anular');
Route::get('generadiploma/{id}', [App\Http\Controllers\Mantenimiento\ModulosController::class,'generadiploma'])->name('generadiploma');

Route::get('modulos/buscarcursos', [App\Http\Controllers\Mantenimiento\ModulosController::class,'buscarcursos'])->name('modulos.buscarcursos');
Route::get('modulos/buscarmodulos', [App\Http\Controllers\Mantenimiento\ModulosController::class,'buscarmodulos'])->name('modulos.buscarmodulos');
Route::get('modulos/consulta/{id}', [App\Http\Controllers\Mantenimiento\ModulosController::class,'consultamodulo'])->name('modulos.consultamodulo');
Route::get('modulos/finalizar', [App\Http\Controllers\Mantenimiento\ModulosController::class,'finalizar'])->name('modulos.finalizar');
Route::get('modulos/cursosencontrado/{id}', [App\Http\Controllers\Mantenimiento\ModulosController::class,'cursoencontrado'])->name('modulos.cursoencontrado');

Route::get('productos', [App\Http\Controllers\Mantenimiento\ProductosController::class,'index'])->name('productos');
Route::get('productos/crear', [App\Http\Controllers\Mantenimiento\ProductosController::class,'crear'])->name('productos.crear');
Route::post('productos/crear/nuevo', [App\Http\Controllers\Mantenimiento\ProductosController::class,'crearnuevo'])->name('productos.crear.nuevo');
Route::get('productos/editar/{id}', [App\Http\Controllers\Mantenimiento\ProductosController::class,'editar'])->name('productos.editar');
Route::post('productos/editarnuevo', [App\Http\Controllers\Mantenimiento\ProductosController::class,'editarnuevo'])->name('productos.editar.nuevo');
Route::get('productos/anular/{id}', [App\Http\Controllers\Mantenimiento\ProductosController::class,'anular'])->name('productos.anular');
Route::get('productos/eliminar/{id}', [App\Http\Controllers\Mantenimiento\ProductosController::class,'eliminar'])->name('productos.eliminar');
Route::get('productos/eliminarfoto/{id}/{fotoid}', [App\Http\Controllers\Mantenimiento\ProductosController::class,'eliminarfoto'])->name('productos.eliminarfoto');
Route::post('buscarsubcategoria',  [App\Http\Controllers\Mantenimiento\ProductosController::class,'buscarsubcategoria']);

Route::get('productos/aprobar', [App\Http\Controllers\Mantenimiento\ProductosController::class,'aprobar'])->name('productos.aprobar');
Route::get('productos/ver/{id}', [App\Http\Controllers\Mantenimiento\ProductosController::class,'verproducto'])->name('productos.ver');
Route::get('productos/autorizar/{id}', [App\Http\Controllers\Mantenimiento\ProductosController::class,'autorizar'])->name('productos.autorizar');

Route::get('market', [App\Http\Controllers\Mantenimiento\MarketController::class,'index'])->name('market');
Route::get('market/ver/{id}', [App\Http\Controllers\Mantenimiento\MarketController::class,'verproducto'])->name('market.ver');
Route::get('registracarro',  [App\Http\Controllers\Mantenimiento\MarketController::class,'registracarro'])->name('registracarro');
Route::get('micarrito',  [App\Http\Controllers\Mantenimiento\MarketController::class,'micarrito'])->name('micarrito');
Route::get('actualizarcarro',  [App\Http\Controllers\Mantenimiento\MarketController::class,'actualizarcarro'])->name('actualizarcarro');
Route::get('actualizarcarro2',  [App\Http\Controllers\Mantenimiento\MarketController::class,'actualizarcarro2'])->name('actualizarcarro2');
Route::get('actualizarcarro3',  [App\Http\Controllers\Mantenimiento\MarketController::class,'actualizarcarro3'])->name('actualizarcarro3');

Route::get('market/buscarproducto', [App\Http\Controllers\Mantenimiento\MarketController::class,'buscarproducto'])->name('market.buscarproducto');
Route::get('market/productoencontrado/{id}', [App\Http\Controllers\Mantenimiento\MarketController::class,'productoencontrado'])->name('market.productoencontrado');

Route::get('invoice',  [App\Http\Controllers\Mantenimiento\MarketController::class,'pagarcompra'])->name('pagarcompra');
Route::get('mispedidos',  [App\Http\Controllers\Mantenimiento\MarketController::class,'mispedidos'])->name('mispedidos');
Route::get('buscarpedido',  [App\Http\Controllers\Mantenimiento\MarketController::class,'buscarpedido'])->name('buscarpedido');
Route::get('misdespachos',  [App\Http\Controllers\Mantenimiento\MarketController::class,'misdespachos'])->name('misdespachos');
Route::get('despachar/{id}',  [App\Http\Controllers\Mantenimiento\MarketController::class,'despachar'])->name('despachar');
Route::get('misventas',  [App\Http\Controllers\Mantenimiento\MarketController::class,'misventas'])->name('misventas');


Route::get('monedero', [App\Http\Controllers\Procesos\TransaccionMonederoController::class,'index'])->name('monedero');
Route::get('monedero/retiro', [App\Http\Controllers\Procesos\TransaccionMonederoController::class,'retiro'])->name('monedero.retiro');
Route::post('monedero/ejecutasolicitudretiro', [App\Http\Controllers\Procesos\TransaccionMonederoController::class,'solicitudretiro'])->name('monedero.solicitudretiro');
Route::get('monedero/contifico', [App\Http\Controllers\Procesos\TransaccionMonederoController::class,'contifico'])->name('monedero.contifico');
Route::get('monedero/contifico/actualizar', [App\Http\Controllers\Procesos\TransaccionMonederoController::class,'actualizarpagospro'])->name('monedero.actualizarpagospro');

Route::get('recargas', [App\Http\Controllers\Procesos\TransaccionMonederoController::class,'indexsolicitud'])->name('recargas');
Route::get('recargas/crear', [App\Http\Controllers\Procesos\TransaccionMonederoController::class,'crear'])->name('recargas.crear');
Route::post('recargas/crear/nuevo', [App\Http\Controllers\Procesos\TransaccionMonederoController::class,'crearnuevo'])->name('recargas.crear.nuevo');
Route::get('recargas/editar/{id}', [App\Http\Controllers\Procesos\TransaccionMonederoController::class,'editar'])->name('recargas.editar');
Route::post('recargas/editarnuevo', [App\Http\Controllers\Procesos\TransaccionMonederoController::class,'editarnuevo'])->name('recargas.editar.nuevo');
Route::get('recargas/anular', [App\Http\Controllers\Procesos\TransaccionMonederoController::class,'anular'])->name('recargas.anular');
Route::get('recargar/aprobar', [App\Http\Controllers\Procesos\TransaccionMonederoController::class,'aprobar'])->name('recargas.aprobar');
Route::get('recargas/aprobarsol/{id}', [App\Http\Controllers\Procesos\TransaccionMonederoController::class,'aprobarsol'])->name('recargas.aprobarsol');
Route::post('recargas/solicitudpago', [App\Http\Controllers\Procesos\TransaccionMonederoController::class,'solicitudpago'])->name('recargas.solicitudpago');

Route::get('retiros', [App\Http\Controllers\Procesos\TransaccionMonederoController::class,'indexsolicitudretiro'])->name('retiros');
Route::get('retiros/aprobar', [App\Http\Controllers\Procesos\TransaccionMonederoController::class,'retirosaprobar'])->name('retiros.aprobar');
Route::get('retiros/aprobarsol/{id}', [App\Http\Controllers\Procesos\TransaccionMonederoController::class,'retirosaprobarsol'])->name('retiros.aprobarsol');

Route::get('configuraciones', [App\Http\Controllers\Mantenimiento\ConfiguracionController::class,'index'])->name('configuraciones');
Route::post('configuraciones/guardar', [App\Http\Controllers\Mantenimiento\ConfiguracionController::class,'guardar'])->name('configuraciones.guardar');

Route::post('comentario/guardar', [App\Http\Controllers\Mantenimiento\ComentarioProductoController::class,'guardar'])->name('comentario.guardar');
Route::get('registrastar',  [App\Http\Controllers\Mantenimiento\MarketController::class,'registrastar'])->name('registrastar');
Route::get('registrastarpro',  [App\Http\Controllers\Mantenimiento\MarketController::class,'registrastarpro'])->name('registrastarpro');

Route::post('itembuscar',  [App\Http\Controllers\Mantenimiento\MarketController::class,'indexbuscado'])->name('itembuscar');

Route::get('envios', [App\Http\Controllers\Mantenimiento\EnviosController::class,'index'])->name('envios');
Route::get('envios/crear', [App\Http\Controllers\Mantenimiento\EnviosController::class,'crear'])->name('envios.crear');
Route::post('envios/crear/nuevo', [App\Http\Controllers\Mantenimiento\EnviosController::class,'crearnuevo'])->name('envios.crear.nuevo');
Route::get('envios/editar/{id}', [App\Http\Controllers\Mantenimiento\EnviosController::class,'editar'])->name('envios.editar');
Route::post('envios/editarnuevo', [App\Http\Controllers\Mantenimiento\EnviosController::class,'editarnuevo'])->name('envios.editar.nuevo');
Route::get('envios/anular', [App\Http\Controllers\Mantenimiento\EnviosController::class,'anular'])->name('envios.anular');

 
Route::get('pagossocios', [App\Http\Controllers\Mantenimiento\SociosController::class,'index'])->name('pagossocios');
Route::get('pagossocios/pagar', [App\Http\Controllers\Mantenimiento\SociosController::class,'pagos'])->name('pagossocios.pagar');
Route::get('pagossocios/buscar', [App\Http\Controllers\Mantenimiento\SociosController::class,'buscar'])->name('pagossocios.buscar');

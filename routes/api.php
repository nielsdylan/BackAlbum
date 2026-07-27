<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Hotel\Configuration\CategoriaController;
use App\Http\Controllers\Hotel\Configuration\HabitacionController;
use App\Http\Controllers\Hotel\Configuration\NivelController;
use App\Http\Controllers\Hotel\Configuration\TarifaController;
use App\Http\Controllers\PanelControl\Auth\AuthController as AuthAuthController;
use App\Http\Controllers\PanelControl\Galeria\AlbumesController;
use App\Http\Controllers\PanelControl\Galeria\FotosController;
use App\Http\Controllers\PanelControl\PlantillaController;
use App\Http\Controllers\PanelControl\ServicioController;
use App\Http\Controllers\PanelControl\SliderController;
use App\Http\Controllers\QRAdmin\Auth\AuthController as QRAdminAuthAuthController;
use App\Http\Controllers\QRAdmin\ClienteController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Middleware\JwtMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route::post('/login', [AuthController::class, 'login'])->name('login');
// Route::post('/register', [AuthController::class, 'register'])->name('register');
/*
*
* SESSION DE LOS CLIENTES
*/
    Route::prefix('qrcliente')->group(function(){
        Route::post('/login', [AuthAuthController::class, 'login'])->name('login');
        Route::post('/register', [AuthAuthController::class, 'register'])->name('register');
    });

/*
*
* SRUTAS DEL PANEL DE COPNTROL
*/
Route::middleware([JwtMiddleware::class . ':api_cliente'])->group(function(){
    Route::prefix('auth')->group(function(){
        /*
        * AUTH DE CLIENTES
        */
        Route::post('qrclientes/logout', [AuthAuthController::class, 'logout'])->name('logout');
        Route::post('qrclientes/logged-user', [AuthAuthController::class, 'loggedUser'])->name('me');
        Route::post('qrclientes/refresh-token', [AuthAuthController::class, 'refreshToken'])->name('refresh');
        Route::post('qrclientes/session-token', [AuthAuthController::class, 'sessionToken'])->name('session-token');
    });
    /*
    * RUTAS DEL PANEL DE CONTROL DE LA PAGINA WEB
    *
    */
    Route::prefix('panel-control')->group(function(){
        Route::prefix('galeria')->group(function(){
            Route::prefix('albumes')->group(function(){
                Route::get('/lista', [AlbumesController::class, 'lista']);
                Route::get('/ver/{id}', [AlbumesController::class, 'ver']);
                Route::post('/guardar', [AlbumesController::class, 'guardar']);
                Route::post('/cambiarEstado', [AlbumesController::class, 'cambiarEstado']);
                Route::post('/eliminar', [AlbumesController::class, 'eliminar']);
                Route::get('/all-albumes', [AlbumesController::class, 'allAlbumes']);
                Route::get('/generar-qr/{id}', [AlbumesController::class, 'generarQR']);
            });
            Route::prefix('fotos')->group(function(){
                Route::get('/lista', [FotosController::class, 'lista']);
                Route::get('/ver/{id}', [FotosController::class, 'ver']);
                Route::post('/guardar', [FotosController::class, 'guardar']);
                Route::post('/cambiarEstado', [FotosController::class, 'cambiarEstado']);
                Route::post('/eliminar', [FotosController::class, 'eliminar']);
                Route::get('/all-albumes', [FotosController::class, 'allAlbumes']);
                Route::get('/all-usuario/{usuario_id}', [FotosController::class, 'allUsuario']);
            });
        });
        Route::prefix('plantillas')->group(function(){
            Route::get('/lista', [PlantillaController::class, 'lista']);
        });

    });
});

/*
*
* SESSION DE LOS ADMINISTRADOR
*/
    Route::prefix('qradmin')->group(function(){
        Route::post('/login', [QRAdminAuthAuthController::class, 'login'])->name('login');
        Route::post('/register', [QRAdminAuthAuthController::class, 'register'])->name('register');
    });
/*
*
* RUTAS DEL ADMINISTRADOR
*/
Route::middleware([JwtMiddleware::class . ':api'])->group(function(){

    Route::prefix('auth')->group(function(){
        /*
        * AUTH DE ADMINISTRADOR
        */
        Route::post('/qradmin/logout', [QRAdminAuthAuthController::class, 'logout'])->name('logout');
        Route::post('/qradmin/logged-user', [QRAdminAuthAuthController::class, 'loggedUser'])->name('me');
        Route::post('/qradmin/refresh-token', [QRAdminAuthAuthController::class, 'refreshToken'])->name('refresh');
        Route::post('/qradmin/session-token', [QRAdminAuthAuthController::class, 'sessionToken'])->name('session-token');
    });

    Route::prefix('qr-admin')->group(function(){
        Route::prefix('clientes')->group(function(){
            Route::get('/lista', [ClienteController::class, 'lista']);
            Route::get('/ver/{id}', [ClienteController::class, 'ver']);
            Route::post('/guardar', [ClienteController::class, 'guardar']);
            Route::post('/cambiarEstado', [ClienteController::class, 'cambiarEstado']);
            Route::post('/eliminar', [ClienteController::class, 'eliminar']);
        });
    });
});

/*
*
* RUTAS SIN PROTECCION
*/
Route::prefix('fotos')->group(function(){
    Route::get('/all-usuario/{cliente_id}/{album_id}', [HomeController::class, 'allFotos']);
});

<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Hotel\Configuration\CategoriaController;
use App\Http\Controllers\Hotel\Configuration\HabitacionController;
use App\Http\Controllers\Hotel\Configuration\NivelController;
use App\Http\Controllers\Hotel\Configuration\TarifaController;
use App\Http\Controllers\PanelControl\Galeria\AlbumesController;
use App\Http\Controllers\PanelControl\ServicioController;
use App\Http\Controllers\PanelControl\SliderController;
use App\Http\Middleware\JwtMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::middleware([JwtMiddleware::class])->group(function(){
    Route::prefix('auth')->group(function(){
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
        Route::post('/logged-user', [AuthController::class, 'loggedUser'])->name('me');
        Route::post('/refresh-token', [AuthController::class, 'refreshToken'])->name('refresh');
        Route::post('/session-token', [AuthController::class, 'sessionToken'])->name('session-token');
    });

    Route::prefix('hotel')->group(function(){

        Route::prefix('configuracion')->group(function(){
            Route::prefix('niveles')->group(function(){
                Route::get('/lista', [NivelController::class, 'lista']);
                Route::get('/ver/{id}', [NivelController::class, 'ver']);
                Route::post('/guardar', [NivelController::class, 'guardar']);
                Route::post('/cambiarEstado', [NivelController::class, 'cambiarEstado']);
                Route::post('/eliminar', [NivelController::class, 'eliminar']);
            });
            Route::prefix('categorias')->group(function(){
                Route::get('/lista', [CategoriaController::class, 'lista']);
                Route::get('/ver/{id}', [CategoriaController::class, 'ver']);
                Route::post('/guardar', [CategoriaController::class, 'guardar']);
                Route::post('/cambiarEstado', [CategoriaController::class, 'cambiarEstado']);
                Route::post('/eliminar', [CategoriaController::class, 'eliminar']);
            });
            Route::prefix('tarifas')->group(function(){
                Route::get('/lista', [TarifaController::class, 'lista']);
                Route::get('/ver/{id}', [TarifaController::class, 'ver']);
                Route::post('/guardar', [TarifaController::class, 'guardar']);
                Route::post('/cambiarEstado', [TarifaController::class, 'cambiarEstado']);
                Route::post('/eliminar', [TarifaController::class, 'eliminar']);
            });
            Route::prefix('habitaciones')->group(function(){
                Route::get('/lista', [HabitacionController::class, 'lista']);
                Route::get('/ver/{id}', [HabitacionController::class, 'ver']);
                Route::post('/guardar', [HabitacionController::class, 'guardar']);
                Route::post('/cambiarEstado', [HabitacionController::class, 'cambiarEstado']);
                Route::post('/eliminar', [HabitacionController::class, 'eliminar']);
            });
        });
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
            });
        });

    });
});

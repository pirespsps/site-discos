<?php

use App\Http\Controllers\BandaController;
use App\Http\Controllers\DiscoController;
use App\Http\Controllers\TrackController;
use App\Http\Controllers\UsuarioController;
use App\Http\Middleware\IsCreatorMiddleware;
use App\Http\Middleware\IsLoggedMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;


Route::get('/', [IndexController::class, "index"])->name("index");

Route::get("/cadastro", [AuthController::class, "cadastro"])->name("cadastro");
Route::post("/cadastro/entrar", [AuthController::class, "cadastroEntrar"])->name("cadastro-entrar");
Route::get('/login', [AuthController::class, "login"])->name("login");
Route::post("/login/entrar", [AuthController::class, "loginEntrar"])->name("login-entrar");
Route::get("/logout", [AuthController::class, "logout"])->name('logout');

resourceWithIsLogged('discos', DiscoController::class);
resourceWithIsLogged('bandas', BandaController::class);
resourceWithIsLogged('tracks', TrackController::class);
resourceWithIsLogged('usuarios', UsuarioController::class);

Route::post("/discos/{id}/viewPOST",[DiscoController::class,"viewPOST"]);
Route::post("/bandas/{id}/viewPOST",[BandaController::class,"viewPOST"]);
Route::post("/tracks/{id}/viewPOST",[TrackController::class,"viewPOST"]);

function resourceWithIsLogged(string $prefix, string $controller)
{

    Route::resource($prefix, $controller)
        ->except([
            'store',
            'create',
            'update',
            'edit',
        ]);


    Route::resource($prefix, $controller)
        ->middleware(IsLoggedMiddleware::class)
        ->only([
            'create',
            'edit',
        ]);

    Route::resource($prefix, $controller)
        ->middleware(IsCreatorMiddleware::class)
        ->only([
            'store',
            'update',
        ]);

}
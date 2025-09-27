<?php

use App\Http\Controllers\BandaController;
use App\Http\Controllers\DiscoController;
use App\Http\Controllers\TrackController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;


Route::get('/', [IndexController::class,"index"])->name("index");

Route::get("/cadastro",[AuthController::class,"cadastro"])->name("cadastro");
Route::post("/cadastro/entrar",[AuthController::class,"cadastroEntrar"])->name("cadastro-entrar");
Route::get('/login',[AuthController::class,"login"])->name("login");
Route::post("/login/entrar",[AuthController::class,"loginEntrar"])->name("login-entrar");
Route::get("/logout",[AuthController::class,"logout"])->name('logout');

Route::resource('discos',DiscoController::class);
Route::resource('bandas',BandaController::class);
Route::resource('tracks',TrackController::class);
Route::resource('usuarios',UsuarioController::class);

// //read
// Route::get("/inspecionar/discos",[DiscoController::class,"read"]);
// Route::get("/inspecionar/discos/{id}",[DiscoController::class,"readOne"]);

// Route::get("/inspecionar/bandas/",[BandaController::class,"read"]);
// Route::get("/inspecionar/bandas/{id}",[BandaController::class,"readOne"]);

// //create
// Route::get("/criar/discos",[DiscoController::class,"create"]);
// Route::post("/criar/discos",[DiscoController::class,"createForm"])->name("criar-disco");

// Route::get("/criar/bandas",[BandaController::class,"create"]);
// Route::post("/criar/bandas",[BandaController::class,"createForm"])->name("criar-banda");

// //edit
// Route::get("/editar/discos/{id}",[DiscoController::class,"edit"]);
// Route::post("/editar/discos/{id}",[DiscoController::class,"editForm"])->name("editar-disco");

// Route::get("/editar/bandas/{id}",[BandaController::class,"edit"]);
// Route::post("/editar/bandas/{id}",[BandaController::class,"editForm"])->name("editar-banda");

// //delete
// Route::post("/deletar/discos/{id}",[DiscoController::class,"deleteForm"])->name("deletar-disco");

// Route::post("/deletar/bandas/{id}",[BandaController::class,"deleteForm"])->name("deletar-banda");
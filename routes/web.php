<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;


Route::get('/', [IndexController::class,"index"])->name("index");

Route::get("/cadastro",[AuthController::class,"cadastro"])->name("cadastro");
Route::post("/cadastro/entrar",[AuthController::class,"cadastroEntrar"])->name("cadastro-entrar");
Route::get('/login',[AuthController::class,"login"])->name("login");
Route::post("/login/entrar",[AuthController::class,"loginEntrar"])->name("login-entrar");
Route::get("/logout",[AuthController::class,"logout"])->name('logout');
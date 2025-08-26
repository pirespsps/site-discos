<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;


Route::get('/', [IndexController::class,"index"]);

Route::get("/cadastro",[AuthController::class,"cadastro"]);
Route::post("/cadastro/entrar",[AuthController::class,"cadastroEntrar"])->name("cadastro-entrar");

Route::get('/login',[AuthController::class,"login"]);
Route::post("/login/entrar",[AuthController::class,"loginEntrar"])->name("login-entrar");

Route::post("/logout",[AuthController::class,"logout"]);
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CreateController;
use App\Http\Controllers\SelectController;
use App\Http\Controllers\UpdateController;

Route::get("/", [CreateController::class, "createUser"])->name("newUser");
Route::post("/", [CreateController::class, "createUser"])->name("newUser");
Route::get("/login", [SelectController::class, "login"])->name("login");
Route::post("/login", [SelectController::class, "login"])->name("login");
Route::get("/incendios", [SelectController::class, "incendios"])->name("incendios");
Route::get("/ActualizarIncendio/{id}", [UpdateController::class, "actualizar"])->name("update");
Route::post("/ActualizarIncendio/{id}", [UpdateController::class, "actualizar"])->name("update");
Route::get("/AñadirIncendio", [CreateController::class, "createFire"])->name("newFire");
Route::post("/AñadirIncendio", [CreateController::class, "createFire"])->name("newFire");
Route::get("/cerrar", [SelectController::class, "endSession"])->name("endSession");

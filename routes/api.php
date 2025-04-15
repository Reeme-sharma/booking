<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\FirmController;

Route::resource('/firms', FirmController::class)->only([
    'index', 'show', 'store', 'update', 'destroy'
]);
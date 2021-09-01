<?php

use App\Http\Excel\UI\API\Controllers\ExcelController;
use Illuminate\Support\Facades\Route;

Route::post('upload', [ExcelController::class, 'upload']);

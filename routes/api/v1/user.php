<?php

use App\Http\Controllers\API\V1\User\UserController;
use Illuminate\Support\Facades\Route;

Route::get('profile', [UserController::class, 'profile'])->name('profile');
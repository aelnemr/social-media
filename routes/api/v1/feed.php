<?php

use App\Http\Controllers\API\V1\Post\FeedController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FeedController::class, 'feed'])->name('index');
<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SearchController;
use App\Http\Controllers\Api\ListingController;
use App\Http\Controllers\Api\ProductController;


Route::get('products/categories', [ProductController::class, 'categories']);
Route::get('products', [ProductController::class, 'index']);
Route::get('products/{product}', [ProductController::class, 'show']);

Route::get('search', [SearchController::class, 'index']);


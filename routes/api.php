<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BrandController;
use App\Http\Controllers\Api\SearchController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CategoryController;


Route::get('categories', CategoryController::class);
Route::get('brands', BrandController::class );

Route::get('products', [ProductController::class, 'index']);
Route::get('products/{product}', [ProductController::class, 'show']);

Route::get('search', [SearchController::class, 'index']);


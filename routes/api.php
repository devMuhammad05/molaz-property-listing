<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SearchController;
use App\Http\Controllers\Api\ListingController;
use App\Http\Controllers\Api\ProductController;

Route::get('listings',  [ListingController::class, 'index']);
Route::get('property-types', [ListingController::class, 'listingType']);
Route::get('listings/{listing}',  [ListingController::class, 'show']);
Route::get('products/categories', [ProductController::class, 'categories']);
Route::get('products', [ProductController::class, 'index']);
Route::get('products/{product}', [ProductController::class, 'show']);

Route::get('search', [SearchController::class, 'index']);


// Route::get('/fetch', function () {
//     $response = Http::get('https://migra.buyjet.ng/api/listings');

//     if ($response->successful()) {
//         return response()->json([
//             'status' => 'success',
//             'data' => $response->json(),
//         ]);
//     }

//     return response()->json([
//         'status' => 'error',
//         'message' => 'Failed to fetch posts',
//     ], $response->status());
// });

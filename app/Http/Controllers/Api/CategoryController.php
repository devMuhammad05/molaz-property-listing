<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $categories = Category::select('id', 'name')->get();

        return response()->json([
            'status' => 'success',
            'message' => 'Product categories returned successfully',
            'data' => $categories,
        ]);
    }
}

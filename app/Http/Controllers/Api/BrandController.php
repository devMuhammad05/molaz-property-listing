<?php

namespace App\Http\Controllers\Api;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $brands = Brand::select('id', 'name')->get();

        return response()->json([
            'status' => 'success',
            'message' => 'Product brands returned successfully',
            'data' => $brands,
        ]);
    }
}

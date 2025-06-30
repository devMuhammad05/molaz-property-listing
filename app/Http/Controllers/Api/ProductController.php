<?php

namespace App\Http\Controllers\Api;

use App\Enums\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{

    public function index(Request $request)
    {
        $query = Product::query();

        $query->isActive();

        // Optional filtering by category
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        if ($request->filled('brand')) {
            $query->where('brand_id', $request->brand);
        }

        $perPage = min($request->integer('per_page', 9), 30);

        // Paginate the filtered results
        $products = $query->paginate($perPage);

        return response()->json([
            "status" => "success",
            "message" => "Products returned successfully",
            "data" => $products,
        ]);
    }

    public function show(Product $product)
    {
        return response()->json([
            "status" => "success",
            "message" => "Product returned successfully",
            "data" => $product,
        ]);
    }

    public function categories()
    {
        $types = collect(Category::cases())->map(fn($case) => [
            'name' => $case->name,
            'value' => $case->value,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Product categories returned successfully',
            'data' => $types,
        ]);
    }


}

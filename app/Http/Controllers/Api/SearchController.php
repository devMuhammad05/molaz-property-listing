<?php

namespace App\Http\Controllers\Api;

use App\Models\Listing;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'search' => ['nullable', 'string', 'max:255'],
        ]);

        $perPage = min($request->integer('per_page', 9), 30);

        $search = trim($request->input('search', ''));

        $query = Product::query()
            ->isActive()
            ->when($search, function ($q) use ($search) {
                $q->where(function ($subQuery) use ($search) {
                    $subQuery->where('name', 'LIKE', "%{$search}%")
                        ->orWhere('description', 'LIKE', "%{$search}%")
                        ->orWhere('key_feature', 'LIKE', "%{$search}%");

                    if (is_numeric($search)) {
                        $subQuery->orWhere('discount_amount', 'LIKE', "%{$search}%");
                    }
                });
            });

        $results = $query->paginate($perPage);

        if($results->isEmpty()) {
            return response()->json([
                "status" => "success",
                "message" => "No results found for your search.",
                "data" => [],
            ]);
        }

        return response()->json([
            "status" => "success",
            "message" => "Products returned successfully",
            "data" => $results,
        ]);
    }

}

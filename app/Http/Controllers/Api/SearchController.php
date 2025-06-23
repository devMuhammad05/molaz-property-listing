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

        $type = $request->query('type');
        $perPage = min($request->integer('per_page', 9), 30);

        $search = trim($request->input('search', ''));

        if ($type === 'listing') {
            $query = Listing::query()
                ->isActive()
                ->when($search, function ($q) use ($search) {
                    $q->where(function ($subQuery) use ($search) {
                        $subQuery->where('name', 'LIKE', "%{$search}%")
                            ->orWhere('status', 'LIKE', "%{$search}%")
                            ->orWhere('property_type', 'LIKE', "%{$search}%")
                            ->orWhere('address', 'LIKE', "%{$search}%")
                            ->orWhere('tags', 'LIKE', "%{$search}%")
                            ->orWhere('description', 'LIKE', "%{$search}%")
                            ->orWhere('city', 'LIKE', "%{$search}%");

                        if (is_numeric($search)) {
                            $subQuery->orWhere('amount', 'LIKE', "%{$search}%");
                        }
                    });
                });


            $results = $query->paginate($perPage);

            return response()->json([
                "status" => "success",
                "message" => "Listings returned successfully",
                "data" => $results,
            ]);

        } elseif ($type === 'product') {
            $query = Product::query()
                ->isActive()
                ->when($search, function ($q) use ($search) {
                    $q->where(function ($subQuery) use ($search) {
                        $subQuery->where('name', 'LIKE', "%{$search}%")
                            ->orWhere('category', 'LIKE', "%{$search}%")
                            ->orWhere('description', 'LIKE', "%{$search}%")
                            ->orWhere('city', 'LIKE', "%{$search}%")
                            ->orWhere('condition', 'LIKE', "%{$search}%");

                        if (is_numeric($search)) {
                            $subQuery->orWhere('amount', 'LIKE', "%{$search}%");
                        }
                    });
                });

            $results = $query->paginate($perPage);

            return response()->json([
                "status" => "success",
                "message" => "Products returned successfully",
                "data" => $results,
            ]);
        }

        return response()->json([
            "status" => "error",
            "message" => "Invalid query type provided. Use 'listing' or 'product'.",
        ], 400);
    }

}

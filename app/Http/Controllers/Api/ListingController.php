<?php

namespace App\Http\Controllers\Api;

use App\Models\Listing;
use App\Enums\PropertyType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListingController extends Controller
{
    public function index(Request $request)
    {
        $query = Listing::query();

        // Apply isActive scope
        $query->isActive();

        // Optional filtering by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Optional filtering by property_type
        if ($request->filled('property_type')) {
            $query->where('property_type', $request->property_type);
        }

        $perPage = min($request->integer('per_page', 9), 30);

        // Paginate the filtered results
        $listings = $query->paginate($perPage);

        return response()->json([
            "status" => "success",
            "message" => "Listings returned successfully",
            "data" => $listings,
        ]);
    }

    public function show(Listing $listing)
    {
        return response()->json([
            "status" => "success",
            "message" => "Listing returned successfully",
            "data" => $listing,
        ]);
    }

    public function listingType()
    {
        $types = collect(PropertyType::cases())->map(fn($case) => [
            'name' => $case->name,
            'value' => $case->value,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Property types returned successfully',
            'data' => $types,
        ]);
    }

}

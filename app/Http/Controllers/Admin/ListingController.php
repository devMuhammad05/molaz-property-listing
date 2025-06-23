<?php

namespace App\Http\Controllers\Admin;

use App\Enums\Status;
use App\Models\Listing;
use App\Enums\PropertyType;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\StoreListing;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateListing;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listings = Listing::isActive()->latest()->paginate(20);
        return view('admin.listing.index', compact('listings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $propertyTypes = PropertyType::cases();
        return view('admin.listing.create', compact('propertyTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreListing $request)
    {
        $data = $request->validated();

        $data['slug'] = Str::slug($data['name']);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('property', 'public');

            $data['image'] = (string) 'storage/' . $imagePath;
        }

        // Handle other images
        if ($request->hasFile('other_images')) {
            $paths = [];

            foreach ($request->file('other_images') as $file) {
                $path = $file->store('product', 'public');
                $paths[] = 'storage/' . $path;
            }
            $data['other_images'] = implode(',', $paths);
        }

        Listing::create($data);

        return to_route('admin.listings.index')->with("success", "Property added successfully");
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $listing = Listing::find($id);
        $listingStatus = Status::cases();
        $propertyTypes = PropertyType::cases();
        return view("admin.listing.edit", compact('listing', 'listingStatus', 'propertyTypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateListing $request, string $id)
    {
        $data = $request->validated();

        $data['slug'] = Str::slug($data['name']);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('property', 'public');

            $data['image'] = (string) 'storage/' . $imagePath;
        }

        // Handle other images
        if ($request->hasFile('other_images')) {
            $paths = [];

            foreach ($request->file('other_images') as $file) {
                $path = $file->store('property', 'public');
                $paths[] = 'storage/' . $path;
            }
            $data['other_images'] = implode(',', $paths);
        }

        Listing::find($id)->update($data);

        return to_route('admin.listings.index')->with("success", "Property updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $listing = Listing::find($id);

        $listing->delete();

        return back()->with("success", "Deleted successfully");
    }
}

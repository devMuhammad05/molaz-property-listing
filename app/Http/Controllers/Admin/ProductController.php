<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProduct;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProduct;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::isActive()->with(['category', 'brand'])->paginate(20);
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();

        return view('admin.product.create', compact('categories', 'brands'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProduct $request)
    {
        $data = $request->validated();

        // dd($data);

        $data['slug'] = Str::slug($data['name']);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('product', 'public');

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

        Product::create($data);

        return to_route('admin.products.index')->with("success", "Product added successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        $brands = Brand::all();
        return view("admin.product.edit", compact('product', 'categories', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProduct $request, string $id)
    {
        $data = $request->validated();

        $data['slug'] = Str::slug($data['name']);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('product', 'public');

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

        Product::find($id)->update($data);

        return to_route('admin.products.index')->with("success", "Product updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);

        $product->delete();

        return back()->with("success", "Deleted successfully");
    }
}

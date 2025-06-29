<x-layouts.app>

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card mb-6">
            <h5 class="card-header">Edit Product</h5>
            <x-alert />
            <form class="card-body" action="{{ route('admin.products.update', $product->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row g-6">
                    <div class="col-md-12">
                        <label class="form-label" for="name">Name</label>
                        <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}"
                            class="form-control" placeholder="Product Name" required />
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="category_id">Product Category</label>
                        <select class="form-select" id="category_id" name="category_id" required>
                            <option disabled selected>Select a Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @selected(old('category_id', $product->category_id) == $category->id)>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="brand_id">Product Brand</label>
                        <select class="form-select" id="brand_id" name="brand_id" required>
                            <option disabled selected>Select a Brand</option>
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}" @selected(old('brand_id', $product->brand_id) == $brand->id)>
                                    {{ $brand->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-12">
                        <label class="form-label" for="key_feature">Key Feature (separate multiple with comma)</label>
                        <input type="text" id="key_feature" name="key_feature"
                            value="{{ old('key_feature', $product->key_feature) }}" class="form-control"
                            placeholder="256GB Storage, A17 Pro Chip" />
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="amount">Base Amount</label>
                        <input type="text" id="amount" name="amount" value="{{ old('amount', $product->amount) }}"
                            class="form-control" placeholder="1000" required />
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="discount_amount">Selling Amount</label>
                        <input type="text" id="discount_amount" name="discount_amount"
                            value="{{ old('discount_amount', $product->discount_amount) }}" class="form-control"
                            placeholder="9000" required />
                    </div>

                    <div class="col-md-12">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" rows="3" name="description"
                            placeholder="Enter product description"
                            required>{{ old('description', $product->description) }}</textarea>
                    </div>

                    <div class="col-md-12">
                        <label for="formFile" class="form-label">Product Image Thumbnail</label>
                        <input class="form-control" type="file" name="image" id="formFile" />
                    </div>

                    <div class="col-md-12">
                        <label class="form-label" for="units_left">Units Left</label>
                        <input type="number" id="units_left" name="units_left"
                            value="{{ old('units_left', $product->units_left) }}" class="form-control"
                            placeholder="Enter units left" required />
                    </div>

                    <div class="col-md-12">
                        <h6>Other Product Images</h6>
                        <div id="customDropzone" class="dropzone">
                            <h4>Drop files here or click to upload</h4>
                            <p class="text-muted">This supports multiple file uploads</p>
                            <input type="file" name="other_images[]" id="fileInput" multiple hidden>
                        </div>
                        <div id="preview" class="preview-container"></div>
                    </div>

                    <div class="col-md-6">
                        <label for="is_active" class="form-label">Status</label>
                        <select class="form-select" id="is_active" name="is_active">
                            <option value="1" @selected(old('is_active', $product->is_active) == 1)>Active</option>
                            <option value="0" @selected(old('is_active', $product->is_active) == 0)>Inactive</option>
                        </select>
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary me-4">Submit</button>
                    <button type="reset" class="btn btn-label-secondary">Cancel</button>
                </div>
            </form>

        </div>
    </div>

</x-layouts.app>

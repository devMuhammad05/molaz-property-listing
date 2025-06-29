<x-layouts.app>


    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card mb-6">
            <h5 class="card-header">Add Product</h5>
            <x-alert />
            <form class="card-body" action="{{ route('admin.products.store') }}" method="POST"
                enctype="multipart/form-data">

                @csrf
                <div class="row g-6">
                    <div class="col-md-12">
                        <label class="form-label" for="name">Name</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control"
                            placeholder="Product Name" required />
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="tag">Product Category</label>
                        <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example"
                            name="category_id">
                            <option disabled selected>Select a Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ old('category', $category->id) }}" @selected($category->id == old('category'))>
                                    {{ $category->name }}
                                </option>
                            @endforeach

                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="tag">Product Brand</label>
                        <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example"
                            name="brand_id">
                            <option  disabled selected>Select a Brand</option>
                            @foreach ($brands as $brand)
                                <option value="{{ old('brand', $brand->id) }}" @selected($category->id == old('category'))>
                                    {{ $brand->name }}
                                </option>
                            @endforeach

                        </select>
                    </div>

                    <div class="col-md-12">
                        <label class="form-label" for="name">Key Feature (seperate multiple with comma)</label>
                        <input type="text" id="key_feature" name="key_feature" value="{{ old('key_feature') }}"
                            class="form-control" placeholder="256GB Storage, A17 Pro Chip" />
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="amount">Base Amount</label>
                        <input type="text" id="amount" name="amount" value="{{ old('amount') }}" class="form-control"
                            placeholder="1000" required />
                    </div>


                    <div class="col-md-6">
                        <label class="form-label" for="amount">Selling Amount</label>
                        <input type="text" id="discount_amount" name="discount_amount" value="{{ old('discount_amount') }}" class="form-control"
                            placeholder="9000" required />
                    </div>

                    <div class="col-md-12">
                        <div>
                            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"
                                placeholder="Enter product description" required>{{ old('description') }}</textarea>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <label for="formFile" class="form-label">Product Image Thumbnail</label>
                        <input class="form-control" type="file" name="image" id="formFile" required />
                    </div>

                    <div class="col-md-12">
                        <label class="form-label" for="units_left">Units Left</label>
                        <input type="number" id="address" name="units_left" value="{{ old('units_left') }}"
                            class="form-control" placeholder="Enter units left" required />

                        </select>
                    </div>

                    <div class="col-md-12">
                        <h6>Other Product Images</h6>
                        <div id="customDropzone" class="dropzone">
                            <h4>Drop files here or click to upload</h4>
                            <p class="text-muted">This support multiple file upload</p>
                            <input type="file" name="other_images[]" id="fileInput" multiple hidden>
                        </div>
                        <div id="preview" class="preview-container"></div>
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

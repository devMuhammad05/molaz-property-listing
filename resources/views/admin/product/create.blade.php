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

                    <div class="col-md-12">
                        <label class="form-label" for="tag">Product Category</label>
                        <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example"
                            name="category">
                            <option value="" selected>Select a Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ old('category', $category->value) }}">
                                    {{ $category->name }}
                                </option>
                            @endforeach

                        </select>
                    </div>


                    <div class="row pt-3">
                        <div class="col-md-6">
                            <label class="form-label" for="name">City</label>
                            <input type="text" id="city" name="city" value="{{ old('city') }}" class="form-control"
                                placeholder="City" />
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="amount">Amount</label>
                            <input type="text" id="amount" name="amount" value="{{ old('amount') }}"
                                class="form-control" placeholder="1000" required />
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div>
                            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"
                                placeholder="Enter product description" required>{{ old('description') }}</textarea>
                        </div>
                    </div>

                    <div class="row pt-3">
                        <div class="col-md-6">
                            <label class="form-label" for="name">Condition</label>
                            <input type="text" id="condition" name="condition" value="{{ old('condition') }}"
                                class="form-control" placeholder="Used" />
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="amount">Seller</label>
                            <input type="text" id="seller" name="seller" value="{{ old('seller') }}"
                                class="form-control" />
                        </div>
                    </div>

                    <div class="col-md-12">
                        <label for="formFile" class="form-label">Product Image Thumbnail</label>
                        <input class="form-control" type="file" name="image" id="formFile" required />
                    </div>

                    <div class="col-md-12">
                        <label class="form-label" for="units_left">Units Left</label>
                        <input type="text" id="address" name="units_left" value="{{ old('units_left') }}"
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

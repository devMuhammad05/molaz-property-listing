<x-layouts.app>
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card mb-6">
            <h5 class="card-header">Edit Property</h5>
            <x-alert />
            <form class="card-body" action="{{ route('admin.listings.update', $listing->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row g-6">
                    <div class="col-md-12">
                        <label class="form-label" for="name">Name</label>
                        <input type="text" id="name" name="name" value="{{ old('name', $listing->name) }}"
                            class="form-control" placeholder="Property Name" required />
                    </div>

                    <div class="row pt-3">
                        <div class="col-md-6">
                            <label class="form-label" for="name">City</label>
                            <input type="text" id="name" name="city" value="{{ old('city', $listing->city) }}"
                                class="form-control" placeholder="City" required />
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="amount">Amount</label>
                            <input type="text" id="amount" name="amount" value="{{ old('amount', $listing->amount) }}"
                                class="form-control" placeholder="1000" required />
                        </div>
                    </div>

                    <div class="col-md-12">
                        <label class="form-label" for="address">Address</label>
                        <input type="text" id="address" name="address" value="{{ old('address', $listing->address) }}"
                            class="form-control" placeholder="Enter address" required />
                    </div>

                    <div class="col-md-12">
                        <div>
                            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"
                                placeholder="Enter property description"
                                required>{{ old('description', $listing->description) }}</textarea>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <label class="form-label" for="property_type">Property Type</label>

                        <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example"
                            name="property_type">
                            @foreach ($propertyTypes as $type)
                                <option value="{{ old('property_type', $type->value) }}" @selected(
                                    $type->value ==
                                    $listing->property_type
                                )>
                                    {{ $type->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-12">
                        <label class="form-label" for="video_url">Video Url</label>
                        <input type="text" id="name" name="video_url"
                            value="{{ old('video_url', $listing->video_url) }}" class="form-control"
                            placeholder="Video Url" required />
                    </div>

                    <div class="row pt-3">
                        <div class="col-md-6">
                            <label class="form-label" for="tags">Tags</label>
                            <input type="text" id="tags" name="tags" value="{{ old('tags', $listing->tags) }}"
                                class="form-control" placeholder="4 bed, 1000 sq ft" />
                        </div>

                        <div class="col-md-6">
                            <label for="exampleFormControlSelect1" class="form-label">Intervals</label>
                            <select class="form-select" id="exampleFormControlSelect1"
                                aria-label="Default select example" name="intervals">
                                <option value="month" @selected($listing->intervals == "month")>Month</option>
                                <option value="year" @selected($listing->intervals == "year")>Year</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="units_left">Units Left</label>
                        <input type="text" id="units_left" name="units_left" value="{{ old('units_left') }}"
                            class="form-control" placeholder="Enter units left" required />

                        </select>
                    </div>

                    <div class="col-md-12">
                        <label for="formFile" class="form-label">Property Image</label>
                        <input class="form-control" type="file" name="image" id="formFile" />
                    </div>

                    <div class="col-md-12">
                        <h6>Other Property Images</h6>
                        <div id="customDropzone" class="dropzone">
                            <h4>Drop files here or click to upload</h4>
                            <p class="text-muted">This support multiple file upload</p>
                            <input type="file" name="other_images[]" id="fileInput" multiple hidden>
                        </div>
                        <div id="preview" class="preview-container"></div>
                    </div>

                    <div class="row pt-4">
                        <div class="col-md-6">
                            <label class="form-label" for="tag">Property Status</label>
                            <select class="form-select" id="exampleFormControlSelect1"
                                aria-label="Default select example" name="status">
                                @foreach ($listingStatus as $status)
                                    <option value="{{ $status->value }}" @selected($status->value == $listing->status)>
                                        {{ $status->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="exampleFormControlSelect1" class="form-label">Status</label>
                            <select class="form-select" id="exampleFormControlSelect1"
                                aria-label="Default select example" name="is_active">
                                <option value="1" @selected($listing->is_active == 1)>Active</option>
                                <option value="0" @selected($listing->is_active == 0)>Inactive</option>
                            </select>
                        </div>
                    </div>


                </div>

                <div class="pt-6">
                    <button type="submit" class="btn btn-primary me-4">Submit</button>
                    <button type="reset" class="btn btn-label-secondary">Cancel</button>
                </div>
            </form>
        </div>
    </div>

</x-layouts.app>

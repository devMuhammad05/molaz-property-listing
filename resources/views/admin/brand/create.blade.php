<x-layouts.app>
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card mb-6">
            <h5 class="card-header">Add Brand</h5>
            <x-alert />
            <form class="card-body" action="{{ route('admin.brands.store') }}" method="POST"
                enctype="multipart/form-data">

                @csrf
                <div class="row g-6">
                    <div class="col-md-12">
                        <label class="form-label" for="name">Name</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control"
                            placeholder="Property Name" required />
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

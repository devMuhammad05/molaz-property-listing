<x-layouts.app>
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-datatable table-responsive pt-0">
                <div class=dataTables_wrapper>
                    <div class="card-header flex-column flex-md-row">
                        <div class="head-label">
                            <h5 class="card-title mb-0">Manage Brands</h5>
                        </div>
                        <div class="dt-action-buttons text-end pt-6 pt-md-0">
                            <div class="dt-buttons btn-group flex-wrap">
                                <a href="{{ route('admin.brands.create') }}"
                                    class="btn btn-secondary create-new btn-primary waves-effect waves-light">
                                    <span>
                                        <i class="ti ti-plus me-sm-1"></i>
                                        <span class="d-none d-sm-inline-block">
                                            Add Brand
                                        </span>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <hr class="my-0">
                    <x-alert />
                    <table class="datatables-basic table">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($brands as $count => $brand)
                                <tr>
                                    <td>{{ $count + 1 }}</td>
                                    <td>{{ $brand->name }} </td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="ti ti-dots-vertical"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <form action="{{ route('admin.brands.destroy', $brand->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item delete-confirm"
                                                        onclick="return confirm('Are you sure you want to delete this?')">
                                                        <i class="ti ti-trash me-1"></i> Delete
                                                    </button>
                                                </form>

                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
</x-layouts.app>

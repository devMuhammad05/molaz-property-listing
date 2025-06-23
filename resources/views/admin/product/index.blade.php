<x-layouts.app>
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-datatable table-responsive pt-0">
                <div class=dataTables_wrapper>
                    <div class="card-header flex-column flex-md-row">
                        <div class="head-label">
                            <h5 class="card-title mb-0">Manage Products</h5>
                        </div>
                        <div class="dt-action-buttons text-end pt-6 pt-md-0">
                            <div class="dt-buttons btn-group flex-wrap">
                                {{-- <div class="btn-group">
                                    <button
                                        class="btn btn-secondary buttons-collection dropdown-toggle btn-label-primary me-4 waves-effect waves-light border-none"
                                        tabindex="0" aria-controls="DataTables_Table_0" type="button"
                                        aria-haspopup="dialog" aria-expanded="false">
                                        <span>
                                            <i class="ti ti-file-export ti-xs me-sm-1"></i>
                                            <span class="d-none d-sm-inline-block">
                                                Export
                                            </span>
                                        </span>
                                    </button>
                                </div> --}}
                                <a href="{{ route('admin.products.create') }}"
                                    class="btn btn-secondary create-new btn-primary waves-effect waves-light">
                                    <span>
                                        <i class="ti ti-plus me-sm-1"></i>
                                        <span class="d-none d-sm-inline-block">
                                            Add Product
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
                                <th>image</th>
                                <th>Description</th>
                                <th>Amount</th>
                                <th>Condition</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $count => $product)
                                <tr>
                                    <td>{{ $count + 1 }}</td>
                                    <td>{{ $product->name }} </td>
                                    <td> <img src="{{ asset($product->image) }}" width="100" height="80" alt=""> </td>
                                    <td>{{ $product->description }}</td>
                                    <td>{{ number_format($product->amount, 2) }}</td>
                                    <td>{{ $product->condition }}</td>
                                    <td>
                                        <div class="dropdown text-center">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="ti ti-dots-vertical"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                {{-- <a class="dropdown-item" href="#"><i class="ti ti-eye me-1"></i>
                                                    View</a> --}}

                                                <a class="dropdown-item"
                                                    href="{{ route('admin.products.edit', $product->id) }}"><i
                                                        class="ti ti-pencil me-1"></i> Edit
                                                </a>

                                                <form action="{{ route('admin.products.destroy', $product->id) }}"
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

                    <!-- Pagination Links -->
                    <div class="mt-3 px-3">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
</x-layouts.app>

@extends('Backend.Layout.app')

@section('site-title', 'Shipping Method')

@section('main-content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show text-white" role="alert">
                            <span class="text-sm">{{ session('success') }}</span>
                            <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <div class="search-form">
                                <form action="{{ route('shipping-method.index') }}" method="GET" class="app-search d-none d-lg-block">
                                    <div class="input-group">
                                        <input type="text" name="search" class="form-control" placeholder="Search..." value="{{ request('search') }}">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit">Go</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="page-title-right">
                            <a href="{{ route('shipping-method.create') }}" class="btn btn-primary">+ Add New</a>
                        </div>
                    </div>

                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th width="50%">
                                    <a href="{{ route('shipping-method.index', array_merge(request()->query(),
                                        [
                                            'sort_by' => 'name',
                                            'sort_direction' => request('sort_direction') === 'asc' && request('sort_by') === 'name' ? 'desc' : 'asc'
                                        ])) }}"
                                    >
                                        Name
                                        @if($sortBy === 'name')
                                            @if(request('sort_direction') == 'asc')
                                                ▲ <!-- Ascending arrow by default -->
                                            @else
                                                ▼ <!-- Descending arrow -->
                                            @endif
                                        @else
                                            ▼
                                        @endif
                                    </a>
                                </th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>


                        <tbody>
                            @forelse ($shippingMethods as $shipping)
                                <tr>
                                    <td>{{ ($shippingMethods->currentPage() - 1) * $shippingMethods->perPage() + $loop->iteration }}</td>
                                    <td>{{ $shipping->name }}</td>
                                    <td>
                                        @if($shipping->status == 1)
                                            <a href="#" class="badge badge-success badge-sm status-update" data-id="{{ $shipping->id }}">Active</a>
                                        @else
                                            <a href="#" class="badge badge-danger badge-sm status-update" data-id="{{ $shipping->id }}">Inactive</a>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('shipping-method.edit', $shipping->id) }}" class="btn btn-sm btn-primary">
                                            <i class="bx bx-edit"></i> Edit
                                        </a>
                                        <a href="#" class="btn btn-sm btn-danger delete-shipping" data-id="{{ $shipping->id }}">
                                            <i class="bx bx-trash"></i> Delete
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">
                                        <strong>No data found</strong>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <!-- Pagination -->
                    <div class="d-flex mt-4">
                        {{ $shippingMethods->links() }}
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
        
@endsection

@push('custom-scripts')
    <script>
        const deleteShippingUrl = '{{ route('shipping-method.destroy', ':id') }}';
        $('.delete-shipping').on('click', function(e){
            e.preventDefault();
            var shippingId = $(this).data('id');
            const url = deleteShippingUrl.replace(':id', shippingId);
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                type: "warning",
                showCancelButton: !0,
                confirmButtonColor: "#34c38f",
                cancelButtonColor: "#f46a6a",
                confirmButtonText: "Yes, delete it!"
            }).then(function(t) {
                console.log('t', t);
                if(t.value){
                    $.ajax({
                        url: url,
                        type: 'post',
                        data: {_method: 'delete', _token : '{{ csrf_token() }}'},
                        success: function(response) {
                            Swal.fire({
                                title: "Deleted!",
                                // text: response.message,
                                type: "success",
                            }).then(function(t) {
                                location.reload();
                            });
                        },
                        error: function(xhr) {
                            Swal.fire({
                                title: "Error!",
                                text: "There was a problem deleting the Shipping.",
                            });
                        }
                    });
                }
            })
        });

        $('.status-update').on('click', function(e){
            e.preventDefault();
            var shippingId = $(this).data('id');
            const statusUpdateUrl = '{{ route('shipping-method.status', ':id') }}';
            const url = statusUpdateUrl.replace(':id', shippingId);
            Swal.fire({
                title: "Are you sure?",
                text: "Do you want to change the status?",
                type: "warning", 
                showCancelButton: !0,
                confirmButtonColor: "#34c38f",
                cancelButtonColor: "#f46a6a",
                confirmButtonText: "Yes, update it!"
            }).then(function(t) {
                if(t.value){
                    $.ajax({
                        url: url,
                        type: 'post',
                        data: {_method: 'put', _token : '{{ csrf_token() }}'},
                        success: function(response) {
                            Swal.fire({
                                title: "Updated!",
                                // text: response.message,
                                type: "success",
                            }).then(function(t) {
                                location.reload();
                            });
                        },
                        error: function(xhr) {
                            Swal.fire({
                                title: "Error!",
                                text: "There was a problem updating the status.",
                            });
                        }
                    });
                }
            });
        });
    </script>
@endpush

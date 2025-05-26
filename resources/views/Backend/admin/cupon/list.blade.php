@extends('Backend.Layout.app')

@section('site-title', 'Cupon')

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
                                <form action="{{ route('cupon.index') }}" method="GET" class="app-search d-none d-lg-block">
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
                            <a href="{{ route('cupon.create') }}" class="btn btn-primary">+ Add New</a>
                        </div>
                    </div>

                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>
                                    <a href="{{ route('cupon.index', array_merge(request()->query(),
                                        [
                                            'sort_by' => 'code',
                                            'sort_direction' => request('sort_direction') === 'asc' && request('sort_by') === 'code' ? 'desc' : 'asc'
                                        ])) }}"
                                    >
                                        Code
                                        @if($sortBy === 'code')
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
                                <th>Type</th>
                                <th>Value</th>
                                <th>Min Purchase</th>
                                <th>Usage Limit</th>
                                <th>Usage Count</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>


                        <tbody>
                            @forelse ($cupons as $cupon)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $cupon->code }}</td>
                                    <td>{{ $cupon->type }}</td>
                                    <td>{{ $cupon->value }}</td>
                                    <td>{{ $cupon->min_purchase }}</td>
                                    <td>{{ $cupon->usage_limit }}</td>
                                    <td>{{ $cupon->used }}</td>
                                    <td>{{ $cupon->start_date }}</td>
                                    <td>{{ $cupon->end_date }}</td>
                                    <td>
                                        @if($cupon->status == 1)
                                            <a href="#" class="badge badge-success badge-sm status-update" data-id="{{ $cupon->id }}">Active</a>
                                        @else
                                            <a href="#" class="badge badge-danger badge-sm status-update" data-id="{{ $cupon->id }}">Inactive</a>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('cupon.edit', $cupon->id) }}" class="btn btn-sm btn-primary">
                                            <i class="bx bx-edit"></i> Edit
                                        </a>
                                        <a href="#" class="btn btn-sm btn-danger delete-cupon" data-id="{{ $cupon->id }}">
                                            <i class="bx bx-trash"></i> Delete
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="11" class="text-center">
                                        <strong>No data found</strong>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <!-- Pagination -->
                    <div class="d-flex mt-4">
                        {{ $cupons->links() }}
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
        
@endsection

@push('custom-scripts')
    <script>
        const deleteCuponUrl = '{{ route('cupon.destroy', ':id') }}';
        $('.delete-cupon').on('click', function(e){
            e.preventDefault();
            var cuponId = $(this).data('id');
            const url = deleteCuponUrl.replace(':id', cuponId);
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
                                text: "There was a problem deleting the Cupon.",
                            });
                        }
                    });
                }
            })
        });

        $('.status-update').on('click', function(e){
            e.preventDefault();
            var cuponId = $(this).data('id');
            const statusUpdateUrl = '{{ route('cupon.status', ':id') }}';
            const url = statusUpdateUrl.replace(':id', cuponId);
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

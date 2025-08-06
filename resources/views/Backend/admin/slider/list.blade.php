@extends('Backend.Layout.app')

@section('site-title', 'Sliders')

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
                                {{-- <form action="{{ route('slider.index') }}" method="GET" class="app-search d-none d-lg-block">
                                    <div class="input-group">
                                        <input type="text" name="search" class="form-control" placeholder="Search..." value="{{ request('search') }}">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit">Go</button>
                                        </div>
                                    </div>
                                </form> --}}
                            </div>
                        </div>
                        <div class="page-title-right mb-3">
                            <a href="{{ route('slider.create') }}" class="btn btn-primary">+ Add New</a>
                        </div>
                    </div>

                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Image</th>
                                <th>Link</th>
                                {{-- <th>
                                    <a href="{{ route('slider.index', array_merge(request()->query(),
                                        [
                                            'sort_by' => 'title',
                                            'sort_direction' => request('sort_direction') === 'asc' && request('sort_by') === 'title' ? 'desc' : 'asc'
                                        ])) }}"
                                    >
                                        Title
                                        @if($sortBy === 'title')
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
                                <th>Subtitle</th>
                                <th>Button Color</th>
                                <th>Button Text</th> --}}
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>


                        <tbody>
                            @forelse ($sliders as $slider)
                                <tr>
                                    <td>{{ ($sliders->currentPage() - 1) * $sliders->perPage() + $loop->iteration }}</td>
                                    <td><img src="{{ asset($slider->slider_image) }}" alt="" width="50"></td>
                                    {{-- <td>{{ $slider->title }}</td>
                                    <td>{{ $slider->subtitle }}</td>
                                    <td>{{ $slider->button_color }}</td>
                                    <td>{{ $slider->button_text }}</td> --}}
                                    <td class="w-50">{{ $slider->button_url }}</td>
                                    <td>
                                        @if($slider->status == 1)
                                            <a href="#" class="badge badge-success badge-sm status-update" data-id="{{ $slider->id }}">Active</a>
                                        @else
                                            <a href="#" class="badge badge-danger badge-sm status-update" data-id="{{ $slider->id }}">Inactive</a>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('slider.edit', $slider->id) }}" class="btn btn-sm btn-primary">
                                            <i class="bx bx-edit"></i> Edit
                                        </a>
                                        <a href="#" class="btn btn-sm btn-danger delete-product-bundle" data-id="{{ $slider->id }}">
                                            <i class="bx bx-trash"></i> Delete
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">
                                        <strong>No data found</strong>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <!-- Pagination -->
                    <div class="d-flex mt-4">
                        {{ $sliders->links() }}
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
        
@endsection

@push('custom-scripts')
    <script>
        const deleteSliderUrl = '{{ route('slider.destroy', ':id') }}';
        $('.delete-product-bundle').on('click', function(e){
            e.preventDefault();
            var sliderId = $(this).data('id');
            const url = deleteSliderUrl.replace(':id', sliderId);
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
                                text: "There was a problem deleting the Slider.",
                            });
                        }
                    });
                }
            })
        });

        $('.status-update').on('click', function(e){
            e.preventDefault();
            var sliderId = $(this).data('id');
            const statusUpdateUrl = '{{ route('slider.status', ':id') }}';
            const url = statusUpdateUrl.replace(':id', sliderId);
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

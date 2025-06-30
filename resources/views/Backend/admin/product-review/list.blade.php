@extends('Backend.Layout.app')

@section('site-title', 'Product Review')

@section('main-content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                {{-- Success Message --}}
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show text-white" role="alert">
                        <span class="text-sm">{{ session('success') }}</span>
                        <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                {{-- Search --}}
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <div>
                        <div class="search-form">
                            <form action="{{ route('product-review.index') }}" method="GET" class="app-search">
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
                        <a href="{{ route('product-review.create') }}" class="btn btn-primary">+ Add New</a>
                    </div>
                </div>

                {{-- Review Table --}}
                <table class="table table-striped table-bordered dt-responsive nowrap" width="100%">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>User</th>
                            <th>Product</th>
                            <th>Rating</th>
                            <th>Review</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($reviews as $review)
                            <tr class="">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $review->user->name  }}</td>
                                <td>{{ $review->product->product_name  }}</td>
                                <td>{{ $review->rating }}/5</td>
                                <td>{{ Str::limit($review->review, 100) }}</td>
                                <td>
                                    @if ($review->is_approved)
                                        <span class="badge badge-success">Approved</span>
                                    @else
                                        <span class="badge badge-warning">Pending</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="#" 
                                        class="btn btn-sm {{ $review->is_approved ? 'btn-secondary' : 'btn-success' }} approve-review" 
                                        data-id="{{ $review->id }}">
                                        {{ $review->is_approved ? 'Disapprove' : 'Approve' }}
                                    </a>
                                    
                                    <a href="{{ route('product-review.edit', $review->id) }}" class="btn btn-sm btn-primary">
                                        Edit
                                    </a>
                                    
                                    <a href="#" class="btn btn-sm btn-danger delete-review" data-id="{{ $review->id }}">
                                        Delete
                                    </a>
                                    
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">
                                    <strong>No reviews found.</strong>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                {{-- Pagination --}}
                <div class="d-flex mt-4 justify-content-end">
                    {{ $reviews->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

        
@endsection

@push('custom-scripts')
<script>
    const approveReviewUrl = '{{ route('product-review.approve', ':id') }}';
    const deleteReviewUrl = '{{ route('product-review.destroy', ':id') }}';
    $('.approve-review').on('click', function(e) {
        e.preventDefault();
        console.log('dd');
        
        const id = $(this).data('id');
        const url = approveReviewUrl.replace(':id', id);

        Swal.fire({
            title: "Change Approval?",
            text: "Toggle approval status of this review?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#34c38f",
            cancelButtonColor: "#f46a6a",
            confirmButtonText: "Yes, change it!"
        }).then(function(t) {
            if(t.value){
                $.ajax({
                    url: url,
                    type: 'post',
                    data: {_method: 'put', _token : '{{ csrf_token() }}'},
                    success: function(response) {
                        Swal.fire({
                            title: "Success!",
                            type: "success",
                        }).then(function(t) {
                            location.reload();
                        });
                    },
                    error: function(xhr) {
                        Swal.fire({
                            title: "Error!",
                            text: "There was a problem approving the product review.",
                        });
                    }
                });
            }
        });
    });
    $(document).ready(function() {
        $(document).on('click', '.delete-review', function(e) {
            e.preventDefault();
            const id = $(this).data('id');
            const url = deleteReviewUrl.replace(':id', id);
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#34c38f",
                cancelButtonColor: "#f46a6a",
                confirmButtonText: "Yes, delete it!"
            }).then(function(t) {
                if(t.value){
                    $.ajax({
                        url: url,
                        type: 'post',
                        data: {_method: 'delete', _token : '{{ csrf_token() }}'},
                        success: function(response) {
                            Swal.fire({
                                title: "Deleted!",
                                type: "success",
                            }).then(function(t) {
                                location.reload();
                            });
                        },
                        error: function(xhr) {
                            Swal.fire({
                                title: "Error!",
                                text: "There was a problem deleting the product review.",
                            });
                        }
                    });
                }
            });
        });
    });
</script>
@endpush

@extends('Web.Layout.app')

@section('site-title', 'Wishlist')

@section('content')
<div class="dashboard-page">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-4">
                @include('Web.Layout.users.partials.sidebar')
            </div>
            <div class="col-xl-9 col-lg-9 col-md-8">
                <div class="order-content">
                    <div class="dash-heading">
                        <h1>Wishlist</h1>
                        @if(session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert" style="font-size: 16px;">
                                <strong>Error!</strong> {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert" style="font-size: 16px;">
                                <strong>Success!</strong> {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            @forelse($wishlists as $wishlist)
                                @php $categories = $wishlist->product?->categories;  @endphp
                                <div class="my-cart-item-details-wrap">
                                    <div class="cart-item-innerBox">
                                        <div class="cart-item-innerBox-left">
                                            <div class="cart-img-item">
                                                <a href="#">
                                                    <img class="img-fluid"
                                                         src="{{ $wishlist->product?->images?->first()?->image_url
                                                                 ? asset($wishlist->product->images->first()->image_url)
                                                                 : asset('web_assets/images/product-img/default.jpg') }}"
                                                         alt="{{ $wishlist->product?->product_name ?? 'Product' }}">
                                                </a>
                                            </div>
                                            <div class="cart-item-contentBox">
                                                <h5><a href="#">{{ $wishlist->product?->product_name ?? 'N/A' }}</a></h5>
                                                <div class="cart-item-link-meta">
                                                    @forelse($categories ?? [] as $category)
                                                        <span>{{ $category->name }}</span>
                                                    @empty
                                                        <span>N/A</span>
                                                    @endforelse
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cart-item-inner-price-quantity">
                                            <div class="cart-item-innerBox-middle">
                                                <div class="cart-item-middle">
                                                    <div class="cart-price">
                                                        <span>$ {{ $wishlist->product?->sale_price ?? 'N/A' }}</span>
                                                        <span class="old-price">$ {{ $wishlist->product?->regular_price ?? 'N/A' }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="cart-item-contentBox-Right">
                                                <a type="button" class="btn product-cart" href="#"><i class="fa-solid fa-cart-shopping"></i>Add to Cart</a>
                                                <div class="automation-btn-delete"> 
                                                    <a data-id="{{ $wishlist->id }}" href="{{ route('user.wishlist.remove', $wishlist->id) }}"><i class="fas fa-trash-alt"></i>Remove</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p>No items in wishlist.</p>
                            @endforelse
                        </div>
                        <div class="col-lg-12 d-flex justify-content-end">
                            <div class="pagination-area">
                                {{ $wishlists->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
    <script>
        const deleteWishlistUrl = '{{ route('user.wishlist.remove', ':id') }}';
        $('.automation-btn-delete').on('click', function(e){
            e.preventDefault();
            var wishlistId = $(this).find('a').data('id');
            console.log('wishlistId', wishlistId);
            const url = deleteWishlistUrl.replace(':id', wishlistId);
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                type: "warning",
                showCancelButton: !0,
                confirmButtonColor: "#34c38f",
                cancelButtonColor: "#f46a6a",
                confirmButtonText: "Yes, remove it!"
            }).then(function(t) {
                console.log('t', t);
                if(t.value){
                    $.ajax({
                        url: url,
                        type: 'get',
                        success: function(response) {
                            Swal.fire({
                                title: "Removed!",
                                type: "success",
                            }).then(function(t) {
                                location.reload();
                            });
                        },
                        error: function(xhr) {
                            Swal.fire({
                                title: "Error!",
                                text: "There was a problem deleting the Editor.",
                            });
                        }
                    });
                }
            })
        });
    </script>
@endpush

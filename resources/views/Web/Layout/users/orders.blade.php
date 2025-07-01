@extends('Web.Layout.app')

@section('site-title', 'Orders')

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
                        <h1>My Orders</h1>
                    </div>
                    <div class="order-search-wrap">
                        <div class="order-search-box">
                            <div class="order-search">
                                <form action="{{ route('user.orders') }}" method="get">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search by order id" aria-describedby="basic-addon2" name="search" value="{{ $request->search }}">
                                        <button class="input-group-text" type="submit" id="basic-addon2">Search</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <form action="{{ route('user.orders') }}" method="get">
                            <div class="order-search-box">
                                <select class="form-select" aria-label="Default select example" name="status" id="status">
                                    <option value="">Filter status</option>
                                    <option value="pending" {{ $request->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="completed" {{ $request->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                    <option value="cancelled" {{ $request->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                </select>
                                <select class="form-select" aria-label="Default select example" name="sort" id="sort">
                                    <option value="">Sort By</option>
                                    <option value="oldest" {{ $request->sort == 'oldest' ? 'selected' : '' }}>Date Oldest to Newest</option>
                                    <option value="newest" {{ $request->sort == 'newest' ? 'selected' : '' }}>Date Newest to Oldest</option>
                                    <option value="price_low_to_high" {{ $request->sort == 'price_low_to_high' ? 'selected' : '' }}>Price Low to High</option>
                                    <option value="price_high_to_low" {{ $request->sort == 'price_high_to_low' ? 'selected' : '' }}>Price High to Low</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Order ID</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($orders as $order)
                                    <tr>
                                        <th scope="row">{{ $order->id }}</th>
                                        <td>{{ $order->created_at->format('d M Y') }}</td>
                                        <td>
                                            @switch($order->order_status)
                                                @case('pending')
                                                    <span class="status-bg-pn">Pending</span>
                                                    @break
                                                @case('completed')
                                                    <span class="status-bg-succ">Completed</span>
                                                    @break
                                                @case('cancelled')
                                                    <span class="status-bg-canc">Cancelled</span>
                                                    @break
                                                @default
                                                    <span class="status-bg-pn">Pending</span>
                                                    @break
                                            @endswitch
                                        </td>
                                        <td>{{config('settings.currency_symbol')}}{{ $order->total_amount }}</td>
                                        <td class="view-btn"><a href="{{ route('user.order-invoice', $order->id) }}"><i class="far fa-eye"></i> View</a></td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">No orders found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 d-flex justify-content-end">
                            <div class="pagination-area">
                                {{ $orders->links() }}
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
        $(document).ready(function() {
            console.log('ready');
            $('#status').on('change', function() {
                console.log('status');
                $(this).closest('form').submit();
            });
            $('#sort').on('change', function() {
                console.log('sort');
                $(this).closest('form').submit();
            });
        });
    </script>
@endpush

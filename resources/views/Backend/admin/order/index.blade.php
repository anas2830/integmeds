@extends('Backend.Layout.app')

@section('site-title', 'Orders List')

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
                            <form action="{{ route('order.list') }}" method="GET" class="app-search d-none d-lg-block">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control" placeholder="Search by order id" value="{{ request('search') }}">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit">Go</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="page-title-right d-flex align-items-center">
                        <form action="{{ route('order.list') }}" method="get">
                            <div class="order-search-box d-flex align-items-center" style="gap: 10px;">
                                <select class="form-select select2" aria-label="Default select example" name="status" id="statusChange">
                                    <option value="">status</option>
                                    <option value="pending" {{ $request->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="processing" {{ $request->status == 'processing' ? 'selected' : '' }}>Processing</option>
                                    <option value="completed" {{ $request->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                    <option value="cancelled" {{ $request->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                </select>
                                <select class="form-select select2" aria-label="Default select example" name="sort" id="sort">
                                    <option value="">sort</option>
                                    <option value="oldest" {{ $request->sort == 'oldest' ? 'selected' : '' }}>Oldest to Newest</option>
                                    <option value="newest" {{ $request->sort == 'newest' ? 'selected' : '' }}>Newest to Oldest</option>
                                    <option value="price_low_to_high" {{ $request->sort == 'price_low_to_high' ? 'selected' : '' }}>Price Low to High</option>
                                    <option value="price_high_to_low" {{ $request->sort == 'price_high_to_low' ? 'selected' : '' }}>Price High to Low</option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>

                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th scope="col">Order ID</th>
                            <th scope="col">User Name</th>
                            <th scope="col">Date</th>
                            <th scope="col">Order Status</th>
                            <th scope="col">Payment Status</th>
                            <th scope="col">Payment Method</th>
                            <th scope="col">Total</th>
                            <th scope="col">Change Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($orders as $order)
                            <tr>
                                <th scope="row">{{ $order->order_number }}</th>
                                <td>{{ $order->user?->name }}</td>
                                <td>{{ $order->created_at->format('d M Y') }}</td>
                                <td>
                                    @switch($order->order_status)
                                        @case('processing')
                                            <span class="badge badge-pill badge-soft-info font-size-12">Processing</span>
                                            @break
                                        @case('completed')
                                            <span class="badge badge-pill badge-soft-success font-size-12">Completed</span>
                                            @break
                                        @case('cancelled')
                                            <span class="badge badge-pill badge-soft-danger font-size-12">Cancelled</span>
                                            @break
                                        @default
                                            <span class="badge badge-pill badge-soft-warning font-size-12">Pending</span>
                                            @break
                                    @endswitch
                                </td>
                                <td>
                                    @switch($order->payment_status)
                                        @case('paid')
                                            <span class="status-bg-succ">Paid</span>
                                            @break
                                        @case('failed')
                                            <span class="status-bg-canc">Failed</span>
                                            @break
                                        @default
                                            <span class="status-bg-pn">Pending</span>
                                            @break
                                    @endswitch
                                </td>
                                <td>{{$order->payment_method}}</td>
                                <td>{{config('app.currency_symbol')}}{{ $order->total_amount }}</td>
                                <td>
                                    <form action="{{ route('order.updateStatus', $order->id) }}" method="POST" class="d-flex align-items-center">
                                        @csrf
                                        @method('PATCH')
                                        <select name="order_status" class="form-select form-select-sm status-select" style="min-width: 120px;">
                                            <option value="pending" {{ $order->order_status == 'pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="processing" {{ $order->order_status == 'processing' ? 'selected' : '' }}>Processing</option>
                                            <option value="completed" {{ $order->order_status == 'completed' ? 'selected' : '' }}>Completed</option>
                                            <option value="cancelled" {{ $order->order_status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                        </select>
                                    </form>
                                </td>
                                <td class="view-btn"><a target="_blank" href="{{ route('order.details', $order->id) }}"><i class="far fa-eye"></i> View</a></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No orders found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            
                <div class="d-flex mt-4">
                    {{ $orders->links() }}
                </div>
 
            </div>
        </div>
    </div>
</div>

@endsection

@push('custom-scripts')
    <script>
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: "Select an option",
                width: '100%',
                allowClear: true
            });
            $('#statusChange').on('change', function() {
                console.log('status');
                $(this).closest('form').submit();
            });
            $('#sort').on('change', function() {
                console.log('sort');
                $(this).closest('form').submit();
            });
            $('.status-select').on('change', function () {
                $(this).closest('form').submit();
            });
        });
    </script>
@endpush

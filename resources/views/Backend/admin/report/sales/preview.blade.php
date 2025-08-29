@extends('Backend.Layout.app')

@section('site-title', 'Sales Report Preview')

@section('main-content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <div class="search-form">
                            <form action="https://integmeds.test/backend/cupon" method="GET" class="app-search d-none d-lg-block">
                                <div class="input-group">
                                    @php 
                                        if ($type === 'last_7_days') {
                                            $period = 'Last 7 Days';
                                        } elseif ($type === 'running_month') {
                                            $period = 'Running Month'; // current month
                                        } elseif ($type === 'last_month') {
                                            $period = 'Last Month';
                                        } elseif ($type === 'custom' && $year && $month) {
                                            $period = date('F Y', strtotime("$year-$month")); // e.g., "March 2025"
                                        }       

                                    @endphp
                                   <h4 for="" class="mr-2">Sales Report :: {{$period}}</h4>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="page-title-right">
                        <div class="d-flex">
                            <a href="{{ route('sales.report.index') }}" class="btn btn-secondary mr-2">Back</a>
                            <a href="javascript:void(0);" id="printReportBtn" class="btn btn-primary">Print Report</a>
                        </div>
                    </div>
                </div>
                {{-- Review Table --}}
                <table class="table table-striped table-bordered dt-responsive nowrap" width="100%">
                    <thead>
                        <tr>
                            <th>Order Number</th>
                            <th>Date</th>
                            <th>Product SKU</th>
                            <th>Product Name</th>
                            <th>Qty</th>
                            <th>Sale Price</th>
                            <th>Total</th>
                            <th>Purchase Price</th>
                            <th>Profit</th>
                            <th>Discount</th>
                            <th>Payment Method</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($report as $item)
                            <tr>
                                <td>{{ $item['order_number'] }}</td>
                                <td>{{ \Carbon\Carbon::parse($item['date'])->format('Y-m-d') }}</td>
                                <td>{{ $item['sku'] }}</td>
                                <td>{{ $item['name'] }}</td>
                                <td>{{ $item['quantity'] }}</td>
                                <td>{{ number_format($item['sale_price'], 2) }}</td>
                                <td>{{ number_format($item['total'], 2) }}</td>
                                <td>{{ number_format($item['purchase_price'], 2) }}</td>
                                <td>{{ number_format($item['profit'], 2) }}</td>
                                <td>{{ number_format($item['discount'], 2) }}</td>
                                <td>{{ $item['payment_method'] }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="11" class="text-center">
                                    <strong>No orders found.</strong>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                
                

                {{-- Pagination --}}
                {{-- <div class="d-flex mt-4 justify-content-end">
                    {{ $reviews->links() }}
                </div> --}}
            </div>
        </div>
    </div>
</div>

        
@endsection

@push('custom-scripts')
<script src="https://cdn.jsdelivr.net/npm/print-this@1.15.0/printThis.js"></script>
<script>
    $('#printReportBtn').click(function() {
        $('.table').printThis({
            importCSS: true,     // import page CSS
            importStyle: true,   // import style tags
            loadCSS: "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css",
            pageTitle: "Sales Report",
            header: "<h2>Sales Report</h2><p>Date: " + new Date().toLocaleDateString() + "</p>"
        });
    });
</script>
@endpush

@extends('Backend.Layout.app')

@section('site-title', 'Invnetory Report Preview')

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
                                   <h4 for="" class="mr-2">Inventory Report</h4>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="page-title-right">
                        <div class="d-flex">
                            <a href="{{ route('inventory.report.index') }}" class="btn btn-secondary mr-2">Back</a>
                            <a href="javascript:void(0);" id="printReportBtn" class="btn btn-primary">Print Report</a>
                        </div>
                    </div>
                </div>
                {{-- Review Table --}}
                <table class="table table-striped table-bordered dt-responsive nowrap" width="100%">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>SKU</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Purchase Price</th>
                            <th>Sale Price</th>
                            <th>Total Stock</th>
                            <th>Sold</th>
                            <th>Current Stock</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($report as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item['sku'] }}</td>
                                <td>{{ $item['name'] }}</td>
                                <td>{{ $item['category'] }}</td>
                                <td>{{ $item['purchase_price'] }}</td>
                                <td>{{ $item['sale_price'] }}</td>
                                <td>{{ $item['total_stock'] }}</td>
                                <td>{{ $item['sold'] }}</td>
                                <td>{{ $item['current_stock'] }}</td>
                                <td>
                                    @if($item['current_stock'] > 0)
                                        <span class="badge badge-success">In Stock</span>
                                    @else
                                        <span class="badge badge-danger">Out of Stock</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="10" class="text-center">
                                    <strong>No products found.</strong>
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
            pageTitle: "Inventory Report",
            header: "<h2>Inventory Report</h2><p>Date: " + new Date().toLocaleDateString() + "</p>"
        });
    });
</script>
@endpush

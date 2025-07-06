@extends('Backend.Layout.app')

@section('main-content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Dashboard</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->


    <!-- start row -->
    <div class="row">
        <div class="col-md-3">
            <div class="card mini-stats-wid">
                <div class="card-body">
                    <div class="media">
                        <div class="media-body">
                            <p class="text-muted font-weight-medium">Total Orders</p>
                            <h4 class="mb-0">{{$total_orders}}</h4>
                        </div>

                        <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                            <span class="avatar-title rounded-circle bg-primary">
                                <i class="bx bx-cart font-size-24"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mini-stats-wid">
                <div class="card-body">
                    <div class="media">
                        <div class="media-body">
                            <p class="text-muted font-weight-medium">Pending Orders</p>
                            <h4 class="mb-0">{{$pending_orders}}</h4>
                        </div>

                        <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                            <span class="avatar-title">
                                <i class="bx bx-cart font-size-24"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mini-stats-wid">
                <div class="card-body">
                    <div class="media">
                        <div class="media-body">
                            <p class="text-muted font-weight-medium">Total Revenue</p>
                            <h4 class="mb-0">{{config('app.currency_symbol')}}{{$total_revenue}}</h4>
                        </div>

                        <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                            <span class="avatar-title rounded-circle bg-primary">
                                <i class="bx bx-money font-size-24"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mini-stats-wid">
                <div class="card-body">
                    <div class="media">
                        <div class="media-body">
                            <p class="text-muted font-weight-medium">Total Products</p>
                            <h4 class="mb-0">{{$total_products}}</h4>
                        </div>

                        <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                            <span class="avatar-title rounded-circle bg-primary">
                                <i class="bx bx-cart font-size-24"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

    <!-- start row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4 float-sm-left">Monthly Sales Report</h4>
                    <div class="clearfix"></div>
                    <div id="stacked-column-chart" class="apex-charts" dir="ltr"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

    <!-- start row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Latest Transaction</h4>
                    <div class="table-responsive">
                        <table class="table table-centered table-nowrap mb-0">
                            <thead class="thead-light">
                                <tr>
                                    <th>Order ID</th>
                                    <th>Billing Name</th>
                                    <th>Date</th>
                                    <th>Total</th>
                                    <th>Order Status</th>
                                    <th>View Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($latest_orders as $order)
                                    <tr>
                                        <td><a href="javascript: void(0);" class="text-body font-weight-bold">#{{$order->order_number}}</a> </td>
                                        <td>{{$order->user?->name}}</td>
                                        <td>
                                            {{$order->created_at->format('d-m-Y')}}
                                        </td>
                                        <td>
                                            ${{$order->total_amount}}
                                        </td>
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
                                            <a target="_blank" href="{{ route('order.details', $order->id) }}" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light">
                                                View Details
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">No data found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!-- end table-responsive -->
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->


@endsection

@push('custom-scripts')
    <script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script>
        let monthlySales = @json($monthly_sales);
    
        var options = {
            chart: {
                height: 359,
                type: "bar",
                stacked: true,
                toolbar: {
                    show: false
                },
                zoom: {
                    enabled: true
                }
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: "15%",
                    endingShape: "rounded"
                }
            },
            dataLabels: {
                enabled: false
            },
            series: [{
                name: "Monthly Sales",
                data: monthlySales
            }],
            xaxis: {
                categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
            },
            colors: ["#34c38f"],
            legend: {
                position: "bottom"
            },
            fill: {
                opacity: 1
            }
        };
    
        var chart = new ApexCharts(document.querySelector("#stacked-column-chart"), options);
        chart.render();
    </script>
    
@endpush


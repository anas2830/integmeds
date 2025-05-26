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
                            <p class="text-muted font-weight-medium">Average Price</p>
                            <h4 class="mb-0">$16.2</h4>
                        </div>

                        <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                            <span class="avatar-title rounded-circle bg-primary">
                                <i class="bx bx-purchase-tag-alt font-size-24"></i>
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
                            <p class="text-muted font-weight-medium">Orders</p>
                            <h4 class="mb-0">1,235</h4>
                        </div>

                        <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                            <span class="avatar-title">
                                <i class="bx bx-copy-alt font-size-24"></i>
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
                            <p class="text-muted font-weight-medium">Revenue</p>
                            <h4 class="mb-0">$35, 723</h4>
                        </div>

                        <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                            <span class="avatar-title rounded-circle bg-primary">
                                <i class="bx bx-archive-in font-size-24"></i>
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
                            <p class="text-muted font-weight-medium">Average Price</p>
                            <h4 class="mb-0">$16.2</h4>
                        </div>

                        <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                            <span class="avatar-title rounded-circle bg-primary">
                                <i class="bx bx-purchase-tag-alt font-size-24"></i>
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
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Earning</h4>
                    <div class="row">
                        <div class="col-sm-6">
                            <p class="text-muted">This month</p>
                            <h3>$34,252</h3>
                        </div>
                        <div class="col-sm-6">
                            <p class="text-muted">Today</p>
                            <h3>$28,652</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4 float-sm-left">Sales Report</h4>
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
                                    <th>Payment Status</th>
                                    <th>Payment Method</th>
                                    <th>View Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><a href="javascript: void(0);" class="text-body font-weight-bold">#SK2540</a> </td>
                                    <td>Neal Matthews</td>
                                    <td>
                                        07 Oct, 2019
                                    </td>
                                    <td>
                                        $400
                                    </td>
                                    <td>
                                        <span class="badge badge-pill badge-soft-success font-size-12">Paid</span>
                                    </td>
                                    <td>
                                        <i class="fab fa-cc-mastercard mr-1"></i> Mastercard
                                    </td>
                                    <td>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light" data-toggle="modal" data-target=".exampleModal">
                                            View Details
                                        </button>
                                    </td>
                                </tr>

                                <tr>
                                    <td><a href="javascript: void(0);" class="text-body font-weight-bold">#SK2541</a> </td>
                                    <td>Jamal Burnett</td>
                                    <td>
                                        07 Oct, 2019
                                    </td>
                                    <td>
                                        $380
                                    </td>
                                    <td>
                                        <span class="badge badge-pill badge-soft-danger font-size-12">Chargeback</span>
                                    </td>
                                    <td>
                                        <i class="fab fa-cc-visa mr-1"></i> Visa
                                    </td>
                                    <td>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light" data-toggle="modal" data-target=".exampleModal">
                                            View Details
                                        </button>
                                    </td>
                                </tr>

                                <tr>
                                    <td><a href="javascript: void(0);" class="text-body font-weight-bold">#SK2542</a> </td>
                                    <td>Juan Mitchell</td>
                                    <td>
                                        06 Oct, 2019
                                    </td>
                                    <td>
                                        $384
                                    </td>
                                    <td>
                                        <span class="badge badge-pill badge-soft-success font-size-12">Paid</span>
                                    </td>
                                    <td>
                                        <i class="fab fa-cc-paypal mr-1"></i> Paypal
                                    </td>
                                    <td>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light" data-toggle="modal" data-target=".exampleModal">
                                            View Details
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><a href="javascript: void(0);" class="text-body font-weight-bold">#SK2543</a> </td>
                                    <td>Barry Dick</td>
                                    <td>
                                        05 Oct, 2019
                                    </td>
                                    <td>
                                        $412
                                    </td>
                                    <td>
                                        <span class="badge badge-pill badge-soft-success font-size-12">Paid</span>
                                    </td>
                                    <td>
                                        <i class="fab fa-cc-mastercard mr-1"></i> Mastercard
                                    </td>
                                    <td>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light" data-toggle="modal" data-target=".exampleModal">
                                            View Details
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><a href="javascript: void(0);" class="text-body font-weight-bold">#SK2544</a> </td>
                                    <td>Ronald Taylor</td>
                                    <td>
                                        04 Oct, 2019
                                    </td>
                                    <td>
                                        $404
                                    </td>
                                    <td>
                                        <span class="badge badge-pill badge-soft-warning font-size-12">Refund</span>
                                    </td>
                                    <td>
                                        <i class="fab fa-cc-visa mr-1"></i> Visa
                                    </td>
                                    <td>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light" data-toggle="modal" data-target=".exampleModal">
                                            View Details
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><a href="javascript: void(0);" class="text-body font-weight-bold">#SK2545</a> </td>
                                    <td>Jacob Hunter</td>
                                    <td>
                                        04 Oct, 2019
                                    </td>
                                    <td>
                                        $392
                                    </td>
                                    <td>
                                        <span class="badge badge-pill badge-soft-success font-size-12">Paid</span>
                                    </td>
                                    <td>
                                        <i class="fab fa-cc-paypal mr-1"></i> Paypal
                                    </td>
                                    <td>
                                        <!-- Button trigger modal -->
                                        {{-- <button type="button" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light view-order-btn" data-toggle="modal" data-target=".exampleModal" data-id="{{ $order->id }}"> --}}
                                        <button type="button" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light view-order-btn" data-toggle="modal" data-target=".exampleModal">
                                            View Details
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- end table-responsive -->
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->


    <!-- Modal -->
    <div class="modal fade exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Order Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="mb-2">Product id: <span class="text-primary">#SK2540</span></p>
                    <p class="mb-4">Billing Name: <span class="text-primary">Neal Matthews</span></p>

                    <div class="table-responsive">
                        <table class="table table-centered table-nowrap">
                            <thead>
                                <tr>
                                    <th scope="col">Product</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">
                                        <div>
                                            <img src="{{ asset('assets/images/product/img-7.png') }}" alt="" class="avatar-sm">
                                        </div>
                                    </th>
                                    <td>
                                        <div>
                                            <h5 class="text-truncate font-size-14">Wireless Headphone (Black)</h5>
                                            <p class="text-muted mb-0">$ 225 x 1</p>
                                        </div>
                                    </td>
                                    <td>$ 255</td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <div>
                                            <img src="{{ asset('assets/images/product/img-4.png') }}" alt="" class="avatar-sm">
                                        </div>
                                    </th>
                                    <td>
                                        <div>
                                            <h5 class="text-truncate font-size-14">Phone patterned cases</h5>
                                            <p class="text-muted mb-0">$ 145 x 1</p>
                                        </div>
                                    </td>
                                    <td>$ 145</td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <h6 class="m-0 text-right">Sub Total:</h6>
                                    </td>
                                    <td>
                                        $ 400
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <h6 class="m-0 text-right">Shipping:</h6>
                                    </td>
                                    <td>
                                        Free
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <h6 class="m-0 text-right">Total:</h6>
                                    </td>
                                    <td>
                                        $ 400
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal -->

@endsection

@push('custom-scripts')
    <script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script>
        var options = {
            chart: {
                height: 359,
                type: "bar",
                stacked: !0,
                toolbar: {
                    show: !1
                },
                zoom: {
                    enabled: !0
                }
            },
            plotOptions: {
                bar: {
                    horizontal: !1,
                    columnWidth: "15%",
                    endingShape: "rounded"
                }
            },
            dataLabels: {
                enabled: !1
            },
            series: [{
                name: "Series A",
                data: [44, 55, 41, 67, 22, 43, 36, 52, 24, 18, 36, 48]
            }, {
                name: "Series B",
                data: [13, 23, 20, 8, 13, 27, 18, 22, 10, 16, 24, 22]
            }, {
                name: "Series C",
                data: [11, 17, 15, 15, 21, 14, 11, 18, 17, 12, 20, 18]
            }],
            xaxis: {
                categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
            },
            colors: ["#556ee6", "#f1b44c", "#34c38f"],
            legend: {
                position: "bottom"
            },
            fill: {
                opacity: 1
            }
        },
        chart = new ApexCharts(document.querySelector("#stacked-column-chart"), options);
        chart.render();


    </script>

    <script>
        // $(document).ready(function () {
        //     $('.view-order-btn').click(function () {
        //         var orderId = $(this).data('id');

        //         $.ajax({
        //             url: '/order-details/' + orderId,
        //             type: 'GET',
        //             success: function (response) {
        //                 $('#exampleModalLabel').text('Order #' + response.order.id);
        //                 $('.modal-body').html(`
        //                     <p class="mb-2">Product id: <span class="text-primary">#${response.order.id}</span></p>
        //                     <p class="mb-4">Billing Name: <span class="text-primary">${response.order.customer_name}</span></p>
        //                     <div class="table-responsive">
        //                         <table class="table table-centered table-nowrap">
        //                             <thead>
        //                                 <tr>
        //                                     <th scope="col">Product</th>
        //                                     <th scope="col">Product Name</th>
        //                                     <th scope="col">Price</th>
        //                                 </tr>
        //                             </thead>
        //                             <tbody>
        //                                 ${response.items.map(item => `
        //                                     <tr>
        //                                         <th scope="row">
        //                                             <img src="/storage/${item.product.image}" class="avatar-sm" />
        //                                         </th>
        //                                         <td>
        //                                             <h5 class="text-truncate font-size-14">${item.product.name}</h5>
        //                                             <p class="text-muted mb-0">$ ${item.price} x ${item.quantity}</p>
        //                                         </td>
        //                                         <td>$ ${(item.price * item.quantity)}</td>
        //                                     </tr>
        //                                 `).join('')}
        //                                 <tr>
        //                                     <td colspan="2" class="text-right">Total:</td>
        //                                     <td>$ ${response.order.total}</td>
        //                                 </tr>
        //                             </tbody>
        //                         </table>
        //                     </div>
        //                 `);
        //                 $('.exampleModal').modal('show');
        //             },
        //             error: function () {
        //                 alert('Unable to fetch order details.');
        //             }
        //         });
        //     });
        // });
    </script>

@endpush


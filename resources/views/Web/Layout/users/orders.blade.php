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
                        <h1>My Order</h1>
                    </div>
                    <div class="order-search-wrap">
                        <div class="order-search-box">
                            <div class="order-search">
                                <form action="">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search by order id" aria-describedby="basic-addon2">
                                        <span class="input-group-text" type="submit" id="basic-addon2">Search</span>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="order-search-box">
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Filter status</option>
                                <option value="1">All</option>
                                <option value="2">Pending</option>
                                <option value="3">Success</option>
                                <option value="3">Canceled</option>
                            </select>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Sort By</option>
                                <option value="1">Date Oldest to Newest</option>
                                <option value="2">Date Newest to Oldest</option>
                                <option value="3">Price Low to High</option>
                                <option value="3">Price High to Low</option>
                            </select>
                        </div>
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
                                <tr>
                                    <th scope="row">40</th>
                                    <td>Mar 12,2022</td>
                                    <td><span class="status-bg-pn">Pending</span></td>
                                    <td>$ 400</td>
                                    <td class="view-btn"><a href="#"><i class="far fa-eye"></i> View</a></td>
                                </tr>
                                <tr>
                                    <th scope="row">42</th>
                                    <td>Mar 12,2022</td>
                                    <td><span class="status-bg-succ">Success</span></td>
                                    <td>$ 700</td>
                                    <td class="view-btn"><a href="#"><i class="far fa-eye"></i> View</a></td>
                                </tr>
                                <tr>
                                    <th scope="row">43</th>
                                    <td>Mar 12,2022</td>
                                    <td><span class="status-bg-canc">Canceled</span></td>
                                    <td>$ 300</td>
                                    <td class="view-btn"><a href="#"><i class="far fa-eye"></i> View</a></td>
                                </tr>
                                <tr>
                                    <th scope="row">40</th>
                                    <td>Mar 12,2022</td>
                                    <td><span class="status-bg-pn">Pending</span></td>
                                    <td>$ 400</td>
                                    <td class="view-btn"><a href="#"><i class="far fa-eye"></i> View</a></td>
                                </tr>
                                <tr>
                                    <th scope="row">42</th>
                                    <td>Mar 12,2022</td>
                                    <td><span class="status-bg-succ">Success</span></td>
                                    <td>$ 700</td>
                                    <td class="view-btn"><a href="#"><i class="far fa-eye"></i> View</a></td>
                                </tr>
                                <tr>
                                    <th scope="row">43</th>
                                    <td>Mar 12,2022</td>
                                    <td><span class="status-bg-canc">Canceled</span></td>
                                    <td>$ 300</td>
                                    <td class="view-btn"><a href="#"><i class="far fa-eye"></i> View</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 d-flex justify-content-end">
                            <div class="pagination-area">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination">
                                        <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Previous">
                                                <span aria-hidden="true">«</span>
                                            </a>
                                        </li>
                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item" aria-current="page">
                                        <a class="page-link" href="#">2</a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Next">
                                                <span aria-hidden="true">»</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
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

@endpush

@extends('admin.layouts.main')

@section('content')

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>Dashboard
                            <small>Shop Premium</small>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="/admin"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3 col-md-6 xl-50">
                <div class="card o-hidden  widget-cards">
                    <div class="bg-secondary card-body">
                        <div class="media static-top-widget">
                            <div class="media-body"><span class="m-0">Products</span>
                                <h3 class="mb-0">$ <span class="counter">9856</span><small> This Month</small>
                                </h3>
                            </div>
                            <div class="icons-widgets">
                                <i data-feather="box"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 xl-50">
                <div class="card o-hidden widget-cards">
                    <div class="bg-primary card-body">
                        <div class="media static-top-widget">
                            <div class="media-body"><span class="m-0">Messages</span>
                                <h3 class="mb-0">$ <span class="counter">893</span><small> This Month</small>
                                </h3>
                            </div>
                            <div class="icons-widgets">
                                <i data-feather="message-square"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 xl-50">
                <div class="card o-hidden widget-cards">
                    <div class="bg-warning card-body">
                        <div class="media static-top-widget">
                            <div class="media-body"><span class="m-0">Earnings</span>
                                <h3 class="mb-0">$ <span class="counter">6659</span><small> This Month</small>
                                </h3>
                            </div>
                            <div class="icons-widgets">
                                <i data-feather="navigation"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 xl-50">
                <div class="card o-hidden widget-cards">
                    <div class="bg-success card-body">
                        <div class="media static-top-widget">
                            <div class="media-body"><span class="m-0">New Vendors</span>
                                <h3 class="mb-0">$ <span class="counter">45631</span><small> This Month</small>
                                </h3>
                            </div>
                            <div class="icons-widgets">
                                <i data-feather="users"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 xl-100">
                <div class="card">
                    <div class="card-header">
                        <h5>Latest Orders</h5>
                        <div class="card-header-right">
                            <ul class="list-unstyled card-option">
                                <li><i class="icofont icofont-simple-left"></i></li>
                                <li><i class="view-html fa fa-code"></i></li>
                                <li><i class="icofont icofont-maximize full-card"></i></li>
                                <li><i class="icofont icofont-minus minimize-card"></i></li>
                                <li><i class="icofont icofont-refresh reload-card"></i></li>
                                <li><i class="icofont icofont-error close-card"></i></li>
                            </ul>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="user-status table-responsive latest-order-table">
                            <table class="table table-bordernone">
                                <thead>
                                <tr>
                                    <th scope="col">Order ID</th>
                                    <th scope="col">Order Total</th>
                                    <th scope="col">Payment Method</th>
                                    <th scope="col">Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td class="digits">$120.00</td>
                                    <td class="font-danger">Bank Transfers</td>
                                    <td class="digits">On Way</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td class="digits">$90.00</td>
                                    <td class="font-secondary">Ewallets</td>
                                    <td class="digits">Delivered</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td class="digits">$240.00</td>
                                    <td class="font-warning">Cash</td>
                                    <td class="digits">Delivered</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td class="digits">$120.00</td>
                                    <td class="font-danger">Direct Deposit</td>
                                    <td class="digits">$6523</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td class="digits">$50.00</td>
                                    <td class="font-primary">Bank Transfers</td>
                                    <td class="digits">Delivered</td>
                                </tr>
                                </tbody>
                            </table>
                            <a href="order.html" class="btn btn-primary">View All Orders</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

@endsection

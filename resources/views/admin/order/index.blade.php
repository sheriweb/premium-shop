@extends('admin.layouts.main')
@section('content')


    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>Orders
                            <small>Bigdeal Admin panel</small>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="/admin"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Sales</li>
                        <li class="breadcrumb-item active">Orders</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header set-button">
                        <h5>Order List</h5>
                    </div>
                    <div class="card-body">

                        <div class="">
                            <table class="order_table">
                                <thead>
                                <tr class="jsgrid-header-row">
                                    <th>Order ID</th>
                                    <th>Total Payment</th>
                                    <th>Payment Status</th>
                                    <th>Payment Method</th>
                                    <th>Order Status</th>
                                    <th width="100px">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->


@endsection

@section('script')

    <script>
        $(function () {
            var table = $('.order_table').DataTable(
                {
                    processing: true,
                    serverSide: true,
                    order:[],
                    ajax: "/order-list",
                    columns: [
                        {data: 'id', name: 'id'},
                        {
                            data: 'total',
                            name: 'total',
                        },
                        {
                            data: 'payment_st',
                            name: 'payment_st',
                        },
                        {
                            data: 'payment_method',
                            name: 'payment_method',
                        },

                        {data: 'order_st', name: 'order_st'},
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        },
                    ]
                }
            );

        });
    </script>

@endsection

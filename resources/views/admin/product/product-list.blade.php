@extends('admin.layouts.main')

@section('content')



    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>PRODUCT LIST
                            <small>Bigdeal Admin panel</small>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="/admin"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Products</li>

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
                        <h5>Product Lists </h5>
{{--                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal"--}}
{{--                                data-bs-target="#categoryModal">Add Product--}}
{{--                        </button>--}}
                    </div>
                    <div class="card-body">

                        <div class="">
                            <table class="product_datatable">
                                <thead>
                                <tr class="jsgrid-header-row">
                                    <th>ID</th>
                                    <th>Product</th>
                                    <th>Product Title</th>
                                    <th>Category</th>
                                    <th>Quantity</th>
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

    <script src="../assets/js/product/product.js"></script>


@endsection

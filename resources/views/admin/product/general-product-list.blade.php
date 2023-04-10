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
                        <li class="breadcrumb-item">General Products</li>

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

                            <div>
                                <h5>Product Lists </h5>
                            </div>
                            <div>
                                <div class="input-group ps-5">
                                    <div id="navbar-search-autocomplete" class="form-outline">
                                        <input type="text" id="searchGeneralProduct" class="form-control" placeholder="Search" />
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="card-body">
                        <div class="load_general_products_table">
                            @include('admin.product.loadGeneralProducts')
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

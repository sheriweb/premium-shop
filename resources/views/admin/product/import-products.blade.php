@extends('admin.layouts.main')
@section('content')

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>Import Products
                            <small>Bigdeal Admin panel</small>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item active">Import Product</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
    <div class="container-fluid">
        <div class="col-xl-6" style="margin: auto;">
            <form  method="POST" enctype="multipart/form-data" action="{{ route('import') }}">
                @csrf

                <div class="card">
                    <div class="card-header">
                        <h5>Import excel file </h5>
                    </div>
                    <div class="card-body">
                        <div class="digital-add needs-validation">
                            <div class="form-group">
                                <label for="validationCustom01" class="col-form-label pt-0"><span>*</span>
                                    File</label>
                                <input name="category_file" class="form-control" type="file"
                                       required="">
                                <span class="error_product_name text-danger"></span>
                            </div>

                            <div class="text-end">
                                <button class="btn btn-primary" type="submit">Import</button>
                            </div>

                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>

@endsection

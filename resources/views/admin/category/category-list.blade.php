@extends('admin.layouts.main')

@section('style')
    <!-- jsgrid css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/jsgrid.css">
@endsection

@section('content')

    <!-- Modal -->
    <div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Products Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="category_form" class="needs-validation" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" id="category_id">
                        <div class="form">
                            <div class="form-group">
                                <label for="validationCustom01" class="mb-1">Category Name :</label>
                                <input name="category_name" class="form-control" id="category_name" type="text">
                                <span id="error_category_name" class="text-danger error_category_name"></span>
                            </div>
                            <div class="form-group ">
                                <label for="validationCustom02" class="mb-1">Category Image :</label>
                                <input name="category_image" class="form-control" id="category_image" type="file">
                                <span>upload 39 X 39 image dimensions </span><br>
                                <span id="error_category_image" class="text-danger error_category_image"></span>

                            </div>
                            <div class="form-group ">
                                <label for="validationCustom02" class="mb-1">Category Home Image :</label>
                                <input name="category_home_image" class="form-control" id="category_home_image" type="file">
                                <span>upload 361 X 257 image dimensions </span><br>
                                <span id="error_category_home_image" class="text-danger error_category_home_image"></span>
                            </div>
                            <div class="form-group mt-5">
                                <label class="radio-inline mr-2 " for="category-status" style="margin-right: 30px">
                                    <input class="radio_animated" id="category-status-active" type="radio" name="status"
                                           value="1" checked="">Active
                                </label>

                                <label class="radio-inline" for="category-status">
                                    <input class="radio_animated" id="category-status-inactive" type="radio" value="0"
                                           name="status">in Active
                                </label>


                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button id="store_category" type="button" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>Category
                            <small>Bigdeal Admin panel</small>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Physical</li>
                        <li class="breadcrumb-item active">Category</li>
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
                        <h5>Products Category</h5>
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                data-bs-target="#categoryModal">Add Category
                        </button>
                    </div>
                    <div class="card-body">

                        <div class="">
                            <table class=" category_datatable">
                                <thead>
                                <tr class="jsgrid-header-row">
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th width="100px">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td style="width: 100px"><img
                                                src="{{ asset('/storage/category/'.$category['category_image']) }}"
                                                class="blur-up lazyloaded" style="height: 50px; width: 50px;"></td>
                                        <td>{{ $category['category_name'] }}</td>
                                        <td>
                                            @if($category['status'] == 1)
                                                <i class="fa fa-circle font-success f-12"></i></td>
                                            @else
                                                <i class="fa fa-circle font-danger f-12"></i>
                                            @endif
                                        <td class="jsgrid-cell jsgrid-control-field jsgrid-align-center">
                                            <span class="edit-category" cat-id="{{ $category['id'] }} "
                                                  cat="{{ $category['category_name'] }}" status="{{ $category['status'] }}"><i
                                                    class="icofont-ui-edit text-primary"></i></span>
                                            <span><i class="icofont-ui-delete text-success "></i></span>

                                        </td>
                                    </tr>
                                @endforeach
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

    <!-- Jsgrid js-->
    {{--    <script src="../assets/js/jsgrid/jsgrid.min.js"></script>--}}
    {{--    <script src="../assets/js/jsgrid/griddata-manage-product.js"></script>--}}
    {{--    <script src="../assets/js/jsgrid/jsgrid-manage-product.js"></script>--}}
    <script src="../assets/js/category/category.js"></script>

@endsection

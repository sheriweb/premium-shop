@extends('admin.layouts.main')

@section('content')

    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>STORE LIST
                            <small>Bigdeal Admin panel</small>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="/admin"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Stores</li>

                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header set-button">
                        <h5>Store Lists </h5>
                        <button type="button" class="btn btn-secondary reset-store-form" data-bs-toggle="modal"
                                data-bs-target="#storeModal">Add Store
                        </button>
                    </div>
                    <div class="card-body">

                        <div class="">
                            <table class="store_datatable">
                                <thead>
                                <tr class="jsgrid-header-row">
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th width="100px">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($stores as $store)
                                    <tr>
                                        <td>{{$store->id}}</td>
                                        <td>{{ $store->name }}</td>

                                        <td class="jsgrid-cell jsgrid-control-field jsgrid-align-center">
                                            <span class="edit-store" store-id="{{$store->id}}"
                                                  store-name="{{$store->name}}">
                                                <i class="icofont-ui-edit text-primary"></i>
                                            </span>

                                            <span>
                                                <i class="icofont-ui-delete text-success "></i>
                                            </span>
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

    {{--Modal--}}
    <div class="modal fade" id="storeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Store</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form id="store_form" class="needs-validation" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="store_id" id="store_id">
                        <div class="form">
                            <div class="form-group">
                                <label for="validationCustom01" class="mb-1">Store Name :</label>
                                <input name="name" class="form-control" id="name" type="text">
                                <span id="name_error" class="text-danger clear-error"></span>
                            </div>

                            <div class="form-group">
                                <label for="validationCustom02" class="mb-1">Store Image :</label>
                                <input name="store_image" class="form-control" id="store_image" type="file">
                                <span id="store_image_error" class="text-danger clear-error"></span>
                            </div>

                            <div class="form-group">
                                <label for="validationCustom02" class="mb-1">Store Thumbnail:</label>
                                <input name="store_thumbnail" class="form-control" id="store_thumbnail" type="file">
                                <span id="store_thumbnail_error" class="text-danger clear-error"></span>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button id="save_store" type="button" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')

    <script src="../assets/js/store/store.js"></script>

@endsection

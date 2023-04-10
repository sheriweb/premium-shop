@extends('admin.layouts.main')

@section('content')

    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>SIZE LIST
                            <small>Premium Admin panel</small>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="/admin"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Size</li>

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
                        <h5>Color Lists </h5>
                        <button type="button" class="btn btn-secondary reset-color-form" data-bs-toggle="modal"
                                data-bs-target="#sizeModal">Add Size
                        </button>
                    </div>
                    <div class="card-body">

                        <div class="">
                            <table class="size_datatable">
                                <thead>
                                <tr class="jsgrid-header-row">
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th width="100px">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($sizes as $size)
                                    <tr>
                                        <td>{{$size->id}}</td>
                                        <td>{{ $size->size }}</td>

                                        <td class="jsgrid-cell jsgrid-control-field jsgrid-align-center">
                                            <span class="edit-size" size-id="{{$size->id}}"
                                                  size-name="{{$size->size}}">
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
    <div class="modal fade" id="sizeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Color</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form id="size_form" class="needs-validation">
                        @csrf
                        <input type="hidden" name="size_id" id="size_id">
                        <div class="form">

                            <div class="form-group">
                                <label for="validationCustom01" class="mb-1"> Size :</label>
                                <input name="size" class="form-control" id="size" type="text">
                                <span id="size_error" class="text-danger clear-error"></span>
                            </div>

                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button id="save_size" type="button" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')

    <script src="../assets/js/product/size.js"></script>

@endsection

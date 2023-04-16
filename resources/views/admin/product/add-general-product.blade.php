@extends('admin.layouts.main')
@section('content')
    <style>
        .vendor_logo {
            width: 140px;
            height: 140px;
            /*opacity: 0.1;*/
            border: 1px solid #dddddd;
            border-radius: 50%;
            position: relative;
        }

        .vendor_logo_main {
            position: relative;
            height: 140px;
            width: 140px;
            text-align: center;
        }

        span.upload {
            position: absolute;
            opacity: 1;
            top: 50%;
            right: 50%;
            transform: translate(50%, -50%);
        }

        span.cam {
            position: absolute;
            bottom: 10px;
            right: 0px;
            cursor: pointer;
            z-index: 55;
        }

        #img-upload-logo {
            width: 140px;
            height: 140px;
            object-fit: cover !important;
            position: relative;
            border-radius: 100px;
            left: -1px;
            top: -1px;

        }

        .multi-img-option {
            border: 2px dashed #00baf2;
            padding: 20px;
            border-radius: 15px;
        }

        .upload__inputfile {
            width: 0.1px;
            height: 0.1px;
            opacity: 0;
            overflow: hidden;
            position: absolute;
            z-index: -1;
        }

        .upload__btn {
            display: inline-block;
            font-weight: 600;
            color: #fff;
            text-align: center;
            min-width: 116px;
            padding: 5px;
            transition: all 0.3s ease;
            cursor: pointer;
            border: 2px solid;
            background-color: #4045ba;
            border-color: #4045ba;
            border-radius: 10px;
            line-height: 26px;
            font-size: 14px;
        }

        .upload__btn:hover {
            background-color: unset;
            color: #4045ba;
            transition: all 0.3s ease;
        }

        .upload__btn-box {
            margin-bottom: 10px;
        }

        .upload__img-wrap {
            display: flex;
            flex-wrap: wrap;
            margin: 0 -10px;
        }

        .upload__img-box {
            width: 156px;
            position: relative;
            padding: 0 10px;
            margin-bottom: 12px;
        }

        .upload__img-close {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            position: absolute;
            top: -15px;
            right: 2px;
            text-align: center;
            line-height: 24px;
            z-index: 1;
            cursor: pointer;
        }

        /*.upload__img-close:after {*/
        /*    content: "✖";*/
        /*    font-size: 14px;*/
        /*    color: white;*/
        /*}*/

        .img-bg {
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            position: relative;
            padding-bottom: 100%;
        }
        #vendor-img i {
            display: block;
            font-size: 2rem;
            margin-bottom: 0.5rem;
            color: #00baf2;
        }
        .upload__box {
            margin-top: 20px;
        }
        .upload__img-close_1 {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            position: absolute;
            top: -2px;
            right: 2px;
            text-align: center;
            line-height: 24px;
            z-index: 1;
            cursor: pointer;
        }
        .pointer_cl {
            cursor: pointer !important;
        }
        .error, .priceValidate{
            color: red !important;
        }
    </style>

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>Add Products
                            <small>Bigdeal Admin panel</small>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="/admin"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Digital</li>
                        <li class="breadcrumb-item active">Add Product</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <form id="product_form" method="post" enctype="multipart/form-data ">
            @csrf
            <div class="save_product_btn">
                <div class="form-group mb-3">
                    <div class="product-buttons text-end">
                        <button type="submit" class="btn btn-primary store_product">Add Product</button>
                        <a href="{{ route('homeProductList') }}"><button type="button" class="btn btn-light" style="background:  #dddde1 !important;">Discard</button></a>
                    </div>
                </div>
            </div>
            <div class="row product-adding">
                <div class="col-xl-6">
                    <input type="hidden" name="product_id" value="{{ @$product['id'] }}" id="product_id">
                    <div class="card">
                        <div class="card-header header-style-card">
                            <h5>General</h5><span>(Required)</span>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 digital-add needs-validation">
                                    <div class="form-group">
                                        <label for="validationCustom01" class="col-form-label pt-0"><span>*</span>
                                            Name</label>
                                        <input name="product_name" class="form-control" value="{{ @$product['product_name'] }}" id="validationCustom01" type="text"
                                               required="">
                                        <span class="error_product_name text-danger"></span>
                                    </div>
                                </div>
                                <div class="col-md-6 digital-add needs-validation">
                                    <div class="form-group">
                                        <label for="validationCustomtitle" class="col-form-label pt-0"><span>*</span>
                                            SKU</label>
                                        <input name="sku" class="form-control" value="{{ @$product['sku'] }}" id="validationCustomtitle" type="text"
                                               required="">
                                        <span class="error_sku text-danger"></span>
                                    </div>
                                </div>
                                <div class="col-md-6 digital-add needs-validation">
                                    <div class="form-group">
                                        <label for="validationCustomtitle" class="col-form-label pt-0"><span>*</span>
                                            New Quantity</label>
                                        <input name="quantity" class="form-control"  id="validationCustomtitle" type="number"
                                               value="{{ @$product['quantity'] }}">
                                        <span class="error_quantity text-danger"></span>
                                    </div>
                                </div>
                                <div class="col-md-6 digital-add needs-validation">
                                    <div class="form-group">
                                        <label for="validationCustomtitle" class="col-form-label pt-0"><span>*</span>
                                            Refurbished Quantity</label>
                                        <input name="refurbished_quantity" class="form-control"  id="validationCustomtitle" type="number"
                                               value="{{ @$product['refurbished_quantity'] }}">
                                        <span class="error_quantity text-danger"></span>
                                    </div>
                                </div>
                                <div class="col-md-6 digital-add needs-validation">
                                    <div class="form-group">
                                        <label for="validationCustom02" class="col-form-label pt-0"><span>*</span> Brand</label>
                                        <input name="brand" class="form-control" id="product_brand" type="text" value="{{ @$product['brand'] }}">
                                        <span class="error_brand text-danger"></span>
                                    </div>
                                </div>
                                <div class="col-md-6 digital-add needs-validation">
                                    <div class="form-group">
                                        <label for="validationCustom02" class="col-form-label pt-0"><span>*</span> Weight </label>
                                        <input class="form-control" value="{{ @$product['weight'] }}" name="weight" id="retail_weight" type="text">
                                        <span class="error_weight text-danger"></span>
                                    </div>
                                </div>
                                <div class="col-md-6 digital-add needs-validation">
                                    <div class="form-group">
                                        <label for="validationCustom02" class="col-form-label  pt-0"><span>*</span>  Dimensions </label>
                                        <input class="form-control" value="{{ @$product['dimensions'] }}" name="dimensions" id="dimensions" type="text">
                                        <span class="error_dimensions text-danger"></span>
                                    </div>
                                </div>
                                <div class="col-md-6 digital-add needs-validation">
                                    <div class="form-group">
                                        <label class="col-form-label"><span>*</span> Status</label>
                                        <div class="m-checkbox-inline mb-0 custom-radio-ml d-flex radio-animated">
                                            <label class="d-block" for="edo-ani">
                                                <input class="radio_animated" id="edo-ani" type="radio" name="status"
                                                       value="1" @if(@$product['status'] == 1) checked="checked" @endif>
                                                Enable
                                            </label>
                                            <label class="d-block" for="edo-ani1">
                                                <input class="radio_animated" id="edo-ani1" value="0" type="radio"
                                                       name="status" @if(@$product['status'] == 0) checked="checked" @endif>
                                                Disable
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 digital-add needs-validation">
                                    <div class="form-group">
                                        <input name="product_section" type="hidden" value="generalProduct">
                                    </div>
                                </div>
                                <div class="digital-add needs-validation">
                                    <div class="form-group">
                                        <label class="col-form-label"><span>*</span> Category</label>
                                        <select name="category_id[]" id="parent_category" class="custom-select form-control"
                                                required="">
                                            <option value="">--Select--</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id  }}" @if(@$category->id == @$product['parent_category_id']) selected @endif>{{ $category->category_name }}</option>
                                            @endforeach
                                        </select>
                                        <span class="error_category_id text-danger"></span>
                                    </div>
                                </div>
                                <div class="digital-add needs-validation">
                                    <div class="form-group sub_category_l-1   @if(@$product['sub_category_l1_id'] == null ) d-none @endif">
                                        <label class="col-form-label"><span>*</span> Sub Category Level 1</label>
                                        <select name="category_id[]" id="sub_category_l-1"
                                                class="custom-select form-control" required="">
                                            <option value="">--Select--</option>
                                            @if($product['category_level_l1'] != null )
                                                @foreach($product['category_level_l1'] as $l1)
                                                    <option value="{{ $l1->id }}" @if($l1->id == $product['sub_category_l1_id']) selected @endif>{{ $l1->category_name }}</option>
                                                @endforeach
                                            @endif

                                        </select>

                                    </div>
                                </div>
                                <div class="digital-add needs-validation">
                                    <div class="form-group sub_category_l-2 @if((@$product['sub_category_l2_id']) == null )d-none @endif">
                                        <label class="col-form-label"><span>*</span> Sub Category Level 2</label>
                                        <select name="category_id[]" id="sub_category_l-2"
                                                class="custom-select form-control" required="">
                                            <option value="">--Select--</option>
                                            @if($product['category_level_l2'] != null )
                                                @foreach($product['category_level_l2'] as $l1)
                                                    <option value="{{ $l1->id }}" @if($l1->id == $product['sub_category_l2_id']) selected @endif>{{ $l1->category_name }}</option>
                                                @endforeach
                                            @endif
                                        </select>

                                    </div>
                                </div>
                                <div class="digital-add needs-validation">
                                    <div class="form-group sub_category_l-3  @if((@$product['sub_category_l3_id']) == null )d-none @endif">
                                        <label class="col-form-label"><span>*</span> Sub Category Level 3</label>
                                        <select name="category_id[]" id="sub_category_l-3"
                                                class="custom-select form-control" required="">
                                            <option value="">--Select--</option>
                                            @if($product['category_level_l3'] != null )
                                                @foreach($product['category_level_l3'] as $l1)
                                                    <option value="{{ $l1->id }}" @if($l1->id == $product['sub_category_l3_id']) selected @endif>{{ $l1->category_name }}</option>
                                                @endforeach
                                            @endif
                                        </select>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header header-style-card">
                            <h5>Images</h5><span>(Required / Optional)</span>
                        </div>
                        <div class="card-body">
                            <div class="main-thumbnail">
                                <label class="col-form-label pt-0">Thumbnail</label>
                                <input type='file' id="file-input-thumbnail" class="d-none" name="image_thumbnail"/>
                                <div id='img_contain_thumbnail' class="image-uploader">
                                    <div class="upload-text feature-click">
                                        <i class="fa fa-cloud-upload"></i>
                                        <span> Click to browse</span>
                                    </div>
                                    <div class="image-preview-feature-thumb  @if(@$product['thumbnail_image_url'] == null ) d-none @endif">
                                        <img id="image-preview-thumb" src="@if(@$product['feature_image_url'] != null ) {{@$product['thumbnail_image_url']}} @endif" width="240px" height="140px"/>
                                    </div>

                                </div>
                                <div class="feature-image-info">
                                    <ul style="display: grid !important;">
                                        <li><span class="text-primary">Please upload <span class="section-info">360 x 360 </span> image size</span>
                                        </li>
                                        <li><span class="text-danger error_image_thumbnail"></span></li>
                                        <li><span class="text-danger pointer_cl remove_image_thumbnail @if(@$product['thumbnail_image_url'] == null ) d-none @endif">Remove thumbnail</span></li>
                                    </ul>


                                </div>

                            </div>
                            <div class="col-sm-12">
                                <label for="status" class="mt-4 ">Multiple images:</label>
                                <div class="images-list">
                                    <div id="vendor-img"
                                         class="multi-img-option dz-message d-flex flex-column align-items-center justify-content-center">
                                        <i class="fa fa-cloud-upload"></i>
                                        <span class="dropzoneHelpMsg">
                                                <span class="text-primary">Please upload
                                                    <span class="section-info">360 x 360 </span> image dimension.<br>
                                                </span>
                                            </span>
                                    </div>
                                    <div class="upload__box">
                                        <div class="upload__btn-box">
                                            <input type="file" name="product_upload[]" multiple=""
                                                   data-max_length="20"
                                                   id="upload__inputfiles" class="upload__inputfile">
                                        </div>

                                        <div class="upload__img-wrap">
                                            @if(isset($product['images']))
                                                @foreach($product['images'] as $key => $image)
                                                    <div class="upload__img-box">
                                                        <div
                                                            style="background-image: url({{ $image['url'] }})"
                                                            data-id="{{$image['id']}}" data-file ="{{ $image['name'] }}" data-number="{{ $key }}" class="img-bg">
                                                            <div class='upload__img-close'>
                                                                <img
                                                                    src='{{ asset('assets/images/close.svg') }}'>
                                                            </div>
                                                        </div>

                                                    </div>

                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header header-style-card">
                            <h5>Price</h5><span>(Required / Optional)</span>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 digital-add needs-validation">
                                    <div class="form-group">
                                        <label for="validationCustom02" class="col-form-label"><span>*</span> New
                                            Price</label>
                                        <input name="price" class="form-control" id="product_price" type="text"  value="{{ @$product['price'] }}">
                                        <span class="error_price text-danger"></span>
                                    </div>
                                </div>
                                <div class="col-md-6 digital-add needs-validation">
                                    <div class="form-group">
                                        <label for="validationCustom02" class="col-form-label">New Retail Price </label>
                                        <input class="form-control" value="{{ @$product['retail_price'] }}" name="retail_price" id="retail_price" type="text">
                                        <span class="error_retail_price text-danger"></span>
                                    </div>
                                </div>
                                <div class="col-md-6 digital-add needs-validation">
                                    <div class="form-group">
                                        <label for="validationCustom02" class="col-form-label">Refurbished Price </label>
                                        <input class="form-control" value="{{ @$product['refurbished_price'] }}" name="refurbished_price" id="refurbished_price" type="text">
                                        <span class="error_refurbished_price text-danger"></span>
                                    </div>
                                </div>
                                <div class="col-md-6 digital-add needs-validation">
                                    <div class="form-group">
                                        <label for="validationCustom02" class="col-form-label"> Sale Refurbished Price </label>
                                        <input class="form-control" value="{{ @$product['sale_refurbished_price'] }}" name="sale_refurbished_price" id="sale_refurbished_price"
                                               type="text">
                                        <span class="error_sale_refurbished_price text-danger"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header header-style-card">
                            <h5>Attributes</h5><span>(Filters / Optional)</span>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 digital-add needs-validation">
                                    <div class="form-group">
                                        <label for="validationCustom02" class="col-form-label"> Capacity </label>
                                        <input class="form-control" value="{{ @$product['capacity'] }}" name="capacity" id="capacity"type="text">
                                        <span class="error_capacity text-danger"></span>
                                    </div>
                                </div>
                                <div class="col-md-6 digital-add needs-validation">
                                    <div class="form-group">
                                        <label for="validationCustom02" class="col-form-label"> Capacity (Watts) </label>
                                        <input class="form-control" value="{{ @$product['capacity_watts'] }}" name="capacity_watts" id="capacity_watts" type="text">
                                        <span class="error_capacity_watts text-danger"></span>
                                    </div>
                                </div>
                                <div class="col-md-6 digital-add needs-validation">
                                    <div class="form-group">
                                        <label for="validationCustom02" class="col-form-label"> Processing Speed </label>
                                        <input class="form-control" value="{{ @$product['processing_speed'] }}" name="processing_speed" id="processing_speed" type="text">
                                        <span class="error_processing_speed text-danger"></span>
                                    </div>
                                </div>
                                <div class="col-md-6 digital-add needs-validation">
                                    <div class="form-group">
                                        <label for="validationCustom02" class="col-form-label"> Screen Size </label>
                                        <input class="form-control" value="{{ @$product['screen_size'] }}" name="screen_size" id="screen_size" type="text">
                                        <span class="error_screen_size text-danger"></span>
                                    </div>
                                </div>
                                <div class="col-md-6 digital-add needs-validation">
                                    <div class="form-group">
                                        <label for="validationCustom02" class="col-form-label"> Storage </label>
                                        <input class="form-control" value="{{ @$product['storage'] }}" name="storage" id="storage" type="text">
                                        <span class="error_storage text-danger"></span>
                                    </div>
                                </div>
                                <div class="col-md-6 digital-add needs-validation">
                                    <div class="form-group">
                                        <label for="validationCustom02" class="col-form-label"> No. Of Ports </label>
                                        <input class="form-control" value="{{ @$product['no_of_ports'] }}" name="no_of_ports" id="no_of_ports" type="text">
                                        <span class="error_no_of_ports text-danger"></span>
                                    </div>
                                </div>
                                <div class="col-md-6 digital-add needs-validation">
                                    <div class="form-group">
                                        <label for="validationCustom02" class="col-form-label"> Technology </label>
                                        <input class="form-control" value="{{ @$product['technology'] }}" name="technology" id="technology" type="text">
                                        <span class="error_technology text-danger"></span>
                                    </div>
                                </div>
                                <div class="col-md-6 digital-add needs-validation">
                                    <div class="form-group">
                                        <label for="validationCustom02" class="col-form-label"> Form Factor </label>
                                        <input class="form-control" value="{{ @$product['form_factor'] }}" name="form_factor" id="form_factor" type="text">
                                        <span class="error_form_factor text-danger"></span>
                                    </div>
                                </div>
                                <div class="col-md-6 digital-add needs-validation">
                                    <div class="form-group">
                                        <label for="validationCustom02" class="col-form-label"> Form Factor </label>
                                        <input class="form-control" value="{{ @$product['form_factor'] }}" name="form_factor" id="form_factor" type="text">
                                        <span class="error_form_factor text-danger"></span>
                                    </div>
                                </div>
                                <div class="col-md-6 digital-add needs-validation">
                                    <div class="form-group">
                                        <label for="validationCustom02" class="col-form-label"> Memory </label>
                                        <input class="form-control" value="{{ @$product['memory'] }}" name="memory" id="memory" type="text">
                                        <span class="error_memory text-danger"></span>
                                    </div>
                                </div>
                                <div class="col-md-6 digital-add needs-validation">
                                    <div class="form-group">
                                        <label for="validationCustom02" class="col-form-label"> Generation </label>
                                        <input class="form-control" value="{{ @$product['generation'] }}" name="generation" id="generation" type="text">
                                        <span class="error_generation text-danger"></span>
                                    </div>
                                </div>
                                <div class="col-md-6 digital-add needs-validation">
                                    <div class="form-group">
                                        <label for="validationCustom02" class="col-form-label"> Product Type </label>
                                        <input class="form-control" value="{{ @$product['product_type'] }}" name="product_type" id="product_type" type="text">
                                        <span class="error_product_type text-danger"></span>
                                    </div>
                                </div>
                                <div class="col-md-6 digital-add needs-validation">
                                    <div class="form-group">
                                        <label for="validationCustom02" class="col-form-label"> Cache Type </label>
                                        <input class="form-control" value="{{ @$product['cache_type'] }}" name="cache_type" id="cache_type" type="text">
                                        <span class="error_cache_type text-danger"></span>
                                    </div>
                                </div>
                                <div class="col-md-6 digital-add needs-validation">
                                    <div class="form-group">
                                        <label for="validationCustom02" class="col-form-label"> Screen Resolution </label>
                                        <input class="form-control" value="{{ @$product['screen_resolution'] }}" name="screen_resolution" id="screen_resolution" type="text">
                                        <span class="error_screen_resolution text-danger"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    {{--                <div class="card">--}}
                    {{--                    <div class="card-header">--}}
                    {{--                        <h5>Meta Data</h5>--}}
                    {{--                    </div>--}}
                    {{--                    <div class="card-body">--}}
                    {{--                        <div class="digital-add needs-validation">--}}
                    {{--                            <div class="form-group">--}}
                    {{--                                <label for="validationCustom05" class="col-form-label pt-0"> Meta Title</label>--}}
                    {{--                                <input class="form-control" id="validationCustom05" type="text" required="">--}}
                    {{--                            </div>--}}
                    {{--                            <div class="form-group">--}}
                    {{--                                <label class="col-form-label">Meta Description</label>--}}
                    {{--                                <textarea rows="4" cols="12"></textarea>--}}
                    {{--                            </div>--}}
                    {{--                            <div class="form-group mb-0">--}}
                    {{--                                <div class="product-buttons text-center">--}}
                    {{--                                    <button type="button" class="btn btn-primary">Add</button>--}}
                    {{--                                    <button type="button" class="btn btn-light">Discard</button>--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    {{--                </div>--}}

                </div>
            </div>
            <div class="description_div">
                <div class="card">
                    <div class="card-header">
                        <h5>Add Description</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 digital-add needs-validation">
                                <div class="form-group mb-0">
                                    <label> <h6 class="mb-2">Specification</h6></label>
                                    <div class="description-sm">
                                        <textarea name="editor1" id="editor1" name="editor1" cols="10"
                                                  rows="4">{{ @$product['specification'] }}</textarea>

                                    </div>
                                </div>
                            </div>
                            <div class=" col-md-6 digital-add needs-validation">
                                <div class="form-group mb-0">
                                    <label> <h6 class="mb-2 mt-4">Description</h6></label>
                                    <textarea class="form-control" name="description" id="description" >{{ @$product['description'] }} </textarea>
                                </div>
                            </div>
                            <div class=" col-md-6 digital-add needs-validation">
                                <div class="form-group mb-0">
                                    <label> <h6 class="mb-2 mt-4">Read Before Order</h6></label>
                                    <textarea class="form-control" name="read_before_order" id="read_before_order" >{{ @$product['read_before_order'] }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- Container-fluid Ends-->

@endsection
@section('script')

    <script src="../assets/js/product/product.js"></script>
    <script>
        jQuery(document).ready(function () {
            ImgUpload();
        });
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
        function ImgUpload() {
            var imgWrap = "";
            var imgArray = [];
            const dataTransfer = new DataTransfer();
            $('.upload__inputfile').each(function () {
                $(this).on('change', function (e) {

                    imgWrap = $(this).closest('.upload__box').find('.upload__img-wrap');
                    var maxLength = $(this).attr('data-max_length');

                    var files = e.target.files;
                    var filesArr = Array.prototype.slice.call(files);
                    var iterator = 0;


                    for (let file of files) {
                        dataTransfer.items.add(file);
                    }
                    filesArr.forEach(function (f, index) {

                        if (!f.type.match('image.*')) {
                            return;
                        }

                        if (imgArray.length > maxLength) {
                            return false
                        } else {
                            var len = 0;
                            for (var i = 0; i < imgArray.length; i++) {
                                if (imgArray[i] !== undefined) {
                                    len++;
                                }
                            }
                            if (len > maxLength) {
                                return false;
                            } else {
                                imgArray.push(f);

                                var reader = new FileReader();
                                reader.onload = function (e) {
                                    var html = "<div class='upload__img-box'><div style='background-image: url(" + e.target.result + ")' data-number='" + $(".upload__img-close").length + "' data-file='" + f.name + "' class='img-bg'><div class='upload__img-close'><img src='{{ asset('assets/images/close.svg') }}'></div></div></div>";
                                    imgWrap.append(html);
                                    iterator++;
                                }
                                reader.readAsDataURL(f);
                                document.getElementById('upload__inputfiles').files = dataTransfer.files
                            }
                        }
                    });
                });
            });

            $('body').on('click', ".upload__img-close", function (e) {
                var file = $(this).parent().data("file");

                let image_id = $(this).parent().data("id");
                for (var i = 0; i < imgArray.length; i++) {
                    if (imgArray[i].name === file) {
                        dataTransfer.items.remove(i);
                        imgArray.splice(i, 1);
                        document.getElementById('upload__inputfiles').files = dataTransfer.files
                        break;
                    }
                }
                $(this).parent().parent().remove();
                let deleteBackend = '';
                if (image_id != null) {
                    imageDelete(image_id)
                }
                if (image_id == null) {
                    Toast.fire({
                        icon: 'success',
                        title:'Image has been deleted.'
                    })
                }
            });
        }

        document.getElementById("vendor-img").addEventListener("click", myFunction);

        function myFunction() {
            $('.upload__inputfile').click();
        }

        function imageDelete(image_id) {
            $.ajax({
                url: '/product/delete/image/' + image_id,
                type: 'get',
                success: function (response) {

                    if (response.status == 200)  {
                        Toast.fire({
                            icon: 'success',
                            title:response.message
                        })

                    }
                }
            });
        }

        $('#img_contain').click(function () {
            $('#file-input').trigger('click');
        });
        $('#img_contain_thumbnail').click(function () {
            $('#file-input-thumbnail').trigger('click');
        });

        // $('#is_featured').click(function (){
        //     if($(this).is(':checked')){
        //        $('.feature-info').html('1140 X 460');
        //        $('.main-feature').removeClass('d-none');
        //     }else{
        //         $('.main-feature').addClass('d-none');
        //     }
        // })

        $('.product-section').change(function () {
            let productSection = $(this).val()
            if (productSection == 'newProductSection') {
                $('.feature-info').html('363 x 360')
            }
            if (productSection == 'featureProductSection') {
                $('.feature-info').html('1140 x 460')
            }
            if (productSection == 'featureHeaderSection') {
                $('.feature-info').html('460 x 260')
            }
            if (productSection == 'dealOfTheDaySection') {
                $('.feature-info').html('320 x 331')
            }
        })
        const featureDataTransfer = new DataTransfer();
        function readURL(input) {
            if (input.files && input.files[0]) {
                featureDataTransfer.items.add(input.files[0]);
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#image-preview-feature').attr('src', e.target.result);
                    $('#image-preview-feature').hide();
                    $('#image-preview-feature').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
            $('.image-preview-feature').removeClass('d-none');
            $('.remove_image_feature').removeClass('d-none');
            document.getElementById('file-input').files = featureDataTransfer.files

        }
        $('.remove_image_feature').click(function (){
            $(this).closest('.main-feature').find('#image-preview-feature').removeAttr('src');
            $('.image-preview-feature-thumb').addClass('d-none');
            featureDataTransfer.items.remove(0);
            document.getElementById('file-input-thumbnail').files = featureDataTransfer.files
            $('.image-preview-feature').addClass('d-none');
            $('.remove_image_feature').addClass('d-none');

        });
        const thumbnailDataTransfer = new DataTransfer();
        function readURLThumbnail(input) {
            if (input.files && input.files[0]) {
                thumbnailDataTransfer.items.add(input.files[0]);
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#image-preview-thumb').attr('src', e.target.result);
                    $('#image-preview-thumb').hide();
                    $('#image-preview-thumb').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
            $('.image-preview-feature-thumb').removeClass('d-none');
            $('.remove_image_thumbnail').removeClass('d-none');
            document.getElementById('file-input-thumbnail').files = thumbnailDataTransfer.files
        }

        $('.remove_image_thumbnail').click(function (){
            $(this).closest('.main-thumbnail').find('#image-preview-thumb').removeAttr('src');
            $('.image-preview-feature-thumb').addClass('d-none');
            thumbnailDataTransfer.items.remove(0);
            document.getElementById('file-input-thumbnail').files = thumbnailDataTransfer.files
            $('.remove_image_thumbnail').addClass('d-none');
        });

        $("#file-input").change(function () {
            readURL(this);
        });
        $("#file-input-thumbnail").change(function () {
            readURLThumbnail(this);
        });

    </script>
@endsection

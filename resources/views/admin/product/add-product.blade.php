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

        .error, .priceValidate {
            color: red !important;
        }

        .header-style-card {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
        }

        .header-style-card span {
            margin-top: 0px !important;
            margin-left: 5px !important;
        }
    </style>

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>Add Products
                            <small>Premium Admin panel</small>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="/"><i data-feather="home"></i></a></li>
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
                        <a href="{{ route('homeProductList') }}">
                            <button type="button" class="btn btn-light" style="background:  #dddde1 !important;">
                                Discard
                            </button>
                        </a>
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
                                        <input name="product_name" class="form-control"
                                               value="{{ @$product['product_name'] }}" id="validationCustom01"
                                               type="text"
                                               required="">
                                        <span class="error_product_name text-danger"></span>
                                    </div>
                                </div>

                                <div class="col-md-6 digital-add needs-validation">
                                    <div class="form-group">
                                        <label class="col-form-label  pt-0"> <span>*</span> Select Product
                                            Section</label>
                                        <select class="product-section form-control " name="product_section">
                                            <option value="">--Select--</option>
                                            @foreach( \App\Models\Product::PRODUCT_SECTION as $key => $section)
                                                <option value="{{$key}}"
                                                        @if(@$product['product_section'] == $key ) selected @endif>{{$section}}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger error_product_section"></span>
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
                                                       name="status"
                                                       @if(@$product['status'] == 0) checked="checked" @endif>
                                                Disable
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="digital-add needs-validation">
                                    <div class="form-group">
                                        <label class="col-form-label"><span>*</span> Category</label>
                                        <select name="category_id[]" id="parent_category"
                                                class="custom-select form-control"
                                                required="">
                                            <option value="">--Select--</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id  }}"
                                                        @if(@$category->id == @$product['parent_category_id']) selected @endif>{{ $category->category_name }}</option>
                                            @endforeach
                                        </select>
                                        <span class="error_category_id text-danger"></span>
                                    </div>
                                </div>

                                <div class="digital-add">
                                    <div class="form-group">
                                        <label class="col-form-label">Stores</label>
                                        <select name="store_id"
                                                class="custom-select form-control"
                                                required="">
                                            <option value="">--Select--</option>
                                            @foreach($stores as $store)
                                                <option value="{{ $store->id }}"
                                                        @if(@$store->id == @$product['store_id']) selected @endif>{{ $store->name }}</option>
                                            @endforeach
                                        </select>
                                        <span class="error_category_id text-danger"></span>
                                    </div>
                                </div>

                                <div class="digital-add needs-validation">
                                    <div
                                        class="form-group sub_category_l-1   @if(@$product['sub_category_l1_id'] == null ) d-none @endif">
                                        <label class="col-form-label"><span>*</span> Sub Category Level 1</label>
                                        <select name="category_id[]" id="sub_category_l-1"
                                                class="custom-select form-control" required="">
                                            <option value="">--Select--</option>
                                            @if($product['category_level_l1'] != null )
                                                @foreach($product['category_level_l1'] as $l1)
                                                    <option value="{{ $l1->id }}"
                                                            @if($l1->id == $product['sub_category_l1_id']) selected @endif>{{ $l1->category_name }}</option>
                                                @endforeach
                                            @endif

                                        </select>
                                    </div>
                                </div>

                                <div class="digital-add needs-validation">
                                    <div
                                        class="form-group sub_category_l-2 @if((@$product['sub_category_l2_id']) == null )d-none @endif">
                                        <label class="col-form-label"><span>*</span> Sub Category Level 2</label>
                                        <select name="category_id[]" id="sub_category_l-2"
                                                class="custom-select form-control" required="">
                                            <option value="">--Select--</option>
                                            @if($product['category_level_l2'] != null )
                                                @foreach($product['category_level_l2'] as $l1)
                                                    <option value="{{ $l1->id }}"
                                                            @if($l1->id == $product['sub_category_l2_id']) selected @endif>{{ $l1->category_name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>

                                <div class="digital-add needs-validation">
                                    <div
                                        class="form-group sub_category_l-3  @if((@$product['sub_category_l3_id']) == null )d-none @endif">
                                        <label class="col-form-label"><span>*</span> Sub Category Level 3</label>
                                        <select name="category_id[]" id="sub_category_l-3"
                                                class="custom-select form-control" required="">
                                            <option value="">--Select--</option>
                                            @if($product['category_level_l3'] != null )
                                                @foreach($product['category_level_l3'] as $l1)
                                                    <option value="{{ $l1->id }}"
                                                            @if($l1->id == $product['sub_category_l3_id']) selected @endif>{{ $l1->category_name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>

                                <div class="card-header header-style-card">
                                    <h5>Images</h5><span>(Required / Optional)</span>
                                </div>

                                <div class="main-feature form-group">
                                    <label class="col-form-label pt-0"> <span>*</span> Feature</label>
                                    <input type='file' id="file-input" class="d-none" name="feature_image"/>
                                    <div id='img_contain' class="image-uploader">
                                        <div class="upload-text feature-click">
                                            <i class="fa fa-cloud-upload"></i>
                                            <span> Click to browse</span>
                                        </div>
                                        <div
                                            class="image-preview-feature @if(@$product['feature_image_url'] == null ) d-none @endif">
                                            <img id="image-preview-feature"
                                                 src="@if(@$product['feature_image_url'] != null ) {{@$product['feature_image_url']}} @endif"
                                                 width="240px" height="140px"/>
                                        </div>

                                    </div>

                                    <div class="feature-image-info">
                                        <ul style="display: grid !important;">
                                            <li><span class="text-primary">Please upload <span class="feature-info">1140 X 460 </span> image size</span>
                                            </li>
                                            <li><span class="text-danger error_feature_image"></span></li>
                                            <li><span
                                                    class="text-danger pointer_cl remove_image_feature @if(@$product['feature_image_url'] == null ) d-none @endif">Remove feature images</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="main-thumbnail">
                                    <label class="col-form-label pt-0">Thumbnail</label>
                                    <input type='file' id="file-input-thumbnail" class="d-none" name="image_thumbnail"/>
                                    <div id='img_contain_thumbnail' class="image-uploader">
                                        <div class="upload-text feature-click">
                                            <i class="fa fa-cloud-upload"></i>
                                            <span> Click to browse</span>
                                        </div>
                                        <div
                                            class="image-preview-feature-thumb  @if(@$product['thumbnail_image_url'] == null ) d-none @endif">
                                            <img id="image-preview-thumb"
                                                 src="@if(@$product['feature_image_url'] != null ) {{@$product['thumbnail_image_url']}} @endif"
                                                 width="240px" height="140px"/>
                                        </div>

                                    </div>

                                    <div class="feature-image-info">
                                        <ul style="display: grid !important;">
                                            <li><span class="text-primary">Please upload <span class="section-info">360 x 360 </span> image size</span>
                                            </li>
                                            <li><span class="text-danger error_image_thumbnail"></span></li>
                                            <li><span
                                                    class="text-danger pointer_cl remove_image_thumbnail @if(@$product['thumbnail_image_url'] == null ) d-none @endif">Remove thumbnail</span>
                                            </li>
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
                                                                data-id="{{$image['id']}}"
                                                                data-file="{{ $image['name'] }}"
                                                                data-number="{{ $key }}" class="img-bg">
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
                </div>

                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h5>Add Description</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 digital-add needs-validation">
                                    <div class="form-group mb-0">
                                        <label><h6 class="mb-2">Specification</h6></label>
                                        <div class="description-sm">
                                        <textarea name="editor1" id="editor1" name="editor1" cols="10"
                                                  rows="4">{{ @$product['specification'] }}</textarea>

                                        </div>
                                    </div>
                                </div>

                                <div class=" col-md-6 digital-add needs-validation">
                                    <div class="form-group mb-0">
                                        <label><h6 class="mb-2 mt-4">Description</h6></label>
                                        <textarea class="form-control" name="description"
                                                  id="description">{{ @$product['description'] }} </textarea>
                                    </div>
                                </div>

                                <div class=" col-md-6 digital-add needs-validation">
                                    <div class="form-group mb-0">
                                        <label><h6 class="mb-2 mt-4">Read Before Order</h6></label>
                                        <textarea class="form-control" name="read_before_order"
                                                  id="read_before_order">{{ @$product['read_before_order'] }}</textarea>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="product-attributes">
                <div class="card">
                    <div class="card-header">
                        <h5>Add Product Attributes</h5>
                    </div>
                    <div class="card-body">
                        <div class="product_attr_main">

                            <?php
                            $loop_count = 1;
                            ?>

                            @foreach($result['productAttrArr'] as $index => $val)
                                    <?php
                                    $loop_prev = $loop_count;
                                    $attr = (array)$val;
                                    ?>
                                <div class="product_attr_list" id="product_attr_{{ $loop_count++ }}">
                                    <div class="list">
                                        <div class="row">
                                            <div class="col-lg-2 col-md-2 col-sm-3 mb-3">
                                                <label class="col-form-label" for="recipient-name">SKU: <span
                                                        class="text-danger ml-2">*</span></label>
                                                <input class="form-control form_product" type="text"
                                                       id="form_sku"
                                                       name="sku[]" value="{{ @$attr['sku'] }}">
                                                <span class="text-danger" id="error_sku_0"></span>
                                            </div>

                                            <div class="col-lg-2 col-md-2 col-sm-3 mb-3">
                                                <label class="col-form-label" for="recipient-name">PRICE: <span
                                                        class="text-danger ml-2">*</span></label>
                                                <input class="form-control form_product" type="text"
                                                       id="form_s_price" name="price[]"
                                                       value="{{ @$attr['s_price'] }}">
                                                <span class="text-danger" id="error_price_0"></span>
                                            </div>
                                            <div class="col-lg-2 col-md-2 col-sm-3 mb-3">
                                                <label class="col-form-label" for="recipient-name">QTY: <span
                                                        class="text-danger ml-2">*</span></label>
                                                <input class="form-control form_product" type="text"
                                                       id="form_qty"
                                                       name="qty[]" value="{{ @$attr['qty'] }}">
                                                <span class="text-danger" id="error_qty_0"></span>
                                            </div>

                                            <div class="col-lg-3 col-md-3 col-sm-3 mb-3">
                                                <label class="col-form-label"
                                                       for="recipient-name">COLOR:</label>
                                                <select class="form-control form-select" name="color_name[]"
                                                        id="color_name">
                                                    <option value="">--Select--</option>
                                                    @foreach ($result['color'] as $color)
                                                        <option value="{{ $color->id }}"
                                                                @if($color->id == $attr['color_id']) selected @endif>{{ $color->color_name }}</option>
                                                    @endforeach

                                                </select>
                                                <span class="text-danger" id="error_color_name_0"></span>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-3 mb-3">
                                                <label class="col-form-label" for="recipient-name">SIZE:</label>
                                                <select class="form-control form-select" name="size_name[]"
                                                        id="size_name">
                                                    <option value="">--Select--</option>
                                                    @foreach ($result['size'] as $size)
                                                        <option value="{{ $size->id }}"
                                                                @if($size->id == $attr['size_id']) selected @endif>{{ $size->size }}</option>
                                                    @endforeach

                                                </select>
                                                <span class="text-danger" id="error_size_name_0"></span>
                                            </div>
                                            <div class="mb-3 col-lg-3 col-md-3 col-sm-3">
                                                <label class="col-form-label"
                                                       for="recipient-name">Image:</label>
                                                <input class="form-control form_product" type="file"
                                                       id="form_image_attr"
                                                       name="image_attr[]">
                                                <span class="text-danger" id="error_image_attr_0"></span>
                                            </div>

                                            <div class="mb-3 col-lg-2 col-md-2 col-sm-3">
                                                @if($loop_count == 2)
                                                    <button class="btn btn-secondary active add_more_attr"
                                                            type="button"><i
                                                            class="fa fa-plus"></i> Add More
                                                    </button>
                                                @else
                                                    <button class="btn btn-danger active remove_more_attr"
                                                            id="{{ $loop_prev }}" type="button"><i
                                                            class="fa fa-minus"></i>
                                                        Remove
                                                    </button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div>
                            <button class="btn btn-primary product_save" type="submit">Add Product</button>
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

            var specification = JSON.parse("{{ json_encode(@$product['specification']) }}");

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
                        title: 'Image has been deleted.'
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

                    if (response.status == 200) {
                        Toast.fire({
                            icon: 'success',
                            title: response.message
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

        $('.remove_image_feature').click(function () {
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

        $('.remove_image_thumbnail').click(function () {
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

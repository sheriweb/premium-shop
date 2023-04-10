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
        .loader {
            color: #FFF;
            display: inline-block;
            position: relative;
            /*font-size: 48px;*/
            /*font-family: Arial, Helvetica, sans-serif;*/
            box-sizing: border-box;
        }
        .loader::after {
            content: '';
            width: 5px;
            height: 5px;
            background: currentColor;
            position: absolute;
            bottom: 4px;
            right: -11px;
            box-sizing: border-box;
            animation: animloader 1s linear infinite;
        }

        @keyframes animloader {
            0% {
                box-shadow: 10px 0 rgba(255, 255, 255, 0), 20px 0 rgba(255, 255, 255, 0);
            }
            50% {
                box-shadow: 10px 0 white, 20px 0 rgba(255, 255, 255, 0);
            }
            100% {
                box-shadow: 10px 0 white, 20px 0 white;
            }
        }
    </style>

    <!-- Container-fluid starts-->
    <div class="container-fluid p-6" style="margin-top: 6rem">
        <form id="add_blog_form" method="post" action="{{ route('store.blog') }}" enctype="multipart/form-data ">
            @csrf
            <div class="save_product_btn mt-5">
                <div class="form-group mb-3 mt-4">
                    <div class="product-buttons text-end mt-4">
                        <button type="button" store-type="saveAndPublish" id="saveAndPublishBtn" class="btn btn-primary store_blog">
                         <span id="saveAndPublishSpan">@if(@$blog->id) Update @else Save @endif and Published</span>
                         <span class="loader loaderSaveAndPublish d-none">Saving</span>
                        </button>
                        <button type="button" store-type="saveAsDraft" id="saveAsDraftBtn" class="btn btn-light store_blog"
                                style="background:  #dddde1 !important;">
                            <span class="" id="saveAsDraftSpan"> @if(@$blog->id) Update @else Save @endif As Draft</span>
                            <span class="loader loaderSaveAsDraft d-none">Saving</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="row product-adding">
                <div class="col-xl-12">
                    <input type="hidden" name="blog_id" value="{{ @$blog->id }}" id="blog_id">
                    <div class="card">
                        <div class="card-header header-style-card">
                            <h5>Add New Blog</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 digital-add needs-validation">
                                    <div class="form-group">
                                        <label for="validationCustom01" class="col-form-label pt-0"><span>*</span>
                                            Title</label>
                                        <input name="title" class="form-control" value="{{ @$blog['title'] }}"
                                               id="blog_title" type="text"
                                               required="">
                                        <span class="error_title text-danger"></span>
                                    </div>
                                </div>
                                <div class="description_div">
                                    <div class="">
                                        <div class="card-header">
                                            <h5>Content</h5>

                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12 digital-add needs-validation">
                                                    <div class="form-group mb-0">
                                                        <div class="description-sm">
                                                            <textarea name="content" id="editor1" name="editor1" cols="10"
                                                            rows="4">{{ @$blog['content'] }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class=" text-danger content_error"></div>
                                    </div>

                                    <div class="card-body">
                                        <div class="main-feature form-group">
                                            <label class="col-form-label pt-0"> <span>*</span>Upload Feature
                                                Image</label>
                                            <input type='file' id="file-input" class="d-none" name="feature_image"/>
                                            <div id='img_contain' class="image-uploader">
                                                <div class="upload-text feature-click">
                                                    <i class="fa fa-cloud-upload"></i>
                                                    <span> Click to browse</span>
                                                </div>
                                                <div
                                                    class="image-preview-feature @if(@$blog['feature_image'] == null ) d-none @endif">
                                                    <img id="image-preview-feature"
                                                         src="@if(@$blog['feature_image'] != null ) {{ asset('blogImages/'.$blog['feature_image']) }} @endif"
                                                         width="240px" height="140px"/>
                                                </div>

                                            </div>
                                            <div class="feature-image-info">
                                                <ul style="display: grid !important;">
                                                    <li><span class="text-primary">Please upload <span
                                                                class="feature-info">1140 X 460 </span> image size</span>
                                                    </li>
                                                    <li><span class="text-danger error_feature_image"></span></li>
                                                    <li><span
                                                            class="text-danger pointer_cl remove_image_feature @if(@$product['feature_image_url'] == null ) d-none @endif">Remove feature images</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        {{--                                        <div class="col-sm-12">--}}
                                        {{--                                            <label for="status" class="mt-4 ">Multiple images:</label>--}}
                                        {{--                                            <div class="images-list">--}}
                                        {{--                                                <div id="vendor-img"--}}
                                        {{--                                                     class="multi-img-option dz-message d-flex flex-column align-items-center justify-content-center">--}}
                                        {{--                                                    <i class="fa fa-cloud-upload"></i>--}}
                                        {{--                                                    <span class="dropzoneHelpMsg">--}}
                                        {{--                                                <span class="text-primary">Please upload--}}
                                        {{--                                                    <span class="section-info">360 x 360 </span> image dimension.<br>--}}
                                        {{--                                                </span>--}}
                                        {{--                                            </span>--}}
                                        {{--                                                </div>--}}
                                        {{--                                                <div class="upload__box">--}}
                                        {{--                                                    <div class="upload__btn-box">--}}
                                        {{--                                                        <input type="file" name="product_upload[]" multiple=""--}}
                                        {{--                                                               data-max_length="20"--}}
                                        {{--                                                               id="upload__inputfiles" class="upload__inputfile">--}}
                                        {{--                                                    </div>--}}

                                        {{--                                                    <div class="upload__img-wrap">--}}
                                        {{--                                                        @if(isset($product['images']))--}}
                                        {{--                                                            @foreach($product['images'] as $key => $image)--}}
                                        {{--                                                                <div class="upload__img-box">--}}
                                        {{--                                                                    <div--}}
                                        {{--                                                                        style="background-image: url({{ $image['url'] }})"--}}
                                        {{--                                                                        data-id="{{$image['id']}}" data-file ="{{ $image['name'] }}" data-number="{{ $key }}" class="img-bg">--}}
                                        {{--                                                                        <div class='upload__img-close'>--}}
                                        {{--                                                                            <img--}}
                                        {{--                                                                                src='{{ asset('assets/images/close.svg') }}'>--}}
                                        {{--                                                                        </div>--}}
                                        {{--                                                                    </div>--}}

                                        {{--                                                                </div>--}}

                                        {{--                                                            @endforeach--}}
                                        {{--                                                        @endif--}}
                                        {{--                                                    </div>--}}
                                        {{--                                                </div>--}}
                                        {{--                                            </div>--}}

                                        {{--                                        </div>--}}
                                    </div>
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
    <script>

        $('.store_blog').click(function () {

            let validated = false;
            let saveType = $(this).attr('store-type');
            let blogTitle = $('#blog_title').val();
            let formData = document.getElementById("add_blog_form");
            let content = CKEDITOR.instances.editor1.getData();
            let form_data = new FormData(formData);

            form_data.append('storeType', saveType);

            if (blogTitle != '') {
                validated = true;
                $('.error_title').html('')
            } else {
                $('.error_title').html('Please enter blog title')
                validated = false;
            }
            if (content != '') {
                form_data.append('content', content);
                validated = true;
                $('.content_error').html('')
            } else {
                $('.content_error').html('Please enter blog content')
                validated = false;
            }

            if(validated)
            {
                if(saveType == 'saveAndPublish'){
                    $('#saveAndPublishBtn').prop('disabled', true);
                    $('#saveAsDraftBtn').prop('disabled', true);
                    $('#saveAsDraftBtn').addClass('d-none');
                    $('#saveAndPublishSpan').addClass('d-none');
                    $('.loaderSaveAndPublish').removeClass('d-none');
                }else{
                    $('#saveAsDraftBtn').prop('disabled', true);
                    $('#saveAndPublishBtn').prop('disabled', true);
                    $('#saveAndPublishBtn').addClass('d-none');
                    $('#saveAsDraftSpan').addClass('d-none');
                    $('.loaderSaveAsDraft').removeClass('d-none');
                }
                $.ajax({
                    url: '{{ route('store.blog') }}',
                    type: 'POST',
                    contentType: false,
                    cache: false,
                    processData: false,
                    data: form_data,
                    success: function (data) {
                        // Successful POST
                        // do whatever you want
                        $('#saveAndPublishBtn').prop('disabled', false);
                        $('#saveAndPublishBtn').removeClass('d-none');
                        $('#saveAsDraftBtn').prop('disabled', false);
                        $('#saveAsDraftBtn').removeClass('d-none');
                        $('#saveAndPublishSpan').removeClass('d-none');
                        $('.loaderSaveAndPublish').addClass('d-none');
                        $('#saveAsDraftSpan').removeClass('d-none');
                        $('.loaderSaveAsDraft').addClass('d-none');

                        if (data.status == '200') {
                            Swal.fire({
                                title: data.message,
                                icon: 'success',
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'ok!'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href ='{{ route('blog.show') }}'
                                }
                            })


                        }else{
                            Swal.fire({
                                title: data.message,
                                icon: 'error',
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'ok!'
                            })
                        }
                    },
                    error: function (data) {
                        // Something went wrong
                        // HERE you can handle asynchronously the response
                        var errors = data.responseJSON;
                        let err = $('.upload-error');
                        showErrors(errors);
                    }
                });
            }


        });


        $("#file-input").change(function () {
            readURL(this);
        });
        $('#img_contain').click(function () {
            $('#file-input').trigger('click');
        });
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
    </script>

@endsection

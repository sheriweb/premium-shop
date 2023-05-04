@extends('new-user-site.dashboard')

@section('content')
    <style>
        .grid-product__image-mask {
            position: relative;
            overflow: hidden;
        }

        .p-image-wrap {
            height: 0px;
            padding-bottom: 150%;
        }

        .p-image-wrap .loaded {
            transition: opacity 0.4s ease;
            animation: fade-in 1s cubic-bezier(0.26, 0.54, 0.32, 1) 0s forwards;
        }

        .grid-product__image {
            position: absolute;
            top: -1px;
            left: -1px;
            right: -1px;
            bottom: -1px;
            background-repeat: no-repeat;
            background-position: center;
            /*opacity: 0;*/
            background-color: #fff;
        }

        .grid-product__image {
            display: block;
            margin: 0 auto;
            width: 100%;
        }

        .grid-product__secondary-image {
            position: absolute;
            top: -1px;
            left: -1px;
            right: -1px;
            bottom: -1px;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            opacity: 0;
            background-color: #fff;
        }

        .grid-product__meta {
            text-align: left;
            position: relative;
            padding: 10px 0 6px 0;
            line-height: 1.5;
        }

        .brandName {
            font-family: 'Crimson Pro';
            font-size: 18px;
            margin-top: 5px;
            margin-bottom: 5px;
            text-transform: uppercase;
            text-align: left !important;
            font-weight: bold !important;
            color: #333;
            line-height: 20px !important;
        }

        .grid-product__title {
            font-size: 14px;
            overflow: hidden;
            text-overflow: ellipsis;
            max-height: 2.8em;
            -webkit-line-clamp: 1;
        }

        .grid-product__price {
            color: #000;
            font-weight: bold;
            font-size: 13.6px;
            margin-top: 5px;
        }

        .fav {
            opacity: 70%;
            position: absolute;
            top: 8px;
            right: 8px;
            z-index: 1;
            cursor: pointer !important;
        }

        .product_item {
            padding-right: 5px;
            padding-left: 5px;
        }

        .colorDot {
            border-radius: 50%;
            display: inline-block;
            height: 10px;
            width: 10px;
            margin-right: 7px;
        }

        span.orange {
            background-color: #FFA500;
        }

        .multipleColors {
            font-size: 13px;
            margin-top: 5px;
        }
        .filters-sidebar {
            border: none;
            margin-bottom: 20px;
            /*margin-right: 20px;*/
            vertical-align: top;
            width: 300px;
            box-sizing: border-box;
            font-weight: normal;
            line-height: 1.45em;
            /*overflow-y: scroll!important;*/
            height: 100%!important;
        }
        .collapsibles-wrapper--border-bottom {
            border-bottom: 1px solid #e8e9eb;
        }
        .collapsible-trigger-btn{
            text-align: left;
            letter-spacing: 0.1em;
            font-size: 15px;
            display: block;
            width: 100%;
            padding: 17.14286px 0;
            border: none !important;
            background-color: transparent !important;
        }
        .collapsible-trigger {
            color: inherit;
            position: relative;
        }
        .accordions{
            margin-top: 20px !important;
        }
        .content-div .list-group-item {
            border: none;
            color: black;
            font-size: 13px;

        }
        .content-div .list-group-item input{
            position: relative !important;
        }
        .price-content.content-div {
            padding: 10px 0px;
        }
    </style>
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <form id="filter_form" method="get" action="{{ route('home.brand-products', request()->route('id')) }}">
                   @include('new-user-site.partials.filters-sidebar')
                    </form>
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        @foreach($storeProduct as $product)
                            <div class=" product_item col-lg-3 position-relative mt-3">
                                <div class="grid-product__content">
                                    <div class="pdp-fave-wrap"
                                         style="opacity:70%;position: absolute;top:8px;right:8px;z-index: 1;cursor: pointer !important;">
                                        <div>
                                            <svg class="fav" width="28" height="28" viewBox="0 0 44 44" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                                                 data-acsb-hidden="true" data-acsb-force-hidden="true">
                                                <circle cx="22" cy="22" r="22" fill="white"></circle>
                                                <g clip-path="url(#clip0_7976_54162)">
                                                    <path
                                                        d="M33.9602 17.4967C33.6099 13.6408 30.8806 10.8432 27.4651 10.8432C25.1895 10.8432 23.106 12.0678 21.9337 14.0303C20.7719 12.0424 18.7738 10.8428 16.5347 10.8428C13.1196 10.8428 10.3899 13.6403 10.04 17.4962C10.0124 17.6666 9.89881 18.5629 10.2441 20.0247C10.7416 22.1331 11.8909 24.0509 13.5669 25.5695L21.9281 33.1571L30.4329 25.5699C32.1089 24.0509 33.2582 22.1336 33.7557 20.0247C34.101 18.5634 33.9874 17.667 33.9602 17.4967ZM32.8571 19.8133C32.4029 21.7389 31.35 23.4933 29.8153 24.8836L21.9337 31.9155L14.1872 24.8854C12.6497 23.4924 11.5974 21.7385 11.1427 19.8128C10.8159 18.4295 10.9503 17.6481 10.9507 17.643L10.9576 17.5964C11.2577 14.2182 13.6029 11.7659 16.5347 11.7659C18.6981 11.7659 20.6025 13.0952 21.5062 15.2346L21.9313 16.2422L22.3564 15.2346C23.2459 13.128 25.2509 11.7664 27.4655 11.7664C30.3969 11.7664 32.7426 14.2187 33.0486 17.6407C33.0495 17.6481 33.1838 18.43 32.8571 19.8133Z"
                                                        fill="black"></path>
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_7976_54162">
                                                        <rect width="24" height="24" fill="white"
                                                              transform="translate(10 10)"></rect>
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <a href="#" class="grid-product__link ">
                                    <div class="grid-product__image-mask keelo">
                                        <div class="p-image-wrap">
                                            <div class="grid-product__image loaded"
                                                 style="background-repeat: repeat-y; background-image: url({{asset('admin-images/attribute-images/'.$product['image'])}})"></div>
                                        </div>
                                        <div class="grid-product__secondary-image  loaded" aria-hidden="true"
                                             data-acsb-hidden="true"
                                             style="background-image: url({{asset('admin-images/attribute-images/'.$product['image'])}});"></div>
                                    </div>
                                    <div class="grid-product__meta">
                                        <div class="brandName">{{$product['productName']}}</div>
                                        <div class="grid-product__title grid-product__title--body">
                                            {{$product['description']}}
                                        </div>

                                        <div class="grid-product__price">
                                            <b>{{$product['price']}}</b>&nbsp;
                                            <span class="grid-product__price--original">
                                                <span class="acsb-sr-only"
                                                      data-acsb-sr-only="true"
                                                      data-acsb-force-visible="true"
                                                      aria-hidden="false"
                                                      data-acsb-hidden="false"> Was </span>$378.00</span>
                                            <span class="grid-product__price--savings">70% off</span>

                                        </div>

                                        <div class="multipleColors">
                                            <span class="colorDot orange" aria-hidden="true" data-acsb-hidden="true"
                                                  data-acsb-force-hidden="true"></span>
                                            <span class="colorDot blue" aria-hidden="true" data-acsb-hidden="true"
                                                  data-acsb-force-hidden="true"></span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('scripts')
    <script>
        function submitFilter()
        {
            var form = document.getElementById("filter_form");
                form.submit();
        }


    </script>
@endsection

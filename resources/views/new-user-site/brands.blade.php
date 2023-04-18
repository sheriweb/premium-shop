@extends('new-user-site.dashboard')
@section('content')
    <style>
        .heading h2{
            color: black;
        }
        .brandListGrid__itemTile__productContent {
            position: relative;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            border-radius: 4px;
        }
        .logo-bar__link {
            display: block;
        }
        .brandListGrid__itemTile__productContent__bgImage {
            position: relative;
            left: 50%;
            top: 50%;
            min-width: 100%;
            min-height: 100%;
            transform: translateY( 0%) translateX(-50%);
        }
        .brandListGrid__itemTile__productContent__logoImage {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
        }
        .brandListGrid__itemTile__productContent__mask {
            top: 0;
            left: 0;
            position: absolute;
            width: 100%;
            height: 100%;
            background-color: #000;
            opacity: .4;
        }
        .fullPageGradientBanner {
            display: block;
            position: relative;
            height: 320px;
            overflow: hidden;
        }
        .fullPageGradientBanner img {
            position: absolute;
            right: 0;
            min-width: 75%;
            min-height: 100%;
            width: auto;
            height: auto;
            object-fit: cover;
            max-width: 1200px;
        }
        .fullPageGradientBanner__gradient-mask {
            position: absolute;
            background: #fff;
            background: linear-gradient(90deg, white 35%, rgba(255, 255, 255, 0) 60%, rgba(255, 255, 255, 0) 100%);
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
        }
        .fullPageGradientBanner__overlay-text {
            position: absolute;
            top: 50%;
            left: 0;
            transform: translateY(-50%);
        }
        .page-width {
            padding: 0 25px;
        }
    </style>
    <section id="shopify-section-template--15113360179260__gradient-banner" class="shopify-section page-width"><link href="//cdn.shopify.com/s/files/1/0291/4536/6588/t/236/assets/full-page-gradient-banner.css?v=177904305298563803051678725756" rel="stylesheet" type="text/css" media="all">
        <div class="fullPageGradientBanner" data-acsb-overflower="true">

            <img src="https://cdn.shopify.com/s/files/1/0291/4536/6588/files/store-directory-cover.jpg?v=1643303683&amp;width=1920" alt="Store directory cover" srcset="//cdn.shopify.com/s/files/1/0291/4536/6588/files/store-directory-cover.jpg?v=1643303683&amp;width=352 352w, //cdn.shopify.com/s/files/1/0291/4536/6588/files/store-directory-cover.jpg?v=1643303683&amp;width=832 832w, //cdn.shopify.com/s/files/1/0291/4536/6588/files/store-directory-cover.jpg?v=1643303683&amp;width=1200 1200w, //cdn.shopify.com/s/files/1/0291/4536/6588/files/store-directory-cover.jpg?v=1643303683&amp;width=1920 1920w" width="2048" height="853" data-acsb-alt-candidate="Store directory cover">
            <div class="fullPageGradientBanner__gradient-mask"></div>
            <div class="fullPageGradientBanner__overlay-text">
                <h2 class="fullPageGradientBanner__heading" role="heading" aria-level="2">Shop Your</h2>
                <h2 class="fullPageGradientBanner__heading" role="heading" aria-level="2">Favorite Brands</h2>
                <span class="fullPageGradientBanner__sub-heading">Always up to 90% off</span>
            </div>

        </div>

    </section>
<section>
    <div class="container-fluid main-brands mt-4">
        <div class="heading mb-2">
           <h2 class="text-black">Featured</h2>
        </div>
        <div class="row ">
            <div class="col-lg-3 mb-2">
                <div class="brandListGrid__itemTile__productContent" style="position:relative;">
                    <a href="https://shoppremiumoutlets.com/collections/store-stuart-weitzman?page=1" class="logo-bar__link">


                        <img src="//cdn.shopify.com/s/files/1/0291/4536/6588/files/stuart-weitzman-card-sdp_360x.png?v=1643239770" style="width: 50%;"
                             class="brandListGrid__itemTile__productContent__bgImage lazyautosizes lazyloaded" >

{{--                        <img class="brandListGrid__itemTile__productContent__bgImage lazyautosizes lazyloaded" data-widths="[360]" data-aspectratio="" data-sizes="auto" alt="" data-srcset="//cdn.shopify.com/s/files/1/0291/4536/6588/files/stuart-weitzman-card-sdp_360x.png?v=1643239770 360w" sizes="249px" srcset="//cdn.shopify.com/s/files/1/0291/4536/6588/files/stuart-weitzman-card-sdp_360x.png?v=1643239770 360w">--}}
                        <div class="brandListGrid__itemTile__productContent__mask"></div>

{{--                        <img  style="width: 50%;" class="brandListGrid__itemTile__productContent__logoImage lazyautosizes lazyloaded" data-widths="[125]" data-aspectratio="" data-sizes="auto" alt="" data-srcset="//cdn.shopify.com/s/files/1/0291/4536/6588/files/stuart-weitzman-white-logo_125x.png?v=1643217534 125w" sizes="125px" srcset="//cdn.shopify.com/s/files/1/0291/4536/6588/files/stuart-weitzman-white-logo_125x.png?v=1643217534 125w">--}}
                        <img src="//cdn.shopify.com/s/files/1/0291/4536/6588/files/stuart-weitzman-white-logo_125x.png?v=1643217534" style="width: 50%;" class="brandListGrid__itemTile__productContent__logoImage lazyautosizes lazyloaded" >

                    </a>

                </div>

            </div>
            <div class="col-lg-3 mb-2">
                <div class="brandListGrid__itemTile__productContent" style="position:relative;">
                    <a href="#" class="logo-bar__link">
                        <img src="https://cdn.shopify.com/s/files/1/0291/4536/6588/files/coach-outlet-brand-card_360x.jpg?v=1668002768" style="width: 50%;"
                             class="brandListGrid__itemTile__productContent__bgImage lazyautosizes lazyloaded" >
                        <div class="brandListGrid__itemTile__productContent__mask"></div>
                        <img src="https://cdn.shopify.com/s/files/1/0291/4536/6588/files/coach-outlet-white-logo_b9423529-6a15-4cd1-b28f-e7ddb305cf58_125x.png?v=1659894735" style="width: 50%;" class="brandListGrid__itemTile__productContent__logoImage lazyautosizes lazyloaded" >
                    </a>

                </div>

            </div>
            <div class="col-lg-3 mb-2">
                <div class="brandListGrid__itemTile__productContent" style="position:relative;">
                    <a href="#" class="logo-bar__link">
                        <img src="https://cdn.shopify.com/s/files/1/0291/4536/6588/files/fossil-brand-card_360x.png?v=1668787411" style="width: 50%;"
                             class="brandListGrid__itemTile__productContent__bgImage lazyautosizes lazyloaded" >
                        <div class="brandListGrid__itemTile__productContent__mask"></div>
                        <img src="https://cdn.shopify.com/s/files/1/0291/4536/6588/files/fossil-white-logo_125x.png?v=1643217696" style="width: 50%;" class="brandListGrid__itemTile__productContent__logoImage lazyautosizes lazyloaded" >

                    </a>

                </div>

            </div>
            <div class="col-lg-3 mb-2">
                <div class="brandListGrid__itemTile__productContent" style="position:relative;">
                    <a href="#" class="logo-bar__link">
                        <img src="//cdn.shopify.com/s/files/1/0291/4536/6588/files/stuart-weitzman-card-sdp_360x.png?v=1643239770" style="width: 50%;"
                             class="brandListGrid__itemTile__productContent__bgImage lazyautosizes lazyloaded" >
                        <div class="brandListGrid__itemTile__productContent__mask"></div>
                        <img src="//cdn.shopify.com/s/files/1/0291/4536/6588/files/stuart-weitzman-white-logo_125x.png?v=1643217534" style="width: 50%;" class="brandListGrid__itemTile__productContent__logoImage lazyautosizes lazyloaded" >
                    </a>

                </div>

            </div>
            <div class="col-lg-3 mb-2">
                <div class="brandListGrid__itemTile__productContent" style="position:relative;">
                    <a href="https://shoppremiumoutlets.com/collections/store-stuart-weitzman?page=1" class="logo-bar__link">


                        <img src="//cdn.shopify.com/s/files/1/0291/4536/6588/files/stuart-weitzman-card-sdp_360x.png?v=1643239770" style="width: 50%;"
                             class="brandListGrid__itemTile__productContent__bgImage lazyautosizes lazyloaded" >

                        {{--                        <img class="brandListGrid__itemTile__productContent__bgImage lazyautosizes lazyloaded" data-widths="[360]" data-aspectratio="" data-sizes="auto" alt="" data-srcset="//cdn.shopify.com/s/files/1/0291/4536/6588/files/stuart-weitzman-card-sdp_360x.png?v=1643239770 360w" sizes="249px" srcset="//cdn.shopify.com/s/files/1/0291/4536/6588/files/stuart-weitzman-card-sdp_360x.png?v=1643239770 360w">--}}
                        <div class="brandListGrid__itemTile__productContent__mask"></div>

                        {{--                        <img  style="width: 50%;" class="brandListGrid__itemTile__productContent__logoImage lazyautosizes lazyloaded" data-widths="[125]" data-aspectratio="" data-sizes="auto" alt="" data-srcset="//cdn.shopify.com/s/files/1/0291/4536/6588/files/stuart-weitzman-white-logo_125x.png?v=1643217534 125w" sizes="125px" srcset="//cdn.shopify.com/s/files/1/0291/4536/6588/files/stuart-weitzman-white-logo_125x.png?v=1643217534 125w">--}}
                        <img src="//cdn.shopify.com/s/files/1/0291/4536/6588/files/stuart-weitzman-white-logo_125x.png?v=1643217534" style="width: 50%;" class="brandListGrid__itemTile__productContent__logoImage lazyautosizes lazyloaded" >

                    </a>

                </div>

            </div>
            <div class="col-lg-3 mb-2">
                <div class="brandListGrid__itemTile__productContent" style="position:relative;">
                    <a href="#" class="logo-bar__link">
                        <img src="//cdn.shopify.com/s/files/1/0291/4536/6588/files/stuart-weitzman-card-sdp_360x.png?v=1643239770" style="width: 50%;"
                             class="brandListGrid__itemTile__productContent__bgImage lazyautosizes lazyloaded" >
                        <div class="brandListGrid__itemTile__productContent__mask"></div>
                        <img src="//cdn.shopify.com/s/files/1/0291/4536/6588/files/stuart-weitzman-white-logo_125x.png?v=1643217534" style="width: 50%;" class="brandListGrid__itemTile__productContent__logoImage lazyautosizes lazyloaded" >
                    </a>

                </div>

            </div>
            <div class="col-lg-3 mb-2">
                <div class="brandListGrid__itemTile__productContent" style="position:relative;">
                    <a href="https://shoppremiumoutlets.com/collections/store-stuart-weitzman?page=1" class="logo-bar__link">


                        <img src="//cdn.shopify.com/s/files/1/0291/4536/6588/files/stuart-weitzman-card-sdp_360x.png?v=1643239770" style="width: 50%;"
                             class="brandListGrid__itemTile__productContent__bgImage lazyautosizes lazyloaded" >

                        {{--                        <img class="brandListGrid__itemTile__productContent__bgImage lazyautosizes lazyloaded" data-widths="[360]" data-aspectratio="" data-sizes="auto" alt="" data-srcset="//cdn.shopify.com/s/files/1/0291/4536/6588/files/stuart-weitzman-card-sdp_360x.png?v=1643239770 360w" sizes="249px" srcset="//cdn.shopify.com/s/files/1/0291/4536/6588/files/stuart-weitzman-card-sdp_360x.png?v=1643239770 360w">--}}
                        <div class="brandListGrid__itemTile__productContent__mask"></div>

                        {{--                        <img  style="width: 50%;" class="brandListGrid__itemTile__productContent__logoImage lazyautosizes lazyloaded" data-widths="[125]" data-aspectratio="" data-sizes="auto" alt="" data-srcset="//cdn.shopify.com/s/files/1/0291/4536/6588/files/stuart-weitzman-white-logo_125x.png?v=1643217534 125w" sizes="125px" srcset="//cdn.shopify.com/s/files/1/0291/4536/6588/files/stuart-weitzman-white-logo_125x.png?v=1643217534 125w">--}}
                        <img src="//cdn.shopify.com/s/files/1/0291/4536/6588/files/stuart-weitzman-white-logo_125x.png?v=1643217534" style="width: 50%;" class="brandListGrid__itemTile__productContent__logoImage lazyautosizes lazyloaded" >

                    </a>

                </div>

            </div>
            <div class="col-lg-3 mb-2">
                <div class="brandListGrid__itemTile__productContent" style="position:relative;">
                    <a href="#" class="logo-bar__link">
                        <img src="//cdn.shopify.com/s/files/1/0291/4536/6588/files/stuart-weitzman-card-sdp_360x.png?v=1643239770" style="width: 50%;"
                             class="brandListGrid__itemTile__productContent__bgImage lazyautosizes lazyloaded" >
                        <div class="brandListGrid__itemTile__productContent__mask"></div>
                        <img src="//cdn.shopify.com/s/files/1/0291/4536/6588/files/stuart-weitzman-white-logo_125x.png?v=1643217534" style="width: 50%;" class="brandListGrid__itemTile__productContent__logoImage lazyautosizes lazyloaded" >
                    </a>

                </div>

            </div>
        </div>
    </div>

</section>
@endsection

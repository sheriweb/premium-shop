@extends('new-user-site.dashboard')

@section('content')
    <!-- for mobile -->
    <section class="mobile-all-brands">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="mobile-brands-card">
                        <button class="prev-mobile" aria-label="Next" type="button" style="">
                            <svg width="12" height="23" viewBox="0 0 12 23" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12.0123 11.5123C12.01 11.777 11.9049 12.0305 11.7193 12.2193L1.71929 22.2193C1.53069 22.4014 1.27808 22.5022 1.01589 22.5C0.75369 22.4977 0.502878 22.3925 0.31747 22.2071C0.132062 22.0217 0.0268924 21.7709 0.0246139 21.5087C0.0223355 21.2465 0.12313 20.9939 0.305288 20.8053L9.59829 11.5123L0.305288 2.21929C0.209778 2.12704 0.133596 2.0167 0.0811869 1.89469C0.0287779 1.77269 0.00119157 1.64147 3.7757e-05 1.50869C-0.00111606 1.37591 0.0241854 1.24423 0.0744663 1.12134C0.124747 0.99844 0.199 0.886787 0.292893 0.792894C0.386786 0.699001 0.498438 0.624748 0.621334 0.574467C0.74423 0.524185 0.87591 0.498884 1.00869 0.500038C1.14147 0.501192 1.27269 0.52878 1.39469 0.581188C1.5167 0.633596 1.62704 0.709778 1.71929 0.805288L11.7193 10.8053C11.9049 10.9941 12.01 11.2475 12.0123 11.5123Z"
                                    fill="black"></path>
                            </svg>
                        </button>
                        <button class="next-mobile" aria-label="Previous" type="button" style="">
                            <svg width="12" height="23" viewBox="0 0 12 23" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12.0123 11.5123C12.01 11.777 11.9049 12.0305 11.7193 12.2193L1.71929 22.2193C1.53069 22.4014 1.27808 22.5022 1.01589 22.5C0.75369 22.4977 0.502878 22.3925 0.31747 22.2071C0.132062 22.0217 0.0268924 21.7709 0.0246139 21.5087C0.0223355 21.2465 0.12313 20.9939 0.305288 20.8053L9.59829 11.5123L0.305288 2.21929C0.209778 2.12704 0.133596 2.0167 0.0811869 1.89469C0.0287779 1.77269 0.00119157 1.64147 3.7757e-05 1.50869C-0.00111606 1.37591 0.0241854 1.24423 0.0744663 1.12134C0.124747 0.99844 0.199 0.886787 0.292893 0.792894C0.386786 0.699001 0.498438 0.624748 0.621334 0.574467C0.74423 0.524185 0.87591 0.498884 1.00869 0.500038C1.14147 0.501192 1.27269 0.52878 1.39469 0.581188C1.5167 0.633596 1.62704 0.709778 1.71929 0.805288L11.7193 10.8053C11.9049 10.9941 12.01 11.2475 12.0123 11.5123Z"
                                    fill="black"></path>
                            </svg>

                        </button>
                        <ul class="mobile-card-show">
                            <li class="all-brand-card card-view">
                                <div class="all-brand-img">
                                    <img class="img-fluid" src="{{asset('new-user-side/images/brand-1.jpg')}}"
                                         alt="img">
                                </div>
                                <div class="overlay-brand">

                                </div>
                                <div class="all-store">
                                    <a href="#" class="store-brand">
                                        View All Stores
                                    </a>
                                </div>

                            </li>
                            <li class="all-brand-card">
                                <div class="all-brand-img">
                                    <img class="img-fluid" src="{{asset('new-user-side/images/brand-1.jpg')}}"
                                         alt="img">
                                </div>
                                <div class="overlay-brand">

                                </div>
                                <div class="just-label">
                                    Just In
                                </div>
                                <div class="logo-barnd-img">
                                    <img class="img-fluid" src="{{asset('new-user-side/images/brand-logo-1.png')}}"
                                         alt="img">
                                </div>
                            </li>
                            <li class="all-brand-card">
                                <div class="all-brand-img">
                                    <img class="img-fluid" src="{{asset('new-user-side/images/brand-2.jpg')}}"
                                         alt="img">
                                </div>
                                <div class="overlay-brand">

                                </div>
                                <div class="logo-barnd-img">
                                    <img class="img-fluid" src="{{asset('new-user-side/images/brand-logo-2.png')}}"
                                         alt="img">
                                </div>
                            </li>
                            <li class="all-brand-card">
                                <div class="all-brand-img">
                                    <img class="img-fluid" src="{{asset('new-user-side/images/brand-3.jpg')}}"
                                         alt="img">
                                </div>
                                <div class="overlay-brand">

                                </div>
                                <div class="logo-barnd-img">
                                    <img class="img-fluid" src="{{asset('new-user-side/images/brand-logo-3.png')}}"
                                         alt="img">
                                </div>
                            </li>
                            <li class="all-brand-card">
                                <div class="all-brand-img">
                                    <img class="img-fluid" src="{{asset('new-user-side/images/brand-4.jpg')}}"
                                         alt="img">
                                </div>
                                <div class="overlay-brand">

                                </div>
                                <div class="logo-barnd-img">
                                    <img class="img-fluid" src="{{asset('new-user-side/images/brand-logo-4.png')}}"
                                         alt="img">
                                </div>
                            </li>
                            <li class="all-brand-card">
                                <div class="all-brand-img">
                                    <img class="img-fluid" src="{{asset('new-user-side/images/brand-5.jpg')}}"
                                         alt="img">
                                </div>
                                <div class="overlay-brand">

                                </div>
                                <div class="logo-barnd-img">
                                    <img class="img-fluid" src="{{asset('new-user-side/images/brand-logo-5.png')}}"
                                         alt="img">
                                </div>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('new-user-site.store_slider')
    <!-- carousel slider -->
    <div class="carosel-main">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="flex-carosel">
                        <div class="carosel-left">
                            <div class="caresel-logo">
                                <img class="img-fluid" src="{{asset('new-user-side/images/carosel-logo.png')}}"
                                     alt="img">
                            </div>
                            <div class="hero-heading">Up to 90% Off</div>
                            <div class="hero-text">Plus, Free Shipping &amp; Returns</div>
                            <a class="carosel-shop" href="#">SHOP NOW</a>
                        </div>


                        <div class="img-carosel">
                            <img class="img-fluid" src="{{asset('new-user-side/images/carosel-slider.jpg')}}" alt="img">
                        </div>
                    </div>

                </div>
                <div class="carousel-item">
                    <div class="flex-carosel">
                        <div class="carosel-left">
                            <div class="caresel-logo">
                                <img class="img-fluid" src="{{asset('new-user-side/images/carosellogo-2.png')}}"
                                     alt="img">
                            </div>
                            <div class="hero-heading">Up to 90% Off</div>
                            <div class="hero-text">Plus, Free Shipping &amp; Returns</div>
                            <a class="carosel-shop" href="#">SHOP NOW</a>
                        </div>


                        <div class="img-carosel">
                            <img class="img-fluid" src="{{asset('new-user-side/images/carosel-slider-2.png')}}"
                                 alt="img">
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="flex-carosel">
                        <div class="carosel-left">
                            <div class="caresel-logo">
                                <img class="img-fluid" src="{{asset('new-user-side/images/carosel-logo-3.png')}}"
                                     alt="img">
                            </div>
                            <div class="hero-heading">Up to 90% Off</div>
                            <div class="hero-text">Plus, Free Shipping &amp; Returns</div>
                            <a class="carosel-shop" href="#">SHOP NOW</a>
                        </div>


                        <div class="img-carosel">
                            <img class="img-fluid" src="{{asset('new-user-side/images/carosel-slider-3.jpg')}}"
                                 alt="img">
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <svg width="12" height="23" viewBox="0 0 12 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M12.0123 11.5123C12.01 11.777 11.9049 12.0305 11.7193 12.2193L1.71929 22.2193C1.53069 22.4014 1.27808 22.5022 1.01589 22.5C0.75369 22.4977 0.502878 22.3925 0.31747 22.2071C0.132062 22.0217 0.0268924 21.7709 0.0246139 21.5087C0.0223355 21.2465 0.12313 20.9939 0.305288 20.8053L9.59829 11.5123L0.305288 2.21929C0.209778 2.12704 0.133596 2.0167 0.0811869 1.89469C0.0287779 1.77269 0.00119157 1.64147 3.7757e-05 1.50869C-0.00111606 1.37591 0.0241854 1.24423 0.0744663 1.12134C0.124747 0.99844 0.199 0.886787 0.292893 0.792894C0.386786 0.699001 0.498438 0.624748 0.621334 0.574467C0.74423 0.524185 0.87591 0.498884 1.00869 0.500038C1.14147 0.501192 1.27269 0.52878 1.39469 0.581188C1.5167 0.633596 1.62704 0.709778 1.71929 0.805288L11.7193 10.8053C11.9049 10.9941 12.01 11.2475 12.0123 11.5123Z"
                        fill="black"></path>
                </svg>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <svg width="12" height="23" viewBox="0 0 12 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M12.0123 11.5123C12.01 11.777 11.9049 12.0305 11.7193 12.2193L1.71929 22.2193C1.53069 22.4014 1.27808 22.5022 1.01589 22.5C0.75369 22.4977 0.502878 22.3925 0.31747 22.2071C0.132062 22.0217 0.0268924 21.7709 0.0246139 21.5087C0.0223355 21.2465 0.12313 20.9939 0.305288 20.8053L9.59829 11.5123L0.305288 2.21929C0.209778 2.12704 0.133596 2.0167 0.0811869 1.89469C0.0287779 1.77269 0.00119157 1.64147 3.7757e-05 1.50869C-0.00111606 1.37591 0.0241854 1.24423 0.0744663 1.12134C0.124747 0.99844 0.199 0.886787 0.292893 0.792894C0.386786 0.699001 0.498438 0.624748 0.621334 0.574467C0.74423 0.524185 0.87591 0.498884 1.00869 0.500038C1.14147 0.501192 1.27269 0.52878 1.39469 0.581188C1.5167 0.633596 1.62704 0.709778 1.71929 0.805288L11.7193 10.8053C11.9049 10.9941 12.01 11.2475 12.0123 11.5123Z"
                        fill="black"></path>
                </svg>
            </a>
        </div>
    </div>
    <section class="spo-main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 mx-auto">
                    <div class="vp2-title">
                        Welcome to SPO!
                    </div>
                    <div class="subtitle-desktop">
                        Online sale &amp; outlet shopping. <a class="hvp-learn" href="#">Learn More</a>
                    </div>
                    <div class="flex-vp">
                        <div class="vp-para">
                                    <span><svg width="24" height="24" viewBox="0 0 20 20" fill="none"
                                               xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M8.80403 0.000903945C9.43081 -0.0141138 10.0365 0.227779 10.4804 0.670443L19.3297 9.52034C20.2234 10.4141 20.2234 11.8631 19.3297 12.7567L12.7557 19.331C11.8614 20.2233 10.4139 20.2233 9.51967 19.331L0.669976 10.4813C0.22751 10.0372 -0.0141932 9.43149 0.000645038 8.80468L0.163866 2.39373C0.194258 1.17515 1.17484 0.194704 2.39318 0.164311L8.80403 0.000903945ZM12.1085 18.6836L18.6826 12.1095C19.2178 11.5729 19.2178 10.7042 18.6826 10.1677L9.83288 1.31781C9.57491 1.06072 9.22576 0.91609 8.8616 0.915554C8.84998 0.915554 8.83871 0.915554 8.82709 0.915911L2.41642 1.07932C1.68541 1.09755 1.09725 1.68593 1.07883 2.41697L0.915612 8.82792C0.906674 9.20408 1.05184 9.56736 1.31732 9.83393L10.1668 18.6836C10.7033 19.2191 11.572 19.2191 12.1085 18.6836ZM3.77888 5.98296C3.77906 4.76599 4.76553 3.77946 5.98245 3.77946C7.19865 3.78089 8.18424 4.7667 8.18567 5.98296C8.18567 7.19993 7.19919 8.18645 5.98227 8.18645C4.76553 8.18645 3.77888 7.19993 3.77888 5.98296ZM4.6942 5.98296C4.69438 6.69433 5.27093 7.27108 5.98245 7.27108C6.69344 7.27019 7.26963 6.69397 7.27034 5.98296C7.27034 5.27158 6.69361 4.69483 5.98227 4.69483C5.27093 4.69483 4.6942 5.27158 4.6942 5.98296Z"
                                                  fill="black"></path>
                                        </svg></span>
                            <p class="vp-text">Deals on Thousands of Brands</p>
                        </div>
                        <div class="vp-para">
                                    <span>
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_4910_28718)">
                                                <path
                                                    d="M23.0498 5.29551L12.1529 0.0349148C12.0563 -0.0116789 11.9438 -0.0116789 11.8472 0.0349148L0.950199 5.29551C0.828699 5.35415 0.751495 5.47719 0.751495 5.6121V18.3878C0.751495 18.5227 0.828699 18.6458 0.950199 18.7044L11.8471 23.965C11.8954 23.9883 11.9477 24 12 24C12.0523 24 12.1045 23.9883 12.1529 23.965L23.0498 18.7044C23.1713 18.6458 23.2485 18.5227 23.2485 18.3878V5.61215C23.2485 5.47715 23.1713 5.35419 23.0498 5.29551ZM12 0.74193L22.0883 5.6121L19.1639 7.02388C19.1454 7.00977 19.1259 6.99674 19.1044 6.98638L9.08461 2.14935L12 0.74193ZM8.29064 2.54685L18.3643 7.40994L16.3011 8.40599L6.23161 3.54487L8.29064 2.54685ZM18.6 8.07688V11.7587L16.6728 12.6891V9.00725L18.6 8.07688ZM22.5454 18.1672L12.3516 23.0883V11.0933L14.7831 9.91949C14.958 9.83507 15.0313 9.62492 14.9468 9.45003C14.8624 9.27524 14.6523 9.20183 14.4774 9.2863L12 10.4823L11.0252 10.0117C10.8503 9.92717 10.6402 10.0006 10.5557 10.1754C10.4713 10.3503 10.5446 10.5605 10.7195 10.6449L11.6484 11.0933V23.0883L1.45462 18.1671V6.17221L9.21713 9.91963C9.26639 9.94344 9.31847 9.95469 9.3697 9.95469C9.50039 9.95469 9.62592 9.88147 9.68653 9.75589C9.77095 9.58105 9.69764 9.37086 9.5228 9.28644L1.9117 5.6121L5.40412 3.9261L15.9648 9.02436C15.9663 9.02652 15.9681 9.02844 15.9697 9.03055V13.2493C15.9697 13.3702 16.0319 13.4827 16.1343 13.547C16.1912 13.5828 16.2562 13.6008 16.3213 13.6008C16.3734 13.6008 16.4257 13.5892 16.4741 13.5658L19.1044 12.296C19.2259 12.2374 19.3031 12.1144 19.3031 11.9795V7.7375L22.5454 6.17226V18.1672Z"
                                                    fill="black"></path>
                                                <path
                                                    d="M4.35591 16.8037L2.75676 16.0317C2.58182 15.9472 2.37173 16.0206 2.28731 16.1955C2.20289 16.3703 2.2762 16.5805 2.45104 16.6649L4.05019 17.4369C4.09945 17.4607 4.15153 17.472 4.20276 17.472C4.33345 17.472 4.45898 17.3987 4.51959 17.2732C4.60406 17.0983 4.53075 16.8882 4.35591 16.8037Z"
                                                    fill="black"></path>
                                                <path
                                                    d="M5.82765 15.8457L2.75898 14.3643C2.58408 14.2799 2.37394 14.3532 2.28952 14.5281C2.20515 14.7029 2.27846 14.9131 2.4533 14.9975L5.52198 16.4789C5.57124 16.5027 5.62332 16.514 5.67455 16.514C5.80524 16.514 5.93077 16.4408 5.99138 16.3152C6.0758 16.1403 6.00249 15.9301 5.82765 15.8457Z"
                                                    fill="black"></path>
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_4910_28718">
                                                    <rect width="24" height="24" fill="white"></rect>
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </span>
                            <p class="vp-text">Deals on Thousands of Brands</p>
                        </div>
                        <div class="vp-para">
                                    <span>
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_4910_28715)">
                                                <path
                                                    d="M10.509 5.44111C10.6344 5.44111 10.7526 5.38191 10.8275 5.28137C10.9026 5.18084 10.9259 5.05099 10.8902 4.93066C10.6053 3.95769 10.1129 3.05809 9.44657 2.29415C8.90972 1.72295 8.11066 1.4784 7.34614 1.65133C7.24056 1.6917 7.15729 1.77516 7.11692 1.88074C7.09499 1.94014 7.07869 2.00147 7.0684 2.06396C7.05617 2.13811 7.04957 2.21302 7.04841 2.28814V2.29454C7.05326 2.92844 7.30868 3.53477 7.75916 3.98098C8.5231 4.6467 9.42211 5.13891 10.3945 5.42364C10.4318 5.43471 10.4702 5.44072 10.509 5.44111ZM8.3228 3.41812C8.165 3.26013 8.04117 3.07129 7.95869 2.86361V2.85973C7.94122 2.81567 7.92608 2.77142 7.91307 2.72891C7.90628 2.70582 7.90143 2.68408 7.89561 2.66137C7.88959 2.63866 7.88435 2.62158 7.88047 2.60178C7.87639 2.58179 7.87562 2.57384 7.8729 2.55967C7.86125 2.50028 7.8531 2.4403 7.84864 2.37994C8.2407 2.40964 8.60888 2.57888 8.88682 2.85701C9.28198 3.3038 9.60048 3.8129 9.82931 4.36392C9.27771 4.13431 8.76784 3.81465 8.32085 3.41812H8.3228Z"
                                                    fill="black"></path>
                                                <path
                                                    d="M22.7081 5.7153H16.5723C16.8377 5.53402 17.0869 5.33003 17.3169 5.10586C18.7388 3.6797 18.7853 1.51735 17.877 0.60902C16.9687 -0.299314 14.8071 -0.253509 13.3794 1.16994C12.7956 1.80538 12.3212 2.53321 11.9757 3.32393C11.6303 2.53263 11.1555 1.80441 10.5711 1.16877C9.14495 -0.253121 6.9828 -0.299702 6.07427 0.608632C5.16555 1.51697 5.21252 3.67931 6.63461 5.10586C6.8648 5.33003 7.11401 5.53402 7.37913 5.7153H1.2434C1.02389 5.7153 0.845909 5.89328 0.845909 6.11279V10.0877C0.845909 10.3072 1.02389 10.4852 1.2434 10.4852H2.03839V22.0125C2.03975 23.1095 2.92887 23.9986 4.02586 24H19.9256C21.0228 23.9986 21.9119 23.1095 21.9131 22.0125V10.4852H22.7081C22.9276 10.4852 23.1056 10.3072 23.1056 10.0877V6.11279C23.1056 5.89328 22.9276 5.7153 22.7081 5.7153ZM13.9419 1.73163C15.0843 0.592717 16.7505 0.605915 17.3153 1.17071C17.8801 1.73551 17.8937 3.40098 16.7548 4.54378C16.2333 5.02589 15.6378 5.42125 14.9911 5.7153H12.6158C12.6158 5.70695 12.6158 5.69783 12.6158 5.68948C12.6158 5.59884 12.609 5.50704 12.6003 5.41465C12.597 5.38418 12.5935 5.3539 12.59 5.32285C12.5809 5.24657 12.5696 5.17049 12.5561 5.0948C12.5518 5.06821 12.5473 5.04142 12.5427 5.01522C12.5236 4.91623 12.5029 4.8188 12.479 4.72467C12.4759 4.71108 12.4722 4.69924 12.4691 4.68488C12.448 4.60259 12.4262 4.52592 12.4039 4.44654C12.4008 4.43567 12.3979 4.42383 12.3948 4.41296C12.7205 3.42233 13.2472 2.50934 13.9419 1.73163ZM13.5657 9.69023H10.3858V6.51028H13.5657V9.69023ZM7.19707 4.54417C6.05797 3.40137 6.07136 1.7359 6.63635 1.17071C7.20115 0.605527 8.86663 0.592329 10.0086 1.73046C10.7318 2.54059 11.2739 3.49589 11.5986 4.53233C11.6435 4.67188 11.678 4.8058 11.7106 4.93584C11.7197 4.9731 11.7273 5.0092 11.7353 5.04589C11.7568 5.14293 11.7741 5.23551 11.7871 5.32421C11.7913 5.35429 11.797 5.38535 11.8005 5.41465C11.8131 5.51383 11.8199 5.61379 11.8209 5.71374H8.96037C8.31406 5.42028 7.71879 5.02551 7.19707 4.54417ZM1.6409 6.51028H9.59077V9.69023H1.6409V6.51028ZM2.83338 22.0125V10.4852H10.3858V23.205H4.02586C3.36732 23.205 2.83338 22.6711 2.83338 22.0125ZM11.1807 23.205V10.4852H12.7707V23.205H11.1807ZM21.1181 22.0125C21.1181 22.6711 20.5843 23.205 19.9256 23.205H13.5657V10.4852H21.1181V22.0125ZM22.3106 9.69023H14.3607V6.51028H22.3106V9.69023Z"
                                                    fill="black"></path>
                                                <path
                                                    d="M13.4413 5.44226C13.4795 5.44226 13.5176 5.43683 13.5543 5.42596C14.5278 5.14142 15.4278 4.64824 16.1915 3.98058C16.7571 3.43965 17.0009 2.64389 16.8355 1.87898C16.7955 1.77379 16.7123 1.69072 16.6071 1.65054C15.8422 1.48518 15.0464 1.72895 14.5055 2.29453C13.838 3.05827 13.3448 3.95826 13.0601 4.93181C13.0246 5.05214 13.0477 5.18218 13.1228 5.28253C13.1979 5.38306 13.3159 5.44226 13.4413 5.44226ZM15.0676 2.85661C15.3459 2.57868 15.7145 2.40962 16.1065 2.37954C16.0768 2.77179 15.9076 3.14056 15.6296 3.41889C15.1825 3.81677 14.6718 4.13701 14.1191 4.36662C14.3489 3.81386 14.6695 3.3036 15.0676 2.85661Z"
                                                    fill="black"></path>
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_4910_28715">
                                                    <rect width="24" height="24" fill="white"></rect>
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </span>
                            <p class="vp-text">Deals on Thousands of Brands</p>
                        </div>

                    </div>
                    <div class="d-flex align-items-center justify-content-center">
                        <button data-toggle="modal" data-target="#myModal" type="button" class="btn-sign">
                            SIGN IN OR CREATE ACCOUNT
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <section class="fragrance-mian">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-fragrance-inline">
                        <h3 class="heading-main">
                            For You
                        </h3>
                        <a href="#" class="view-all">Shop All</a>
                    </div>
                    <button class="prev-for" aria-label="Next" type="button" style="">
                        <svg width="12" height="23" viewBox="0 0 12 23" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12.0123 11.5123C12.01 11.777 11.9049 12.0305 11.7193 12.2193L1.71929 22.2193C1.53069 22.4014 1.27808 22.5022 1.01589 22.5C0.75369 22.4977 0.502878 22.3925 0.31747 22.2071C0.132062 22.0217 0.0268924 21.7709 0.0246139 21.5087C0.0223355 21.2465 0.12313 20.9939 0.305288 20.8053L9.59829 11.5123L0.305288 2.21929C0.209778 2.12704 0.133596 2.0167 0.0811869 1.89469C0.0287779 1.77269 0.00119157 1.64147 3.7757e-05 1.50869C-0.00111606 1.37591 0.0241854 1.24423 0.0744663 1.12134C0.124747 0.99844 0.199 0.886787 0.292893 0.792894C0.386786 0.699001 0.498438 0.624748 0.621334 0.574467C0.74423 0.524185 0.87591 0.498884 1.00869 0.500038C1.14147 0.501192 1.27269 0.52878 1.39469 0.581188C1.5167 0.633596 1.62704 0.709778 1.71929 0.805288L11.7193 10.8053C11.9049 10.9941 12.01 11.2475 12.0123 11.5123Z"
                                fill="black"></path>
                        </svg>
                    </button>
                    <button class="next-for" aria-label="Previous" type="button" style="">
                        <svg width="12" height="23" viewBox="0 0 12 23" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12.0123 11.5123C12.01 11.777 11.9049 12.0305 11.7193 12.2193L1.71929 22.2193C1.53069 22.4014 1.27808 22.5022 1.01589 22.5C0.75369 22.4977 0.502878 22.3925 0.31747 22.2071C0.132062 22.0217 0.0268924 21.7709 0.0246139 21.5087C0.0223355 21.2465 0.12313 20.9939 0.305288 20.8053L9.59829 11.5123L0.305288 2.21929C0.209778 2.12704 0.133596 2.0167 0.0811869 1.89469C0.0287779 1.77269 0.00119157 1.64147 3.7757e-05 1.50869C-0.00111606 1.37591 0.0241854 1.24423 0.0744663 1.12134C0.124747 0.99844 0.199 0.886787 0.292893 0.792894C0.386786 0.699001 0.498438 0.624748 0.621334 0.574467C0.74423 0.524185 0.87591 0.498884 1.00869 0.500038C1.14147 0.501192 1.27269 0.52878 1.39469 0.581188C1.5167 0.633596 1.62704 0.709778 1.71929 0.805288L11.7193 10.8053C11.9049 10.9941 12.01 11.2475 12.0123 11.5123Z"
                                fill="black"></path>
                        </svg>

                    </button>
                    <div class="fragrance-slider-for">

                        <div class="fragrance-card">
                            <div class="frag-img">
                                <img class="img-fluid" src="{{asset('new-user-side/images/fragrance-1.jpg')}}"
                                     alt="img">
                                <div class="label-frag">
                                    LUXE
                                </div>
                                <div class="just-label">
                                    Just In
                                </div>
                            </div>
                            <div class="frag-card-body">
                                <h3 class="frag-card-heading text-truncate">Moschino</h3>
                                <h3 class="infofrag text-truncate"> Bright Crystal Absolu - EDP Spray 1 OZ</h3>
                                <p class="coupen-code text-truncate">Extra 20% Off with code: JOY20</p>
                                <div class="discount-grag">
                                    <span class="d-value">$59.49</span>
                                    <span class="real-d-value">$68.00</span>
                                    <span class="d-value-off">12% off</span>
                                </div>
                            </div>
                        </div>
                        <div class="fragrance-card">
                            <div class="frag-img">
                                <img class="img-fluid" src="{{asset('new-user-side/images/fragrance-2.jpg')}}"
                                     alt="img">
                                <div class="label-frag">
                                    LUXE
                                </div>
                            </div>
                            <div class="frag-card-body">
                                <h3 class="frag-card-heading text-truncate">Moschino</h3>
                                <h3 class="infofrag text-truncate"> Bright Crystal Absolu - EDP Spray 1 OZ</h3>
                                <p class="coupen-code text-truncate">Extra 20% Off with code: JOY20</p>
                                <div class="discount-grag">
                                    <span class="d-value">$59.49</span>
                                    <span class="real-d-value">$68.00</span>
                                    <span class="d-value-off">12% off</span>
                                </div>
                            </div>
                        </div>
                        <div class="fragrance-card">
                            <div class="frag-img">
                                <img class="img-fluid" src="{{asset('new-user-side/images/fragrance-3.jpg')}}"
                                     alt="img">
                                <div class="label-frag">
                                    LUXE
                                </div>
                            </div>
                            <div class="frag-card-body">
                                <h3 class="frag-card-heading text-truncate">Moschino</h3>
                                <h3 class="infofrag text-truncate"> Bright Crystal Absolu - EDP Spray 1 OZ</h3>
                                <p class="coupen-code text-truncate">Extra 20% Off with code: JOY20</p>
                                <div class="discount-grag">
                                    <span class="d-value">$59.49</span>
                                    <span class="real-d-value">$68.00</span>
                                    <span class="d-value-off">12% off</span>
                                </div>
                            </div>
                        </div>
                        <div class="fragrance-card">
                            <div class="frag-img">
                                <img class="img-fluid" src="{{asset('new-user-side/images/fragrance-4.jpg')}}"
                                     alt="img">
                                <div class="label-frag">
                                    LUXE
                                </div>
                            </div>
                            <div class="frag-card-body">
                                <h3 class="frag-card-heading text-truncate">Moschino</h3>
                                <h3 class="infofrag text-truncate"> Bright Crystal Absolu - EDP Spray 1 OZ</h3>
                                <p class="coupen-code text-truncate">Extra 20% Off with code: JOY20</p>
                                <div class="discount-grag">
                                    <span class="d-value">$59.49</span>
                                    <span class="real-d-value">$68.00</span>
                                    <span class="d-value-off">12% off</span>
                                </div>
                            </div>
                        </div>
                        <div class="fragrance-card">
                            <div class="frag-img">
                                <img class="img-fluid" src="{{asset('new-user-side/images/fragrance-5.jpg')}}"
                                     alt="img">
                                <div class="label-frag">
                                    LUXE
                                </div>
                            </div>
                            <div class="frag-card-body">
                                <h3 class="frag-card-heading text-truncate">Moschino</h3>
                                <h3 class="infofrag text-truncate"> Bright Crystal Absolu - EDP Spray 1 OZ</h3>
                                <p class="coupen-code text-truncate">Extra 20% Off with code: JOY20</p>
                                <div class="discount-grag">
                                    <span class="d-value">$59.49</span>
                                    <span class="real-d-value">$68.00</span>
                                    <span class="d-value-off">12% off</span>
                                </div>
                            </div>
                        </div>
                        <div class="fragrance-card">
                            <div class="frag-img">
                                <img class="img-fluid" src="{{asset('new-user-side/images/fragrance-1.jpg')}}"
                                     alt="img">
                                <div class="label-frag">
                                    LUXE
                                </div>
                            </div>
                            <div class="frag-card-body">
                                <h3 class="frag-card-heading text-truncate">Moschino</h3>
                                <h3 class="infofrag text-truncate"> Bright Crystal Absolu - EDP Spray 1 OZ</h3>
                                <p class="coupen-code text-truncate">Extra 20% Off with code: JOY20</p>
                                <div class="discount-grag">
                                    <span class="d-value">$59.49</span>
                                    <span class="real-d-value">$68.00</span>
                                    <span class="d-value-off">12% off</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="boss-banner">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="">
                        <div class="img-boss">

                            <div class="overlay-img"></div>
                        </div>
                        <div class="boss-position">
                            <div class="img-hu-boss">
                                <img class="img-fluid" src="{{asset('new-user-side/images/hugo-boss-white-logo.png')}}"
                                     alt="img">
                            </div>
                            <div class="hp-spot-header">Up to 40% Off</div>
                            <div class="hp-spot-sub">Select Styles</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('new-user-site.feature_deal')

    <section class="fragrance-mian">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-fragrance-inline">
                        <h3 class="heading-main">
                            Extra 20% Off Designer Fragrances
                        </h3>
                        <a href="#" class="view-all">Shop All</a>
                    </div>
                    <button class="prev-extra" aria-label="Next" type="button" style="">
                        <svg width="12" height="23" viewBox="0 0 12 23" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12.0123 11.5123C12.01 11.777 11.9049 12.0305 11.7193 12.2193L1.71929 22.2193C1.53069 22.4014 1.27808 22.5022 1.01589 22.5C0.75369 22.4977 0.502878 22.3925 0.31747 22.2071C0.132062 22.0217 0.0268924 21.7709 0.0246139 21.5087C0.0223355 21.2465 0.12313 20.9939 0.305288 20.8053L9.59829 11.5123L0.305288 2.21929C0.209778 2.12704 0.133596 2.0167 0.0811869 1.89469C0.0287779 1.77269 0.00119157 1.64147 3.7757e-05 1.50869C-0.00111606 1.37591 0.0241854 1.24423 0.0744663 1.12134C0.124747 0.99844 0.199 0.886787 0.292893 0.792894C0.386786 0.699001 0.498438 0.624748 0.621334 0.574467C0.74423 0.524185 0.87591 0.498884 1.00869 0.500038C1.14147 0.501192 1.27269 0.52878 1.39469 0.581188C1.5167 0.633596 1.62704 0.709778 1.71929 0.805288L11.7193 10.8053C11.9049 10.9941 12.01 11.2475 12.0123 11.5123Z"
                                fill="black"></path>
                        </svg>
                    </button>
                    <button class="next-extra" aria-label="Previous" type="button" style="">
                        <svg width="12" height="23" viewBox="0 0 12 23" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12.0123 11.5123C12.01 11.777 11.9049 12.0305 11.7193 12.2193L1.71929 22.2193C1.53069 22.4014 1.27808 22.5022 1.01589 22.5C0.75369 22.4977 0.502878 22.3925 0.31747 22.2071C0.132062 22.0217 0.0268924 21.7709 0.0246139 21.5087C0.0223355 21.2465 0.12313 20.9939 0.305288 20.8053L9.59829 11.5123L0.305288 2.21929C0.209778 2.12704 0.133596 2.0167 0.0811869 1.89469C0.0287779 1.77269 0.00119157 1.64147 3.7757e-05 1.50869C-0.00111606 1.37591 0.0241854 1.24423 0.0744663 1.12134C0.124747 0.99844 0.199 0.886787 0.292893 0.792894C0.386786 0.699001 0.498438 0.624748 0.621334 0.574467C0.74423 0.524185 0.87591 0.498884 1.00869 0.500038C1.14147 0.501192 1.27269 0.52878 1.39469 0.581188C1.5167 0.633596 1.62704 0.709778 1.71929 0.805288L11.7193 10.8053C11.9049 10.9941 12.01 11.2475 12.0123 11.5123Z"
                                fill="black"></path>
                        </svg>

                    </button>
                    <div class="fragrance-slider-extra">

                        <div class="fragrance-card">
                            <div class="frag-img">
                                <img class="img-fluid" src="{{asset('new-user-side/images/fragrance-1.jpg')}}"
                                     alt="img">
                                <div class="label-frag">
                                    LUXE
                                </div>
                                <div class="just-label">
                                    Just In
                                </div>
                            </div>
                            <div class="frag-card-body">
                                <h3 class="frag-card-heading text-truncate">Moschino</h3>
                                <h3 class="infofrag text-truncate"> Bright Crystal Absolu - EDP Spray 1 OZ</h3>
                                <p class="coupen-code text-truncate">Extra 20% Off with code: JOY20</p>
                                <div class="discount-grag">
                                    <span class="d-value">$59.49</span>
                                    <span class="real-d-value">$68.00</span>
                                    <span class="d-value-off">12% off</span>
                                </div>
                            </div>
                        </div>
                        <div class="fragrance-card">
                            <div class="frag-img">
                                <img class="img-fluid" src="{{asset('new-user-side/images/fragrance-2.jpg')}}"
                                     alt="img">
                                <div class="label-frag">
                                    LUXE
                                </div>
                            </div>
                            <div class="frag-card-body">
                                <h3 class="frag-card-heading text-truncate">Moschino</h3>
                                <h3 class="infofrag text-truncate"> Bright Crystal Absolu - EDP Spray 1 OZ</h3>
                                <p class="coupen-code text-truncate">Extra 20% Off with code: JOY20</p>
                                <div class="discount-grag">
                                    <span class="d-value">$59.49</span>
                                    <span class="real-d-value">$68.00</span>
                                    <span class="d-value-off">12% off</span>
                                </div>
                            </div>
                        </div>
                        <div class="fragrance-card">
                            <div class="frag-img">
                                <img class="img-fluid" src="{{asset('new-user-side/images/fragrance-3.jpg')}}"
                                     alt="img">
                                <div class="label-frag">
                                    LUXE
                                </div>
                            </div>
                            <div class="frag-card-body">
                                <h3 class="frag-card-heading text-truncate">Moschino</h3>
                                <h3 class="infofrag text-truncate"> Bright Crystal Absolu - EDP Spray 1 OZ</h3>
                                <p class="coupen-code text-truncate">Extra 20% Off with code: JOY20</p>
                                <div class="discount-grag">
                                    <span class="d-value">$59.49</span>
                                    <span class="real-d-value">$68.00</span>
                                    <span class="d-value-off">12% off</span>
                                </div>
                            </div>
                        </div>
                        <div class="fragrance-card">
                            <div class="frag-img">
                                <img class="img-fluid" src="{{asset('new-user-side/images/fragrance-4.jpg')}}"
                                     alt="img">
                                <div class="label-frag">
                                    LUXE
                                </div>
                            </div>
                            <div class="frag-card-body">
                                <h3 class="frag-card-heading text-truncate">Moschino</h3>
                                <h3 class="infofrag text-truncate"> Bright Crystal Absolu - EDP Spray 1 OZ</h3>
                                <p class="coupen-code text-truncate">Extra 20% Off with code: JOY20</p>
                                <div class="discount-grag">
                                    <span class="d-value">$59.49</span>
                                    <span class="real-d-value">$68.00</span>
                                    <span class="d-value-off">12% off</span>
                                </div>
                            </div>
                        </div>
                        <div class="fragrance-card">
                            <div class="frag-img">
                                <img class="img-fluid" src="{{asset('new-user-side/images/fragrance-5.jpg')}}"
                                     alt="img">
                                <div class="label-frag">
                                    LUXE
                                </div>
                            </div>
                            <div class="frag-card-body">
                                <h3 class="frag-card-heading text-truncate">Moschino</h3>
                                <h3 class="infofrag text-truncate"> Bright Crystal Absolu - EDP Spray 1 OZ</h3>
                                <p class="coupen-code text-truncate">Extra 20% Off with code: JOY20</p>
                                <div class="discount-grag">
                                    <span class="d-value">$59.49</span>
                                    <span class="real-d-value">$68.00</span>
                                    <span class="d-value-off">12% off</span>
                                </div>
                            </div>
                        </div>
                        <div class="fragrance-card">
                            <div class="frag-img">
                                <img class="img-fluid" src="{{asset('new-user-side/images/fragrance-1.jpg')}}"
                                     alt="img">
                                <div class="label-frag">
                                    LUXE
                                </div>
                            </div>
                            <div class="frag-card-body">
                                <h3 class="frag-card-heading text-truncate">Moschino</h3>
                                <h3 class="infofrag text-truncate"> Bright Crystal Absolu - EDP Spray 1 OZ</h3>
                                <p class="coupen-code text-truncate">Extra 20% Off with code: JOY20</p>
                                <div class="discount-grag">
                                    <span class="d-value">$59.49</span>
                                    <span class="real-d-value">$68.00</span>
                                    <span class="d-value-off">12% off</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('new-user-site.category')

    <section class="collection-main">
        <div class="container-fluid">
            <div class="row align-ajust">
                <div class="col-md-3">
                    <div class="collection-left">
                        <h3 class="collection-heading">
                            Collections
                        </h3>
                        <div class="collection-text-box">
                            <p class="para-collection">

                                Discover curated styles and deals from your favorite stores and designers.

                            </p>
                        </div>

                    </div>
                </div>
                <div class="col-md-9">
                    <button class="prev-1" aria-label="Next" type="button" style="">
                        <svg width="12" height="23" viewBox="0 0 12 23" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12.0123 11.5123C12.01 11.777 11.9049 12.0305 11.7193 12.2193L1.71929 22.2193C1.53069 22.4014 1.27808 22.5022 1.01589 22.5C0.75369 22.4977 0.502878 22.3925 0.31747 22.2071C0.132062 22.0217 0.0268924 21.7709 0.0246139 21.5087C0.0223355 21.2465 0.12313 20.9939 0.305288 20.8053L9.59829 11.5123L0.305288 2.21929C0.209778 2.12704 0.133596 2.0167 0.0811869 1.89469C0.0287779 1.77269 0.00119157 1.64147 3.7757e-05 1.50869C-0.00111606 1.37591 0.0241854 1.24423 0.0744663 1.12134C0.124747 0.99844 0.199 0.886787 0.292893 0.792894C0.386786 0.699001 0.498438 0.624748 0.621334 0.574467C0.74423 0.524185 0.87591 0.498884 1.00869 0.500038C1.14147 0.501192 1.27269 0.52878 1.39469 0.581188C1.5167 0.633596 1.62704 0.709778 1.71929 0.805288L11.7193 10.8053C11.9049 10.9941 12.01 11.2475 12.0123 11.5123Z"
                                fill="black"></path>
                        </svg>
                    </button>
                    <button class="next-1" aria-label="Previous" type="button" style="">
                        <svg width="12" height="23" viewBox="0 0 12 23" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12.0123 11.5123C12.01 11.777 11.9049 12.0305 11.7193 12.2193L1.71929 22.2193C1.53069 22.4014 1.27808 22.5022 1.01589 22.5C0.75369 22.4977 0.502878 22.3925 0.31747 22.2071C0.132062 22.0217 0.0268924 21.7709 0.0246139 21.5087C0.0223355 21.2465 0.12313 20.9939 0.305288 20.8053L9.59829 11.5123L0.305288 2.21929C0.209778 2.12704 0.133596 2.0167 0.0811869 1.89469C0.0287779 1.77269 0.00119157 1.64147 3.7757e-05 1.50869C-0.00111606 1.37591 0.0241854 1.24423 0.0744663 1.12134C0.124747 0.99844 0.199 0.886787 0.292893 0.792894C0.386786 0.699001 0.498438 0.624748 0.621334 0.574467C0.74423 0.524185 0.87591 0.498884 1.00869 0.500038C1.14147 0.501192 1.27269 0.52878 1.39469 0.581188C1.5167 0.633596 1.62704 0.709778 1.71929 0.805288L11.7193 10.8053C11.9049 10.9941 12.01 11.2475 12.0123 11.5123Z"
                                fill="black"></path>
                        </svg>

                    </button>
                    <div class="collection-slider-1">
                        <div class="img-collection">
                            <img class="img-fluid" src="{{asset('new-user-side/images/collection.jpg')}}" alt="img">
                            <div class="overlay"></div>
                            <div class="heading-collsection-img">Eddie Bauer <br> Fleece</div>
                        </div>
                        <div class="img-collection">
                            <img class="img-fluid" src="{{asset('new-user-side/images/collection-1.jpg')}}" alt="img">
                            <div class="overlay"></div>
                            <div class="heading-collsection-img">Eddie Bauer <br> Fleece</div>
                        </div>
                        <div class="img-collection">
                            <img class="img-fluid" src="{{asset('new-user-side/images/collection-2.jpg')}}" alt="img">
                            <div class="overlay"></div>
                            <div class="heading-collsection-img">Eddie Bauer <br> Fleece</div>
                        </div>
                        <div class="img-collection">
                            <img class="img-fluid" src="{{asset('new-user-side/images/collection-3.jpg')}}" alt="img">
                            <div class="overlay"></div>
                            <div class="heading-collsection-img">Eddie Bauer <br> Fleece</div>
                        </div>
                        <div class="img-collection">
                            <img class="img-fluid" src="{{asset('new-user-side/images/collection-4.jpg')}}" alt="img">
                            <div class="overlay"></div>
                            <div class="heading-collsection-img">Eddie Bauer <br> Fleece</div>
                        </div>
                        <div class="img-collection">
                            <img class="img-fluid" src="{{asset('new-user-side/images/collection-5.jpg')}}" alt="img">
                            <div class="overlay"></div>
                            <div class="heading-collsection-img">Eddie Bauer <br> Fleece</div>
                        </div>
                        <div class="img-collection">

                            <!-- <div class="overlay"></div> -->
                            <div class="bg-place-holder">
                                <a class="placeholder-box" href="#">
                                    View All <br> Collections
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="fragrance-mian">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-fragrance-inline">
                        <h3 class="heading-main">
                            Trending Today
                        </h3>
                        <a href="#" class="view-all">Shop All</a>
                    </div>
                    <button class="prev-today" aria-label="Next" type="button" style="">
                        <svg width="12" height="23" viewBox="0 0 12 23" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12.0123 11.5123C12.01 11.777 11.9049 12.0305 11.7193 12.2193L1.71929 22.2193C1.53069 22.4014 1.27808 22.5022 1.01589 22.5C0.75369 22.4977 0.502878 22.3925 0.31747 22.2071C0.132062 22.0217 0.0268924 21.7709 0.0246139 21.5087C0.0223355 21.2465 0.12313 20.9939 0.305288 20.8053L9.59829 11.5123L0.305288 2.21929C0.209778 2.12704 0.133596 2.0167 0.0811869 1.89469C0.0287779 1.77269 0.00119157 1.64147 3.7757e-05 1.50869C-0.00111606 1.37591 0.0241854 1.24423 0.0744663 1.12134C0.124747 0.99844 0.199 0.886787 0.292893 0.792894C0.386786 0.699001 0.498438 0.624748 0.621334 0.574467C0.74423 0.524185 0.87591 0.498884 1.00869 0.500038C1.14147 0.501192 1.27269 0.52878 1.39469 0.581188C1.5167 0.633596 1.62704 0.709778 1.71929 0.805288L11.7193 10.8053C11.9049 10.9941 12.01 11.2475 12.0123 11.5123Z"
                                fill="black"></path>
                        </svg>
                    </button>
                    <button class="next-today" aria-label="Previous" type="button" style="">
                        <svg width="12" height="23" viewBox="0 0 12 23" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12.0123 11.5123C12.01 11.777 11.9049 12.0305 11.7193 12.2193L1.71929 22.2193C1.53069 22.4014 1.27808 22.5022 1.01589 22.5C0.75369 22.4977 0.502878 22.3925 0.31747 22.2071C0.132062 22.0217 0.0268924 21.7709 0.0246139 21.5087C0.0223355 21.2465 0.12313 20.9939 0.305288 20.8053L9.59829 11.5123L0.305288 2.21929C0.209778 2.12704 0.133596 2.0167 0.0811869 1.89469C0.0287779 1.77269 0.00119157 1.64147 3.7757e-05 1.50869C-0.00111606 1.37591 0.0241854 1.24423 0.0744663 1.12134C0.124747 0.99844 0.199 0.886787 0.292893 0.792894C0.386786 0.699001 0.498438 0.624748 0.621334 0.574467C0.74423 0.524185 0.87591 0.498884 1.00869 0.500038C1.14147 0.501192 1.27269 0.52878 1.39469 0.581188C1.5167 0.633596 1.62704 0.709778 1.71929 0.805288L11.7193 10.8053C11.9049 10.9941 12.01 11.2475 12.0123 11.5123Z"
                                fill="black"></path>
                        </svg>

                    </button>
                    <div class="fragrance-slider-today">

                        <div class="fragrance-card">
                            <div class="frag-img">
                                <img class="img-fluid" src="{{asset('new-user-side/images/fragrance-1.jpg')}}"
                                     alt="img">
                                <div class="label-frag">
                                    LUXE
                                </div>
                                <div class="just-label">
                                    Just In
                                </div>
                            </div>
                            <div class="frag-card-body">
                                <h3 class="frag-card-heading text-truncate">Moschino</h3>
                                <h3 class="infofrag text-truncate"> Bright Crystal Absolu - EDP Spray 1 OZ</h3>
                                <p class="coupen-code text-truncate">Extra 20% Off with code: JOY20</p>
                                <div class="discount-grag">
                                    <span class="d-value">$59.49</span>
                                    <span class="real-d-value">$68.00</span>
                                    <span class="d-value-off">12% off</span>
                                </div>
                            </div>
                        </div>
                        <div class="fragrance-card">
                            <div class="frag-img">
                                <img class="img-fluid" src="{{asset('new-user-side/images/fragrance-2.jpg')}}"
                                     alt="img">
                                <div class="label-frag">
                                    LUXE
                                </div>
                            </div>
                            <div class="frag-card-body">
                                <h3 class="frag-card-heading text-truncate">Moschino</h3>
                                <h3 class="infofrag text-truncate"> Bright Crystal Absolu - EDP Spray 1 OZ</h3>
                                <p class="coupen-code text-truncate">Extra 20% Off with code: JOY20</p>
                                <div class="discount-grag">
                                    <span class="d-value">$59.49</span>
                                    <span class="real-d-value">$68.00</span>
                                    <span class="d-value-off">12% off</span>
                                </div>
                            </div>
                        </div>
                        <div class="fragrance-card">
                            <div class="frag-img">
                                <img class="img-fluid" src="{{asset('new-user-side/images/fragrance-3.jpg')}}"
                                     alt="img">
                                <div class="label-frag">
                                    LUXE
                                </div>
                            </div>
                            <div class="frag-card-body">
                                <h3 class="frag-card-heading text-truncate">Moschino</h3>
                                <h3 class="infofrag text-truncate"> Bright Crystal Absolu - EDP Spray 1 OZ</h3>
                                <p class="coupen-code text-truncate">Extra 20% Off with code: JOY20</p>
                                <div class="discount-grag">
                                    <span class="d-value">$59.49</span>
                                    <span class="real-d-value">$68.00</span>
                                    <span class="d-value-off">12% off</span>
                                </div>
                            </div>
                        </div>
                        <div class="fragrance-card">
                            <div class="frag-img">
                                <img class="img-fluid" src="{{asset('new-user-side/images/fragrance-4.jpg')}}"
                                     alt="img">
                                <div class="label-frag">
                                    LUXE
                                </div>
                            </div>
                            <div class="frag-card-body">
                                <h3 class="frag-card-heading text-truncate">Moschino</h3>
                                <h3 class="infofrag text-truncate"> Bright Crystal Absolu - EDP Spray 1 OZ</h3>
                                <p class="coupen-code text-truncate">Extra 20% Off with code: JOY20</p>
                                <div class="discount-grag">
                                    <span class="d-value">$59.49</span>
                                    <span class="real-d-value">$68.00</span>
                                    <span class="d-value-off">12% off</span>
                                </div>
                            </div>
                        </div>
                        <div class="fragrance-card">
                            <div class="frag-img">
                                <img class="img-fluid" src="{{asset('new-user-side/images/fragrance-5.jpg')}}"
                                     alt="img">
                                <div class="label-frag">
                                    LUXE
                                </div>
                            </div>
                            <div class="frag-card-body">
                                <h3 class="frag-card-heading text-truncate">Moschino</h3>
                                <h3 class="infofrag text-truncate"> Bright Crystal Absolu - EDP Spray 1 OZ</h3>
                                <p class="coupen-code text-truncate">Extra 20% Off with code: JOY20</p>
                                <div class="discount-grag">
                                    <span class="d-value">$59.49</span>
                                    <span class="real-d-value">$68.00</span>
                                    <span class="d-value-off">12% off</span>
                                </div>
                            </div>
                        </div>
                        <div class="fragrance-card">
                            <div class="frag-img">
                                <img class="img-fluid" src="{{asset('new-user-side/images/fragrance-1.jpg')}}"
                                     alt="img">
                                <div class="label-frag">
                                    LUXE
                                </div>
                            </div>
                            <div class="frag-card-body">
                                <h3 class="frag-card-heading text-truncate">Moschino</h3>
                                <h3 class="infofrag text-truncate"> Bright Crystal Absolu - EDP Spray 1 OZ</h3>
                                <p class="coupen-code text-truncate">Extra 20% Off with code: JOY20</p>
                                <div class="discount-grag">
                                    <span class="d-value">$59.49</span>
                                    <span class="real-d-value">$68.00</span>
                                    <span class="d-value-off">12% off</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="brands">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="flex-brands">
                        <a class="brands-img" href="#">
                            <img class="img-fluid" src="{{asset('new-user-side/images/brand-1.png')}}" alt="img">
                        </a>
                        <a class="brands-img" href="#">
                            <img class="img-fluid" src="{{asset('new-user-side/images/brand-2.png')}}" alt="img">
                        </a>

                        <a class="brands-img" href="#">
                            <img class="img-fluid" src="{{asset('new-user-side/images/brand-1.png')}}" alt="img">
                        </a>

                        <a class="brands-img" href="#">
                            <img class="img-fluid" src="{{asset('new-user-side/images/brand-2.png')}}" alt="img">
                        </a>

                    </div>
                </div>

            </div>
        </div>

    </section>
@endsection

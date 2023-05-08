<!DOCTYPE html>
<html lang="en" class="mt-front">

<head>
    <meta charset="utf-8"/>
    <title>Shop</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta content="" name="keywords"/>
    <meta content="" name="description"/>

    <!-- Main Stylesheet File -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <!-- <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet"> -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Crimson+Pro:wght@300;400;500;600;700;900&display=swap"
          rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700&display=swap"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100;300;400;500;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/feather-icons"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script> -->
    <link href="{{asset('new-user-side/css/main.css')}}" rel="stylesheet"/>
    <link href="{{asset('new-user-side/slick/slick.css')}}" rel="stylesheet"/>
    <link href="{{asset('new-user-side/slick/slick-theme.css')}}" rel="stylesheet">
    @yield('styles')
</head>

<body class="">

<div id="mySidenav" class="sidenav">

    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <div class="padds-setting">
        <a href="#" class="sign-nav">
            <p class="sign-in-link"> Sign in or join <span>SPO REWARDS</span></p>
            <svg width="8" height="15" viewBox="0 0 8 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M8.00819 7.34161C8.00665 7.5181 7.93662 7.6871 7.81286 7.81294L1.14619 14.4796C1.02046 14.601 0.852056 14.6682 0.677258 14.6667C0.50246 14.6652 0.335252 14.5951 0.211646 14.4715C0.0880411 14.3479 0.0179282 14.1807 0.0164093 14.0059C0.0148904 13.8311 0.0820869 13.6627 0.203526 13.5369L6.39886 7.34161L0.203526 1.14628C0.139852 1.08478 0.0890639 1.01121 0.0541246 0.929878C0.0191852 0.848542 0.000794382 0.761062 2.51714e-05 0.672543C-0.00074404 0.584023 0.0161236 0.496237 0.0496442 0.414307C0.0831648 0.332376 0.132667 0.25794 0.195262 0.195345C0.257857 0.13275 0.332292 0.0832472 0.414223 0.0497265C0.496154 0.0162058 0.58394 -0.00066185 0.67246 0.000107765C0.760979 0.000876427 0.848459 0.019268 0.929795 0.0542078C1.01113 0.0891466 1.08469 0.139935 1.14619 0.203608L7.81286 6.87027C7.93662 6.99612 8.00665 7.16511 8.00819 7.34161Z"
                    fill="#BDBDBD"></path>
            </svg>
        </a>
        <div class="store-az-box">
            <a href="{{route('home.brands')}}" class="storea-nave">
                <div class="left-stores-contant">
                    <p class="first-h">A-Z Stores</p>
                    <p class="sect-h">Shop your favorite stores</p>
                </div>
                <svg width="8" height="15" viewBox="0 0 8 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M8.00819 7.34161C8.00665 7.5181 7.93662 7.6871 7.81286 7.81294L1.14619 14.4796C1.02046 14.601 0.852056 14.6682 0.677258 14.6667C0.50246 14.6652 0.335252 14.5951 0.211646 14.4715C0.0880411 14.3479 0.0179282 14.1807 0.0164093 14.0059C0.0148904 13.8311 0.0820869 13.6627 0.203526 13.5369L6.39886 7.34161L0.203526 1.14628C0.139852 1.08478 0.0890639 1.01121 0.0541246 0.929878C0.0191852 0.848542 0.000794382 0.761062 2.51714e-05 0.672543C-0.00074404 0.584023 0.0161236 0.496237 0.0496442 0.414307C0.0831648 0.332376 0.132667 0.25794 0.195262 0.195345C0.257857 0.13275 0.332292 0.0832472 0.414223 0.0497265C0.496154 0.0162058 0.58394 -0.00066185 0.67246 0.000107765C0.760979 0.000876427 0.848459 0.019268 0.929795 0.0542078C1.01113 0.0891466 1.08469 0.139935 1.14619 0.203608L7.81286 6.87027C7.93662 6.99612 8.00665 7.16511 8.00819 7.34161Z"
                        fill="#BDBDBD"></path>
                </svg>
            </a>
            @foreach(\App\Models\Category::categories() as $category)
                <a href="{{route('home.category-products',['id'=> $category->id])}}" class="store-side-card">
                    <div class="img-left-store">
                        <img class="img-fluid" src="{{asset('new-user-side/images/women-side.png')}}" alt="img">
                    </div>
                    <div class="gender-title text-truncate">{{$category->category_name}}</div>
                    <svg width="8" height="15" viewBox="0 0 8 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M8.00819 7.34161C8.00665 7.5181 7.93662 7.6871 7.81286 7.81294L1.14619 14.4796C1.02046 14.601 0.852056 14.6682 0.677258 14.6667C0.50246 14.6652 0.335252 14.5951 0.211646 14.4715C0.0880411 14.3479 0.0179282 14.1807 0.0164093 14.0059C0.0148904 13.8311 0.0820869 13.6627 0.203526 13.5369L6.39886 7.34161L0.203526 1.14628C0.139852 1.08478 0.0890639 1.01121 0.0541246 0.929878C0.0191852 0.848542 0.000794382 0.761062 2.51714e-05 0.672543C-0.00074404 0.584023 0.0161236 0.496237 0.0496442 0.414307C0.0831648 0.332376 0.132667 0.25794 0.195262 0.195345C0.257857 0.13275 0.332292 0.0832472 0.414223 0.0497265C0.496154 0.0162058 0.58394 -0.00066185 0.67246 0.000107765C0.760979 0.000876427 0.848459 0.019268 0.929795 0.0542078C1.01113 0.0891466 1.08469 0.139935 1.14619 0.203608L7.81286 6.87027C7.93662 6.99612 8.00665 7.16511 8.00819 7.34161Z"
                            fill="#BDBDBD"></path>
                    </svg>
                </a>
            @endforeach
        </div>

        <div class="socilal-side-bar">
            <ul class="social-iocns">
                <li class="social-li">
                    <a class="social-link" href="javascript:void(0)">
                        <i class="fa fa-facebook" aria-hidden="true"></i>
                    </a>
                </li>
                <li class="social-li">
                    <a class="social-link" href="javascript:void(0)">
                        <i class="fab fa-instagram"></i>
                    </a>
                </li>
                <li class="social-li">
                    <a class="social-link" href="javascript:void(0)">
                        <i class="fab fa-twitter"></i>
                    </a>
                </li>

            </ul>
        </div>
        <div class="download-box">
            <div class="app-text1">
                Download our App!
            </div>
            <div class="app-text2">
                Another great shopping experience!
            </div>
            <div class="dflex-btnn">
                <a href="#" class="first-btn">
                    <img class="img-fluid" src="{{asset('new-user-side/images/images/app-store.svg')}}" alt="img">
                </a>
                <a href="#" class="first-btn">
                    <img class="img-fluid" src="{{asset('new-user-side/images/images/google-play.svg')}}" alt="img">
                </a>
            </div>
        </div>
    </div>
</div>
<div id="main" class="sidenavbar-ctm ">
    <!-- side-navbar -->
    @include('new-user-site.partials.header-main')
    @include('new-user-site.partials.links-section')

    @yield('content')

    @include('new-user-site.partials.footer')
</div>
<!-- The Modal -->

<div class="modal modal-sign fade" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal"><i data-feather="x"></i></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="left-modal-data">
                            <div class="get">
                                Get
                            </div>
                            <div class="Premium">
                                Premium

                            </div>
                            <div class="get">
                                Access
                            </div>
                            <p class="best-text">Sign up for early access to the best </p>
                            <p class="best-text">sales, deals, and new store arrivals.</p>
                            <div class="form-email">
                                <form action="">
                                    <input type="email" class="email-input" placeholder="Email Address">
                                    <button type="button" class="sign-modal">SUBSCRIBE AND CONTINUE SIGN UP</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">

            </div>

        </div>
    </div>
</div>

<!-- JavaScript Libraries -->
<script src="{{asset('new-user-side/js/jquery-3.5.1.slim.min.js')}}"></script>
<!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/progressbar.js/1.0.1/progressbar.min.js"></script> -->
<script src="{{asset('new-user-side/js/popover.js')}}"></script>
<script src="{{asset('new-user-side/js/bootstrap.min.js')}}"></script>
<script src="{{asset('new-user-side/slick/slick.min.js')}}"></script>
<script src="{{asset('new-user-side/js/custom.js')}}"></script>
@yield('scripts')
<script>
    $('.fragrance-slider-for').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        autoplay: false,
        autoplaySpeed: 2000,
        arrow: true,
        prevArrow: $('.prev-for'),
        nextArrow: $('.next-for'),
        // centerMode: true,
        variableWidth: true,
        // centerPadding: '0px',
        dots: false,
        responsive: [{
            breakpoint: 1450,
            settings: {
                slidesToShow: 5,
                slidesToScroll: 1,
                infinite: true,

            }
        }, {
            breakpoint: 1200,
            settings: {
                slidesToShow: 5,
                slidesToScroll: 1,
                infinite: true,

            }
        }, {
            breakpoint: 991,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
                infinite: true,
                variableWidth: false,

            }
        }, {
            breakpoint: 767,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
                infinite: true,
                variableWidth: false,

            }
        }, {
            breakpoint: 575,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
                infinite: true,
                variableWidth: false,

            }
        }, {
            breakpoint: 400,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
                infinite: true,
                variableWidth: false,

            }
        },
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });
    $('.fragrance-slider-extra').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        autoplay: false,
        autoplaySpeed: 2000,
        arrow: true,
        prevArrow: $('.prev-extra'),
        nextArrow: $('.next-extra'),
        // centerMode: true,
        variableWidth: true,
        // centerPadding: '0px',
        dots: false,
        responsive: [{
            breakpoint: 1450,
            settings: {
                slidesToShow: 5,
                slidesToScroll: 1,
                infinite: true,

            }
        }, {
            breakpoint: 1200,
            settings: {
                slidesToShow: 5,
                slidesToScroll: 1,
                infinite: true,

            }
        }, {
            breakpoint: 991,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
                infinite: true,
                variableWidth: false,

            }
        }, {
            breakpoint: 767,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
                infinite: true,
                variableWidth: false,

            }
        }, {
            breakpoint: 575,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
                infinite: true,
                variableWidth: false,

            }
        }, {
            breakpoint: 400,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
                infinite: true,
                variableWidth: false,

            }
        },
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });
    $('.fragrance-slider-today').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        autoplay: false,
        autoplaySpeed: 2000,
        arrow: true,
        prevArrow: $('.prev-today'),
        nextArrow: $('.next-today'),
        // centerMode: true,
        variableWidth: true,
        // centerPadding: '0px',
        dots: false,
        responsive: [{
            breakpoint: 1450,
            settings: {
                slidesToShow: 5,
                slidesToScroll: 1,
                infinite: true,

            }
        }, {
            breakpoint: 1200,
            settings: {
                slidesToShow: 5,
                slidesToScroll: 1,
                infinite: true,

            }
        }, {
            breakpoint: 991,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
                infinite: true,
                variableWidth: false,

            }
        }, {
            breakpoint: 767,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
                infinite: true,
                variableWidth: false,

            }
        }, {
            breakpoint: 575,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
                infinite: true,
                variableWidth: false,

            }
        }, {
            breakpoint: 400,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
                infinite: true,
                variableWidth: false,

            }
        },
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });
    $('.fragrance-slider-extra-2').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        autoplay: false,
        autoplaySpeed: 2000,
        arrow: true,
        prevArrow: $('.prev-extra-2'),
        nextArrow: $('.next-extra-2'),
        // centerMode: true,
        variableWidth: true,
        // centerPadding: '0px',
        dots: false,
        responsive: [{
            breakpoint: 1450,
            settings: {
                slidesToShow: 5,
                slidesToScroll: 1,
                infinite: true,

            }
        }, {
            breakpoint: 1200,
            settings: {
                slidesToShow: 5,
                slidesToScroll: 1,
                infinite: true,

            }
        }, {
            breakpoint: 991,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
                infinite: true,
                variableWidth: false,

            }
        }, {
            breakpoint: 767,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
                infinite: true,
                variableWidth: false,

            }
        }, {
            breakpoint: 575,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
                infinite: true,
                variableWidth: false,

            }
        }, {
            breakpoint: 400,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
                infinite: true,
                variableWidth: false,

            }
        },
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });
    $('.feautre-slider-f1').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: false,
        autoplaySpeed: 2000,
        arrow: true,
        prevArrow: $('.prev-f1'),
        nextArrow: $('.next-f1'),
        // centerMode: true,
        variableWidth: true,
        // centerPadding: '0px',
        dots: false,
        responsive: [{
            breakpoint: 1450,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
                infinite: true,

            }
        }, {
            breakpoint: 1200,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
                infinite: true,

            }
        }, {
            breakpoint: 991,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
                infinite: true,
                variableWidth: false,

            }
        }, {
            breakpoint: 767,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
                infinite: true,
                variableWidth: false,
            }
        }, {
            breakpoint: 575,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
                infinite: true,
                variableWidth: false,

            }
        }, {
            breakpoint: 400,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
                infinite: true,
                variableWidth: false,

            }
        },
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });
    $('.feautre-slider-f2').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: false,
        autoplaySpeed: 2000,
        arrow: true,
        prevArrow: $('.prev-f2'),
        nextArrow: $('.next-f2'),
        // centerMode: true,
        variableWidth: true,
        // centerPadding: '0px',
        dots: false,
        responsive: [{
            breakpoint: 1450,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
                infinite: true,

            }
        }, {
            breakpoint: 1200,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
                infinite: true,

            }
        }, {
            breakpoint: 991,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
                infinite: true,
                variableWidth: false,

            }
        }, {
            breakpoint: 767,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
                infinite: true,
                variableWidth: false,

            }
        }, {
            breakpoint: 575,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
                infinite: true,
                variableWidth: false,

            }
        }, {
            breakpoint: 400,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
                infinite: true,
                variableWidth: false,

            }
        },
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });
    $('.collection-slider-1').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: false,
        autoplaySpeed: 2000,
        arrow: true,
        prevArrow: $('.prev-1'),
        nextArrow: $('.next-1'),
        // centerMode: true,
        variableWidth: true,
        // centerPadding: '0px',
        dots: false,
        responsive: [{
            breakpoint: 1450,
            settings: {
                slidesToShow: 4,
                slidesToScroll: 1,
                infinite: true,

            }
        }, {
            breakpoint: 1200,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
                infinite: true,

            }
        }, {
            breakpoint: 991,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
                infinite: true,

            }
        }, {
            breakpoint: 767,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
                infinite: true,

            }
        }, {
            breakpoint: 575,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
                infinite: true,

            }
        }, {
            breakpoint: 400,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
                infinite: true,

            }
        },
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });

    $('.first-row').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        autoplay: true,
        autoplaySpeed: 2000,
        arrow: true,
        prevArrow: $('.prev'),
        nextArrow: $('.next'),
        // centerMode: true,
        // variableWidth: true,
        // centerPadding: '0px',
        dots: false,
        responsive: [{
            breakpoint: 1450,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true,

            }
        }, {
            breakpoint: 1200,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true,

            }
        }, {
            breakpoint: 991,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true,

            }
        }, {
            breakpoint: 767,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true,

            }
        }, {
            breakpoint: 575,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
                infinite: true,

            }
        }, {
            breakpoint: 400,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
                infinite: true,

            }
        },
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });

    $('.mobile-card-show').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        autoplay: false,
        autoplaySpeed: 2000,
        arrow: true,
        prevArrow: $('.prev-mobile'),
        nextArrow: $('.next-mobile'),
        // centerMode: true,
        variableWidth: true,
        // centerPadding: '0px',
        dots: false,
        responsive: [{
            breakpoint: 1450,
            settings: {
                slidesToShow: 5,
                slidesToScroll: 1,
                infinite: true,

            }
        }, {
            breakpoint: 1200,
            settings: {
                slidesToShow: 5,
                slidesToScroll: 1,
                infinite: true,

            }
        }, {
            breakpoint: 991,
            settings: {
                slidesToShow: 5,
                slidesToScroll: 1,
                infinite: true,
                variableWidth: false,

            }
        }, {
            breakpoint: 767,
            settings: {
                slidesToShow: 4,
                slidesToScroll: 1,
                infinite: true,
                variableWidth: false,

            }
        }, {
            breakpoint: 575,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
                infinite: true,
                variableWidth: false,

            }
        }, {
            breakpoint: 400,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
                infinite: true,
                variableWidth: false,

            }
        },
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });
</script>

</body>

</html>

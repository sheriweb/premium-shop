<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
          content="Bigdeal admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords"
          content="admin template, Bigdeal admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <title>Bigdeal - Premium Admin Template</title>
    <link rel="icon" href="{{ asset('assets/images/favicon/favicon.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon/favicon.png') }}" type="image/x-icon">
    <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet">


    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.css') }}">

    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/flag-icon.css') }}">

    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/icofont/icofont.min.css') }}">

    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.css') }}">

    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/admin.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/custom.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/js/file-upload/image-uploader.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/toastr.css') }}"/>
    <link href="{{ asset('assets/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

    @yield('style')
</head>

<body>

<!-- page-wrapper Start-->
<div class="page-wrapper">

    <!-- Page Header Start-->
    <div class="page-main-header">
        <div class="main-header-left">
            <div class="logo-wrapper">
                <a href="/admin">
                    <h5 style="text-align: center; color: blue">Shop Premeaum</h5>
                </a>
                {{--<a href="/admin">
                    <img class="blur-up lazyloaded" src="{{asset('assets/images/layout-2/logo/logo.png')}}" alt="">
                </a>--}}
            </div>
        </div>
        <div class="main-header-right ">
            <div class="mobile-sidebar">
                <div class="media-body text-end switch-sm">
                    <label class="switch">
                        <input id="sidebar-toggle" type="checkbox" checked="checked"><span class="switch-state"></span>
                    </label>
                </div>
            </div>
            <div class="nav-right col">
                <ul class="nav-menus">
                    <li>
                        <form class="form-inline search-form">
                            <div class="form-group">
                                <input class="form-control-plaintext" type="search" placeholder="Search.."><span
                                    class="d-sm-none mobile-search"><i data-feather="search"></i></span>
                            </div>
                        </form>
                    </li>

                    <li><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i
                                data-feather="maximize"></i></a></li>
                    <li class="onhover-dropdown">
                        <div class="media align-items-center"><img
                                class="align-self-center pull-right img-50 rounded-circle blur-up lazyloaded"
                                src="" alt="header-user">
                            <div class="dotted-animation"><span class="animate-circle"></span><span
                                    class="main-circle"></span></div>
                        </div>
                        <ul class="profile-dropdown onhover-show-div p-20 profile-dropdown-hover">
                            <li><a href="javascript:void(0)">Profile<span class="pull-right"><i data-feather="user"></i></span></a>
                            </li>
                            <li><a href="javascript:void(0)">Inbox<span class="pull-right"><i
                                            data-feather="mail"></i></span></a></li>
                            <li><a href="javascript:void(0)">Taskboard<span class="pull-right"><i
                                            data-feather="file-text"></i></span></a></li>
                            <li><a href="javascript:void(0)">Settings<span class="pull-right"><i
                                            data-feather="settings"></i></span></a></li>
                            <li><a href="javascript:void(0)">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf


                                        <button class="btn btn-light">{{ __('Log Out') }}</button>

                                    </form>
                                    <span class="pull-right"><idata-feather="settings"></i></span></a></li>
                        </ul>
                    </li>
                </ul>
                <div class="d-lg-none mobile-toggle pull-right"><i data-feather="more-horizontal"></i></div>
            </div>
        </div>
    </div>
    <!-- Page Header Ends -->

    <!-- Page Body Start-->
    <div class="page-body-wrapper">

        <!-- Page Sidebar Start-->
        <div class="page-sidebar">
            <div class="sidebar custom-scrollbar">
                <div class="sidebar-user text-center">
                    <div><img class="img-60 rounded-circle lazyloaded blur-up"
                              src="{{asset('assets/images/layout-2/logo/shop-pemeaumn1.jpg')}}"
                              alt="#">
                    </div>
                    <br>
                    <p>Shop Premium</p>
                </div>
                <ul class="sidebar-menu">
                    <li><a class="sidebar-header" href="/admin"><i
                                data-feather="home"></i><span>Dashboard</span></a></li>
                    <li><a class="sidebar-header" href="javascript:void(0)"><i data-feather="box"></i>
                            <span>Products</span><i class="fa fa-angle-right pull-right"></i></a>
                        <ul class="sidebar-submenu">
                            {{--                            <li>--}}
                            {{--                                <a href="javascript:void(0)"><i class="fa fa-circle"></i>--}}
                            {{--                                    <span>Physical</span> <i class="fa fa-angle-right pull-right"></i>--}}
                            {{--                                </a>--}}
                            {{--                                <ul class="sidebar-submenu">--}}
                            <li><a href="/category"><i class="fa fa-circle"></i>Category</a></li>
                            <li><a href="/sub-category"><i class="fa fa-circle"></i>Sub Category</a></li>
                            <li><a href="/add-product"><i class="fa fa-circle"></i>Add home product</a></li>
                            <li><a href="/products"><i class="fa fa-circle"></i>Home product List</a></li>
                            <li><a href="/add-general-product"><i class="fa fa-circle"></i>Add general product</a></li>
                            <li><a href="/general-products"><i class="fa fa-circle"></i>General product list</a></li>
                            <li><a href="/color/list"><i class="fa fa-circle"></i>Color</a></li>
                            <li><a href="/size/list"><i class="fa fa-circle"></i>Size</a></li>
                            <li><a href="/import-products"><i class="fa fa-circle"></i>Import products</a></li>
                        </ul>
                    </li>

                    <li><a class="sidebar-header" href=""><i data-feather="dollar-sign"></i><span>Sales</span><i
                                class="fa fa-angle-right pull-right"></i></a>
                        <ul class="sidebar-submenu">
                            <li><a href="admin/orders"><i class="fa fa-circle"></i>Orders</a></li>
                            {{--                            <li><a href="transactions.html"><i class="fa fa-circle"></i>Transactions</a></li>--}}
                        </ul>
                    </li>

                    <li>
                        <a class="sidebar-header" href=""><i data-feather="tag"></i><span>Blogs</span><i
                                class="fa fa-angle-right pull-right"></i></a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{ route('add.blog') }}"><i class="fa fa-circle"></i>Add Blog</a></li>
                            <li><a href="{{ route('blog.show') }}"><i class="fa fa-circle"></i>Blog List</a></li>
                        </ul>
                    </li>

                    <li>
                        <a class="sidebar-header" href=""><i data-feather="tag"></i><span>Stores</span><i
                                class="fa fa-angle-right pull-right"></i></a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{ route('add.blog') }}"><i class="fa fa-circle"></i>Add Store</a></li>
                            <li><a href="{{ route('store-list') }}"><i class="fa fa-circle"></i>Store List</a></li>
                        </ul>
                    </li>
                    {{--                    <li>--}}
                    {{--                        <a class="sidebar-header" href="javascript:void(0)"><i--}}
                    {{--                                data-feather="clipboard"></i><span>Pages</span><i--}}
                    {{--                                class="fa fa-angle-right pull-right"></i></a>--}}
                    {{--                        <ul class="sidebar-submenu">--}}
                    {{--                            <li><a href="pages-list.html"><i class="fa fa-circle"></i>List Page</a></li>--}}
                    {{--                            <li><a href="page-create.html"><i class="fa fa-circle"></i>Create Page</a></li>--}}
                    {{--                        </ul>--}}
                    {{--                    </li>--}}
                    {{--                    <li>--}}
                    {{--                        <a class="sidebar-header" href="media.html"><i data-feather="camera"></i><span>Media</span></a>--}}
                    {{--                    </li>--}}
                    {{--                    <li>--}}
                    {{--                        <a class="sidebar-header" href="javascript:void(0)"><i--}}
                    {{--                                data-feather="align-left"></i><span>Menus</span><i--}}
                    {{--                                class="fa fa-angle-right pull-right"></i></a>--}}
                    {{--                        <ul class="sidebar-submenu">--}}
                    {{--                            <li><a href="menu-list.html"><i class="fa fa-circle"></i>Menu Lists</a></li>--}}
                    {{--                            <li><a href="create-menu.html"><i class="fa fa-circle"></i>Create Menu</a></li>--}}
                    {{--                        </ul>--}}
                    {{--                    </li>--}}
                    {{--                    <li>--}}
                    {{--                        <a class="sidebar-header" href=""><i data-feather="user-plus"></i><span>Users</span><i--}}
                    {{--                                class="fa fa-angle-right pull-right"></i></a>--}}
                    {{--                        <ul class="sidebar-submenu">--}}
                    {{--                            <li><a href="user-list.html"><i class="fa fa-circle"></i>User List</a></li>--}}
                    {{--                            <li><a href="create-user.html"><i class="fa fa-circle"></i>Create User</a></li>--}}
                    {{--                        </ul>--}}
                    {{--                    </li>--}}
                    {{--                    <li>--}}
                    {{--                        <a class="sidebar-header" href=""><i data-feather="users"></i><span>Vendors</span><i--}}
                    {{--                                class="fa fa-angle-right pull-right"></i></a>--}}
                    {{--                        <ul class="sidebar-submenu">--}}
                    {{--                            <li><a href="list-vendor.html"><i class="fa fa-circle"></i>Vendor List</a></li>--}}
                    {{--                            <li><a href="create-vendors.html"><i class="fa fa-circle"></i>Create Vendor</a></li>--}}
                    {{--                        </ul>--}}
                    {{--                    </li>--}}
                    {{--                    <li>--}}
                    {{--                        <a class="sidebar-header" href=""><i data-feather="chrome"></i><span>Localization</span><i--}}
                    {{--                                class="fa fa-angle-right pull-right"></i></a>--}}
                    {{--                        <ul class="sidebar-submenu">--}}
                    {{--                            <li><a href="translations.html"><i class="fa fa-circle"></i>Translations</a></li>--}}
                    {{--                            <li><a href="currency-rates.html"><i class="fa fa-circle"></i>Currency Rates</a></li>--}}
                    {{--                            <li><a href="taxes.html"><i class="fa fa-circle"></i>Taxes</a></li>--}}
                    {{--                        </ul>--}}
                    {{--                    </li>--}}
                    {{--                    <li>--}}
                    {{--                        <a class="sidebar-header" href="reports.html"><i--}}
                    {{--                                data-feather="bar-chart"></i><span>Reports</span></a></li>--}}
                    {{--                    <li>--}}
                    {{--                        <a class="sidebar-header" href=""><i data-feather="settings"></i><span>Settings</span><i--}}
                    {{--                                class="fa fa-angle-right pull-right"></i></a>--}}
                    {{--                        <ul class="sidebar-submenu">--}}
                    {{--                            <li><a href="profile.html"><i class="fa fa-circle"></i>Profile</a></li>--}}
                    {{--                        </ul>--}}
                    {{--                    </li>--}}
                    {{--                    <li>--}}
                    {{--                        <a class="sidebar-header" href="invoice.html"><i data-feather="archive"></i><span>Invoice</span></a>--}}
                    {{--                    </li>--}}
                    {{--                    <li><a class="sidebar-header" href="login.html"><i data-feather="log-in"></i><span>Login</span></a>--}}
                    {{--                    </li>--}}
                </ul>
            </div>
        </div>
        <!-- Page Sidebar Ends-->

        <!-- Right sidebar Start-->
        {{--        <div class="right-sidebar custom-scrollbar" id="right_side_bar">--}}
        {{--            <div>--}}
        {{--                <div class="container p-0">--}}
        {{--                    <div class="modal-header p-l-20 p-r-20">--}}
        {{--                        <div class="col-sm-8 p-0">--}}
        {{--                            <h6 class="modal-title font-weight-bold">FRIEND LIST</h6>--}}
        {{--                        </div>--}}
        {{--                        <div class="col-sm-4 text-end p-0"><i class="me-2" data-feather="settings"></i></div>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--                <div class="friend-list-search mt-0">--}}
        {{--                    <input type="text" placeholder="search friend"><i class="fa fa-search"></i>--}}
        {{--                </div>--}}
        {{--                <div class="p-l-30 p-r-30">--}}
        {{--                    <div class="chat-box">--}}
        {{--                        <div class="people-list friend-list">--}}
        {{--                            <ul class="list">--}}
        {{--                                <li class="clearfix"><img class="rounded-circle user-image"--}}
        {{--                                                          src="../assets/images/dashboard/user.png" alt="">--}}
        {{--                                    <div class="status-circle online"></div>--}}
        {{--                                    <div class="about">--}}
        {{--                                        <div class="name">Vincent Porter</div>--}}
        {{--                                        <div class="status"> Online</div>--}}
        {{--                                    </div>--}}
        {{--                                </li>--}}
        {{--                                <li class="clearfix"><img class="rounded-circle user-image"--}}
        {{--                                                          src="../assets/images/dashboard/user1.jpg" alt="">--}}
        {{--                                    <div class="status-circle away"></div>--}}
        {{--                                    <div class="about">--}}
        {{--                                        <div class="name">Ain Chavez</div>--}}
        {{--                                        <div class="status"> 28 minutes ago</div>--}}
        {{--                                    </div>--}}
        {{--                                </li>--}}
        {{--                                <li class="clearfix"><img class="rounded-circle user-image"--}}
        {{--                                                          src="../assets/images/dashboard/user2.jpg" alt="">--}}
        {{--                                    <div class="status-circle online"></div>--}}
        {{--                                    <div class="about">--}}
        {{--                                        <div class="name">Kori Thomas</div>--}}
        {{--                                        <div class="status"> Online</div>--}}
        {{--                                    </div>--}}
        {{--                                </li>--}}
        {{--                                <li class="clearfix"><img class="rounded-circle user-image"--}}
        {{--                                                          src="../assets/images/dashboard/user3.jpg" alt="">--}}
        {{--                                    <div class="status-circle online"></div>--}}
        {{--                                    <div class="about">--}}
        {{--                                        <div class="name">Erica Hughes</div>--}}
        {{--                                        <div class="status"> Online</div>--}}
        {{--                                    </div>--}}
        {{--                                </li>--}}
        {{--                                <li class="clearfix"><img class="rounded-circle user-image"--}}
        {{--                                                          src="../assets/images/dashboard/man.png" alt="">--}}
        {{--                                    <div class="status-circle offline"></div>--}}
        {{--                                    <div class="about">--}}
        {{--                                        <div class="name">Ginger Johnston</div>--}}
        {{--                                        <div class="status"> 2 minutes ago</div>--}}
        {{--                                    </div>--}}
        {{--                                </li>--}}
        {{--                                <li class="clearfix"><img class="rounded-circle user-image"--}}
        {{--                                                          src="../assets/images/dashboard/user5.jpg" alt="">--}}
        {{--                                    <div class="status-circle away"></div>--}}
        {{--                                    <div class="about">--}}
        {{--                                        <div class="name">Prasanth Anand</div>--}}
        {{--                                        <div class="status"> 2 hour ago</div>--}}
        {{--                                    </div>--}}
        {{--                                </li>--}}
        {{--                                <li class="clearfix"><img class="rounded-circle user-image"--}}
        {{--                                                          src="../assets/images/dashboard/designer.jpg" alt="">--}}
        {{--                                    <div class="status-circle online"></div>--}}
        {{--                                    <div class="about">--}}
        {{--                                        <div class="name">Hileri Jecno</div>--}}
        {{--                                        <div class="status"> Online</div>--}}
        {{--                                    </div>--}}
        {{--                                </li>--}}
        {{--                                <li class="clearfix"><img class="rounded-circle user-image"--}}
        {{--                                                          src="../assets/images/dashboard/user3.jpg" alt="">--}}
        {{--                                    <div class="status-circle online"></div>--}}
        {{--                                    <div class="about">--}}
        {{--                                        <div class="name">Erica Hughes</div>--}}
        {{--                                        <div class="status"> Online</div>--}}
        {{--                                    </div>--}}
        {{--                                </li>--}}
        {{--                                <li class="clearfix"><img class="rounded-circle user-image"--}}
        {{--                                                          src="../assets/images/dashboard/man.png" alt="">--}}
        {{--                                    <div class="status-circle offline"></div>--}}
        {{--                                    <div class="about">--}}
        {{--                                        <div class="name">Ginger Johnston</div>--}}
        {{--                                        <div class="status"> 2 minutes ago</div>--}}
        {{--                                    </div>--}}
        {{--                                </li>--}}
        {{--                                <li class="clearfix"><img class="rounded-circle user-image"--}}
        {{--                                                          src="../assets/images/dashboard/user5.jpg" alt="">--}}
        {{--                                    <div class="status-circle away"></div>--}}
        {{--                                    <div class="about">--}}
        {{--                                        <div class="name">Prasanth Anand</div>--}}
        {{--                                        <div class="status"> 2 hour ago</div>--}}
        {{--                                    </div>--}}
        {{--                                </li>--}}
        {{--                                <li class="clearfix"><img class="rounded-circle user-image"--}}
        {{--                                                          src="../assets/images/dashboard/user3.jpg" alt="">--}}
        {{--                                    <div class="status-circle online"></div>--}}
        {{--                                    <div class="about">--}}
        {{--                                        <div class="name">Erica Hughes</div>--}}
        {{--                                        <div class="status"> Online</div>--}}
        {{--                                    </div>--}}
        {{--                                </li>--}}
        {{--                                <li class="clearfix"><img class="rounded-circle user-image"--}}
        {{--                                                          src="../assets/images/dashboard/man.png" alt="">--}}
        {{--                                    <div class="status-circle offline"></div>--}}
        {{--                                    <div class="about">--}}
        {{--                                        <div class="name">Ginger Johnston</div>--}}
        {{--                                        <div class="status"> 2 minutes ago</div>--}}
        {{--                                    </div>--}}
        {{--                                </li>--}}
        {{--                                <li class="clearfix"><img class="rounded-circle user-image"--}}
        {{--                                                          src="../assets/images/dashboard/user5.jpg" alt="">--}}
        {{--                                    <div class="status-circle away"></div>--}}
        {{--                                    <div class="about">--}}
        {{--                                        <div class="name">Prasanth Anand</div>--}}
        {{--                                        <div class="status"> 2 hour ago</div>--}}
        {{--                                    </div>--}}
        {{--                                </li>--}}
        {{--                            </ul>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}
        <!-- Right sidebar Ends-->

        <div class="page-body">

            @yield('content')

        </div>

        <!-- footer start-->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 footer-copyright">
                        <p class="mb-0">Copyright 2019 © Bigdeal All rights reserved.</p>
                    </div>
                    <div class="col-md-6">
                        <p class="pull-right mb-0">Hand crafted & made with<i class="fa fa-heart"></i></p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer end-->
    </div>

</div>

<!-- latest jquery-->
<script src="{{ asset('assets/js/jquery-3.3.1.min.js')}}"></script>

<script src="{{ asset('assets/js/sweetalert2V11.js') }}"></script>
<!-- Bootstrap js-->
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.js') }}"></script>
<script src="{{ asset('assets/js/datatables/jquery.dataTables.min.js')}}"></script>
<!-- feather icon js-->
<script src="{{ asset('assets/js/icons/feather-icon/feather.min.js') }}"></script>
<script src="{{ asset('assets/js/icons/feather-icon/feather-icon.js') }}"></script>

<!-- Sidebar jquery-->
<script src="{{ asset('assets/js/sidebar-menu.js') }}"></script>


<!--Customizer admin-->
<script src="{{ asset('assets/js/admin-customizer.js') }}"></script>


<!--script admin-->
<script src="{{ asset('assets/js/admin-script.js') }}"></script>

{{--<!-- datatables cdn -->--}}
<script src="{{ asset('assets/js/jquery.validate.js') }}"></script>

<!--ckeditor js-->
<script src="{{ asset('assets/js/editor/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('assets/js/editor/ckeditor/styles.js') }}"></script>
<script src="{{ asset('assets/js/editor/ckeditor/adapters/jquery.js') }}"></script>
<script src="{{ asset('assets/js/editor/ckeditor/ckeditor.custom.js') }}"></script>


<script src="{{ asset('assets/js/global-functions.js') }}"></script>

@yield('script')

<script src="{{ asset('assets/js/file-upload/image-uploader.js') }}"></script>
<script src="{{ asset('assets/js/file-upload/feature-image-upload.js') }}"></script>

<script src="{{ asset('assets/js/toastr.min.js') }}"></script>

</body>
</html>

<div class="links-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 over-flow-sett">
                <div class="main-header-links">
                    <div class="links-left-box">
                        <nav class="navbar">
                            <!-- Links -->
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#">Stores</a>
                                    <!-- dropdown 2 -->
                                    <ul class="third-dropdown-menu d-flex">
                                        <li class="nav-item-3">
                                            <div class="img-dropdown">
                                                <img src="{{asset('new-user-side/images/dropdown-img.jpg')}}"
                                                     class="img-fluid" alt="img">
                                            </div>
                                        </li>
                                        <li class="nav-item-3">
                                            <div class="menu-cate-heading text-left pb-3">Major Kitchen
                                                Appliances
                                            </div>
                                            <a href="#" class="nav-link-3">Refrigerators</a>
                                            <a href="#" class="nav-link-3">Dishwasher</a>
                                            <a href="#" class="nav-link-3">Ranges</a>
                                            <a href="#" class="nav-link-3">Cooktops</a>
                                            <a href="#" class="nav-link-3">Wall Ovens</a>
                                            <a href="#" class="nav-link-3">Range Hoods & Ventilations</a>
                                            <a href="#" class="nav-link-3">Microwaves</a>
                                            <a href="#" class="nav-link-3">Freezers & Ice Makers</a>
                                        </li>
                                        <li class="nav-item-3">
                                            <div class="menu-cate-heading text-left pb-3">Small Kitchen
                                                Appliances
                                            </div>
                                            <a href="#" class="nav-link-3">Coffee, Tea & Espresso</a>
                                            <a href="#" class="nav-link-3">Mixers</a>
                                            <a href="#" class="nav-link-3">Blenders & Juicers</a>
                                            <a href="#" class="nav-link-3">Microwaves</a>
                                            <a href="#" class="nav-link-3">Mini Fridges</a>
                                            <a href="#" class="nav-link-3">Air Fryers & Deep Fryers</a>
                                            <a href="#" class="nav-link-3">Toasters & Pizza Ovens</a>
                                            <a href="#" class="nav-link-3">Pressure Cookers</a>
                                            <a href="#" class="nav-link-3">Small Kitchen Appliance</a>
                                        </li>
                                        <li class="nav-item-3">
                                            <div class="menu-cate-heading text-left pb-3">Heating, Cooling & Air
                                                Quality
                                            </div>
                                            <a href="#" class="nav-link-3">Air conditioners</a>
                                            <a href="#" class="nav-link-3">Air Purifiers</a>
                                            <a href="#" class="nav-link-3">Humidifiers</a>
                                            <a href="#" class="nav-link-3">Space Heaters</a>
                                        </li>
                                        <li class="nav-item-3">
                                            <div class="img-dropdown">
                                                <img src="{{asset('new-user-side/images/men.png')}}"
                                                     class="img-fluid" alt="img">
                                            </div>
                                        </li>
                                    </ul>
                                </li>

                                @foreach(\App\Models\Category::categoryTree() as $category)
                                    <li class="nav-item">
                                        <a class="nav-link" id="drop-m"
                                           href="{{route('home.category-products',['id'=> $category->id])}}">{{$category->category_name}}</a>
                                        <!-- dropdown 1 -->
                                        <ul class="third-dropdown-menu d-flex">
                                            <li class="nav-item-3">
                                                <div class="img-dropdown">
                                                    <img src="{{asset('new-user-side/images/dropdown-img.jpg')}}"
                                                         class="img-fluid" alt="img">
                                                </div>
                                            </li>
                                            @foreach($category->children as $childLevel)
                                                <li class="nav-item-3">
                                                    <div
                                                        class="menu-cate-heading text-left pb-3">{{$childLevel->category_name}}</div>
                                                    @foreach($childLevel->children as $subLevel)
                                                        <a href="{{route('home.category-products',['id'=> $category->id])}}"
                                                           class="nav-link-3">{{$subLevel->category_name}}</a>
                                                    @endforeach
                                                </li>
                                            @endforeach

                                            <li class="nav-item-3">
                                                <div class="img-dropdown">
                                                    <img src="{{asset('new-user-side/images/men.png')}}"
                                                         class="img-fluid" alt="img">
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                @endforeach
                            </ul>
                        </nav>
                    </div>
                    <div class="links-right-box">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link active" href="#">Collections</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Looks</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Livestreams</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

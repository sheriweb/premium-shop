<section class="all-brands">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="all-brand-slider">
                    <button class="prev" aria-label="Next" type="button" style="">
                        <svg width="12" height="23" viewBox="0 0 12 23" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12.0123 11.5123C12.01 11.777 11.9049 12.0305 11.7193 12.2193L1.71929 22.2193C1.53069 22.4014 1.27808 22.5022 1.01589 22.5C0.75369 22.4977 0.502878 22.3925 0.31747 22.2071C0.132062 22.0217 0.0268924 21.7709 0.0246139 21.5087C0.0223355 21.2465 0.12313 20.9939 0.305288 20.8053L9.59829 11.5123L0.305288 2.21929C0.209778 2.12704 0.133596 2.0167 0.0811869 1.89469C0.0287779 1.77269 0.00119157 1.64147 3.7757e-05 1.50869C-0.00111606 1.37591 0.0241854 1.24423 0.0744663 1.12134C0.124747 0.99844 0.199 0.886787 0.292893 0.792894C0.386786 0.699001 0.498438 0.624748 0.621334 0.574467C0.74423 0.524185 0.87591 0.498884 1.00869 0.500038C1.14147 0.501192 1.27269 0.52878 1.39469 0.581188C1.5167 0.633596 1.62704 0.709778 1.71929 0.805288L11.7193 10.8053C11.9049 10.9941 12.01 11.2475 12.0123 11.5123Z"
                                fill="black"></path>
                        </svg>
                    </button>
                    <button class="next" aria-label="Previous" type="button" style="">
                        <svg width="12" height="23" viewBox="0 0 12 23" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12.0123 11.5123C12.01 11.777 11.9049 12.0305 11.7193 12.2193L1.71929 22.2193C1.53069 22.4014 1.27808 22.5022 1.01589 22.5C0.75369 22.4977 0.502878 22.3925 0.31747 22.2071C0.132062 22.0217 0.0268924 21.7709 0.0246139 21.5087C0.0223355 21.2465 0.12313 20.9939 0.305288 20.8053L9.59829 11.5123L0.305288 2.21929C0.209778 2.12704 0.133596 2.0167 0.0811869 1.89469C0.0287779 1.77269 0.00119157 1.64147 3.7757e-05 1.50869C-0.00111606 1.37591 0.0241854 1.24423 0.0744663 1.12134C0.124747 0.99844 0.199 0.886787 0.292893 0.792894C0.386786 0.699001 0.498438 0.624748 0.621334 0.574467C0.74423 0.524185 0.87591 0.498884 1.00869 0.500038C1.14147 0.501192 1.27269 0.52878 1.39469 0.581188C1.5167 0.633596 1.62704 0.709778 1.71929 0.805288L11.7193 10.8053C11.9049 10.9941 12.01 11.2475 12.0123 11.5123Z"
                                fill="black"></path>
                        </svg>
                    </button>

                    <div class="first-row">
                        <!-- ye slide move hogei -->
                        <div class="items-slider-slider">
                            <div class="block-row-1st">
                                <ul class="top-parent-ul-items">
                                    <li class="all-brand-card card-view">
                                        <div class="all-brand-img">
                                            <img class="img-fluid"
                                                 src="{{asset('new-user-side/images/brand-1.jpg')}}" alt="img">
                                        </div>
                                        <div class="overlay-brand">

                                        </div>
                                        <div class="all-store">
                                            <a href="{{ route('home.brands') }}" class="store-brand">
                                                View All Stores
                                            </a>
                                        </div>
                                    </li>
                                    @foreach($data['stores'] as $store)
                                        <li class="all-brand-card">
                                            <div class="all-brand-img">
                                                <img class="img-fluid"
                                                     src="{{asset('admin-images/store/main-images/'.$store->store_image)}}" alt="img">
                                            </div>
                                            <div class="overlay-brand">

                                            </div>
                                            <div class="just-label">
                                                Just In
                                            </div>
                                            <div class="logo-barnd-img">
                                                <img class="img-fluid"
                                                     src="{{asset('admin-images/store/thumbnail-images/'.$store->store_thumbnail)}}" alt="img">
                                            </div>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>

                        <div class="items-slider-slider">
                            <div class="block-row-1st">
                                <ul class="top-parent-ul-items">
                                    <li class="all-brand-card card-view">
                                        <div class="all-brand-img">
                                            <img class="img-fluid"
                                                 src="{{asset('new-user-side/images/brand-1.jpg')}}" alt="img">
                                        </div>
                                        <div class="overlay-brand">

                                        </div>
                                        <div class="all-store">
                                            <a href="{{ route('home.brands') }}" class="store-brand">
                                                View All Stores
                                            </a>
                                        </div>
                                    </li>

                                    @foreach($data['stores'] as $store)
                                        <li class="all-brand-card">
                                            <div class="all-brand-img">
                                                <img class="img-fluid"
                                                     src="{{asset('admin-images/store/main-images/'.$store->store_image)}}" alt="img">
                                            </div>
                                            <div class="overlay-brand">

                                            </div>
                                            <div class="just-label">
                                                Just In
                                            </div>
                                            <div class="logo-barnd-img">
                                                <img class="img-fluid"
                                                     src="{{asset('admin-images/store/thumbnail-images/'.$store->store_thumbnail)}}" alt="img">
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="first-row">
                        <!-- ye slide move hogei -->
                        <div class="items-slider-slider">
                            <div class="block-row-1st">
                                <ul class="top-parent-ul-items">
                                    @foreach($data['stores'] as $store)
                                        <li class="all-brand-card">
                                            <div class="all-brand-img">
                                                <img class="img-fluid"
                                                     src="{{asset('admin-images/store/main-images/'.$store->store_image)}}" alt="img">
                                            </div>
                                            <div class="overlay-brand">

                                            </div>
                                            <div class="just-label">
                                                Just In
                                            </div>
                                            <div class="logo-barnd-img">
                                                <img class="img-fluid"
                                                     src="{{asset('admin-images/store/thumbnail-images/'.$store->store_thumbnail)}}" alt="img">
                                            </div>
                                        </li>
                                    @endforeach
                                    <li class="all-brand-card card-view">
                                        <div class="all-brand-img">
                                            <img class="img-fluid"
                                                 src="{{asset('new-user-side/images/brand-1.jpg')}}" alt="img">
                                        </div>
                                        <div class="overlay-brand">

                                        </div>
                                        <div class="all-store">
                                            <a href="{{ route('home.brands') }}" class="store-brand">
                                                View All Stores
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="items-slider-slider">
                            <div class="block-row-1st">
                                <ul class="top-parent-ul-items">

                                    @foreach($data['stores'] as $store)
                                        <li class="all-brand-card">
                                            <div class="all-brand-img">
                                                <img class="img-fluid"
                                                     src="{{asset('admin-images/store/main-images/'.$store->store_image)}}" alt="img">
                                            </div>
                                            <div class="overlay-brand">

                                            </div>
                                            <div class="just-label">
                                                Just In
                                            </div>
                                            <div class="logo-barnd-img">
                                                <img class="img-fluid"
                                                     src="{{asset('admin-images/store/thumbnail-images/'.$store->store_thumbnail)}}" alt="img">
                                            </div>
                                        </li>
                                    @endforeach

                                    <li class="all-brand-card card-view">
                                        <div class="all-brand-img">
                                            <img class="img-fluid"
                                                 src="{{asset('new-user-side/images/brand-1.jpg')}}" alt="img">
                                        </div>
                                        <div class="overlay-brand">

                                        </div>
                                        <div class="all-store">
                                            <a href="{{ route('home.brands') }}" class="store-brand">
                                                View All Stores
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

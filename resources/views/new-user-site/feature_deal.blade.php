
<scetion class="features">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="d-fragrance-inline">
                    <h3 class="heading-main color-main">
                        Featured Deals
                    </h3>
                    <a href="#" class="view-all">VIEW All</a>
                </div>
                <div class="">
                    <button class="prev-f1" aria-label="Next" type="button" style="">
                        <svg width="12" height="23" viewBox="0 0 12 23" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12.0123 11.5123C12.01 11.777 11.9049 12.0305 11.7193 12.2193L1.71929 22.2193C1.53069 22.4014 1.27808 22.5022 1.01589 22.5C0.75369 22.4977 0.502878 22.3925 0.31747 22.2071C0.132062 22.0217 0.0268924 21.7709 0.0246139 21.5087C0.0223355 21.2465 0.12313 20.9939 0.305288 20.8053L9.59829 11.5123L0.305288 2.21929C0.209778 2.12704 0.133596 2.0167 0.0811869 1.89469C0.0287779 1.77269 0.00119157 1.64147 3.7757e-05 1.50869C-0.00111606 1.37591 0.0241854 1.24423 0.0744663 1.12134C0.124747 0.99844 0.199 0.886787 0.292893 0.792894C0.386786 0.699001 0.498438 0.624748 0.621334 0.574467C0.74423 0.524185 0.87591 0.498884 1.00869 0.500038C1.14147 0.501192 1.27269 0.52878 1.39469 0.581188C1.5167 0.633596 1.62704 0.709778 1.71929 0.805288L11.7193 10.8053C11.9049 10.9941 12.01 11.2475 12.0123 11.5123Z"
                                fill="black"></path>
                        </svg>
                    </button>
                    <button class="next-f1" aria-label="Previous" type="button" style="">
                        <svg width="12" height="23" viewBox="0 0 12 23" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12.0123 11.5123C12.01 11.777 11.9049 12.0305 11.7193 12.2193L1.71929 22.2193C1.53069 22.4014 1.27808 22.5022 1.01589 22.5C0.75369 22.4977 0.502878 22.3925 0.31747 22.2071C0.132062 22.0217 0.0268924 21.7709 0.0246139 21.5087C0.0223355 21.2465 0.12313 20.9939 0.305288 20.8053L9.59829 11.5123L0.305288 2.21929C0.209778 2.12704 0.133596 2.0167 0.0811869 1.89469C0.0287779 1.77269 0.00119157 1.64147 3.7757e-05 1.50869C-0.00111606 1.37591 0.0241854 1.24423 0.0744663 1.12134C0.124747 0.99844 0.199 0.886787 0.292893 0.792894C0.386786 0.699001 0.498438 0.624748 0.621334 0.574467C0.74423 0.524185 0.87591 0.498884 1.00869 0.500038C1.14147 0.501192 1.27269 0.52878 1.39469 0.581188C1.5167 0.633596 1.62704 0.709778 1.71929 0.805288L11.7193 10.8053C11.9049 10.9941 12.01 11.2475 12.0123 11.5123Z"
                                fill="black"></path>
                        </svg>

                    </button>
                    <div class="feautre-slider-f1">
                        @foreach($data['featureProduct'] as $featureProduct)
                            <a href="{{ route('home.product',$featureProduct['productSlug']) }}">
                            <div class="feature-card">
                                <div class="feature-img">
                                    <img src="{{asset('admin-images/attribute-images/'.$featureProduct['image'])}}" class="img-fluid"
                                         alt="img">
                                </div>
                                <div class="overlay-img"></div>
                                {{--<div class="img-logo-feature">
                                    <img class="img-fluid" src="{{$featureProduct['thumbnail_image']}}"
                                         alt="img">
                                </div>--}}
                                <div class="text-feature-box">
                                    <h3 class="extra-feature-heading">
                                        Extra 20% Off
                                    </h3>
                                    <p class="feature-text">Use Code: 123</p>
                                </div>
                            </div>
                        @endforeach

                        <div class="feature-card card-view">
                            <div class="feature-img">
                                <img src="{{asset('new-user-side/images/feature-5.png')}}" class="img-fluid"
                                     alt="img">
                            </div>
                            <div class="overlay-img">
                                <div class="bg-place-holder-feature">
                                    <a class="placeholder-box" href="#">
                                        View All <br> Collections
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</scetion>

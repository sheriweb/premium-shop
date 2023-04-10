<section class="category-main">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h3 class="heading-main-category">
                    Shop by Category
                </h3>
                <div class="category-flex">
                    @foreach($data['categories'] as $category)
                        <div class="category-card">
                            <div class="category-img">
                                <img src=" {{ URL::asset("storage/category/".$category['category_image']) }}" class="img-fluid"
                                     alt="img">
                            </div>
                            <h3 class="category-heading text-truncate">{{ $category['category_name'] }}</h3>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

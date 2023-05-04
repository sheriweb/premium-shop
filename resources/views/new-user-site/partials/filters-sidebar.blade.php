<div class="filters-sidebar" id="side-bar">
    <div class="accordions" id="accordion">
        <div class="">
            <div class="collapsibles-wrapper collapsibles-wrapper--border-bottom collapsible-trigger" id="collapsible-key-price">
                <button type="button" class="facetBtn collapsible-trigger-btn " data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Price Range
                </button>
                <span>
                                        <i class="fas fa-chevron-down"></i>
                                    </span>
            </div>

            <div id="collapseOne" class="collapse @if(@$filters['price']) show @endif" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="price-content content-div">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <div class="form-check ">
                                <input type="checkbox" name="price[]" class="form-check-input" id="price_50_100" @if(@$filters['price'] && in_array('50-100',$filters['price'])) checked @endif value="50-100" onclick="submitFilter()">
                                <label class="form-check-label" for="exampleCheck1">$50-$100</label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="form-check ">
                                <input type="checkbox" name="price[]" class="form-check-input" @if( @$filters['price'] && in_array('100-200',$filters['price'])) checked @endif value="100-200" id="price_100_200" onclick="submitFilter()">
                                <label class="form-check-label" for="exampleCheck1">$100-$200</label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="form-check ">
                                <input type="checkbox" name="price[]" @if(@$filters['price'] && in_array('200-300',$filters['price'])) checked @endif value="200-300"   class="form-check-input" id="price_200_300" onclick="submitFilter()">
                                <label class="form-check-label" for="exampleCheck1">$200-$300</label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="form-check ">
                                <input type="checkbox" name="price[]"  class="form-check-input" @if(@$filters['price'] && in_array('300-400',$filters['price'])) checked @endif value="300-400" id="price_300_400" onclick="submitFilter()">
                                <label class="form-check-label" for="exampleCheck1">$300-$400</label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="form-check ">
                                <input type="checkbox" name="price[]" @if(@$filters['price'] && in_array('400-500',$filters['price'])) checked @endif value="400-500"  class="form-check-input" id="price_400_500" onclick="submitFilter()">
                                <label class="form-check-label" for="exampleCheck1">$400-$500</label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="form-check ">
                                <input type="checkbox" name="price[]" @if(@$filters['price'] && in_array('500-1000',$filters['price'])) checked @endif value="500-1000"  class="form-check-input" id="price_500_1000" onclick="submitFilter()">
                                <label class="form-check-label" for="exampleCheck1">$500-$1000</label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="form-check ">
                                <input type="checkbox" name="price[]" @if(@$filters['price'] && in_array('1000+',$filters['price'])) checked @endif value="1000+"  class="form-check-input" id="price1000" onclick="submitFilter()">
                                <label class="form-check-label" for="exampleCheck1">$1000+</label>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="">
            <div class="collapsibles-wrapper collapsibles-wrapper--border-bottom collapsible-trigger" id="collapsible-key-color">
                <button type="button" class="facetBtn collapsible-trigger-btn " data-toggle="collapse" data-target="#keyColor" aria-expanded="true" aria-controls="collapseOne">
                    Color
                </button>
                <span>
                                        <i class="fas fa-chevron-down"></i>
                                    </span>
            </div>

            <div id="keyColor" class="collapse @if(isset($filters['color'])) show @endif" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="price-content content-div">
                    <ul class="list-group">
                        @foreach($colors as $color)
                        <li class="list-group-item">
                            <div class="form-check ">
                                <input type="checkbox" name="color[]" value="{{ $color->id }}" @if(@$filters['color'] && in_array($color->id,$filters['color'])) checked @endif  class="form-check-input" id="color_{{ $color->color_name }}"  onclick="submitFilter()">
                                <label class="form-check-label" for="exampleCheck1">{{ $color->color_name }}</label>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="">
            <div class="collapsibles-wrapper collapsibles-wrapper--border-bottom collapsible-trigger" id="collapsible-key-color">
                <button type="button" class="facetBtn collapsible-trigger-btn " data-toggle="collapse" data-target="#keySize" aria-expanded="true" aria-controls="collapseOne">
                    Size
                </button>
            </div>

            <div id="keySize" class="collapse  @if(@$filters['size']) show @endif" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="price-content content-div">
                    <ul class="list-group">
                        @foreach($sizes as $size)
                        <li class="list-group-item">
                            <div class="form-check ">
                                <input type="checkbox" name="size[]"  class="form-check-input" id="exampleCheck1" onclick="submitFilter()" value="{{ $size->id }}" @if(@$filters['size'] && in_array($size->id,$filters['size'])) checked @endif>
                                <label class="form-check-label" for="exampleCheck1">{{ $size->size }}</label>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

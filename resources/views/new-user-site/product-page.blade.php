@extends('new-user-site.dashboard')
@section('styles')
    <link href="{{asset('new-user-side/css/product-page.css')}}" rel="stylesheet">
@endsection
@section('content')
   <section id="product_page_section">
        <div class="container">
            <div class="product_page_div mt-5 mb-5">
                <div class="row">
                    <div class="col-md-7">
                        <div class="starting_slide_main">
                            <div class="product_image_main">
                                <div class="product_image">
                                    <img class="pdp-main-img" src="{{ asset('new-user-side/images/bag.png') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="product_detail_main">
                            <div class="product_name">
                                <h2>Fossil Women's Skylar Leather Satchel</h2>
                                <div class="product_price">
                                    <span class="price original_price">$65.00</span>
                                    <span class="price compare_price">$250.00</span>
                                    <span class="price price_message">74% off</span>
                                </div>
                            </div>
                            <hr class="line_break">
                            <div class="free_shipping_main d-flex align-item-center">
                                <div class="free_shipping_icon">
                                    <svg class="pdp-ship-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" data-acsb-hidden="true" data-acsb-force-hidden="true">
                                        <path d="M23.0498 5.29554L12.1529 0.0349453C12.0563 -0.0116484 11.9438 -0.0116484 11.8472 0.0349453L0.950229 5.29554C0.828729 5.35418 0.751526 5.47722 0.751526 5.61213V18.3879C0.751526 18.5228 0.828729 18.6458 0.950229 18.7045L11.8472 23.965C11.8955 23.9883 11.9478 24 12 24C12.0523 24 12.1046 23.9883 12.1529 23.965L23.0498 18.7045C23.1713 18.6458 23.2485 18.5228 23.2485 18.3879V5.61218C23.2485 5.47718 23.1713 5.35422 23.0498 5.29554ZM12 0.741961L22.0883 5.61213L19.1639 7.02391C19.1454 7.0098 19.1259 6.99677 19.1044 6.98641L9.08464 2.14938L12 0.741961ZM8.29067 2.54688L18.3643 7.40997L16.3011 8.40602L6.23164 3.5449L8.29067 2.54688ZM18.6 8.07691V11.7588L16.6728 12.6891V9.00728L18.6 8.07691ZM22.5454 18.1673L12.3516 23.0883V11.0934L14.7831 9.91952C14.958 9.8351 15.0313 9.62496 14.9469 9.45007C14.8625 9.27527 14.6523 9.20186 14.4774 9.28633L12 10.4823L11.0252 10.0117C10.8503 9.92721 10.6402 10.0006 10.5558 10.1755C10.4713 10.3503 10.5447 10.5605 10.7195 10.6449L11.6485 11.0934V23.0883L1.45465 18.1672V6.17224L9.21716 9.91966C9.26642 9.94347 9.3185 9.95472 9.36973 9.95472C9.50042 9.95472 9.62595 9.8815 9.68656 9.75592C9.77098 9.58108 9.69767 9.37089 9.52283 9.28647L1.91173 5.61213L5.40415 3.92613L15.9648 9.02439C15.9664 9.02655 15.9681 9.02847 15.9697 9.03058V13.2493C15.9697 13.3703 16.0319 13.4827 16.1344 13.5471C16.1913 13.5828 16.2562 13.6008 16.3213 13.6008C16.3734 13.6008 16.4257 13.5893 16.4741 13.5659L19.1044 12.2961C19.2259 12.2374 19.3031 12.1144 19.3031 11.9795V7.73753L22.5454 6.17229V18.1673V18.1673Z" fill="black"></path>
                                    </svg>
                                </div>
                                <div class="free_shipping_message">
                                    <div class="free_shipping_text">FREE SHIPPING & RETURNS</div>
                                    <span>Usually ships within 1-2 business days</span>
                                </div>
                            </div>
                            <hr class="line_break">
                            <div class="size_div">
                               <div class="size_text">Size</div>
                                <div class="size_items">
                                    <lable class="item">
                                        <input type="radio" name="size" value="small">
                                        Small
                                    </lable>
                                    <lable class="item">
                                        <input type="radio" name="size" value="small">
                                        Medium
                                    </lable>
                                    <lable class="item">
                                        <input type="radio" name="size" value="small">
                                        Large
                                    </lable>
                                    <lable class="item">
                                        <input type="radio" name="size" value="small">
                                        Extra Large
                                    </lable>
                                </div>

                            </div>
                            <hr class="line_break">
                            <div class="size_div">
                                <div class="size_text">Color</div>
                                <div class="size_items">
                                    <lable class="item">
                                        <input type="radio" name="size" value="small">
                                        Red
                                    </lable>
                                    <lable class="item">
                                        <input type="radio" name="size" value="small">
                                        Black
                                    </lable>
                                    <lable class="item">
                                        <input type="radio" name="size" value="small">
                                        Blue
                                    </lable>
                                    <lable class="item">
                                        <input type="radio" name="size" value="small">
                                       Yellow
                                    </lable>
                                </div>

                            </div>
                            <hr class="line_break">
                            <button type="submit" name="add" id="AddToCart-7088971481148" style="width: 100%" class="btn-primary add-to-cart " data-acsb-clickable="true" data-acsb-navigable="true" data-acsb-now-navigable="true" role="button">
                              <span id="AddToCartText-7088971481148" data-btn-text="Add to bag">
                                Add to bag
                              </span>
                            </button>
                        </div>
                        <div class="product_details">
                            <div class="details">
                                Details
                            </div>
                            <p>
                                This leather satchel features 1 zipper pocket, 2 slide pockets and an adjustable & detachable shoulder strap and 2 handles.
                            </p>
                            <ul>
                                <li>Leather, Satchel</li>
                                <li>10.5" L x 4.25" W x 9.25" H</li>
                                <li>1 Adjustable & Detachable Shoulder Strap,2 Handles</li>
                                <li>1 Adjustable & Detachable Shoulder Strap,2 Handles</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

   </section>
   <section class="more_from_this_brand">
       <div class="container-fluid">
           <div class="more_from_this_brand_main">
               <h2 class="more_brand_title">More From This Brand</h2>
           </div>
           <div class="more_brands_items mt-3 mb-5">
               <div class="brands_more_slider d-flex">
                   <div class="slider_items_more">
                       <a href="#">
                           <div class="more_slider_item">
                               <div class="item_image">
                                   <img src="{{ asset('new-user-side/images/more.png') }}" width="250">
                               </div>
                           </div>
                           <div class="product_item_detail mt-1" style="margin-left: 17px;">
                               <h3>Fossil Women's Skylar</h3>
                               <p class="product_item_detail_text" style=" font-size: 16px; margin-bottom: 0px;">This leather satchel features 1 zipper pocket</p>
                               <div class="product_price">
                                   <span class="price original_price">$65.00</span>
                                   <span class="price compare_price">$250.00</span>
                                   <span class="price price_message">74% off</span>
                               </div>
                           </div>
                       </a>
                   </div>
                   <div class="slider_items_more">
                       <a href="#">
                           <div class="more_slider_item">
                               <div class="item_image">
                                   <img src="{{ asset('new-user-side/images/more.png') }}" width="250">
                               </div>
                           </div>
                           <div class="product_item_detail mt-1" style="margin-left: 17px;">
                               <h3>Fossil Women's Skylar</h3>
                               <p class="product_item_detail_text" style=" font-size: 16px; margin-bottom: 0px;">This leather satchel features 1 zipper pocket</p>
                               <div class="product_price">
                                   <span class="price original_price">$65.00</span>
                                   <span class="price compare_price">$250.00</span>
                                   <span class="price price_message">74% off</span>
                               </div>
                           </div>
                       </a>
                   </div>
                   <div class="slider_items_more">
                       <a href="#">
                           <div class="more_slider_item">
                               <div class="item_image">
                                   <img src="{{ asset('new-user-side/images/more.png') }}" width="250">
                               </div>
                           </div>
                           <div class="product_item_detail mt-1" style="margin-left: 17px;">
                               <h3>Fossil Women's Skylar</h3>
                               <p class="product_item_detail_text" style=" font-size: 16px; margin-bottom: 0px;">This leather satchel features 1 zipper pocket</p>
                               <div class="product_price">
                                   <span class="price original_price">$65.00</span>
                                   <span class="price compare_price">$250.00</span>
                                   <span class="price price_message">74% off</span>
                               </div>
                           </div>
                       </a>
                   </div>
                   <div class="slider_items_more">
                       <a href="#">
                           <div class="more_slider_item">
                               <div class="item_image">
                                   <img src="{{ asset('new-user-side/images/more.png') }}" width="250">
                               </div>
                           </div>
                           <div class="product_item_detail mt-1" style="margin-left: 17px;">
                               <h3>Fossil Women's Skylar</h3>
                               <p class="product_item_detail_text" style=" font-size: 16px; margin-bottom: 0px;">This leather satchel features 1 zipper pocket</p>
                               <div class="product_price">
                                   <span class="price original_price">$65.00</span>
                                   <span class="price compare_price">$250.00</span>
                                   <span class="price price_message">74% off</span>
                               </div>
                           </div>
                       </a>
                   </div>
               </div>
           </div>
       </div>

   </section>
@endsection

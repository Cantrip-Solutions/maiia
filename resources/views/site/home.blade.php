@extends('layouts.siteMain')
@section('content')
<div class="shop-catagory-wrap">
    <ul class="cat-slider">
        @foreach($banner_details as $banner_key => $banner_value)
        @php $ext = pathinfo($banner_value->file, PATHINFO_EXTENSION) @endphp
            <li>
                <div class="cat-banner">
                    @if($ext == 'jpg')
                    <figure>{!!HTML::image(config('global.bannerPath').$banner_value->file)!!}</figure>
                    @elseif($ext == 'mp4')
                    <figure>
                        <iframe width="100%" src="{{URL::asset('images/bannerImage/'.$banner_value->file)}}" frameborder="0" allowfullscreen autoplay="true" loop="true" controls="false" style="min-height: 550px"> </iframe>
                    </figure>
                    @endif
                    <div class="container">
                        <div class="shop-catagory">
                            <h1>{{$banner_value->title}}</h1>
                            <p>{{$banner_value->description}}</p>
                        </div>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
</div>

<div class="product-holder">
    <div class="container">
        <h1>COLLECTIONS</h1>
        <div class="position-prod">
            <ul>
                @foreach($featured_product as $key => $value)
                <li>
                    <a href="#">
                        <figure>
                             <figure>{!!HTML::image(config('global.productPath').$value->product_image)!!}</figure>
                        </figure>
                        <div class="position-prod-content">
                            <div class="price">
                                <span>&#36; {{$value->product_original_price}}</span>
                                <span>&#36; {{$value->product_saling_price}}</span>
                            </div>
                            <h1>{{$value->product_name}}</h1>
                            @php $parameter= Crypt::encrypt($value['product_id']) @endphp
                            <a href="{!! URL::to('product-details').'/'.str_slug($value['product_name'], '-').'/'.$parameter !!}" class="shop-now waves-effect waves-light">Shop Now</a>
                        </div>
                    </a>
                </li>
                @endforeach
            </ul>
        </div>

        <div class="new-prod-wrap">
            <h1>New In</h1>
            <div class="new-prod-block">
                <ul class="n-prod-slide">
                @foreach($new_in_product as $new_key => $new_value)
                    <li>
                        <div class="new-prod">
                            <div class="prod">
                                <figure>{!!HTML::image(config('global.productPath').$new_value->product_image)!!}</figure>
                                <div class="view-sec">
                                    <ul class="view-icon">
                                        <li><a href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-refresh" aria-hidden="true"></i></a></li>
                                    </ul>
                                    @php $new_parameter= Crypt::encrypt($new_value['product_id']) @endphp
                                    <a href="{!! URL::to('product-details').'/'.str_slug($new_value['product_name'], '-').'/'.$new_parameter !!}" class="quick-view fancybox">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                        Quick View
                                    </a>
                            </div>
                        </div>
                        <div class="btm">
                            <h2>{{$new_value->product_name}}</h2>
                            <div class="price">
                                <span>$ {{$new_value->product_original_price}}</span>
                                <span>$ {{$new_value->product_saling_price}}</span>
                            </div>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>

    <!-- <div class="course-sec">
        <h1>Yoga Free Course!</h1>
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <div class="y-img one">
                    {!!HTML::image(config('global.siteImages')."y-img1.jpg")!!}
                </div>

                <div class="y-img two">
                    {!!HTML::image(config('global.siteImages')."y-img2.jpg")!!}
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="y-img">
                    {!!HTML::image(config('global.siteImages')."y-img3.jpg")!!}
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <div class="y-img one">
                    {!!HTML::image(config('global.siteImages')."y-img4.jpg")!!}
                </div>
                <div class="y-img two">
                    {!!HTML::image(config('global.siteImages')."y-img5.jpg")!!}
                </div>
            </div>
        </div>
    </div> -->


    <div class="new-prod-wrap">
        <h1>Sale</h1>
        <div class="new-prod-block">
         <ul class="n-prod-slide">
            <li>
                <div class="new-prod">
                    <div class="prod">
                        <figure>{!!HTML::image(config('global.siteImages')."new-prod1.jpg")!!}</figure>
                        <div class="view-sec">
                            <ul class="view-icon">
                                <li><a href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-refresh" aria-hidden="true"></i></a></li>
                            </ul>

                            <a href="#quick_view" class="quick-view fancybox">
                                <i class="fa fa-search" aria-hidden="true"></i>
                                Quick View
                            </a>

                            <div id="quick_view">
                                <div class="view_cont">
                                    <h2>Quick View</h2>
                                    <div class="view_cont_left">
                                        <div class="view_cont_left_pic">
                                           <div class="zoom-small-image">
                                            <a href='images/new-prod1.jpg' class = 'cloud-zoom' id='zoom1' rel="adjustX:10, adjustY:-4"> {!!HTML::image(config('global.siteImages')."new-prod1.jpg")!!}
                                            </a>
                                        </div>

                                    </div>
                                </div>
                                <div class="view_cont_right">
                                    <div class="view_cont_info">
                                        <h3>Product Name</h3>
                                        <span>Product-Code:45145854</span>

                                        <div class="view_cont_info_row">
                                            <label>Size</label>
                                            <input type="text" value="" name="" placeholder="size">
                                        </div>

                                        <div class="view_cont_info_row">
                                            <label>Quantity</label>
                                            <select>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                            </select>
                                        </div>

                                        <div class="view_cont_info_row">
                                            <a href="#" class="view_full"> View full Product Details</a>
                                            <a href="#" class="viw_btn_link">ADD TO BAG</a>
                                            <a href="#" class="viw_btn_link">ADD TO WISHLIST</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="btm">
                    <h2>Yoga Shirts</h2>
                    <div class="price">
                        <span>$ 799</span>
                        <span>$ 599</span>
                    </div>
                </div>
            </div>
        </li>
        <li>
            <div class="new-prod">
                <div class="prod">
                    <figure>{!!HTML::image(config('global.siteImages')."new-prod2.jpg")!!}</figure>
                    <div class="view-sec">
                        <ul class="view-icon">
                            <li><a href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-refresh" aria-hidden="true"></i></a></li>
                        </ul>


                        <a href="#quick_view" class="quick-view fancybox">
                            <i class="fa fa-search" aria-hidden="true"></i>
                            Quick View
                        </a>

                        <div id="quick_view">
                            <div class="view_cont">
                                <h2>Quick View</h2>
                                <div class="view_cont_left">
                                    <div class="view_cont_left_pic">
                                       <div class="zoom-small-image">
                                        <a href='images/new-prod2.jpg' class = 'cloud-zoom' id='zoom1' rel="adjustX:10, adjustY:-4"> {!!HTML::image(config('global.siteImages')."new-prod2.jpg")!!}
                                        </a>
                                    </div>

                                </div>
                            </div>
                            <div class="view_cont_right">
                                <div class="view_cont_info">
                                    <h3>Product Name</h3>
                                    <span>Product-Code:45145854</span>

                                    <div class="view_cont_info_row">
                                        <label>Size</label>
                                        <input type="text" value="" name="" placeholder="size">
                                    </div>

                                    <div class="view_cont_info_row">
                                        <label>Quantity</label>
                                        <select>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                        </select>
                                    </div>

                                    <div class="view_cont_info_row">
                                        <a href="#" class="view_full"> View full Product Details</a>
                                        <a href="#" class="viw_btn_link">ADD TO BAG</a>
                                        <a href="#" class="viw_btn_link">ADD TO WISHLIST</a>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <div class="btm">
                <h2>Yoga Shirts</h2>
                <div class="price">
                    <span>$ 799</span>
                    <span>$ 599</span>
                </div>
            </div>
        </div>
    </li>
    <li>
        <div class="new-prod">
            <div class="prod">
                <figure>{!!HTML::image(config('global.siteImages')."new-prod3.jpg")!!}</figure>
                <div class="view-sec">
                    <ul class="view-icon">
                        <li><a href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-refresh" aria-hidden="true"></i></a></li>
                    </ul>



                    <a href="#quick_view" class="quick-view fancybox">
                        <i class="fa fa-search" aria-hidden="true"></i>
                        Quick View
                    </a>

                    <div id="quick_view">
                        <div class="view_cont">
                            <h2>Quick View</h2>
                            <div class="view_cont_left">
                                <div class="view_cont_left_pic">
                                   <div class="zoom-small-image">
                                    <a href='images/new-prod3.jpg' class = 'cloud-zoom' id='zoom1' rel="adjustX:10, adjustY:-4"> {!!HTML::image(config('global.siteImages')."new-prod3.jpg")!!}
                                    </a>
                                </div>

                            </div>
                        </div>
                        <div class="view_cont_right">
                            <div class="view_cont_info">
                                <h3>Product Name</h3>
                                <span>Product-Code:45145854</span>

                                <div class="view_cont_info_row">
                                    <label>Size</label>
                                    <input type="text" value="" name="" placeholder="size">
                                </div>

                                <div class="view_cont_info_row">
                                    <label>Quantity</label>
                                    <select>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                    </select>
                                </div>

                                <div class="view_cont_info_row">
                                    <a href="#" class="view_full"> View full Product Details</a>
                                    <a href="#" class="viw_btn_link">ADD TO BAG</a>
                                    <a href="#" class="viw_btn_link">ADD TO WISHLIST</a>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        <div class="btm">
            <h2>Yoga Shirts</h2>
            <div class="price">
                <span>$ 799</span>
                <span>$ 599</span>
            </div>
        </div>
    </div>
</li>
<li>
    <div class="new-prod">
        <div class="prod">
            <figure>{!!HTML::image(config('global.siteImages')."new-prod4.jpg")!!}</figure>
            <div class="view-sec">
                <ul class="view-icon">
                    <li><a href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-refresh" aria-hidden="true"></i></a></li>
                </ul>


                <a href="#quick_view" class="quick-view fancybox">
                    <i class="fa fa-search" aria-hidden="true"></i>
                    Quick View
                </a>

                <div id="quick_view">
                    <div class="view_cont">
                        <h2>Quick View</h2>
                        <div class="view_cont_left">
                            <div class="view_cont_left_pic">
                               <div class="zoom-small-image">
                                <a href='images/new-prod4.jpg' class = 'cloud-zoom' id='zoom1' rel="adjustX:10, adjustY:-4"> {!!HTML::image(config('global.siteImages')."new-prod4.jpg")!!}
                                </a>
                            </div>

                        </div>
                    </div>
                    <div class="view_cont_right">
                        <div class="view_cont_info">
                            <h3>Product Name</h3>
                            <span>Product-Code:45145854</span>

                            <div class="view_cont_info_row">
                                <label>Size</label>
                                <input type="text" value="" name="" placeholder="size">
                            </div>

                            <div class="view_cont_info_row">
                                <label>Quantity</label>
                                <select>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </div>

                            <div class="view_cont_info_row">
                                <a href="#" class="view_full"> View full Product Details</a>
                                <a href="#" class="viw_btn_link">ADD TO BAG</a>
                                <a href="#" class="viw_btn_link">ADD TO WISHLIST</a>
                            </div>


                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <div class="btm">
        <h2>Yoga Shirts</h2>
        <div class="price">
            <span>$ 799</span>
            <span>$ 599</span>
        </div>
    </div>
</div>
</li>
<li>
    <div class="new-prod">
        <div class="prod">
            <figure>{!!HTML::image(config('global.siteImages')."new-prod1.jpg")!!}</figure>
            <div class="view-sec">
                <ul class="view-icon">
                    <li><a href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-refresh" aria-hidden="true"></i></a></li>
                </ul>

                <a href="#quick_view" class="quick-view fancybox">
                    <i class="fa fa-search" aria-hidden="true"></i>
                    Quick View
                </a>

                <div id="quick_view">
                    <div class="view_cont">
                        <h2>Quick View</h2>
                        <div class="view_cont_left">
                            <div class="view_cont_left_pic">
                               <div class="zoom-small-image">
                                <a href='images/new-prod1.jpg' class = 'cloud-zoom' id='zoom1' rel="adjustX:10, adjustY:-4"> {!!HTML::image(config('global.siteImages')."new-prod1.jpg")!!}
                                </a>
                            </div>

                        </div>
                    </div>
                    <div class="view_cont_right">
                        <div class="view_cont_info">
                            <h3>Product Name</h3>
                            <span>Product-Code:45145854</span>

                            <div class="view_cont_info_row">
                                <label>Size</label>
                                <input type="text" value="" name="" placeholder="size">
                            </div>

                            <div class="view_cont_info_row">
                                <label>Quantity</label>
                                <select>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </div>

                            <div class="view_cont_info_row">
                                <a href="#" class="view_full"> View full Product Details</a>
                                <a href="#" class="viw_btn_link">ADD TO BAG</a>
                                <a href="#" class="viw_btn_link">ADD TO WISHLIST</a>
                            </div>


                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
    <div class="btm">
        <h2>Yoga Shirts</h2>
        <div class="price">
            <span>$ 799</span>
            <span>$ 599</span>
        </div>
    </div>
</div>
</li>
<li>
    <div class="new-prod">
        <div class="prod">
            <figure>{!!HTML::image(config('global.siteImages')."new-prod2.jpg")!!}</figure>
            <div class="view-sec">
                <ul class="view-icon">
                    <li><a href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-refresh" aria-hidden="true"></i></a></li>
                </ul>


                <a href="#quick_view" class="quick-view fancybox">
                    <i class="fa fa-search" aria-hidden="true"></i>
                    Quick View
                </a>

                <div id="quick_view">
                    <div class="view_cont">
                        <h2>Quick View</h2>
                        <div class="view_cont_left">
                            <div class="view_cont_left_pic">
                               <div class="zoom-small-image">
                                <a href='images/new-prod2.jpg' class = 'cloud-zoom' id='zoom1' rel="adjustX:10, adjustY:-4"> {!!HTML::image(config('global.siteImages')."new-prod2.jpg")!!}
                                </a>
                            </div>

                        </div>
                    </div>
                    <div class="view_cont_right">
                        <div class="view_cont_info">
                            <h3>Product Name</h3>
                            <span>Product-Code:45145854</span>

                            <div class="view_cont_info_row">
                                <label>Size</label>
                                <input type="text" value="" name="" placeholder="size">
                            </div>

                            <div class="view_cont_info_row">
                                <label>Quantity</label>
                                <select>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </div>

                            <div class="view_cont_info_row">
                                <a href="#" class="view_full"> View full Product Details</a>
                                <a href="#" class="viw_btn_link">ADD TO BAG</a>
                                <a href="#" class="viw_btn_link">ADD TO WISHLIST</a>
                            </div>


                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <div class="btm">
        <h2>Yoga Shirts</h2>
        <div class="price">
            <span>$ 799</span>
            <span>$ 599</span>
        </div>
    </div>
</div>
</li>
<li>
    <div class="new-prod">
        <div class="prod">
            <figure>{!!HTML::image(config('global.siteImages')."new-prod3.jpg")!!}</figure>
            <div class="view-sec">
                <ul class="view-icon">
                    <li><a href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-refresh" aria-hidden="true"></i></a></li>
                </ul>



                <a href="#quick_view" class="quick-view fancybox">
                    <i class="fa fa-search" aria-hidden="true"></i>
                    Quick View
                </a>

                <div id="quick_view">
                    <div class="view_cont">
                        <h2>Quick View</h2>
                        <div class="view_cont_left">
                            <div class="view_cont_left_pic">
                               <div class="zoom-small-image">
                                <a href='images/new-prod3.jpg' class = 'cloud-zoom' id='zoom1' rel="adjustX:10, adjustY:-4"> {!!HTML::image(config('global.siteImages')."new-prod3.jpg")!!}
                                </a>
                            </div>

                        </div>
                    </div>
                    <div class="view_cont_right">
                        <div class="view_cont_info">
                            <h3>Product Name</h3>
                            <span>Product-Code:45145854</span>

                            <div class="view_cont_info_row">
                                <label>Size</label>
                                <input type="text" value="" name="" placeholder="size">
                            </div>

                            <div class="view_cont_info_row">
                                <label>Quantity</label>
                                <select>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </div>

                            <div class="view_cont_info_row">
                                <a href="#" class="view_full"> View full Product Details</a>
                                <a href="#" class="viw_btn_link">ADD TO BAG</a>
                                <a href="#" class="viw_btn_link">ADD TO WISHLIST</a>
                            </div>


                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="btm">
        <h2>Yoga Shirts</h2>
        <div class="price">
            <span>$ 799</span>
            <span>$ 599</span>
        </div>
    </div>
</div>
</li>
<li>
    <div class="new-prod">
        <div class="prod">
            <figure>{!!HTML::image(config('global.siteImages')."new-prod4.jpg")!!}</figure>
            <div class="view-sec">
                <ul class="view-icon">
                    <li><a href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-refresh" aria-hidden="true"></i></a></li>
                </ul>


                <a href="#quick_view" class="quick-view fancybox">
                    <i class="fa fa-search" aria-hidden="true"></i>
                    Quick View
                </a>

                <div id="quick_view">
                    <div class="view_cont">
                        <h2>Quick View</h2>
                        <div class="view_cont_left">
                            <div class="view_cont_left_pic">
                               <div class="zoom-small-image">
                                <a href='images/new-prod4.jpg' class = 'cloud-zoom' id='zoom1' rel="adjustX:10, adjustY:-4"> {!!HTML::image(config('global.siteImages')."new-prod4.jpg")!!}
                                </a>
                            </div>

                        </div>
                    </div>
                    <div class="view_cont_right">
                        <div class="view_cont_info">
                            <h3>Product Name</h3>
                            <span>Product-Code:45145854</span>

                            <div class="view_cont_info_row">
                                <label>Size</label>
                                <input type="text" value="" name="" placeholder="size">
                            </div>

                            <div class="view_cont_info_row">
                                <label>Quantity</label>
                                <select>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </div>

                            <div class="view_cont_info_row">
                                <a href="#" class="view_full"> View full Product Details</a>
                                <a href="#" class="viw_btn_link">ADD TO BAG</a>
                                <a href="#" class="viw_btn_link">ADD TO WISHLIST</a>
                            </div>


                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <div class="btm">
        <h2>Yoga Shirts</h2>
        <div class="price">
            <span>$ 799</span>
            <span>$ 599</span>
        </div>
    </div>
</div>
</li>
</ul>
</div>

</div>

</div>
</div>
</div>
@endsection
@extends('layouts.front')
@section('content')
        <div class="shop-catagory-wrap parallax-container">
            <div class="container">
                
                <div class="shop-catagory">
                    
        <h1>THE LARGEST SALE STARTING THIS WEEK</h1>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. scrambled it to make a type specimen book.</p>
        <a href="#" class="shop-now waves-effect waves-light">Shop Now</a>
                    
                    
                </div>
            </div>
        </div>
        
        
        <div class="product-holder">
            <div class="container">
                
                <h1>Feature Products</h1>
                
                <div class="position-prod">
                    
                    <ul>
                        <li>
                            <a href="#">
                                <figure>
                                {!!HTML::image(config('global.siteImages')."position-product1.jpg")!!}
                                </figure>
                                <div class="position-prod-content">
                                    <div class="price">
                                        <span>&#36; 799</span>
                                        <span>&#36; 599</span>
                                    </div>
                                    
                                    <h1>SCORPION POSITION</h1>
                                     <span href="#" class="shop-now waves-effect waves-light">Shop Now</span>
                                    
                                </div>
                            </a>
                        </li>
                         <li class="active">
                             <a href="#">
                                 <figure>{!!HTML::image(config('global.siteImages')."position-product2.jpg")!!}</figure>
                                  <div class="position-prod-content">
                                    <div class="price">
                                        <span>&#36; 799</span>
                                        <span>&#36; 599</span>
                                    </div>
                                    
                                    <h1>SCORPION POSITION</h1>
                                     <span href="#" class="shop-now waves-effect waves-light">Shop Now</span>
                                    
                                </div>
                             </a>
                        </li>
                         <li>
                             <a href="#">
                                 <figure>{!!HTML::image(config('global.siteImages')."position-product3.jpg")!!}</figure>
                                  <div class="position-prod-content">
                                    <div class="price">
                                        <span>&#36; 799</span>
                                        <span>&#36; 599</span>
                                    </div>
                                    
                                    <h1>SCORPION POSITION</h1>
                                     <span href="#" class="shop-now waves-effect waves-light">Shop Now</span>
                                    
                                </div>
                             </a>
                        </li>
                    </ul>
                    
                </div>
                
                <div class="new-prod-wrap">
                    <h1>New In</h1>
                    
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
        <a href='images/new-prod1.jpg' class = 'cloud-zoom' id='zoom1' rel="adjustX:10, adjustY:-4">{!!HTML::image(config('global.siteImages')."new-prod1.jpg")!!}
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
        <a href='images/new-prod2.jpg' class = 'cloud-zoom' id='zoom1' rel="adjustX:10, adjustY:-4"> <img src="images/new-prod2.jpg" alt='' title="" />
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
                                            
                                             <a href="#" class="quick-view fancybox">
                                            <i class="fa fa-search" aria-hidden="true"></i>
                                            Quick View
                                            </a>
                                            
                                            
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
                
                <div class="course-sec">
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
                </div>
                
                
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
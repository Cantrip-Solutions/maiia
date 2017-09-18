@extends('layouts.siteMain')
@section('content')
<section class="banner-inner-wrap">
  <figure>
    {!!HTML::image(config('global.siteImages')."prod-dt-banner.jpg")!!}
  </figure>

  <div class="banner-info-wrap">
    <div class="container">
      <div class="banner-info-in">
        <h2>Product</h2>
        <div class="page-link">
         <ul>
          <li><a href="#">{{$category_name->category_name}}</a></li>
        </ul> 
      </div>
    </div>
  </div>
</div>
</section>

<section class="product-list-wrap">
  <div class="container">
   <div class="breadcrumb-sec">
    <div class="breadcrumb">
      <ul>
        <li><a href="#">Home</a></li>
        <li class="active"><a href="#">{{$category_name->category_name}}</a></li>
      </ul>
    </div>
  </div>

  <div class="prod-main-holder">
    <div class="row">
      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-4 side">
        <div class="prodct-sidebar">
          @if(!empty($getCategory) && count($getCategory)>0)
          <div class="prod-filter">
            <div class="titletog">
              <h1>Categories</h1>
            </div>
            <ul class="filter-box">
              @foreach($getCategory as $category)
              <li><input type="checkbox" value="{{$category->id}}" name="category[]" class="filled-in categorySearch" id="fil1_{{$category->id}}"> <label for="fil1_{{$category->id}}">{{$category->cat_name}}</label></li>
              @endforeach
            </ul>
          </div>
          @endif

          <div class="prod-filter">
            <div class="titletog">
              <h1>Price</h1>
            </div>
            <ul class="filter-box">
              <li><input type="checkbox" value="199-599" name="price[]" class="filled-in priceSearch" id="pricefil1"><label for="pricefil1">Rs. 199 to Rs. 599</label></li>
              <li><input type="checkbox" value="600-919" name="price[]" class="filled-in priceSearch" id="pricefil2"><label for="pricefil2">Rs. 600 to Rs. 919</label></li>
              <li><input type="checkbox" value="920-1499" name="price[]" class="filled-in priceSearch" id="pricefil3"><label for="pricefil3">Rs. 920 to Rs. 1499</label></li>
              <li><input type="checkbox" value="1500-10000" name="price[]" class="filled-in priceSearch" id="pricefil4"><label for="pricefil4">Rs. 1500 to Rs. 10000</label></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-9 col-md-9 col-sm-9 col-xs-8 mainbar">
        <div class="prod-list">
          <div class="prod-option-list clears">
            <input type="hidden" id="categoryId" value="<?php echo Crypt::encrypt($categoryId);?>">
            <div class="select-cat">
              <select class="sortingCategory">
                <option value="">Sort By</option>
                <option value="low">Price: Low to High</option>
                <option value="high">Price: High to Low</option>
              </select>
            </div>
          </div>

          <div class="product-holder prod-list-sec">
           <div class="new-prod-wrap">
            <div class="new-prod-block clears">
              <div class="loader"> </div>
              <ul id="productsort">
                @if(count($all_product[0]) == 0)
                  <span>No Product Available</span>
                @else
                  @foreach($all_product as $key => $value)
                    @foreach ($value as $ckey => $cvalue)
                      @php $parameter=Crypt::encrypt($cvalue['product_id']) @endphp
                      <li>
                        <a href="{!! URL::to('product-details').'/'.str_slug($cvalue['product_name'], '-').'/'.$parameter !!}" class="new-prod">
                          <div class="prod">
                            <figure>{!!HTML::image(config('global.productPath').$cvalue->product_image)!!}</figure>
                            <!-- <div class="view-sec">
                              <a href="{!! URL::to('product-details').'/'.str_slug($cvalue['product_name'], '-').'/'.$parameter !!}" class="quick-view fancybox"><i class="fa fa-search" aria-hidden="true"></i>Quick View</a>
                            </div>-->
                          </div>
                          <div class="btm">
                            <h2>{{$cvalue->product_name}}</h2>
                            <div class="price">
                              <span>$ {{$cvalue->product_original_price}}</span>
                              <span>$ {{$cvalue->product_saling_price}}</span>
                            </div>
                          </div>
                        </a>
                        <div class="cart-holder">
                         <a href="javascript:void(0)" class="add_to_cart" value="{{$parameter}}" p="{{$cvalue['product_id']}}"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                          <div id="cart_loading{{$cvalue['product_id']}}"></div>
                          <div id="cart_success_msg{{$cvalue['product_id']}}"></div>
                        </div>
                      </li>
                    @endforeach
                  @endforeach
                @endif
              </ul>
            </div>
          </div>
        </div>
      </div>
      @if(count($all_product[0]) != 0)
      <div class="product_exists_msg"></div>
      <div class="listing-pager clears">
        <a href="javascript:void(0)" class="show-more show_product">Show More Products</a>
        <input type="hidden" name="pro_count" id="pro_count" value="">
      </div>
      @endif          
    </div>
  </div>
</div>
</div>
</div>
</section>
@endsection
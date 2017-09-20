@extends('layouts.siteMain')
@section('content')
<div class="product-dt-holder">
  <section class="prod-top-wrap">
    <div class="container">
      <div class="prod-top-dt">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="prod-top-dt-left">
             <div class="zoom-wrap">
               <div class="zoom-small-image">
                <a @if (Auth::guest()) href="{{url('/miia-login')}}" @else href="javascript:void(0)" class="addwishlist" data-id="<?php echo Crypt::encrypt($product_details->id);?>" data-status="{{$wishlisted}}" a="0" @endif>
                  <div class="wish_wrap">
                    <i class="fa fa-heart" <?php if($wishlisted == 0){?> style="color: #ccc;" <?php }else{?> style="color: red;" <?php }?> aria-hidden="true"></i>
                  </div>
                </a>
                <a href="{{ URL::to('/').'/'.config('global.productPath').$images[0]->image }}" class = 'cloud-zoom' id='zoom1' rel="adjustX:10, adjustY:-4">{!!HTML::image(config('global.productPath').$images[0]->image)!!}
                </a>
              </div>

              <div class="zoom-desc">
               <ul>
                 @php unset($images[0]) @endphp
                 @foreach($images as $key => $img_value)
                 <li class="thumbAc">
                   <a href="{{ URL::to('/').'/'.config('global.productPath').$img_value->image }}" class='cloud-zoom-gallery' title='' rel="useZoom: 'zoom1', smallImage: '{{ URL::to('/').'/'.config('global.productPath').$img_value->image }}' ">{!!HTML::image(config('global.productPath').$img_value->image,'',array('class'=>'zoom-tiny-image','width'=>'65', 'alt' => 'Thumbnail 1'))!!}</a>
                 </li>
                 @endforeach
               </ul>
             </div>
           </div>
         </div>
       </div>
       <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="prod-top-dt-right">
          <h2>{{$product_details->name}}</h2>
          <h3>$ {{$product_details->saling_price}}</h3>
          <outstock>
            <i class="fa fa-check-circle" aria-hidden="true"></i>
            <span>
              @if($product_details->quantity == 0)
              Out Of Stock
              @else
              <b> {{$product_details->quantity}} </b> Left in Stock
              @endif
            </span>
          </outstock>

          <p>{{$product_details->description}}</p>

          <share>
            <h3>Share</h3>
            <ul>
              <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
            </ul>
          </share>

          <div class="qty-wrap">
            <div class="qty-sec">
              <button id="minus"><i class="fa fa-minus" aria-hidden="true"></i></button>
              <input id="num" type="text" value="1" placeholder="0">
              <button id="plus"><i class="fa fa-plus" aria-hidden="true"></i></button>
            </div>
            @php $parameter= Crypt::encrypt($product_details->id) @endphp
            <input type="hidden" name="pro_id" id="pro_id" value="{{$parameter}}" />
            <a href="javascript:void(0)" class="addcard">Add To Cart</a>
            <div class="cart_loading"></div>
            <div id="cart_success_msg"></div>
            <div id="wishlist_msg" class="col-sm-6"></div>
          </div>
        </div>
      </div>
    </div>

    <div class="tab-wrap">
      <div class="row">
       <div class="">
         <ul class="tabs">
           <li class="tab col s2"><a class="active" href="#test1">Description</a></li>
           <li class="tab col s2"><a href="#test2">Additional info</a></li>
           <li class="tab col s2"><a href="#test3">Reviews</a></li>
         </ul>
       </div>

       <div class="tab-content-wrap">
         <div id="test1" class="">
           <p>{{$product_details->description}}</p>
         </div>
         <div id="test2" class="">
           <p>
             World is There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.
           </p>                      
         </div>
         <div id="test3" class="">
           <p>
             Lorem is There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.
           </p>                       
         </div>
       </div>
     </div>
   </div>
 </div>
</div>    
</section>
</div>

<div class="product-holder rlt-prod">
  <div class="container">
    <div class="new-prod-wrap">
      <h1>Related Products</h1>
      <div class="new-prod-block">
        <ul class="n-prod-slide">
          @foreach($related_product as $key => $values)
          @php $new_parameter=Crypt::encrypt($values['product_id']) @endphp
          <li>
            <a href="{!! URL::to('product-details').'/'.str_slug($values['product_name'], '-').'/'.$new_parameter !!}" class="new-prod">
              <div class="prod">
                <figure>{!!HTML::image(config('global.productPath').$values->product_image)!!}</figure>
              </div>
              <div class="btm">
                <h2>{{$values->product_name}}</h2>
                <div class="price">
                  <span>$ {{$values->product_original_price}}</span>
                  <span>$ {{$values->product_saling_price}}</span>
                </div>
              </div>
            </a>
            <div class="cart-holder">
             <a href="javascript:void(0)" class="add_to_cart" value="{{$new_parameter}}" p="{{$values['product_id']}}"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
              <div id="cart_loading{{$values['product_id']}}"></div>
              <div id="cart_success_msg{{$values['product_id']}}"></div>
            </div>
          </li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
</div>
</div>
</section>
@endsection
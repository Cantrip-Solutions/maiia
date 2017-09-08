@extends('layouts.siteMain')
@section('content')
<section class="banner-inner-wrap">
  <figure>
    {!!HTML::image(config('global.siteImages')."prod-dt-banner.jpg")!!}
  </figure>   
      <input type="hidden" name="cart_cookie" id="cart_cookie" value="" />
            <div class="banner-info-wrap">
                <div class="container">
                    <div class="banner-info-in">
                        <h2>Product Details</h2>
                        <div class="page-link">
                            <ul>
                                <li><a href="#">{{$product_details->name}}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="product-dt-holder">
            <section class="prod-top-wrap">
                <div class="container">
                    <div class="prod-top-dt">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="prod-top-dt-left">

                                   <div class="zoom-wrap">
                                       <div class="zoom-small-image">
                                           <a href="{{ URL::to('/').'/'.config('global.productPath').'/'.$images[0]->image }}" class = 'cloud-zoom' id='zoom1' rel="adjustX:10, adjustY:-4">{!!HTML::image(config('global.productPath').$images[0]->image)!!}
                                           </a>
                                       </div>
                                       <div class="zoom-desc">
                                           <ul>
                                              @foreach($images as $key => $img_value)
                                                <li class="thumbAc">
                                                   <a href="{{ URL::to('/').'/'.config('global.productPath').'/'.$img_value->image }}" class='cloud-zoom-gallery' title='' rel="useZoom: 'zoom1', smallImage: '{{ URL::to('/').'/'.config('global.productPath').'/'.$img_value->image }}' ">{!!HTML::image(config('global.productPath').$img_value->image,'',array('class'=>'zoom-tiny-image','width'=>'65', 'alt' => 'Thumbnail 1'))!!}</a>
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
                                    <input type="hidden" name="pro_id" id="pro_id" value="{{$product_details->id}}" />
                                    <a href="javascript:void(0)" class="addcard">Add To Cart</a>
                                    <div class="cart_loading"></div>
                                    <div id="cart_success_msg"></div>
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
                      <li>
                          <div class="new-prod">
                              <div class="prod">
                                  <figure>{!!HTML::image(config('global.productPath').$values->product_image)!!}</figure>
                                      <div class="view-sec">
                                          <ul class="view-icon">
                                            <li><a href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
                                            <li><a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a></li>
                                            <li><a href="#"><i class="fa fa-refresh" aria-hidden="true"></i></a></li>
                                          </ul>
                                          @php $parameter= Crypt::encrypt($values['product_id']) @endphp
                                          <a href="{!! URL::to('product-details').'/'.str_slug($values['product_name'], '-').'/'.$parameter !!}" class="quick-view fancybox">
                                            <i class="fa fa-search" aria-hidden="true"></i>
                                            Quick View
                                          </a>
                                      </div>
                                 </div>
                                 <div class="btm">
                                    <h2>{{$values->product_name}}</h2>
                                    <div class="price">
                                        <span>$ {{$values->product_original_price}}</span>
                                        <span>$ {{$values->product_saling_price}}</span>
                                    </div>
                                </div>
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
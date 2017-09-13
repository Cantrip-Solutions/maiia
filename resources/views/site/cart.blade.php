@extends('layouts.siteMain')
@section('content')
<section class="banner-inner-wrap">
    <figure>{!!HTML::image(config('global.siteImages')."prod-dt-banner.jpg")!!}</figure>
    <div class="banner-info-wrap">
        <div class="container">
            <div class="banner-info-in">
                <h2>Cart</h2>

                <div class="page-link">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Cart</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="cart-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8">
                <div class="cart-left-part">
                   <div class="top clears">
                       @php $all_count_cart_items=CustomHelper::count_cart_items() @endphp
                       <h2>My Shopping ({{$all_count_cart_items}} Item's)</h2>
                   </div>
                   @php $final_price=0; @endphp
                   @foreach($cart_items as $key => $value)
                   <div class="item-box">
                    <div class="row">
                        <div class="col-lg-2 col-sm-2 col-xs-3 item-prod">
                            <item>
                                {!!HTML::image(config('global.productPath').$value['product_image'])!!}
                            </item>
                        </div>
                        <div class="col-lg-10 col-sm-10 col-xs-9 item-right">

                            <div class="item-mid">    
                                <div class="row">   
                                    <div class="col-lg-8 col-sm-8">
                                        <h1>{{$value['product_name']}}</h1>
                                        <div class="size-part">
                                            <part>
                                                <label>In Stock:</label>
                                                <span>{{$value['product_quantity']}}</span>
                                            </part>
                                        </div>
                                        <div class="size-part">
                                            <part>
                                                <label>Qty:</label>
                                                <div class="qty-sec ord_qnt">
                                                    <button class="cart_item_remove" data="{{$key}}" value=""><i class="fa fa-minus" aria-hidden="true"></i></button>
                                                    <input id="num{{$key}}" type="text" value="{{$value['quantity']}}" placeholder="0">
                                                    <button class="cart_item_add" data="{{$key}}" value=""><i class="fa fa-plus" aria-hidden="true"></i></button>
                                                    <div id="cart_update_loader{{$key}}"></div>
                                                    <div id="cart_update_msg{{$key}}"></div>
                                                </div>
                                            </part>
                                        </div>
                                        <!-- <div class="size-part">
                                            <part>
                                            <label>Size: </label>
                                            <ul>
                                            <li><span>s</span></li>
                                            <li><span>M</span></li>
                                            <li class="active"><span>L</span></li>
                                            <li><span>XL</span></li>
                                            <li><span>XXL</span></li>
                                            </ul>
                                            </part>
                                            <part>
                                            <label>Qty:</label>
                                            <input type="number" name="" value="1">
                                            </part>
                                        </div> -->

                                        <!-- <div class="size-part">
                                            <part class="btm-part">
                                                <label>Sold by:</label>
                                                <span>Kreative Rights Pvt Ltd</span>
                                            </part>
                                        </div> -->
                                    </div>
                                    <div class="col-lg-4 col-sm-4 ">
                                        <div class="price-sec">
                                            @php $price=$value['product_saling_price']*$value['quantity']; @endphp
                                            <strong>$ {{$price}}</strong>
                                       <!--  <off-sec>
                                            <span>(50% OFF)</span>
                                            <span>$ 300.00</span>
                                        </off-sec> -->
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="ed-rem">
                            <a href="javascript:void(0);" class="remove_cart_item" data="{{$key}}">Remove</a>
                            <div id="cart_loading{{$key}}"></div>
                        </div>
                    </div>
                </div>
            </div>
            @php $price=$value['product_saling_price']*$value['quantity'];
            $final_price=$final_price+$price;
            @endphp
            @endforeach

            @if(!empty($cart_items))
            <div class="top clears">
                <span><label>Total: </label>${{$final_price}}</span>
            </div>
            @else
            <span>Your Shopping Cart is Empty</span>
            @endif
        </div>
    </div>

    <div class="col-lg-4 col-md-4 ">
      <div class="cart-right cart-right-part">
        <h2>Options</h2>
        <coupon>
            <h3>Coupons</h3>
            <log><a href="#">Log in</a>to use account-linked <br> coupons</log>  
        </coupon>

        <div class="cart-right-top">
                            <!-- <div class="option-check">
                                <left>
                                    <label>Gift wrap for $ 25</label>
                                    <span>Cash On Delivery not available</span>
                                </left>
                                <input type="checkbox" name="" value="">
                            </div> -->

                            @if(!empty($cart_items))
                            <div class="order-top">
                                <h3>Price Details</h3>

                                <table width="100%" class="order-table order-fix">
                                    <tr>
                                        <td><span>Bag Total</span></td>
                                        <td><span style=" text-align:center">$ {{$final_price}}</span></td>
                                    </tr>
                                    
                                   <!--  <tr>
                                        <td><span>Bag Discount-    </span></td>
                                        <td><span style=" text-align:center; color:red">$ 150.00</span></td>
                                    </tr>
                                    
                                    <tr>
                                        <td><span>Estimated VAT/CST</span></td>
                                        <td><span style=" text-align:center">$ 80</span></td>
                                    </tr>
                                    
                                    <tr>
                                        <td><span>Coupon Discount   </span></td>
                                        <td><span style=" text-align:center">Apply Coupon</span></td>
                                    </tr> -->
                                    
                                    <tr>
                                        <td><span>Delivery</span></td>
                                        <td><span style="color:#2aad7d; text-align:center">Free</span></td>
                                    </tr>
                                </table>
                            </div>
                            @endif
                        </div>

                        <div class="order-btm">
                            <div class="cover"> 
                                @if(!empty($cart_items))
                                <table style="1px dashed #d3d3d3" width="100%" class="order-table">
                                   <tr>
                                    <td><strong>Order Total</strong></td>
                                    <td></td>
                                    <td><strong style=" text-align:right">$ {{$final_price}}</strong></td>
                                </tr>
                            </table>
                            @endif
                        </div>
                    </div>
                    @if(!empty($cart_items))
                    <a href="{{url('checkout')}}" name="place_order_btn" id="place_order_btn" class="placeord">Place Order</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
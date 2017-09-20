@extends('layouts.siteMain')
@section('content')
   <section class="banner-inner-wrap">
        <figure>
         {!!HTML::image(config('global.siteImages')."prod-dt-banner.jpg")!!}
        </figure>

        <div class="banner-info-wrap">
            <div class="container">
                <div class="banner-info-in">
                    <h2>My Account</h2>
                    <div class="page-link">
                       <!--  <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">My Account</a></li>
                        </ul> -->
                    </div>
                </div>
            </div>
        </div>
    </section>

 <section class="account-wrap">
        <div class="container">
            <div class="account-main clears">
                    <div class="ac-main-left">
                        <h2>My Account</h2>
                        <ul>
                            <li><a class="active" href="#order"><i class="fa fa-folder-open" aria-hidden="true"></i> My Order</a></li>
                            <li><a class="active" href="#wishlist"><i class="fa fa-heart" aria-hidden="true"></i>My Wishlist</a></li>
                            <li><a class="active" href="#address"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit Address</a></li>
                            <li><a class="active" href="#password"><i class="fa fa-lock" aria-hidden="true"></i>Change Password</a></li>
                        </ul>
                    </div>
                    <div class="ac-main-right">
                    <div id="order">
                        <h2>My Order's</h2>
                        @if (Session::has('message'))
                           <div class="alert alert-success" style="margin-top: 18px;"><i class="pe-7s-gleam"></i>{{ Session::get('message') }}</div>
                        @endif
                        
                        @if(count($user_order) == 0)
                        <span>No Order Placed</span>
                        @else
                        <div id="order_list">
                        @foreach($user_order as $key => $value)
                        @php $new_parameter=Crypt::encrypt($value['product_id']) @endphp
                        <div class="dt-ord-top clears">
                            <div class="dt-ord-top-left">
                                <span>Order ID: #{{$value->order_id}}</span>
                            </div>
                            <!-- <div class="dt-ord-top-right">
                                <a href="#" class="btns dt">Details</a>
                            </div> -->
                        </div>
                        <div class="prod-order-status">
                            <div class="row">
                                <div class="col-lg-2">
                                    <prod>{!!HTML::image(config('global.productPath').$value->product_image)!!}</prod>
                                </div>
                                <div class="col-lg-7">
                                    <div class="order-issue">
                                        <h3><a href="{!! URL::to('product-details').'/'.str_slug($value['product_name'], '-').'/'.$new_parameter !!}" target="_blank">{{$value->product_name}}</a></h3>
                                        <div><span>Quantity: </span>
                                        <span>{{$value->order_quantity}}</span></div>

                                        <div><span>Total Price: </span>
                                        <span>$ {{$value->order_price}}</span></div>
                                        <!-- <div class="issue-box-wrap">
                                            <ul>
                                                <li><a href="#">Return / Replace</a></li>
                                                <li><a href="#">get invoice</a></li>
                                                <li>
                                                    <span>For product related issue</span>
                                                    <a href="#">message seller</a>
                                                </li>
                                            </ul>
                                        </div> -->
                                    </div>
                                </div>
                                <!-- <div class="col-lg-3">
                                    <div class="wrt-review">
                                        <span><i class="fa fa-file-text-o" aria-hidden="true"></i> Write a Review!</span>
                                        <ul>
                                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                            <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                        </ul>
                                    </div>
                                </div> -->
                            </div>
                        </div>

                        <div class="track-holder">
                         <div class="deliver-sec clears">
                            <div class="deliver-sec-left">
                                <span>Order Status: </span>
                                @if($value->order_status==0)
                                    <span>PENDING</span>
                                @elseif($value->order_status==1)
                                    <span>PROCESSING</span>
                                @elseif($value->order_status==2)
                                    <span>DISPATCHED</span>
                                @elseif($value->order_status==3)
                                    <span>DELIVERED</span>
                                @elseif($value->order_status==4)
                                    <span>REQUEST FOR REFUND</span>
                                @elseif($value->order_status==5)
                                    <span>PRODUCT PICKED UP</span>
                                @elseif($value->order_status==6)
                                    <span>REFUNDED</span>
                                @elseif($value->order_status==7)
                                    <span>REQUEST FOR REPLACEMENT</span>
                                @elseif($value->order_status==8)
                                    <span>PRODUCT REPLACED</span>
                                @endif
                            </div>

                            <div class="deliver-sec-right">
                                <span>Placed On: </span>
                                @php $converted_date=date('D,M jS Y',strtotime($value->order_created_at));@endphp
                                 <small>{{$converted_date}}</small>
                            </div>
                            </div>

                         <!-- <div class="track-bar-wrap">
                            <div class="track-bar">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                            <ul>
                                <li>PROCESSING</li>
                                <li>DISPATCHED</li>
                                <li>DELIVERED</li>
                            </ul>
                        </div> -->
                        <!-- <a href="#" class="track">Track</a> -->
                        </div>
                        @endforeach
                        </div>
                        @endif

                        @if(count($user_order[0]) != 0)
                          <div class="listing-pager clears ord_div">
                            <a href="javascript:void(0)" class="show-more show_ord">Show More</a>
                            <input type="hidden" name="ord_ct" id="ord_ct" value="">
                          </div>
                          <div class="ord_loader"></div>
                        @endif
                        <div class="ord_msg"></div>
                        </div>

                        <div class="wishlist-wrap">
                        <div id="wishlist">
                            <h2>My Wishlist (Total: {{count($wishlist_product)}} Item's)</h2>
                            @if(count($wishlist_product) == 0)
                                <div>
                                    <span style="margin-left: 15px;">No item in Wishlist</span>
                                </div>
                            @else
                            <table class="wishlist-table" width="100%">
                                <thead>
                                    <tr>
                                        <th>&nbsp;</th>
                                        <th>Product Name</th>
                                        <th>Unit Price</th>
                                        <th>Stock Status</th>
                                        <th>&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($wishlist_product as $wkey => $wvalue)
                                    <tr>
                                        <td>
                                            <table>
                                                <tr>
                                                    <td><a href="javascript:void(0)" class="cross addwishlist" data-id="<?php echo Crypt::encrypt($wvalue->product_id);?>" data-status="1" a="1" style="min-width: 50px;"><i class="fa fa-times" aria-hidden="true"></i></a>
                                                    </td>
                                                    <td>
                                                        <prod>
                                                            {!!HTML::image(config('global.productPath').$wvalue->product_image)!!}
                                                        </prod>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td>
                                            @php $parameter=Crypt::encrypt($wvalue['product_id']) @endphp
                                            <a href="{!! URL::to('product-details').'/'.str_slug($wvalue['product_name'], '-').'/'.$parameter !!}" target="_blank">{{$wvalue->product_name}}</a>
                                        </td>
                                        <td>${{$wvalue->product_selling_price}}</td>
                                        <td style="color:#b2735e">
                                            @if($wvalue->product_quantity > 0)
                                                In Stock
                                            @else
                                                Out Of Stock
                                            @endif
                                        </td>

                                        <td><a href="javascript:void(0)" class="wishlist_to_cart btns" value="{{$parameter}}" p="{{$wvalue['product_id']}}">Add to Cart</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td id="cart_loading{{$wvalue['product_id']}}" style="border-bottom: 0px;">
                                        </td>
                                        <td id="cart_success_msg{{$wvalue['product_id']}}" style="border-bottom: 0px;">
                                        </td>
                                    </tr>
                                    
                                    @endforeach
                                    </tbody>
                                    </table>
                                    </div>
                                    @endif
                                    
                                    <div id="address">
                                    <table class="wishlist-table" width="100%">
                                    <tbody>
                                    <tr>
                                        <td><a href="#" class="edit-add">Edit Address</a></td>
                                        <td colspan="4"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <div class="ord-address">    
                                                <h3>My Address</h3>
                                                <!-- <span>Vill + Po - Rampur Bhatpara, Ps - Gaighata, Dist - (N) 24 P.G.S</span> -->
                                                <span>{{$user_info->address1}} PIN-{{$user_info->postal_code}}</span>
                                            </div>
                                        </td>
                                        <td colspan="3"></td>
                                    </tr>  
                                    </tbody>
                                    </table>
                                    </div>

                                    <div class="address-wrap">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="address-block">
                                                    <h3>Billing Address</h3>
                                                    <a href="#" class="btns">Edit</a>
                                                    
                                                    <address-content>
                                                        <span>{{$user_info->address1}} PIN-{{$user_info->postal_code}}</span>
                                                    </address-content>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="address-block">
                                                    <h3>Shipping Address</h3>
                                                    <a href="#" class="btns">Edit</a>
                                                    
                                                    <address-content>
                                                        <span>{{$user_info->address2}} PIN-{{$user_info->postal_code}}</span>
                                                    </address-content>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>

                            <div id="password">
                            <div class="change-add">
                                <div class="row">
                                <div class="col-lg-8">
                                    <h3>Change Password</h3>
                                    <form action="#" method="post">
                                        <input type="password" name="" placeholder="Old Password"  value="">
                                        <input type="password" name="" placeholder="New Password" value="">
                                        <input type="password" name="" placeholder="confirm password"  value="">
                                        <input type="submit" name="" value="Submit">
                                    </form>
                                </div>
                                </div>    
                            </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </section>
    @endsection
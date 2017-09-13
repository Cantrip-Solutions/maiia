@extends('layouts.siteMain')
@section('content')
  <section class="banner-inner-wrap">
        <figure>
             {!!HTML::image(config('global.siteImages')."prod-dt-banner.jpg")!!}
        </figure>

        <div class="banner-info-wrap">
            <div class="container">
                <div class="banner-info-in">
                    <h2>Check Out</h2>
                   <!--  <div class="page-link">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Products</a></li>
                        </ul> 
                    </div> -->
                </div>
            </div>
        </div>
    </section>
   <!--checkout-->
    <section class="checkout-details-sec">
      <div class="container">
        <div class="checkout-main">
          <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8 shipping-respon">
              <div class="payment-info">
                <h1>Shipping and Payment Information</h1>
                <?php //print_r($user_info->country);
                //echo '<pre>'; print_r($country); ?>
                  <div class="shipping-form">
                    <div class="row">
                    {{Form::open(array('id'=>'cart_data','action' => 'CartController@submit_cart_info', 'method'=>'POST'))}}
                      <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                          <label for="">Name</label>
                           @if (Auth::check())
                              {!! Form::text('name',$user_info->name,array('class'=>'form-control','placeholder'=>'Your Name')) !!}
                          @else
                              {!! Form::text('name','',array('class'=>'form-control','placeholder'=>'Your Name')) !!}
                          @endif

                              @if ($errors->has('name'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('name') }}</strong>
                              </span>
                              @endif
                        </div>
                        
                        <div class="form-group">
                          <label>Shipping Address</label>
                          @if (Auth::check())
                              {!! Form::text('address2',$user_info->address2,array('class'=>'form-control','placeholder'=>'Apt, Suite, Bldg, (optional)')) !!}
                          @else
                              {!! Form::text('address2','',array('class'=>'form-control','placeholder'=>'Apt, Suite, Bldg, (optional)')) !!}
                          @endif

                              @if ($errors->has('address2'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('address2') }}</strong>
                              </span>
                              @endif
                        </div>
                      </div>

                      <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                          <label>Street Address</label>
                          @if (Auth::check())
                              {!! Form::text('address1',$user_info->address1,array('class'=>'form-control','placeholder'=>'Your Address')) !!}
                          @else
                              {!! Form::text('address1','',array('class'=>'form-control','placeholder'=>'Your Address')) !!}
                          @endif

                              @if ($errors->has('address1'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('address1') }}</strong>
                              </span>
                              @endif
                        </div>

                        <div class="form-group">
                          <label>Zip Code</label>
                          @if (Auth::check())
                              {!! Form::text('postal_code',$user_info->postal_code,array('class'=>'form-control','placeholder'=>'Your Postal Code')) !!}
                          @else
                              {!! Form::text('postal_code','',array('class'=>'form-control','placeholder'=>'Your Postal Code')) !!}
                          @endif

                              @if ($errors->has('postal_code'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('postal_code') }}</strong>
                              </span>
                              @endif
                        </div>
                      </div>
                      <p>Please note that we cannot ship to a PO Box.</p>

                      <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                          <label for="">Country</label>
                          @if (Auth::check())
                          <select name="country" class="form-control">
                            <?php foreach ($country as $country_key => $country_val)
                              {?>
                                <option value="<?php echo $country_val->id;?>"<?php if($country_val->id==$user_info->country) echo 'selected="selected"'; ?>><?php echo $country_val->name; ?></option>
                            <?php }?>
                          </select>
                          @else
                          <select name="country" class="form-control">
                            <?php foreach ($country as $country_key => $country_val)
                              {?>
                                <option value="<?php echo $country_val->id;?>"><?php echo $country_val->name;?></option>
                            <?php }?>
                          </select>
                          @endif
                        </div>

                        <div class="form-group">
                          <label>Phone Number</label>
                          @if (Auth::check())
                              {!! Form::text('phone',$user_info->phone,array('class'=>'form-control','placeholder'=>'Your Phone No')) !!}
                          @else
                              {!! Form::text('phone','',array('class'=>'form-control','placeholder'=>'Your Phone No')) !!}
                          @endif

                              @if ($errors->has('phone'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('phone') }}</strong>
                              </span>
                              @endif
                        </div>

                        @if (!Auth::check())
                          <div class="form-group">
                              <label>Password</label>
                          {!! Form::password('password',array('class'=>'form-control','placeholder'=>'Your Password')) !!}
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                          </div>
                        @endif

                        <!-- <h3>Needed for delivery purposes</h3>
                        <div class="shipping-checkbox">
                          <input type="checkbox" value="None" id="shipping-checkbox" name="check" checked />
                          <label for="shipping-checkbox">Set as my preferred shipping address.</label>
                        </div> -->
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-12">
                      <div class="form-group">
                          <label>City</label>
                          @if (Auth::check())
                              {!! Form::text('city',$user_info->city,array('class'=>'form-control','placeholder'=>'Your City')) !!}
                          @else
                              {!! Form::text('city','',array('class'=>'form-control','placeholder'=>'Your City')) !!}
                          @endif

                              @if ($errors->has('city'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('city') }}</strong>
                              </span>
                              @endif
                        </div>

                        <div class="form-group">
                          <label>Email Address</label>
                          @if (Auth::check())
                              {!! Form::text('email',$user_info->email,array('class'=>'form-control','placeholder'=>'Your Email')) !!}
                          @else
                              {!! Form::text('email','',array('class'=>'form-control','placeholder'=>'Your Email')) !!}
                          @endif

                              @if ($errors->has('email'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('email') }}</strong>
                              </span>
                              @endif
                        </div>
                        <h4>View our <span>Privacy Policy</span></h4>
                      </div>
                      <input class="btn btn-warning" type="submit" name="" value="Submit">
                      {{Form::close()}}
                    </div>
                  </div>

                  <div class="billing-form">
                    <h1>Billing Address</h1>
                    <div class="shipping-checkbox">
                      <input type="checkbox" value="None" id="billing-checkbox" name="check" checked />
                      <label for="billing-checkbox">Use shipping address</label>
                    </div>
                  </div>
              </div>
              <div class="payment-options">
                <h1>Choose Payment Mode</h1>
                <div id="parentVerticalTab" class="payment-mode-main">
                  <div class="payment-type clears">
                    <ul class="resp-tabs-list">
                      <li class=""> CREDIT / DEBIT CARD </li>
                      <li>PAYPAL</li>
                      <li>CASH ON DELIVERY</li>
                    </ul>
                  </div>
                  <form action="" method="post" enctype="multipart/form-data" class="clears">
                    <div class="resp-tabs-container payment-form ">
                      <div>
                        <div class="form-group">
                          <label for="">Card Number</label>
                          <input class="form-control" type="text" placeholder="" >
                        </div>
                        <div class="form-group">
                          <label>Expires</label>
                          <select class="form-control">
                            <option selected value='0'>Month</option>
                            <option value='1'>Janaury</option>
                            <option value='2'>February</option>
                            <option value='3'>March</option>
                            <option value='4'>April</option>
                            <option value='5'>May</option>
                            <option value='6'>June</option>
                            <option value='7'>July</option>
                            <option value='8'>August</option>
                            <option value='9'>September</option>
                            <option value='10'>October</option>
                            <option value='11'>November</option>
                            <option value='12'>December</option>
                          </select>
                          <select class="form-control">
                            <option selected value="0">Year</option>
                            <option value="1">2017</option>
                            <option value="2">2018</option>
                            <option value="3">2019</option>
                            <option value="4">2020</option>
                            <option value="5">2021</option>
                            <option value="6">2022</option>
                            <option value="7">2023</option>
                            <option value="8">2024</option>
                            <option value="9">2025</option>
                          </select>
                        </div>
                        <div class="form-group"> <img src="images/payment-icon.png" alt=""/> </div>
                        <div class="form-group">
                          <label for="">Name on Card</label>
                          <input class="form-control" type="text" placeholder="" >
                        </div>
                        <div class="form-group">
                          <label>Security Code </label>
                          <input class="form-control" type="text" placeholder="" >
                          <p>What's this?</p>
                        </div>
                        <div class="form-group">
                            
                          <div class="shipping-checkbox">
                              
                            <input type="checkbox" value="None" id="shipping-checkbox1" name="check" checked />
                            
                            <label for="shipping-checkbox1">Do not save credit card</label>
                              
                          </div>
                            
                            
                        </div>
                        <div class="place-order">
                          <button class="defaultbtn place-order-btn">Place Order</button>
                        </div>
                      </div>
                      <div>
                        <div class="form-group">
                          <label for="">Card Number22</label>
                          <input class="form-control" type="text" placeholder="" >
                        </div>
                        <div class="form-group">
                          <label>Expires</label>
                          <select class="form-control">
                            <option selected value='0'>Month</option>
                            <option value='1'>Janaury</option>
                            <option value='2'>February</option>
                            <option value='3'>March</option>
                            <option value='4'>April</option>
                            <option value='5'>May</option>
                            <option value='6'>June</option>
                            <option value='7'>July</option>
                            <option value='8'>August</option>
                            <option value='9'>September</option>
                            <option value='10'>October</option>
                            <option value='11'>November</option>
                            <option value='12'>December</option>
                          </select>
                          <select class="form-control">
                            <option selected value="0">Year</option>
                            <option value="1">2017</option>
                            <option value="2">2018</option>
                            <option value="3">2019</option>
                            <option value="4">2020</option>
                            <option value="5">2021</option>
                            <option value="6">2022</option>
                            <option value="7">2023</option>
                            <option value="8">2024</option>
                            <option value="9">2025</option>
                          </select>
                        </div>
                        <div class="form-group"> <img src="images/payment-icon.png" alt=""/> </div>
                        <div class="form-group">
                          <label for="">Name on Card</label>
                          <input class="form-control" type="text" placeholder="" >
                        </div>
                        <div class="form-group">
                          <label>Security Code </label>
                          <input class="form-control" type="text" placeholder="" >
                          <p>What's this?</p>
                        </div>
                        <div class="form-group">
                          <div class="shipping-checkbox">
                            <input type="checkbox" value="" id="shipping-checkbox2" name="check" checked />
                           
                            <label for="shipping-checkbox2"> Do not save credit card</label>
                          </div>
                        </div>
                        <div class="place-order">
                          <button class="defaultbtn place-order-btn">Place Order</button>
                        </div>
                      </div>
                      <div>
                        <div class="form-group">
                          <label for="">Card Number</label>
                          <input class="form-control" type="text" placeholder="" >
                        </div>
                        <div class="form-group">
                          <label>Expires</label>
                          <select class="form-control">
                            <option selected value='0'>Month</option>
                            <option value='1'>Janaury</option>
                            <option value='2'>February</option>
                            <option value='3'>March</option>
                            <option value='4'>April</option>
                            <option value='5'>May</option>
                            <option value='6'>June</option>
                            <option value='7'>July</option>
                            <option value='8'>August</option>
                            <option value='9'>September</option>
                            <option value='10'>October</option>
                            <option value='11'>November</option>
                            <option value='12'>December</option>
                          </select>
                          <select class="form-control">
                            <option selected value="0">Year</option>
                            <option value="1">2017</option>
                            <option value="2">2018</option>
                            <option value="3">2019</option>
                            <option value="4">2020</option>
                            <option value="5">2021</option>
                            <option value="6">2022</option>
                            <option value="7">2023</option>
                            <option value="8">2024</option>
                            <option value="9">2025</option>
                          </select>
                        </div>
                        <div class="form-group"> <img src="images/payment-icon.png" alt=""/> </div>
                        <div class="form-group">
                          <label for="">Name on Card</label>
                          <input class="form-control" type="text" placeholder="" >
                        </div>
                        <div class="form-group">
                          <label>Security Code </label>
                          <input class="form-control" type="text" placeholder="" >
                          <p>What's this?</p>
                        </div>
                        <div class="form-group">
                          <div class="shipping-checkbox">
                            <input type="checkbox" value="" id="shipping-checkbox" name="" checked />
                            
                            <label for="shipping-checkbox">Do not save credit card</label>
                          </div>
                        </div>
                        <div class="place-order">
                          <button class="defaultbtn place-order-btn">Place Order</button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-4 order-summary-respon">
              <div class="order-summary">
                <h1>Order Summary</h1>
                <div class="order-summary-table">
                  <table id="cart">
                    <thead>
                      <tr>
                      @php $all_count_cart_items=CustomHelper::count_cart_items() @endphp
                        <th>{{$all_count_cart_items}} ITEM'S</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Order Total</td>
                        

                        <td>$ {{$final_price}}</td>
                      </tr>
                      <tr>
                        <td>Delivery</td>
                        <td><span>Free</span></td>
                      </tr>
                    </tbody>
                    <thead>
                      <tr>
                        <td class="total-payable">Total Payable</td>
                        <td class="total-payable">${{$final_price}}</td>
                      </tr>
                    </thead>
                  </table>
                </div>

                @if($user_info)
                <div class="delivery-address">
                  <h3>Delivery To</h3>
                  <name>{{$user_info->name}}</name>
                  <address>
                  {{$user_info->address1}},{{$user_info->postal_code}},{{$user_info->city}},{{$user_info->state}}
                  </address>
                  <phone>Mobile: {{$user_info->phone}}</phone>
                  <a href="">Change Address</a> </div>
                @endif
                  
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> 


 <!-- {{Form::open(array('id'=>'cart_data','action' => 'CartController@submit_cart_info', 'method'=>'POST'))}}

                                <div class="cart-form-row">
                                <?php //print_r($country);?>
                                @if (Auth::check())
                                    {!! Form::text('name',$user_info->name,array('placeholder'=>'Your Name')) !!}
                                @else
                                    {!! Form::text('name','',array('placeholder'=>'Your Name')) !!}
                                @endif

                                    @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                
                                <div class="cart-form-row">
                                    <select class="form-control" name="country_id" id="country_id">
                                        <option value="">-Select Country-</option>
                                        @foreach($country as $item)
                                          <option value="{{$item->phonecode}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>

                                        @if ($errors->has('country_id'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('country_id') }}</strong>
                                        </span>
                                        @endif
                                </div>
                                
                                 <div class="cart-form-row">
                                   <part-form-1>
                                    @if (Auth::check())
                                        {!! Form::text('city',$user_info->city,array('placeholder'=>'Your City')) !!}
                                    @else
                                        {!! Form::text('city','',array('placeholder'=>'Your Name')) !!}
                                    @endif

                                        @if ($errors->has('city'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('city') }}</strong>
                                        </span>
                                        @endif
                                   </part-form-1>

                                   <part-form-2>
                                    @if (Auth::check())
                                        {!! Form::text('postal_code',$user_info->postal_code,array('placeholder'=>'Your Pin Code')) !!}
                                    @else
                                        {!! Form::text('postal_code','',array('placeholder'=>'Your Pin Code')) !!}
                                    @endif

                                        @if ($errors->has('postal_code'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('postal_code') }}</strong>
                                        </span>
                                        @endif
                                   </part-form-2>
                                </div>

                                <div class="cart-form-row">
                                    @if (Auth::check())
                                        <mobile-part1><input type="tel" id="ph_ext" name="" value=""></mobile-part1>
                                        <mobile-part2>
                                        {!! Form::text('phone',$user_info->phone,array('placeholder'=>'Your Contact No')) !!}
                                        </mobile-part2>
                                    @else
                                        <mobile-part1><input type="tel" id="ph_ext" name="" value=""></mobile-part1>
                                        <mobile-part2>
                                        {!! Form::text('phone','',array('placeholder'=>'Your Contact No')) !!}
                                        </mobile-part2>
                                    @endif

                                        @if ($errors->has('phone'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                        @endif
                                </div>
                                
                                <div class="cart-form-row">
                                    @if (Auth::check())
                                        {!! Form::textarea('address1',$user_info->address1,array('placeholder'=>'Your Address')) !!}
                                    @else
                                        {!! Form::textarea('address1','',array('placeholder'=>'Your Address')) !!}
                                    @endif

                                        @if ($errors->has('address1'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('address1') }}</strong>
                                        </span>
                                        @endif
                                </div>
                                                                
                                <div class="cart-form-row">
                                    <input type="checkbox" id="test5" namme="default_address_flag" value="1" />
                                    <label for="test5">Make this my default address</label>
                                </div>
                            {{Form::close()}} -->






 @endsection
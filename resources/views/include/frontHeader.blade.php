<div class="main-header-wrap"><!--Header-->
    
    <div class="container">
        
          <div class="main-header-top clears">
              
                <div class="header-center">
                    <a href="{{url('/')}}" class="logo2">
                     {!!HTML::image(config('global.siteImages')."logo.png")!!}
                    </a>
                </div>
              
                <div class="main-header-holder">
                    
                
                    
                <div class="header-right-tog-content">   
                    
               <!-- <div class="main-header-top-left">
                @if (Auth::guest())
                    <ul>
                        <li><a href="#"><i class="fa fa-eye" aria-hidden="true"></i>You Viewed</a></li>
                        <li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i>Locations</a></li>
                    </ul>
                @endif
                </div>-->
                    
                <div class="main-header-top-left header-right">
                        <span class="header-right-toggle">&#9776;</span>  
                    
                        <ul class="login-toggle-content">
                            <!--<li><a href="#"><i class="fa fa-file-text" aria-hidden="true"></i>Newsletter</a></li>-->
                            @if (Auth::check()) 
                                <li><a href="#"><i class="fa fa-user-circle" aria-hidden="true"></i>Profile</a>
                                    <ul>
                                        <li><a href="{{url('/my-account')}}">My Account</a></li>
                                        <li><a href="#">Order History</a></li>
                                        <li><a href="{{url('/logout')}}">Logout</a></li>
                                    </ul>
                                </li>
                            @else
                                 <li><a href="{{url('/miia-login')}}"><i class="fa fa-sign-in" aria-hidden="true"></i>Login</a></li>
                                  <li><a href="{{url('/miia-registration')}}"><i class="fa fa-user" aria-hidden="true"></i>Register</a></li>
                           @endif
                                <li><a href="{{url('/cart')}}"><i class="fa fa-shopping-cart" aria-hidden="true"></i>Cart
                                @php $all_count_cart_items=CustomHelper::count_cart_items() @endphp

                                <span id="count_cart">({{$all_count_cart_items}})</span></a></li>
                        </ul>
                    </div>
                    
                <div class="menu-section clears">
                <div class="search-sec clears">
                    <div class="input-field">
                    <input type="text" id="autocomplete-input" class="autocomplete">
                    <label for="autocomplete-input">Search</label>
                    </div>
                    <button><i class="fa fa-search" aria-hidden="true"></i></button>
                </div>       
                <div class="menu sidenav" id="mySidenav">
                    <span style="font-size:30px;cursor:pointer" class="closebtn" href="javascript:void(0)" onclick="closeNav()">×</span>
                        <ul class="menu-content">
                            @php $all_category_arr=CustomHelper::chartCategory() @endphp
                                @foreach($all_category_arr as $key => $value)
                                    <li><a>{{$key}}</a>
                                        <ul class="sub-mega">
                                                    @foreach($value as $ckey => $cvalue)
                                                        @php $parameter= Crypt::encrypt($ckey) @endphp
                                                        
                                                            <li>
                                                                <a href="{!! URL::to('product').'/'.str_slug($cvalue['name'], '-').'/'.$parameter !!}">
                                                                {{$cvalue['name']}}
                                                                </a>
                                                            </li>
                                                            @php unset($cvalue['name']) @endphp
                                                            @foreach($cvalue as $ckey1 => $cvalue1)
                                                             @php $parameter1= Crypt::encrypt($ckey1) @endphp
                                                                    <li>
                                                                        <a href="{!! URL::to('product').'/'.str_slug($cvalue1['name'], '-').'/'.$parameter1 !!}">{{$cvalue1['name']}}</a>
                                                                    </li>
                                                            @endforeach
                                                       
                                                    @endforeach
                                        </ul>
                                    </li>
                                @endforeach
                                    <li><a>Maiia Comunity</a>
                                        <ul class="sub-mega">
                                            <div class="container">
                                                <div class="mega-menu clears">
                                                    <li><a href="#">About maiia</a></li>
                                                    <li><a href="#">workout videos</a></li>
                                                    <li><a href="#">Blog</a></li>
                                                    <li><a href="#">In press</a></li>
                                                </div>
                                            </div>
                                        </ul>
                                    </li>
                        </ul>
                    </div>
                
            </div>    
                    
                    
                    
                  </div>
                    
               </div>
              
              
            </div>
     
    </div>
    
    
</div><!--Header-->
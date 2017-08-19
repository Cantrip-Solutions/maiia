<div class="main-header-wrap"><!--Header-->
    <div class="container">
          <div class="main-header-top clears">
                
                 <div class="header-center">
                    <a href="{{url('/')}}" class="logo2">
                     {!!HTML::image(config('global.siteImages')."logo.png")!!}
                    </a>
                </div>
              
                <div class="main-header-holder">
                <span class="header-right-toggle"><i class="fa fa-bars" aria-hidden="true"></i></span>  
                <div class="header-right-tog-content">    
                <div class="main-header-top-left">
                @if (Auth::guest())
                    <ul>
                        <li><a href="#"><i class="fa fa-eye" aria-hidden="true"></i>You Viewed</a></li>
                        <li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i>Locations</a></li>
                    </ul>
                @endif
                </div>
                <div class="main-header-top-left header-right">
                        <ul>
                            <li><a href="#"><i class="fa fa-file-text" aria-hidden="true"></i>Newsletter</a></li>
                            @if (Auth::check()) 
                            <li><a href="#"><i class="fa fa-user-circle" aria-hidden="true"></i>Profile</a>
                                <ul>
                                    <li><a href="#">My Account</a></li>
                                    <li><a href="#">Order History</a></li>
                                    <li><a href="{{url('/logout')}}">Logout</a></li>
                                </ul>
                            </li>
                            @else
                             <li><a href="{{url('/miia-login')}}"><i class="fa fa-sign-in" aria-hidden="true"></i>Login</a></li>
                              <li><a href="{{url('/miia-registration')}}"><i class="fa fa-user" aria-hidden="true"></i>Register</a></li>
                           @endif
                            <li><a href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i>Cart<span>0</span></a></li>
                        </ul>
                    </div>
                  </div>  
               </div>
            </div>
        
          <div class="row">   
            <div class="col-lg-12">
            <div class="menu-section clears">
                <div class="menu">
                    <span class="menu-toggle"><i class="fa fa-bars" aria-hidden="true"></i></span>
                    
                    <ul class="menu-content">
                        <li><a href="#">New IN </a></li>
                        <li><a href="#">Shop Looks</a></li>
                        <li><a href="#">Shop Activity </a></li>
                        <li><a href="#">Sale</a></li>
                        <li><a href="#">Maiian Comunity</a></li>
                    </ul>
                </div>
                <div class="search-sec clears">
                    <div class="input-field">
                    <input type="text" id="autocomplete-input" class="autocomplete">
                    <label for="autocomplete-input">Search</label>
                    </div>
                    <button><i class="fa fa-search" aria-hidden="true"></i></button>
                </div>
            </div>
            </div>
        </div>
    </div>
</div><!--Header-->
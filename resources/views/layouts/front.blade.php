<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=1">

{!!HTML::style('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css')!!}
{!!HTML::style('css/site/countrySelect.css')!!}
{!!HTML::style('css/site/ion.rangeSlider.css')!!}
{!!HTML::style('css/site/ion.rangeSlider.skinFlat.css')!!}
{!!HTML::style('css/site/dd.css')!!}
{!!HTML::style('css/site/flags.css')!!}
{!!HTML::style('css/site/sprite.css')!!}
{!!HTML::style('css/site/slick.css')!!}
{!!HTML::style('css/site/cloud-zoom.css')!!}
{!!HTML::style('css/site/materialize.css')!!}
{!!HTML::style('css/site/bootstrap.css')!!}
{!!HTML::style('css/site/style.css')!!}
{!!HTML::style('css/site/responsive.css')!!}

<!--<link href="source/jquery.fancybox.css" rel="stylesheet" type="text/css" /> -->

{!!HTML::script('https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js')!!}
{!!HTML::script('js/site/slick.js')!!}
<script>
    setTimeout(function()
    {
        $('.alert-success').slideToggle('slow');
        $('.alert-danger').slideToggle('slow');
    }, 4000);
    
</script>
<title>{{config('global.siteTitle')}}</title>
</head>

<body>
<div class="wrapper">
    <div class="top-content">
    <header class="header-wrap">
        <div class="header">
            <div class="container">
            @if (Session::has('message'))
               <div class="alert alert-success" style="margin-top: 18px;"><i class="pe-7s-gleam"></i>{{ Session::get('message') }}</div>
            @endif
                <div class="row">
                    <div class="col-lg-5 col-md-5 col-sm-1 col-xs-1 blank">&nbsp;</div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-3"><a href="{{url('/')}}" class="logo">
                    {!!HTML::image(config('global.siteImages')."logo.png")!!}
                    </a>
                    </div>
                    <div class="col-lg-5 col-md-10 col-sm-10 col-xs-9">
                        <div class="media-wrap clears">
                            <div class="media-box">
                                <div class="social">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                                <div class="language">
                                    <select name="countries" id="countries" style="width:100%;">
                                        <option value='ad' data-image="images/siteImages/flag.png" data-imagecss="flag ad" data-title="English">
                                        English
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    @include('include.music')
    </div>
</div>
<div class="total-content">      
<div class="body-content">

    @include('include.frontHeader')
    @yield('content')
    
</div>
    <footer class="footer-wrap">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-2 col-sm-2">
                    <div class="footer-top-block">
                        <h2>Informations</h2>
                            <ul>
                                <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i> Home</a></li>
                                <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i> Shop</a></li>
                                <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i> Shipping / Returns
                                </a></li>
                                <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i> Faq</a></li>
                            </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-2">
                    <div class="footer-top-block">
                        <h2>Customer menu</h2>
                        <ul>
                            <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i> Terms</a></li>
                            <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i> Customer Support</a></li>
                            <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i> Gift Cards
                            </a></li>
                            <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i> Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-3">
                    <div class="footer-top-block">
                    <h2>Company</h2>
                        <ul>
                            <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i> Corporate Contact</a></li>
                            <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i> Careers</a></li>
                            <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i> Retailers
                            </a></li>
                            <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i> Our Story</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                
                    <div class="footer-top-block">
                        <h2>SIGN UP FOR EMAIL</h2>
                        
                        <div class="sign-up">
                        <p>Sign up for Sweaty Betty emails and receive 10% off your first online order.</p>

                        <div class="sign-wrap">
                            <input type="text" value="" name="" placeholder="Enter your email address">
                            <button><i class="fa fa-paper-plane" aria-hidden="true"></i>
                        </button>
                        </div>    
                                                
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-btm clears">
        <div class="container">
            <span>© 2017 Maiian. All rights reserved.</span>
        
            <div class="footer-media">
                <ul>
                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                </ul>
            </div>
            
        </div>
    </div>
</footer>    
</div>

{!!HTML::script('js/site/bootstrap.min.js')!!}
{!!HTML::script('js/site/materialize.min.js')!!}
{!!HTML::script('js/site/jquery.dd.js')!!}
{!!HTML::script('js/site/ion.rangeSlider.js')!!}
{!!HTML::script('js/site/custom.js')!!}

<!--<script src="js/cloud-zoom.js"></script>-->
<!--<script src="source/jquery.fancybox.js"></script> -->
</body>
</html>
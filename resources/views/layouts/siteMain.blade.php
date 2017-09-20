<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700" rel="stylesheet"> 
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
{!!HTML::script('https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js')!!}
{!!HTML::script('js/site/slick.js')!!}
<script>
    window.Laravel = {!! json_encode([
        'csrfToken' => csrf_token(),
    ]) !!};
</script>
<script>
    $(document).ready(function(){
             
      $('.n-prod-slide').slick({
        dots: false,
        infinite: true,
        speed:800,
        autoplay:true,    
        slidesToShow: 4,
        slidesToScroll: 1,
        responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 3,
              infinite: true,
              dots: false
            }
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 1
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
          // You can unslick at a given breakpoint now by adding:
          // settings: "unslick"
          // instead of a settings object
        ]
      });
});
</script>
<title>{{config('global.siteTitle')}}</title>
</head>
<body>
<div class="total-content" id="main" style="display:block">   
  <span class="open-btn" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; </span> 
  <div class="body-content">
    @include('include.frontHeader')
    @yield('content')
  </div>
     @include('include.frontFooter')
</div>

<script type="text/javascript">
 var base_url = "{{url('/')}}";
 var token="{{ csrf_token() }}";
</script>
{!!HTML::script('js/site/bootstrap.min.js')!!}
{!!HTML::script('js/site/materialize.min.js')!!}
{!!HTML::script('js/site/cloud-zoom.js')!!}
{!!HTML::script('js/site/jquery.dd.js')!!}
{!!HTML::script('js/site/ion.rangeSlider.js')!!}
{!!HTML::script('https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js')!!}

{!!HTML::script('js/site/siteScript.js')!!}
{!!HTML::script('js/site/siteCustom.js')!!}
</body>
</html>

<script>
  $('#plus').click(function(){
    var numric = $('#num').val();
    if((parseInt(numric) == 20)){
        return false;
    } else{
       var result = parseInt(numric)+1;
       $('#num').val(result);
    } 
})
        
  $('#minus').click(function(){
      var numric = $('#num').val();
      if((parseInt(numric) == 1)){
          return false;
      } else{
          var result = parseInt(numric)-1;
           $('#num').val(result);
      }
  });
     
  $(document).ready(function(){ 
    $('.tabs li').click(function(){
      var index=$(this).index();
      $('.tabs li').removeClass('active'); 
      $(this).addClass('active');
      $('.tab-content').removeClass('active');
      $('.tab-content:eq('+index+')').addClass('active');
      });
  });
</script>
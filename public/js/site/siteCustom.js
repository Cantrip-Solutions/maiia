 $(window).scroll(function(){
  var sticky = $('.main-header-wrap'),
      topdisp = $('.main-header-wrap'),
      scroll = $(window).scrollTop();

  if (scroll >= 25) 
      {
       sticky.addClass('fixed');
        
          
      }
      else {
         sticky.removeClass('fixed'); 
      }
        
});





function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
}  

$('.sub-mega').before('<span class="arrowt"></span>')



$('.arrowt').click(function(){
    $('.sub-mega').slideToggle(150);
    $(this).toggleClass("arrowactive");
    $(".sub-mega").not($(this).next()).slideUp();
}); 

$('.vert-slider').slick({
  dots: false,
  vertical: true,  
  infinite: true,
  verticalSwiping:true,
  speed: 300,
  slidesToShow: 3,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
        infinite: true,
        dots: false
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        vertical: false,    
        slidesToShow: 3,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
}); 
         


        
         
$('.about-banner-slider').slick({
  dots: false,
  infinite: true,
  speed: 800,
  slidesToShow: 1,
  adaptiveHeight: true
}); 


            
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


    
         




$(document).ready(function() {
  
 $('.titletog').click(function(){
     
    $(this).next().slideToggle(150);
    $(this).toggleClass('active');
     
    $(".filter-box").not($(this).next()).slideUp();
     
 })

 $("#countries").msDropdown();
    



         
$('.header-right-toggle').click(function(){
    $('.login-toggle-content').slideToggle(150);
});     


   
$(window).resize(function() {
    var getWidth = $(this).width();
    if(getWidth > 767)
    {
        $('#mySidenav').removeAttr('style');
    }
});
     
    
$(window).resize(function() {
    var getWidth = $(this).width();
    if(getWidth > 767)
    {
        $('.header-right-tog-content').removeAttr('style');
    }
});
    
         
         
         
$('#parentVerticalTab').easyResponsiveTabs({
        type: 'vertical', //Types: default, vertical, accordion
        width: 'auto', //auto or any width like 600px
        fit: true, // 100% fit in a container
        closed: 'accordion', // Start closed if in accordion view
        tabidentify: 'hor_1', // The tab groups identifier
        activate: function(event) { // Callback function if tab is switched
            var $tab = $(this);
            var $info = $('#nested-tabInfo2');
            var $name = $('span', $info);
            $name.text($tab.text());
            $info.show();
        }
});
         
         
      
        
    
     
    
          $('input.autocomplete').autocomplete({
    data: {
      "T-shirt": null,
    },
    limit: 20, // The max amount of results that can be shown at once. Default: Infinity.
    onAutocomplete: function(val) {
      // Callback function when value is autcompleted.
    },
    minLength: 1, // The minimum length of the input for the autocomplete to start. Default: 1.
  });
    
    
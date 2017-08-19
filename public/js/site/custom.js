// JavaScript Document


    
     $(document).ready(function() {
         
         
         
    $('.header-right-toggle').click(function(){
        $('.header-right-tog-content').slideToggle(150);
    })     
         
    
    $('.menu-toggle').click(function(){
        $('.menu-content').slideToggle(150);
    })  
    
    
$(window).resize(function() {
    var getWidth = $(this).width();
    if(getWidth > 767)
    {
        $('.menu-content').removeAttr('style');
    }
});
         
    
$(window).resize(function() {
    var getWidth = $(this).width();
    if(getWidth > 767)
    {
        $('.header-right-tog-content').removeAttr('style');
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
         
         
 /* $('.fancybox').fancybox();  */     

$("#countries").msDropdown();  
         
            
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




    $("#rangebtn").ionRangeSlider({
    type: "single",
    min: 0,
    max: 100,
    from:0,
    keyboard: false,
        
   onStart: function (data) {
        console.log("onStart");
        
    },
        
    onChange: function (data) {
        console.log("onChange");
    },
        
  onFinish: function (data) {
        console.log("onFinish");
        $('.top-content').slideUp(500);
       $('.total-content').slideDown(500);
      $('.music').addClass('music2');
      
      
  $.each($('audio'), function () {
    this.pause();
});
      
      
        
    },
        
    onUpdate: function (data) {
        console.log("onUpdate");
    }
    
   
    
        
        
}); 
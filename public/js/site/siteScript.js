$(document).ready(function(){
	$('.addcard').click(function(){
		var quantity=$('#num').val();
		var pro_id=$('#pro_id').val();
	$.ajax({
        	url : base_url+'/add_cart',
        	type: "POST",
        	data:{'quantity':quantity,'pro_id':pro_id, _token: token},
			beforeSend: function(){
				$('.cart_loading').html('<i class="fa fa-spinner fa-pulse"></i> Please wait ...');
			},
        	success:function(data){
        		var result=jQuery.parseJSON(data);
            	if(result.status == 1)
	            	{	
	            		$(".cart_loading").html('');
	            		$("#cart_success_msg").html('<div class="alert alert-success">Item Added to Cart <i class="fa fa-shopping-cart"></i> </div>');
	            		$('#count_cart').html(result.cart_count);
	            		$('.alert').delay(3000).fadeOut(400);
	            	}
            	else
	            	{
	            		$(".cart_loading").html('');
	            		$("#cart_success_msg").html('<div class="alert alert-danger">Error Occured. Please try again later!!</div>');
	            		$('.alert').delay(3000).fadeOut(400);
	            	}
        	}
    	});
	});
	
	//remove cart product with all its item
	$('.remove_cart_item').click(function(){
		var cart_key_id=$(this).attr('data');
		$.ajax({
        	url : base_url+'/remove_cart_items',
        	type: "POST",
        	data:{'cart_key_id':cart_key_id, _token: token},
        	beforeSend: function(){
				$('.cart_loading').html('<i class="fa fa-spinner fa-pulse"></i> Please wait ...');
			},
        	success:function(data){
        		var result=jQuery.parseJSON(data);
            	if(result.status == 1){
            		location.reload();
            	}else{
            		location.reload();
            	}
        	}
        });
	});

	//remove cart product per single item
	$('.cart_item_remove').click(function(){
	    var cart_key=$(this).attr('data');
		var quantity = $('#num'+cart_key).val();

		if((parseInt(quantity) == 1)){
	          return false;
	      } else{
	          var updated_quantity = parseInt(quantity)-1;
	           $('#num'+cart_key).val(updated_quantity);
	      }
	
		$.ajax({
			url : base_url+'/product/cart_update',
			type: "POST",
			data:{'updated_quantity':updated_quantity,'cart_key':cart_key, _token: token},
			beforeSend: function() {
				$('.cart_update_loader').html('<i class="fa fa-spinner fa-pulse"></i> Please wait ...');
			},
			success:function(data){
		    	if(data.status == 1){
		    		location.reload();
		    	}else{
		    		location.reload();
		    	}
			}
		});
	});

	//add cart product per single item
	$('.cart_item_add').click(function(){
		var cart_key=$(this).attr('data');
		var quantity = $('#num'+cart_key).val();

		if((parseInt(quantity) == 20)){
	        return false;
	    } else{
	       var updated_quantity = parseInt(quantity)+1;
	       $('#num'+cart_key).val(updated_quantity);
	    }
		
		$.ajax({
			url : base_url+'/product/cart_update',
			type: "POST",
			data:{'updated_quantity':updated_quantity,'cart_key':cart_key, _token: token},
			beforeSend: function() {
				$('.cart_update_loader').html('<i class="fa fa-spinner fa-pulse"></i> Please wait ...');
			},
			success:function(data){
		    	if(data.status == 1){
		    		location.reload();
		    	}else{
		    		location.reload();
		    	}
			}
		});
	});

	$('.cat-slider').slick({
	  dots: true,
	  infinite: true,
	  autoplay:true,
	  arrows:false,    
	  speed: 1500,
	  slidesToShow: 1,
	  adaptiveHeight: true
	});

	$('#country_id').change(function(){
		var country_id=$(this).val();
		$('#ph_ext').val(country_id);
	});
});

$(function(){
	var pricechecked = '';
	var categoryChecked = '';
	var value = '';
	var price = '';
	var categorySearch = '';
	var status = '';
	var priceSearch = new Array();
	var category = new Array();

	$(document).on('click','.show_product',function(){
		value = $('.sortingCategory').val();
		var status = 1;
		goForSearch(price,categorySearch,value,status);
	});

	 $(document).on('click','.priceSearch',function(){
	 	if($(this).is(':checked')){
	 		var pricechecked = $(this).val();
	 		priceSearch.push(pricechecked);
	 	}else{
	 		if ((index = priceSearch.indexOf($(this).val())) !== -1) {
	 			priceSearch.splice(index, 1);
	 		}
	 	}
	 	if (priceSearch.join() != '') { 
	 		price = priceSearch.join();
	 		value = $('.sortingCategory').val();
	 		goForSearch(price,categorySearch,value,status);
	 	}else{
	 		location.reload();
	 	}
	 });

	$(document).on('click','.categorySearch',function(){
		if($(this).is(':checked'))
			{
				var categoryChecked = $(this).val();
				category.push(categoryChecked);
			}
		else
			{
				if ((index = category.indexOf($(this).val())) !== -1)
					{
						category.splice(index, 1);
					}
			}
		if (category.join() != '')
			{ 
				categorySearch = category.join();
				value = $('.sortingCategory').val();
				goForSearch(price,categorySearch,value,status);
			}
		else
			{
				location.reload();
			}
	});

	$(document).on('change','.sortingCategory',function(){
		var value=$(this).val();
		if (value != '')
			{
				goForSearch(price,categorySearch,value,status);
			}
	});

	function goForSearch(price,categorySearch,value,status)
		{
			var count=0;
			var categoryId=$('#categoryId').val();
			if(status == 1)
				{
					if($('#pro_count').val() == "")
						{
							var count=3;
						}
					else
						{
							var count=$('#pro_count').val();
						}
				}

	    	$.ajax({
	        	url: base_url+'/product/show_more',
			    type: 'POST',
			    data:{'status':status,'count':count,'value':value,'price':price,'categorySearch':categorySearch,'categoryId':categoryId, _token: token},     

				beforeSend: function() {
					$('.loader').html('<i class="fa fa-spinner fa-pulse"></i>');
				},
	            success:function(data)
		            {
		            	if(!data)
		            	{
		            		$('.product_exists_msg').show();
		            		$('.product_exists_msg').html('<b>No Product Available</b>');
		            	}
		            	else
		            	{
		            		$('.product_exists_msg').hide();
			        		current_final_count= parseInt(count) + 3;
			        		$('#pro_count').val(current_final_count);

			        		if(status == 1)
				        		{
				        			$('#productsort').append(data);
				        		}
			        		else
				        		{
				        			$('#productsort').html(data);
				        		}
		        		}
		        		$('.loader').html('');
		    		}
	    	});
		}
});
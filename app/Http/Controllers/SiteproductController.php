<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Model\Product;
use \App\Model\Orders;
use \App\Model\Category;
use \App\Model\ProductImage;
use \App\Model\Stock;
use \App\Model\Wishlist;
use Illuminate\Support\Facades\Input;
use Session;
use Crypt;
use DB;
use Auth;

class SiteproductController extends Controller
{
  public function productList($slug,$id)
    {
		$getChildCategory=array();
		$getallproduct=array();
        $parentCatId='';
        $decoded_id = Crypt::decrypt($id);

		$get_cat_name=Category:: where('id', '=', $decoded_id)
			->select('categories.cat_name as category_name')
			->get();

		$categories=Category::where('parent_cat_id', '=', $decoded_id)->get();
		array_push($getChildCategory, $decoded_id);

		foreach($categories as $key =>$values){
			  $categoryId=$values['id'];
			  array_push($getChildCategory, $categoryId);
			}

		//echo '<pre>'; print_r($getChildCategory);
		foreach($getChildCategory as $ckey =>$cvalues){
				//echo '<pre>'; print_r($cvalues);
			  $get_product=Category::join('products' , 'products.cat_id_fk' , '=' , 'categories.id')
			   ->join('product_images' , 'product_images.pro_id_fk' , '=' , 'products.id')
			   ->where('categories.id', '=',$cvalues)
			   ->where('product_images.default_image', '=', '1')
			    ->select('products.id as product_id','products.name as product_name','products.original_price as product_original_price','products.saling_price as product_saling_price','products.quantity as product_quantity','products.description as product_description','categories.id as cat_id','categories.cat_name as cat_name','product_images.id as product_images_id','product_images.image as product_image','product_images.default_image as product_default_images')
			    ->orderBy('products.id','DESC')
                ->limit(3)
			   ->get();

			  array_push($getallproduct, $get_product);
			}

			//echo '<pre>'; print_r($get_product);
			//exit;
		return view('site.product',array('all_product'=>$getallproduct,'getCategory'=>$categories,'category_name'=>$get_cat_name[0],'categoryId'=>$decoded_id));
    }

    public function productDetails($slug,$id)
     {
     	$decoded_id = Crypt::decrypt($id);

     //get product details
      $get_product_info=Product::where('id', '=', $decoded_id)->get();
      $cat_id=$get_product_info[0]->cat_id_fk;

	//get product image details
      $get_product_all_image_info=ProductImage::where('pro_id_fk', '=', $decoded_id)
          ->orderBy('default_image', 'DESC')
          ->get();

        //get related product random list
      $get_related_product_all=Product::join('product_images' , 'product_images.pro_id_fk' , '=' , 'products.id')
      	->where('products.cat_id_fk', '=', $cat_id)
      	->where('products.id', '!=', $decoded_id)
      	->where('product_images.default_image', '=', '1')
      	->select('products.id as product_id','products.name as product_name','products.original_price as product_original_price','products.saling_price as product_saling_price','products.quantity as product_quantity','products.description as product_description','product_images.id as product_images_id','product_images.image as product_image','product_images.default_image as product_default_images')
      	->orderByRaw("RAND()")
      	->get();

      	//check if product is added to wishlist before
      	if (Auth::check())
			{
				$user_data = Auth::User();
				$get_product_info[0]->product_id;
				$count_product_wishlist_info=Wishlist::where('u_id_fk', '=', $user_data->id)
					->where('pro_id_fk', '=', $decoded_id)
			        ->count();
			}
		else
			{
				$count_product_wishlist_info='';
			}

        return view('site.productDetails',array('product_details'=>$get_product_info[0],'images'=>$get_product_all_image_info,'related_product'=>$get_related_product_all,'wishlisted'=>$count_product_wishlist_info));
     }

    public function show_more(){
     	$var=Input::except('_token');
     	$currentP=$var['count'];
     	$decoded_id=Crypt::decrypt($var['categoryId']);
     	$category = $var['categorySearch'];
     	$orderby = $var['value'];
     	$price = $var['price'];
     	$getChildCategory=array();

     	$categories=Category::where('parent_cat_id', '=', $decoded_id)->get();
     	array_push($getChildCategory, $decoded_id);

     	foreach($categories as $key =>$values){
     		$categoryId=$values['id'];
     		array_push($getChildCategory, $categoryId);
     	}

     	$get_products = Product::whereIn('cat_id_fk',$getChildCategory)
     	->join('product_images' , 'product_images.pro_id_fk' , '=' , 'products.id')
     	->where('product_images.default_image', '=', '1')
     	->selectRaw("products.id as product_id,products.cat_id_fk as product_cat_id,products.name as product_name,products.original_price as product_original_price,products.saling_price as product_saling_price,products.quantity as product_quantity,products.description as product_description,products.updated_at as product_date,product_images.id as product_images_id,product_images.image as product_image,product_images.default_image as product_default_images")

     	->where(function($query_where) use ($category){
     		if($category != '')
     		{
     			$catSearchid = explode(',',$category);
     			$query_where->whereIn('products.cat_id_fk', $catSearchid);
     		}
     	})

     	->where(function($query_where) use ($price) {
     		if($price != '')
     		{
     			$priceRange = str_replace("-",",",$price);
     			$pRange  = explode(",", $priceRange);
     			$query_where->whereBetween('products.saling_price', [min($pRange), max($pRange)]);
     		}
     	});

     	$orderBy = 'products.id';
     	$ordertype = 'DESC';
     	if($orderby != '')
     	{
     		$orderBy = 'products.saling_price';
     		if($orderby=='high')
     		{
     			$ordertype = 'DESC';
     		}
     		elseif($orderby=='low')
     		{
     			$ordertype = 'ASC';
     		}
     	}

     	if($var['status'] == 1)
     	{
     		$offset=$currentP;
     	}
     	else
     	{
     		$offset=0;
     	}

     	$get_product = $get_products->orderBy($orderBy, $ordertype)
     	->offset($offset)
     	->limit(3)
     	->get();

     	$html='';
     	foreach($get_product as $key =>$value)
     	{
     		$p_id = Crypt::encrypt($value->product_id);
     		$pName = str_slug($value->product_name);
     		$html.='<li><div class="new-prod"><div class="prod">';
     		$html.='<figure><img src="'.url('/images/productImage').'/'.$value->product_image.'"></figure>';
     		$html.='<div class="view-sec"><ul class="view-icon">';
     		$html.='<li><a href="javascript:void(0)" class="add_to_cart" value="'.$p_id.'" p="'.$value->product_id.'"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>';
     		/*$html.='<li><a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a></li>';
     		$html.='<li><a href="#"><i class="fa fa-refresh" aria-hidden="true"></i></a></li>';*/
     		$html.='</ul><div id="cart_loading'.$value->product_id.'"></div><div id="cart_success_msg'.$value->product_id.'"></div>';
     		$html.='<a href="'.url('/product-details').'/'.$pName.'/'.$p_id.'" class="quick-view fancybox">';
     		$html.='<i class="fa fa-search" aria-hidden="true"></i>Quick View</a></div></div>';
     		$html.='<div class="btm"><h2>'.$value->product_name.'</h2>';
     		$html.='<div class="price"><span>$ '.$value->product_original_price.'</span>';
     		$html.='<span>$ '.$value->product_saling_price.'</span></div></div></div></li>';
     	}
     	return $html;
     }

     public function myaccount()
          {
               $user_data = Auth::User();

               //get user order history
               $get_user_order=Orders::join('products' , 'products.id' , '=' , 'orders.pro_id_fk')
                    ->join('product_images' , 'product_images.pro_id_fk' , '=' , 'products.id')
                    ->where('orders.u_id_fk', '=', $user_data->id)
                    ->where('product_images.default_image', '=', '1')
                    ->select('products.id as product_id','products.name as product_name','product_images.id as product_images_id','product_images.image as product_image','product_images.default_image as product_default_images','orders.id as order_id','orders.quantity as order_quantity','orders.total_price as order_price','orders.created_at as order_created_at')
                    ->get();

				//get user wishlist history
                $get_wishlist_product=Wishlist::join('products' , 'products.id' , '=' , 'wishlist.pro_id_fk')
                    ->join('product_images' , 'product_images.pro_id_fk' , '=' , 'products.id')
                    ->where('wishlist.u_id_fk', '=', $user_data->id)
                    ->where('product_images.default_image', '=', '1')
                    ->select('products.id as product_id','products.name as product_name','product_images.id as product_images_id','product_images.image as product_image','product_images.default_image as product_default_images','products.saling_price as product_selling_price','products.quantity as product_quantity','wishlist.id as wishlist_id')
                    ->get();
               //echo '<pre>'; print_r($get_wishlist_product); exit;
               return view('site/account',array('user_order'=>$get_user_order,'wishlist_product'=>$get_wishlist_product));
          }
          
    public function add_to_wishlist()
      	{
            $var=Input::except('_token');
            $product_id=$var['pro_id'];
            $decoded_id = Crypt::decrypt($product_id);
            $user_data = Auth::User();

            //if item is not wishlisted add to wishlist table
            if($var['status'] == 0)
	            {
		            $wishlist_data= new Wishlist;
		            $wishlist_data->u_id_fk=$user_data->id;
		            $wishlist_data->pro_id_fk=$decoded_id;
		            $wishlist_data->save();
		            echo 1;
	            }

	        //if item is wishlisted remove from wishlist table
	        else
		        {
		        	$delete_from_wishlist=Wishlist::where('u_id_fk', '=', $user_data->id)
		        	->where('pro_id_fk', '=', $decoded_id)
		        	->delete();
            		echo 2;
		        }
      	}
     
}
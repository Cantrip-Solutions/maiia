<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\User;
use \App\Model\UserInfo;
use \App\Model\Category;
use App\Model\Product;
use \App\Model\ProductImage;
use \App\Model\Transactions;
use \App\Model\Orders;
use DB;
use Validator;
use Auth;
use Hash;
use Session;
use Cookie;

class CartController extends Controller
{
	public function cart()
		{
			$getallproduct=array();

			if(isset($_COOKIE['cartinfo']))
			{
				$cartarray = unserialize($_COOKIE['cartinfo']);
				foreach($cartarray as $key => $value)
				{
					$get_product=Product::join('product_images' , 'product_images.pro_id_fk' , '=' , 'products.id')
					->where('product_images.default_image', '=', '1')
					->where('products.id', '=', $value['pro_id'])
					->select('products.id as product_id','products.name as product_name','products.original_price as product_original_price','products.saling_price as product_saling_price','products.quantity as product_quantity','products.description as product_description','product_images.id as product_images_id','product_images.image as product_image','product_images.default_image as product_default_images')
					->get();

					$get_product[0]['quantity']=$value['quantity'];
					$getallproduct[$key]=$get_product;
				}
			}
			if (Auth::check())
				{
					$user_data = Auth::User();
	                $user_id=$user_data->id;
	                $get_user_info=User::join('user_infos' , 'user_infos.u_id_fk' , '=' , 'users.id')
	                ->where('users.id', '=', $user_id)
	                  ->get();
				}
			else
				{
					$get_user_info[0]="";
				}

				$countries_info= DB::table('countries')
					->get();
				//echo '<pre>'; print_r($countries_info);
				//exit;

			return view('site/cart',array('cart_items'=>$getallproduct,'user_info'=>$get_user_info[0],'country'=>$countries_info));
		}

	public function cookie()
		{
			if(isset($_COOKIE['cartinfo']))
			{
				$cartarray = unserialize($_COOKIE['cartinfo']);
				echo '<pre>'; print_r($cartarray);
				//echo $cartarray_count=count($cartarray);
				/*$quantity=0;
				foreach($cartarray as $key => $value)
				{
					$quantity=$quantity+$value['quantity'];
					$updated_quantity=$quantity;
				}
				echo $updated_quantity;*/
			}
		}

	public function add_cart()
		{
			$cookie_name="cartinfo";
			$new_cart_arr=array();
			$var=Input::except('_token');

			if(isset($_COOKIE['cartinfo']))
			{
				$newarray = unserialize($_COOKIE['cartinfo']);
				foreach($newarray as $key => $value)
				{
					array_push($new_cart_arr,$value);
				}
				array_push($new_cart_arr,$var);
	            setcookie('cartinfo', serialize($new_cart_arr), time() + (86400 * 30), "/"); // 86400 = 1 day
	            $cartarray_count=count($newarray)+1;
	            return json_encode(array('status'=>1,'cart_count'=>$cartarray_count));
	        }
	        else
	        {
	        	array_push($new_cart_arr,$var);
	            setcookie('cartinfo', serialize($new_cart_arr), time() + (86400 * 30), "/"); // 86400 = 1 day
	            $cartarray_count=1;
	            return json_encode(array('status'=>1,'cart_count'=>$cartarray_count));
	        }
	    }

    public function remove_cart_items()
	    {
	    	$var=Input::except('_token');
	    	$cart_cookie=$var['cart_key_id'];
	    	$newarray = unserialize($_COOKIE['cartinfo']);
	    	unset($newarray[$cart_cookie]);

	    	if(count($newarray) == 0)
	    		{
	              setcookie('cartinfo', '', time() + (86400 * 30), "/"); // 86400 = 1 day
	              return json_encode(array('status'=>1));
	          	}
	        else
	          	{
	              setcookie('cartinfo', serialize($newarray), time() + (86400 * 30), "/"); // 86400 = 1 day
	              return json_encode(array('status'=>1));
	          	}
	    }

	public function cart_update()
	    {
	    	$var=Input::except('_token');
			$cart_key=$var['cart_key'];
			$updated_quantity=$var['updated_quantity'];
			$newarray = unserialize($_COOKIE['cartinfo']);
			$newarray[$cart_key]['quantity']=$updated_quantity;
			setcookie('cartinfo', serialize($newarray), time() + (86400 * 30), "/"); // 86400 = 1 day
	        return json_encode(array('status'=>1));
		}

		
	public function checkout()
	    {
	    	$getallproduct=array();

			if(isset($_COOKIE['cartinfo']))
			{
				$cartarray = unserialize($_COOKIE['cartinfo']);
				foreach($cartarray as $key => $value)
				{
					$get_product=Product::join('product_images' , 'product_images.pro_id_fk' , '=' , 'products.id')
					->where('product_images.default_image', '=', '1')
					->where('products.id', '=', $value['pro_id'])
					->select('products.id as product_id','products.name as product_name','products.original_price as product_original_price','products.saling_price as product_saling_price','products.quantity as product_quantity','products.description as product_description','product_images.id as product_images_id','product_images.image as product_image','product_images.default_image as product_default_images')
					->get();

					$get_product[0]['quantity']=$value['quantity'];
					$getallproduct[$key]=$get_product;
				}
			}

	    	if (Auth::check())
				{
					$user_data = Auth::User();
	                $user_id=$user_data->id;
	                $get_user_info=User::join('user_infos' , 'user_infos.u_id_fk' , '=' , 'users.id')
	                ->where('users.id', '=', $user_id)
	                  ->get();
				}
			else
				{
					$get_user_info[0]="";
				}

				$countries_info= DB::table('countries')
					->get();
				//echo '<pre>'; print_r($get_user_info);
				//exit;

				return view('site/checkout',array('cart_items'=>$getallproduct,'user_info'=>$get_user_info[0],'country'=>$countries_info));

		}

		public function submit_cart_info()
	    {
	    	$var=Input::except('_token');
	    	echo '<pre>'; print_r($var);

	    	if (Auth::check())
				{
					$user_data = Auth::User();
					$trans_data = new Transactions;
					$trans_data->trans_code = 'TRAN'.time().rand(100,999);
					$trans_data->p_trans_code = 'PR'.time().rand(100,999);
					$trans_data->u_id_fk = $user_data->id;
					$trans_data->amount = 0;
					$trans_data->coupon_code = '';
					$trans_data->delivery_charges = 0;
					$trans_data->method = '';
					$trans_data->status = 'COMPLETE';
					$trans_data->save();
    				$trans_data_insert_id=$trans_data->id;

					if(isset($_COOKIE['cartinfo']))
						{
							$cartarray = unserialize($_COOKIE['cartinfo']);

								foreach($cartarray as $key => $value)
									{
										$order_data = new Orders;
						                $pro_id=$value['pro_id'];

						                $get_product=Product::where('products.id', '=', $pro_id)
										->get();
									}

						}

				}
			else
				{

				}
	    }

}
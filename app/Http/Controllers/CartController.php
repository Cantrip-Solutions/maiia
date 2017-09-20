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
use \App\Model\Bucket;
use \App\Model\Stock;
use DB;
use Validator;
use Crypt;
use Auth;
use Hash;
use Session;
use Cookie;

class CartController extends Controller
{
	public function cart()
		{
			$getallproduct=array();
			if (Auth::check())
				{
					$user_data = Auth::User();
			        $user_id=$user_data->id;

			        //syncronize cookie after login
					if(isset($_COOKIE['cartinfo']))
						{
							$cartarray = unserialize($_COOKIE['cartinfo']);
							foreach($cartarray as $key => $value)
							{
								$get_product_buying_price=Product::where('id', '=', $value['pro_id'])
									->select('products.saling_price as product_selling_price')
									->get();
								$buying_price=$get_product_buying_price[0]['product_selling_price'];

								$bucket_data= new Bucket;
				                $bucket_data->pro_id_fk=$value['pro_id'];
				                $bucket_data->u_id_fk=$user_id;
				                $bucket_data->quantity=$value['quantity'];
				                $bucket_data->buying_price=$buying_price;
				                $bucket_data->save();
				            }
				            setcookie('cartinfo', '', time() + (86400 * 30), "/"); // 86400 = 1 day
				        }
				        //end
				    
					    	$get_product=Product::join('buckets' , 'buckets.pro_id_fk' , '=' , 'products.id')
					    	->join('product_images' , 'product_images.pro_id_fk' , '=' , 'products.id')
							->where('product_images.default_image', '=', '1')
							->select('products.id as product_id','products.name as product_name','products.original_price as product_original_price','products.saling_price as product_saling_price','products.quantity as product_quantity','products.description as product_description','product_images.id as product_images_id','product_images.image as product_image','product_images.default_image as product_default_images','buckets.id as bucket_id','buckets.quantity as quantity')
							->get();

							foreach($get_product as $key => $value)
							{
								$product_cart_info=array();
								$product_cart_info['quantity']=$value['quantity'];
								$product_cart_info['product_id']=$value['product_id'];
								$product_cart_info['product_name']=$value['product_name'];
								$product_cart_info['product_saling_price']=$value['product_saling_price'];
								$product_cart_info['product_quantity']=$value['product_quantity'];
								$product_cart_info['product_description']=$value['product_description'];
								$product_cart_info['product_images_id']=$value['product_images_id'];
								$product_cart_info['product_image']=$value['product_image'];
								$product_cart_info['product_default_images']=$value['product_default_images'];
								$product_cart_info['bucket_id']=$value['bucket_id'];

								$getallproduct[$value['bucket_id']]=$product_cart_info;
							}
				}
			else
				{
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

							$product_cart_info=array();
							$product_cart_info['quantity']=$value['quantity'];
							$product_cart_info['product_id']=$value['pro_id'];
							$product_cart_info['product_name']=$get_product[0]->product_name;
							$product_cart_info['product_saling_price']=$get_product[0]->product_saling_price;
							$product_cart_info['product_quantity']=$get_product[0]->product_quantity;
							$product_cart_info['product_description']=$get_product[0]->product_description;
							$product_cart_info['product_images_id']=$get_product[0]->product_images_id;
							$product_cart_info['product_image']=$get_product[0]->product_image;
							$product_cart_info['product_default_images']=$get_product[0]->product_default_images;

							$getallproduct[$key]=$product_cart_info;
						}
					}
				}
				//echo '<pre>'; print_r($getallproduct);
				//exit;
			return view('site/cart',array('cart_items'=>$getallproduct));
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
			$var=Input::except('_token');
			$decoded_id = Crypt::decrypt($var['pro_id']);
			$var['pro_id']='';
			$var['pro_id']=$decoded_id;

			$get_product_buying_price=Product::where('id', '=', $decoded_id)
				->select('products.saling_price as product_selling_price','products.quantity as product_quantity')
				->get();

			//check if selected amount is greater than current available stock
			if($var['quantity'] > $get_product_buying_price[0]['product_quantity'])
				{
					return json_encode(array('status'=>2));
				}
			else
				{
					$buying_price=$get_product_buying_price[0]['product_selling_price'];

					if (Auth::check())
						{
							$user_data = Auth::User();
			                $user_id=$user_data->id;

							//check if already a product is added to cart
			                $count_exists_product=Bucket::where('pro_id_fk', '=', $var['pro_id'])
			                	->where('u_id_fk', '=', $user_id)
			                	->count();

			                if($count_exists_product == 0)
			                {
				                $bucket_data= new Bucket;
				                $bucket_data->pro_id_fk=$var['pro_id'];
				                $bucket_data->u_id_fk=$user_id;
				                $bucket_data->quantity=$var['quantity'];
				                $bucket_data->buying_price=$buying_price;
				                $bucket_data->save();
				             }
				             else
				             {
				             	$update_from_bucket=Bucket::where('pro_id_fk','=',$var['pro_id'])
				                	->where('u_id_fk', '=', $user_id)
			          				->update(['quantity' => $var['quantity']]);
				             }
				             //end check

			                $count_user_bucket_data=Bucket::where('u_id_fk', '=', $user_id)
			                	->count();

				            return json_encode(array('status'=>1,'cart_count'=>$count_user_bucket_data));
			            }
			        else
				        {
							$cookie_name="cartinfo";
							$new_cart_arr=array();

							if(isset($_COOKIE['cartinfo']))
							{
								$newarray = unserialize($_COOKIE['cartinfo']);
								foreach($newarray as $key => $value)
								{
									//if product already is in cart then ignore it from previous list
									if($value['pro_id'] != $var['pro_id'])
									{
										array_push($new_cart_arr,$value);
									}
								}
								//insert new product in cart
								array_push($new_cart_arr,$var);
								$cartarray_count=count($new_cart_arr);

					            setcookie('cartinfo', serialize($new_cart_arr), time() + (86400 * 30), "/"); // 86400 = 1 day
					            
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
			    }
	    }

    public function remove_cart_items()
	    {
	    	$var=Input::except('_token');
	    	$cart_cookie=$var['cart_key_id'];

	    	if (Auth::check())
				{
					$user_data = Auth::User();
	                $user_id=$user_data->id;

	                $delete_from_bucket=Bucket::where('id', '=', $cart_cookie)->delete();
	                return json_encode(array('status'=>1));
	            }
	        else
		       	{
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
	    }

	public function cart_update()
	    {
	    	$var=Input::except('_token');
			$cart_key=$var['cart_key'];
			$updated_quantity=$var['updated_quantity'];

			if (Auth::check())
				{
					$check_current_quantity=Bucket::where('id', '=', $cart_key)
						->get();

					$check_product_stock_quantity=Product::where('id', '=', $check_current_quantity[0]->pro_id_fk)
						->select('products.quantity as product_quantity')
						->get();

					if($updated_quantity > $check_product_stock_quantity[0]->product_quantity)
						{
							return json_encode(array('status'=>0));
						}
					else
						{
							$update_from_bucket=Bucket::where('id', '=', $cart_key)
		          				->update(['quantity' => $updated_quantity]);
			                return json_encode(array('status'=>1));
		            	}
				}
			else
				{
					$newarray = unserialize($_COOKIE['cartinfo']);
					$newarray[$cart_key]['quantity']=$updated_quantity;

					$check_product_stock_quantity=Product::where('id', '=', $newarray[$cart_key]['pro_id'])
						->select('products.quantity as product_quantity')
						->get();

					if($updated_quantity > $check_product_stock_quantity[0]->product_quantity)
						{
							return json_encode(array('status'=>0));
						}
					else
						{
							setcookie('cartinfo', serialize($newarray), time() + (86400 * 30), "/"); // 86400 = 1 day
			        		return json_encode(array('status'=>1));
		            	}
				}
		}
		
	public function checkout()
	    {
	    	$getallproduct=array();
	    	if (Auth::check())
				{
					$user_data = Auth::User();
	                $user_id=$user_data->id;

	                $get_user_info=User::join('user_infos' , 'user_infos.u_id_fk' , '=' , 'users.id')
	                ->where('users.id', '=', $user_id)
	                  ->get();

	                $user_bucket_data=Bucket::where('u_id_fk', '=', $user_id)
	                	->get();

	                $final_price=0;
	                foreach ($user_bucket_data as $key => $value)
		                {
		                	$amount=$value->quantity;
		                	$buying_price=$value->buying_price;
		                	$total_price=$amount*$buying_price;
		                	$final_price=$final_price+$total_price;
		                }
				}
			else
				{
					$get_user_info[0]="";
					if(isset($_COOKIE['cartinfo']))
						{
							$cartarray = unserialize($_COOKIE['cartinfo']);
							$final_price=0;
							foreach($cartarray as $key => $value)
								{
									$get_product_info=Product::where('products.id', '=', $value['pro_id'])
									->get();

									$amount=$value['quantity'];
				                	$buying_price=$get_product_info[0]->saling_price;
				                	$total_price=$amount*$buying_price;
				                	$final_price=$final_price+$total_price;
								}
						}
				}

				$countries_info= DB::table('countries')
					->get();

				return view('site/checkout',array('final_price'=>$final_price,'user_info'=>$get_user_info[0],'country'=>$countries_info));
		}

		public function submit_cart_info()
	    {
	    	$var=Input::except('_token');
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
					
					$user_bucket_data=Bucket::where('u_id_fk', '=', $user_data->id)
	                ->get();

					foreach($user_bucket_data as $key => $value)
						{
			                $pro_id_fk=$value['pro_id_fk'];
			                $get_product=Product::where('products.id', '=', $pro_id_fk)
							->get();

							$order_data = new Orders;
							$order_data->pro_id_fk=$pro_id_fk;
							$order_data->u_id_fk=$user_data->id;
							$order_data->trans_id_fk=$trans_data_insert_id;
							$order_data->billing_address=$var['address1'];
							$order_data->shipping_address=$var['address2'];
							$order_data->amount=$get_product[0]['saling_price'];
							$order_data->quantity=$value['quantity'];
							$order_data->total_price=$get_product[0]['saling_price']*$value['quantity'];
							$order_data->invoice_path='';
							$order_data->status='0';
							$order_data->save();

							$product_quantity=$get_product[0]['quantity'];
							$updated_quantity=$get_product[0]['quantity']-$value['quantity'];

							$update_product_quantity=Product::where('id', '=', $pro_id_fk)
          					->update(['quantity' => $updated_quantity]);

          					$update_product_quantity_stock=Stock::where('pro_id_fk', '=', $pro_id_fk)
          					->update(['quantity' => $updated_quantity]);
						}
						
						$delete_from_bucket=Bucket::where('u_id_fk', '=', $user_data->id)->delete();
						Session::flash('message', 'Your Order was Successfully Placed.');
						return redirect('my-account');
				}
			else
				{
					$checkout_data['name']=$var['name'];
	                $checkout_data['email']=$var['email'];
	                $checkout_data['password']=Hash::make($var['password']);
	                $checkout_data['mobileno']=$var['phone'];
	                $checkout_data['u_role']='U';
	                $user_data_insert = User::create($checkout_data);
	                $user_last_insert_id=$user_data_insert->id;

	                $userinfo = new UserInfo;
	                $userinfo->name = $var['name'];
	                $userinfo->u_id_fk = $user_last_insert_id;
	                $userinfo->email = $var['email'];
	                $userinfo->phone = $var['phone'];
	                $userinfo->address1 = $var['address1'];
	                $userinfo->address2 = $var['address2'];
	                $userinfo->postal_code = $var['postal_code'];
	                $userinfo->country = $var['country'];
	                $userinfo->city = $var['city'];
	                $userinfo->default_address_flag = 1;
	                $userinfo->save();

        			$userauthdata = array(
	                'email' => $var['email'],
	                'password' => $var['password'],
	                'status' => 1,
	                );

        			if (Auth::attempt($userauthdata))
	                  {
	                    $user_data = Auth::User();
	                    Session::put('id', $user_data->id);
	                    Session::put('email', $user_data->email);
                      	Session::put('name', $user_data->name);
	                    Session::put('u_role' , $user_data->u_role);
	                  }

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
											$get_product_info=Product::where('products.id', '=', $value['pro_id'])
											->get();

											$order_data = new Orders;
											$order_data->pro_id_fk=$value['pro_id'];
											$order_data->u_id_fk=$user_data->id;
											$order_data->trans_id_fk=$trans_data_insert_id;
											$order_data->billing_address=$var['address1'];
											$order_data->shipping_address=$var['address2'];
											$order_data->amount=$get_product_info[0]['saling_price'];
											$order_data->quantity=$value['quantity'];
											$order_data->total_price=$get_product_info[0]['saling_price']*$value['quantity'];
											$order_data->invoice_path='';
											$order_data->status='0';
											$order_data->save();
										}
								}
							setcookie('cartinfo', '', time() + (86400 * 30), "/"); // 86400 = 1 day
							Session::flash('message', 'Your Order has been sucessfully Placed.');
	                    	return redirect('/my-account');
						}
				}
	    }

}
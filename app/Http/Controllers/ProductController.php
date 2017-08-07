<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Product;
use \App\User;
use \App\Model\UserInfo;
use \App\Model\Category;
use Validator;
use Hash;
use File;
use Illuminate\Support\Facades\Input;
use Mail;
use Session;
use Image;

class ProductController extends Controller
{
    public function chartProduct()
    {
    	$live  = array('menu'=>'35','parent'=>'3');
    	$products = Product::all();
    	return view('admin.chartProduct', compact('live','products'));
    }

    public function addProduct()
    {
    	$live  = array('menu'=>'35','parent'=>'3');
    	$companyUsers = User::where('u_role','=','S')->get();
    	$categories=Category::where('id','<>',1)->get();
    	//echo "<pre>";print_r($categories);
    	return view('admin.addProduct', compact('live','companyUsers','categories'));
    }

    public function createProduct(){

    	$data=Input::except('_token','submit');

    	$name  = $data['name'];
    	$u_id_fk  = $data['u_id_fk'];
    	$cat_id_fk  = $data['cat_id_fk'];
    	$ammount  = $data['ammount'];
    	$original_price  = $data['original_price'];
    	$saling_price  = $data['saling_price'];
    	$quantity  = $data['quantity'];
    	$expire_on  = $data['expire_on'];
    	$description  = $data['description'];

		$rules = array(
			// 'file' => 'required|mimes:png,gif,jpeg,jpg',
			'name'    => 'required',
			'u_id_fk'    => 'required',
			'cat_id_fk'    => 'required',
			'ammount'    => 'required',
			'original_price'    => 'required',
			'saling_price'    => 'required',
			'quantity'    => 'required',
			'expire_on'    => 'required',
			'description'    => 'required'
        );
        $validator = Validator::make(array(
			'name'  => $name,
			'u_id_fk'  => $u_id_fk,
			'cat_id_fk'  => $cat_id_fk,
			'ammount'  => $ammount,
			'original_price'  => $original_price,
			'saling_price'  => $saling_price,
			'quantity'  => $quantity,
			'expire_on'  => $expire_on,
			'description'  => $description
        ), $rules);
        if ($validator->fails()) {

            return back()
                ->withErrors($validator)
                ->withInput();

        } else{

        	if (Input::hasfile('image')) {

                $image   = Input::file('image');
                $ext=$image->getClientOriginalExtension();
              
                $filename  = 'PRO'.time().'.'.$ext;
                $target  = config('global.productPath');
                $path = $target.$filename;
                Image::make($image->getRealPath())->save($path);

        		$product = new Product;
        		$product->name = $name;
        		$product->u_id_fk = $u_id_fk;
                $product->cat_id_fk = $cat_id_fk;
                $product->ammount = $ammount;
                $product->original_price = $original_price;
                $product->saling_price = $saling_price;
                $product->quantity = $quantity;
                $product->expire_on = date("Y-m-d", strtotime($expire_on));
                $product->description = $description;
                $product->image=$filename;
                $tag=str_replace(' ', '' ,strtolower($name));
                $product->tag=$tag;
        		$product->save();
                
        		$last_insert_id = $product->id;
        		
				Session::flash('message', 'Product create successfull.');
		        
            }else{
               Session::flash('message', 'Product Not Created . Please insert Product Image.');

            }
            return redirect('/tab/product/add');
        }
    }
}

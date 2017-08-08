<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Product;
use \App\User;
use \App\Model\UserInfo;
use \App\Model\Category;
use \App\Model\ProductImage;
use Validator;
use Hash;
use File;
use Illuminate\Support\Facades\Input;
use Mail;
use Session;
use Image;
use Crypt;

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
    	$companyUsers = User::where('u_role','=','S')->where('status','!=','2')->get();
    	$categories=Category::where('id','<>',1)->get();
    	//echo "<pre>";print_r($categories);
    	return view('admin.addProduct', compact('live','companyUsers','categories'));
    }

    public function createProduct(){

    	$data=Input::except('_token','submit');
        // print_r($data);
        // exit;
        $name           = $data['name'];
        $u_id_fk        = $data['u_id_fk'];
        $cat_id_fk      = $data['cat_id_fk'];
        $original_price = $data['original_price'];
        $saling_price   = $data['saling_price'];
        $quantity       = $data['quantity'];
        $tag            = $data['tag'];
        $expire_on      = $data['expire_on'];
        $description    = $data['description'];

		$rules = array(
			// 'file' => 'required|mimes:png,gif,jpeg,jpg',
            'name'           => 'required',
            'u_id_fk'        => 'required',
            'cat_id_fk'      => 'required',
            'original_price' => 'required',
            'saling_price'   => 'required',
            'quantity'       => 'required',
            'tag'            => 'required',
            'expire_on'      => 'required',
            'description'    => 'required'
        );
        $validator = Validator::make(array(
            'name'           => $name,
            'u_id_fk'        => $u_id_fk,
            'cat_id_fk'      => $cat_id_fk,
            'original_price' => $original_price,
            'saling_price'   => $saling_price,
            'quantity'       => $quantity,
            'tag'            => $tag,
            'expire_on'      => $expire_on,
            'description'    => $description
        ), $rules);
        if ($validator->fails()) {

            return back()
                ->withErrors($validator)
                ->withInput();

        } else{

        	if (Input::hasfile('image')) {

                $image    = Input::file('image');
                $ext      = $image->getClientOriginalExtension();
                
                $filename = 'PRO'.time().'.'.$ext;
                $target   = config('global.productPath');
                $path     = $target.$filename;
                Image::make($image->getRealPath())->save($path);

                $product                 = new Product;
                $product->name           = $name;
                $product->u_id_fk        = $u_id_fk;
                $product->cat_id_fk      = $cat_id_fk;
                $product->original_price = $original_price;
                $product->saling_price   = $saling_price;
                $product->quantity       = $quantity;
                $product->expire_on      = date("Y-m-d", strtotime($expire_on));
                $product->description    = $description;
                $product->tag            = $tag;
        		$product->save();
                
        		$last_insert_id = $product->id;

                $newProductImage = new ProductImage;
                $newProductImage->pro_id_fk = $last_insert_id;
                $newProductImage->image = $filename;
                $newProductImage->default_image = '1';
                $newProductImage->save();

        		
				Session::flash('message', 'Product create successfull.');
		        
            }else{
               Session::flash('message', 'Product Not Created . Please insert Product Image.');

            }
            return redirect('/tab/product/add');
        }
    }

    public function deleteProduct($id)
    {
        $pID = Crypt::decrypt($id);
        $productDelete = Product::find($pID);
        $productDelete->delete();
        Session::flash('message', 'Product deleted successfully.');
        return redirect()->back();
    }

    public function editProduct($name, $id)
    {
        $live  = array('menu'=>'35','parent'=>'3');
        $pdID = Crypt::decrypt($id);
        $productInfo = Product::find($pdID);
        $companyUsers = User::where('u_role','=','S')->where('status','!=','2')->get();
        $categories=Category::where('id','<>',1)->get();

        return view('admin.editProduct', compact('live','productInfo','companyUsers','categories'));
        
    }

    public function updateProduct()
    {
        $data=Input::except('_token','submit');
        // print_r($data);
        // exit;
        $pdID           = Crypt::decrypt($data['id']);
        $name           = $data['name'];
        $u_id_fk        = $data['u_id_fk'];
        $cat_id_fk      = $data['cat_id_fk'];
        $original_price = $data['original_price'];
        $saling_price   = $data['saling_price'];
        $quantity       = $data['quantity'];
        $tag            = $data['tag'];
        $expire_on      = $data['expire_on'];
        $description    = $data['description'];

        $rules = array(
            // 'file' => 'required|mimes:png,gif,jpeg,jpg',
            'name'           => 'required',
            'u_id_fk'        => 'required',
            'cat_id_fk'      => 'required',
            'original_price' => 'required',
            'saling_price'   => 'required',
            'quantity'       => 'required',
            'tag'            => 'required',
            'expire_on'      => 'required',
            'description'    => 'required'
        );
        $validator = Validator::make(array(
            'name'           => $name,
            'u_id_fk'        => $u_id_fk,
            'cat_id_fk'      => $cat_id_fk,
            'original_price' => $original_price,
            'saling_price'   => $saling_price,
            'quantity'       => $quantity,
            'tag'            => $tag,
            'expire_on'      => $expire_on,
            'description'    => $description
        ), $rules);
        if ($validator->fails()) {

            return back()
                ->withErrors($validator)
                ->withInput();

        } else{
            $productUpdate = Product::where('id','=',$pdID)->update([
                'name'           => $name,
                'u_id_fk'        => $u_id_fk,
                'cat_id_fk'      => $cat_id_fk,
                'original_price' => $original_price,
                'saling_price'   => $saling_price,
                'quantity'       => $quantity,
                'tag'            => $tag,
                'expire_on'      => $expire_on,
                'description'    => $description
            ]);

            if (Input::hasfile('image')) {

                $image    = Input::file('image');
                $ext      = $image->getClientOriginalExtension();
                
                $filename = 'PRO'.time().'.'.$ext;
                $target   = config('global.productPath');
                $path     = $target.$filename;
                Image::make($image->getRealPath())->save($path);

                $productImageUpdate = ProductImage::where('pro_id_fk','=',$pdID)->update([
                    'default_image'=>'0'
                    ]);

                $newProductImage = new ProductImage;
                $newProductImage->pro_id_fk = $pdID;
                $newProductImage->image = $filename;
                $newProductImage->default_image = '1';
                $newProductImage->save();
            }

            Session::flash('message', 'Product updated successfull.');
            return redirect()->back();


        }
    }
}

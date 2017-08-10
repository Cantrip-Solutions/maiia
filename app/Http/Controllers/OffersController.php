<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Model\ProductDiscount;
use \App\Model\Coupons;

class OffersController extends Controller
{
 	public function productDiscount(){
 		
 		$live  = array('menu'=>'36','parent'=>'4');
 		$discounts = ProductDiscount::where('status','=','0')->get();
 		// $discountproduct = 
 		// if($discountproduct->module == 'C'){
 		// 	$discountproduct=ProductDiscount::join('categories','product_discounts.mid','=','categories.id')->select('product_discounts.*','categories.*')->get();
 		// }else{
 		// 	$discountproduct=ProductDiscount::join('products','product_discounts.mid','=','products.id')->select('product_discounts.*','products.*')->get();
 		// }
   //      //echo "<pre>"; print_r($categories);echo "</pre>";
    	return view('admin.chartDiscount', compact('live','discounts'));

 	}

 	public function chartCoupons()
 	{
 		$live  = array('menu'=>'38','parent'=>'4');
 		$coupons = Coupons::all();
    	return view('admin.chartCoupons', compact('live','coupons'));
 		
 	}
 	public function addCoupons()
 	{
 		$live  = array('menu'=>'38','parent'=>'4');
    	return view('admin.addCoupons', compact('live'));
 	}
 	public function createCoupon(Request $req)
 	{
 		
 	}
}

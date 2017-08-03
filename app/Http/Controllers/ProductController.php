<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function chartProduct()
    {
    	$live  = array('menu'=>'35','parent'=>'3');
    	return view('admin.chartProduct', compact('live'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class DashboardController extends Controller
{
    public function gotoDashboard()
    {
    	$live = array('menu'=>'11','parent'=>'1');
    	if (Auth::user()->u_role == 'A') {
    		return view('admin.adminDashboard',compact('live'));	//Go to Super Admin Dashboard 
    	} else if(Auth::user()->u_role == 'S'){
    		return view('vendor.vendorDashboard',compact('live'));	//Go to Super Admin Dashboard 
    	}
    }
}

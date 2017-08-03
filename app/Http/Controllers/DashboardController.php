<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function gotoDashboard()
    {
    	$live = array('menu'=>'11','parent'=>'1');
    	//Go to Super Admin Dashboard 
    	return view('admin.adminDashboard',compact('live'));
    }
}

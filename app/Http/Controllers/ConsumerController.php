<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;
use \App\Model\UserInfo;

class ConsumerController extends Controller
{
    //Display DataTables of Consumer List in Admin Panel
    public function chartConsumer()
    {
    	$live = array('menu'=>'31','parent'=>'2');
    	$users = User::where('u_role','=','U')->get();
    	return view('admin.chartConsumer', compact('live','users'));
    }
}

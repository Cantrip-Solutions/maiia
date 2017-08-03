<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;
use \App\Model\UserInfo;
use Crypt;
use DB;

class ConsumerController extends Controller
{
    //Display DataTables of Consumer List in Admin Panel
    public function chartConsumer()
    {
    	$live = array('menu'=>'31','parent'=>'2');
    	$users = User::where('u_role','=','U')->get();
    	return view('admin.chartConsumer', compact('live','users'));
    }
    public function viewConsumer($name, $id)
    {
		$uID      = Crypt::decrypt($id);
		$live     = array('menu'=>'32','parent'=>'2');
		$user     = User::find($uID);
		$userInfo = UserInfo::where('u_id_fk','=',$uID)->first();
		$country  = DB::table('countries')->find($userInfo->country);
		$state    = DB::table('states')->find($userInfo->state);
		$city     = DB::table('cities')->find($userInfo->city);
    	return view('admin.viewUser', compact('live','country','user','userInfo','state','city'));
    }
}

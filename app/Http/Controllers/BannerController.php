<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Hash;
use Illuminate\Support\Facades\Input;
use Validator;
use File;
use Session;
use Image;
use \App\Model\Banner;
use Crypt;

class BannerController extends Controller
{
     public function chartBanner()
    {
        $live  = array('menu'=>'43','parent'=>'9');
        $banners = Banner::all();
        return view('admin.chartBanner', compact('live','banners'));
    }
    public function addBanner()
        {
            $live = array('menu'=>'43','parent'=>'9');
            return view('admin.addBanner', compact('live'));
        }

    public function createBanner()
        {
           	$var=Input::except('_token','submit');
           	$rules = array(
            'title' => 'required'
            //'file'=> 'required|mimes:png,gif,jpeg,jpg,mp4'
	        );
	        $validator = Validator::make(array(
	            'title' => $var['title']
	            //'file' => @$var['file']
	        ), $rules);

            if ($validator->fails()) {
                return back()
                    ->withErrors($validator)
                    ->withInput();
            }else{
                    $image    = Input::file('file');
                    $ext      = $image->getClientOriginalExtension();

                    $filename = 'BANNER'.time().rand(100,999).'.'.$ext;
                    $target   = config('global.bannerPath');

                    if($ext == 'mp4'){
                        $image->move($target, $filename);
                    }
                    else{
                        $path     = $target.$filename;
                        Image::make($image->getRealPath())->save($path);
                    }
                    $banner = new Banner;
                    $banner->title= $var['title'];
                    $banner->description=$var['description'];
                    $banner->file=$filename;
                    $banner->status=$var['status'];
                    $banner->save();
                    Session::flash('message', 'Banner added successfull.');
                    return redirect('/settings/bannerManagement');
            }
        }

    public function deleteBanner($id)
    {
        $id = Crypt::decrypt($id);
        $file_old = Banner::find($id);
        $filename = $file_old->file;
        $path = public_path(). '/images/bannerImage/'.$filename;
        $bannerDelete = Banner::where('id','=',$id)->delete();
        if($bannerDelete){
            \File::delete($path);
        }
        Session::flash('message', 'Banner deleted successfully.');
        return redirect()->back();
    }

        public function editBanner($name, $id)
    {
        $live = array('menu'=>'43','parent'=>'9');
        $bID = Crypt::decrypt($id);
        $bannerInfo = Banner::find($bID);
        return view('admin.editBanner', compact('live','bannerInfo'));
        
    }
      public function updateBanner(){



      }


}
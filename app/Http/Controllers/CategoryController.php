<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;
use \App\Model\UserInfo;
use \App\Model\Category;
use Validator;
use Hash;
use File;
use Illuminate\Support\Facades\Input;
use Mail;
use Session;


class CategoryController extends Controller
{
	//Display DataTables of Category List in Admin Panel
    public function chartCategory()
    {
		$live  = array('menu'=>'33','parent'=>'3');
		$categories=Category::get();
        $categories=$this->formate_category($categories,0);
        //echo "<pre>"; print_r($categories);echo "</pre>";
    	return view('admin.chartCategory', compact('live','categories'));
    }

    public function formate_category($categories,$parent_cat_id)
     {

        $formated_category_array=array();

        foreach ($categories as $key => $value) {

            if($value->parent_cat_id == $parent_cat_id ) {
                $formated_category_array[ $value->id ]=array('name'=> $value->cat_name);
            }elseif( array_key_exists($value->parent_cat_id, $formated_category_array)){

                $formated_category_array[ $value->parent_cat_id ]['child']=1;
            }
        }
        //print_r($formated_category_array);die;
       return $formated_category_array;
     }

    // Add new Category from Admin Panel
    public function addCategory(){
    	$live = array('menu'=>'33','parent'=>'3');
       
    	return view('admin.addCategory', compact('live'));
    }

    public function createCategory(Request $req)
    {
		$cat_name  = $req->cat_name;
		$cat_description = $req->cat_description;
		$rules = array(
			// 'file' => 'required|mimes:png,gif,jpeg,jpg',
			'cat_name'    => 'required',
			'cat_description'   => 'required',
        );
        $validator = Validator::make(array(
			'cat_name'  => $cat_name,
			'cat_description' => $cat_description
            ), $rules);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        } else{
        	
        		$ctaegory = new Category;
        		$ctaegory->cat_name = $cat_name;
        		$ctaegory->cat_description = $cat_description;
        		$ctaegory->save();

        		$last_insert_id = $ctaegory->id;
        		
				Session::flash('message', 'Cetagory create successfull.');
		        return redirect('/tab/category/add');

        	
        }
    }

    public function getSubCategories(Request $req)
    {
        $parent_cat_id = $req->parent_cat_id;
        $sub_categories=Category::get();
        $sub_categories=$this->formate_category($sub_categories,$parent_cat_id);
        echo json_encode($sub_categories); 
    }
    
    public function addsubCategory($parent_cat_id){
        echo $parent_cat_id;
    }
}
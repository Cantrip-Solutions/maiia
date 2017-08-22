<?php
namespace App\Helpers;
use \App\Model\Category;
use DB;
use Hash;
use Auth;
use Input;
use Redirect;
use Session;
use Validator;
use URL;

class CustomHelper {
    public static function all_parent_category()
      {
        $category = Category::select('*')
          ->where('parent_cat_id', '=', 0)
          ->where('id', '!=', 1)
          ->get();
          //print_r($category); exit;
          return $category;
      }
}
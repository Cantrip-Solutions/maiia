<?php
namespace App\Helpers;
use \App\Model\Category;
use App\Model\Product;
use \App\Model\ProductImage;
use \App\Model\Bucket;
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
          return $category;
      }

    public static function chartCategory() {
      $category = array();
      $new_cat=array();

      $categories=Category::where('id', '!=', 1)
      ->where('parent_cat_id', '=', 0)
      ->get();

      foreach ($categories as $key => $value) {
        $parent_id=$value['id'];
        $categories=self::categoryChild($parent_id);
        $new_cat[$value['cat_name']]=$categories;
      }
       return $new_cat;
    }

    public static function categoryChild($parent_id) {
        $get_all_child=Category::where('parent_cat_id', '=', $parent_id)
        ->get();

        $count=$get_all_child->count();
        $children = array();

        if($count > 0) {
          foreach ($get_all_child as $key => $value) {
              $children[$value['id']] = self::categoryChild($value['id']);
              $children[$value['id']]['name'] = $value->cat_name;
            }
        }
        return $children;
    }

    public static function count_cart_items() {

      if (Auth::check())
        {
          $user_data = Auth::User();
          $count_cart=Bucket::where('u_id_fk', '=', $user_data->id)
                    ->count();
        }
      else
        {
          if(isset($_COOKIE['cartinfo']))
              {
                $cartarray = unserialize($_COOKIE['cartinfo']);
                if(count($cartarray) > 0)
                  {
                    $count_cart=count($cartarray);
                  }
              }
            else
              {
                $count_cart=0;
              }
        }
          
        return $count_cart;
    }


    public static function count_product_items() {
      if(isset($_COOKIE['cartinfo']))
        {
          $cartarray = unserialize($_COOKIE['cartinfo']);
          $quantity=0;
          foreach($cartarray as $key => $value)
          {
            $quantity=$quantity+$value['quantity'];
            $updated_quantity=$quantity;
          }
          return $updated_quantity;
        }
      else
        {
          $updated_quantity=0;
        }
        return $updated_quantity;
    }


}
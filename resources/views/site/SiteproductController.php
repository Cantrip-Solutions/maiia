<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Model\Product;
use \App\Model\Category;
use \App\Model\ProductImage;
use \App\Model\Stock;
use Illuminate\Support\Facades\Input;
use Session;
use Crypt;
use DB;

class SiteproductController extends Controller
{
  public function productList($id)
    {
		$getChildCategory=array();
		$getallproduct=array();
        $parentCatId='';
		$decoded_id=base64_decode($id);
		$get_cat_name=Category:: where('id', '=', $decoded_id)
			->select('categories.cat_name as category_name')
			->get();
		$categories=Category::where('parent_cat_id', '=', $decoded_id)->get();
		array_push($getChildCategory, $decoded_id);

		foreach($categories as $key =>$values){
			  $categoryId=$values['id'];
			  array_push($getChildCategory, $categoryId);
			}
	  

		foreach($getChildCategory as $ckey =>$cvalues){
			  $get_product=Category::join('products' , 'products.cat_id_fk' , '=' , 'categories.id')
			   ->join('product_images' , 'product_images.pro_id_fk' , '=' , 'products.id')
			   ->where('categories.id', '=',$cvalues)
			   ->where('product_images.default_image', '=', '1')
			    ->select('products.id as product_id','products.name as product_name','products.original_price as product_original_price','products.saling_price as product_saling_price','products.quantity as product_quantity','products.description as product_description','categories.id as cat_id','categories.cat_name as cat_name','product_images.id as product_images_id','product_images.image as product_image','product_images.default_image as product_default_images')
			   ->get();

			  array_push($getallproduct, $get_product);
			}
		return view('site.product',array('categories'=>$getallproduct,'getCategory'=>$categories,'category_name'=>$get_cat_name[0],'categoryId'=>$decoded_id));
    }

    public function productDetails($id)
     {
          $decoded_id=base64_decode($id);
          $get_product_info=Product::where('id', '=', $decoded_id)->get();
          $cat_id=$get_product_info[0]->cat_id_fk;

           $get_product_all_image_info=ProductImage::where('pro_id_fk', '=', $decoded_id)
	          ->orderBy('default_image', 'DESC')
	          ->get();

          $get_related_product_all=Product::join('product_images' , 'product_images.pro_id_fk' , '=' , 'products.id')
          	->where('products.cat_id_fk', '=', $cat_id)
          	->where('products.id', '!=', $decoded_id)
          	->where('product_images.default_image', '=', '1')
          	->select('products.id as product_id','products.name as product_name','products.original_price as product_original_price','products.saling_price as product_saling_price','products.quantity as product_quantity','products.description as product_description','product_images.id as product_images_id','product_images.image as product_image','product_images.default_image as product_default_images')
          	->orderByRaw("RAND()")
          	->get();

        return view('site.productDetails',array('product_details'=>$get_product_info[0],'images'=>$get_product_all_image_info,'related_product'=>$get_related_product_all));
     }

     public function productSortingList(Request $request){
     	$getChildCategory=array();
		$getallproduct=array();
		$productSortingHtml='';
		$jsnArray=array();
		$nb = 7;
     	$orderby = trim($request->input('value'));
        $catid = trim($request->input('catid'));
        $decoded_id=base64_decode($catid);
        $categories=Category::where('parent_cat_id', '=', $decoded_id)->get();

		array_push($getChildCategory, $decoded_id);

		// print_r($getChildCategory);
		// exit;

		foreach($categories as $key =>$values){
			  $categoryId=$values['id'];
			  array_push($getChildCategory, $categoryId);
			}
			

		$get_products = Product::whereIn('cat_id_fk',$getChildCategory)
						->join('product_images' , 'product_images.pro_id_fk' , '=' , 'products.id')
						->where('product_images.default_image', '=', '1')
						->selectRaw("products.id as product_id,products.name as product_name,products.original_price as product_original_price,products.saling_price as product_saling_price,products.quantity as product_quantity,products.description as product_description,products.updated_at as product_date,product_images.id as product_images_id,product_images.image as product_image,product_images.default_image as product_default_images");
						// ->where(function($query) use ($orderby) {
				  //           if($orderby != ''){
				  //           	if($orderby=='new'){
				  //               $query->where('products.updated_at','=', new DateTime('-'.$nb.' days'));
				  //           }
				  //          }
				  //      });

							$orderBy = 'products.id';
					        $ordertype = 'DESC';
					        if ($orderby != ''){
					            $orderBy = 'products.saling_price';
					            if($orderby=='high'){
					            	 $ordertype = 'DESC';
					            }elseif($orderby=='low'){
					            	$ordertype = 'ASC';
					            }
					        }

					$get_product = $get_products->orderBy($orderBy, $ordertype)->get();

			   /*->where(function($query) use ($orderby) {
		            if($orderby != ''){
		            	if($orderby=='new'){
		                $query->whereBetween('products.updated_at',array(date("Y-m-d", strtotime("products.updated_at")),date('Y-m-d')));
		            }
		           }
		       });*/
			// echo '<pre>'; print_r($get_product); exit;
		foreach($get_product as $key => $value)
			{
						$productSortingHtml='<li>';
						$productSortingHtml.=        '<div class="new-prod">';
						$productSortingHtml.=         '<div class="prod">';
						$productSortingHtml.=          '<figure><img src="'.url('/images/productImage').'/'.$value->product_image.'"></figure>';
						$productSortingHtml.=       '<div class="view-sec">';
						$productSortingHtml.=       '<ul class="view-icon">';
						$productSortingHtml.=         '<li><a href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>';
						$productSortingHtml.=        '<li><a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a></li>';
						$productSortingHtml.=         '<li><a href="#"><i class="fa fa-refresh" aria-hidden="true"></i></a></li> </ul>';
						$productSortingHtml.=       '<a href="'.url('/product-details').'/'.base64_encode($value->product_id).'" class="quick-view fancybox">';
						$productSortingHtml.=          '<i class="fa fa-search" aria-hidden="true"></i>
						Quick View';
						$productSortingHtml.=      '</a></div></div>';

						$productSortingHtml.=   '<div class="btm">';
						$productSortingHtml.=     '<h2>' .$value->product_name.'</h2>';
						$productSortingHtml.=   ' <div class="price">';
						$productSortingHtml.=   ' <span>$' .$value->product_original_price.'</span>';
						$productSortingHtml.=   '<span>$' .$value->product_saling_price.'</span>';
						$productSortingHtml.=   '</div>';
						$productSortingHtml.=   '</div>';
						$productSortingHtml.= '</div>';
						$productSortingHtml.= '</li>';

						array_push($jsnArray, $productSortingHtml);        
            }
	            $jsnArray['productlist']=$jsnArray;
			   	echo json_encode($jsnArray);
     }

     public function categoryCheck(Request $request){
     	  $productSortingHtml='';
		  $jsnArray=array();
           $category = strip_tags(trim($request->input('category')));
		   $catid = explode(',',$category);
		   $get_products = Product::whereIn('cat_id_fk',$catid)
		                 ->join('product_images' , 'product_images.pro_id_fk' , '=' , 'products.id')
						 ->where('product_images.default_image', '=', '1')
						 ->selectRaw("products.id as product_id,products.name as product_name,products.original_price as product_original_price,products.saling_price as product_saling_price,products.quantity as product_quantity,products.description as product_description,products.updated_at as product_date,product_images.id as product_images_id,product_images.image as product_image,product_images.default_image as product_default_images")->get();

			foreach($get_products as $key => $value)
			{
						$productSortingHtml='<li>';
						$productSortingHtml.=        '<div class="new-prod">';
						$productSortingHtml.=         '<div class="prod">';
						$productSortingHtml.=          '<figure><img src="'.url('/images/productImage').'/'.$value->product_image.'"></figure>';
						$productSortingHtml.=       '<div class="view-sec">';
						$productSortingHtml.=       '<ul class="view-icon">';
						$productSortingHtml.=         '<li><a href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>';
						$productSortingHtml.=        '<li><a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a></li>';
						$productSortingHtml.=         '<li><a href="#"><i class="fa fa-refresh" aria-hidden="true"></i></a></li> </ul>';
						$productSortingHtml.=       '<a href="'.url('/product-details').'/'.base64_encode($value->product_id).'" class="quick-view fancybox">';
						$productSortingHtml.=          '<i class="fa fa-search" aria-hidden="true"></i>
						Quick View';
						$productSortingHtml.=      '</a></div></div>';

						$productSortingHtml.=   '<div class="btm">';
						$productSortingHtml.=     '<h2>' .$value->product_name.'</h2>';
						$productSortingHtml.=   ' <div class="price">';
						$productSortingHtml.=   ' <span>$' .$value->product_original_price.'</span>';
						$productSortingHtml.=   '<span>$' .$value->product_saling_price.'</span>';
						$productSortingHtml.=   '</div>';
						$productSortingHtml.=   '</div>';
						$productSortingHtml.= '</div>';
						$productSortingHtml.= '</li>';

						array_push($jsnArray, $productSortingHtml);        
            }
	            $jsnArray['productlist']=$jsnArray;
			   	echo json_encode($jsnArray);
     }

}
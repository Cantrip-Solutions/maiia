<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\User;
use \App\Model\UserInfo;
use \App\Model\Category;
use App\Model\Product;
use \App\Model\ProductImage;
use \App\Model\Banner;
use Validator;
use Auth;
use Hash;
use Session;
use Cookie;

class HomeController extends Controller
{
   /**
    * Create a new controller instance.
    *
    * @return void
    */
   // public function __construct()
   // {
   //     $this->middleware('auth');
   // }

   /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Http\Response
    */
  public function index()
   {
        $get_featured_product=Product::join('product_images' , 'product_images.pro_id_fk' , '=' , 'products.id')
            ->where('product_images.default_image', '=', '1')
            ->where('featured', '=', '1')
            ->select('products.id as product_id','products.name as product_name','products.original_price as product_original_price','products.saling_price as product_saling_price','products.quantity as product_quantity','products.description as product_description','product_images.id as product_images_id','product_images.image as product_image','product_images.default_image as product_default_images')
            ->limit(3)
            ->get();

        $get_new_in_product=Product::join('product_images' , 'product_images.pro_id_fk' , '=' , 'products.id')
            ->where('product_images.default_image', '=', '1')
            ->where('products.cat_id_fk', '!=', '1')
            ->select('products.id as product_id','products.name as product_name','products.original_price as product_original_price','products.saling_price as product_saling_price','products.quantity as product_quantity','products.description as product_description','product_images.id as product_images_id','product_images.image as product_image','product_images.default_image as product_default_images')
            ->orderBy('products.id', 'DESC')
            ->limit(10)
            ->get();

        $get_banner_details=Banner::select('*')
          ->where('banners.status', '=', '1')
          ->get();
                    
          return view('site/home',array('banner_details'=>$get_banner_details,'featured_product'=>$get_featured_product,'new_in_product'=>$get_new_in_product));
   }

  public function registrationView()
   {
       return view('site/register');
   }

  public function submitRegistration(Request $req)
    {
        $email  = $req->email;
        $password = $req->password;
        $mobileno= $req->mobileno;
        $gender= $req->gender;

        $rules = array(
          'email'    => 'required|email|unique:users',
          'password'    => 'required',
          'mobileno'    => 'required',
        );

        $validator = Validator::make(array(
          'email'  => $email,
          'password'  => $password,
          'mobileno'  => $mobileno,
          ), $rules);

            if ($validator->fails())
              {
                  return back()
                  ->withErrors($validator)
                  ->withInput();
              }
            else
              {
                $user_data['name']='User';
                $user_data['email']=$email;
                $user_data['password']=Hash::make($password);
                $user_data['mobileno']=$mobileno;
                $user_data['u_role']='U';
                $user_data['gender']=$gender;
                $user_data_insert = User::create($user_data);
                $user_last_insert_id=$user_data_insert->id;

                $userinfo = new UserInfo;
                $userinfo->name = $user_data['name'];
                $userinfo->u_id_fk = $user_last_insert_id;
                $userinfo->email = $email;
                $userinfo->gender = $gender;
                $userinfo->phone = $mobileno;
                $userinfo->default_address_flag = 1;
                $userinfo->save();

                if($userinfo)
                  {
                    Session::flash('message', 'Your Registration Was Successfull.');
                    return redirect('/');
                  }
                else
                  {
                    Session::flash('message', 'Registration Falied. Try Again Later!!');
                    return redirect('/');
                  }
              }
    }

  public function loginView()
   {
       return view('site/login');
   }

  public function submitLogin(Request $req)
   {
        $email  = $req->email;
        $password = $req->password;
       
        $rules = array(
          'email'    => 'required',
          'password'    => 'required',
        );

        $validator = Validator::make(array(
          'email'  => $email,
          'password'  => $password,
          ), $rules);

            if ($validator->fails())
              {
                  return back()
                  ->withErrors($validator)
                  ->withInput();
              }
            else
              {
                $userdata = array(
                'email' => $email,
                'password' => $password,
                'status' => 1,
                );

                if (Auth::attempt($userdata))
                  {
                      $user_data = Auth::User();
                      Session::put('id', $user_data->id);
                      Session::put('email', $user_data->email);
                      Session::put('name', $user_data->name);
                      Session::put('u_role' , $user_data->u_role);

                      if($user_data->u_role == 'A')
                        {
                          return redirect('/dashboard');
                        }
                      else
                        {
                          return redirect('/');
                        }
                      Session::flash('message', 'You Successfully Logged In.');
                      return redirect('/');
                  }
                else
                  {
                    Session::flash('message', 'Invalid Email ID or Password');
                      return redirect('/miia-login');
                  }
              }
    }

  public function logout()
   {
      Auth::logout();
      Session::flush();
      Session::flash('message', 'Successfully Logged out.');
      return redirect('/');
   }

  public function contact_us()
   {
      return view('site/contact');
   }

}
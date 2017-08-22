<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use \App\Model\UserInfo;
use \App\Model\Category;
use Validator;
use Auth;
use Hash;
use Session;
use Input;

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
       return view('site/home');
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

   public function myaccount()
   {
      return view('site/account');
   }


   public static function chartCategory() {
      $category = array();
      $new_cat=array();
      $categories=Category::where('id', '!=', 1)
      ->where('parent_cat_id', '=', 0)
      ->get();
      //echo '<pre>'; print_r($categories); exit;

      foreach ($categories as $key => $value) {
        $new_cat[$value['cat_name']]=$value;
        $parent_id=$value['id'];

        $categories=self::categoryChild($parent_id);
        array_push($new_cat, $categories);
      }
      echo '<pre>'; print_r($new_cat);
    }

    public static function categoryChild($parent_id) {
        $get_all_child=Category::where('parent_cat_id', '=', $parent_id)
        ->get();

        $count=$get_all_child->count();
        $children = array();

        if($count > 0) {
          foreach ($get_all_child as $key => $value) {
              //$children[$value->cat_name]=array('name'=> $value->cat_name);
              $children[$value->id][$value->cat_name] = self::categoryChild($value['id']);
            }
            //echo '<pre>'; print_r($children); //exit;
        }
         //echo '<pre>'; print_r($children); //exit;
        return $children;
    }

}
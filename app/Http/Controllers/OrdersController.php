<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use \App\Model\Orders;
use \App\Model\Transactions;
use \App\User;
use \App\Model\Product;
use Crypt;

class OrdersController extends Controller
{
    //
    public function chartOrders()
    {
    	$live  = array('menu'=>'41','parent'=>'5');
    	$orders = Orders::all();
    	return view('admin.chartOrders', compact('live','orders'));
    	
    }

    public function chartTransactions()
    {
    	$live  = array('menu'=>'42','parent'=>'5');
    	$transactions = Transactions::all();
    	return view('admin.chartTransactions', compact('live','transactions'));
    }

    
    public function editOrders($id)
    {
        $decoded_id = Crypt::decrypt($id);
        $live  = array('menu'=>'41','parent'=>'5');
        $order_list = User::join('orders' , 'orders.u_id_fk' , '=' , 'users.id')
            ->join('products' , 'products.id' , '=' , 'orders.pro_id_fk')
            ->where('orders.id','=',$decoded_id)
            ->select('products.id as product_id','products.name as product_name','orders.id as order_id','orders.quantity as order_quantity','orders.quantity as order_quantity','orders.amount as order_amount','orders.total_price as order_total_price','orders.status as order_status','users.id as user_id','users.email as user_email','users.name as user_name')
            ->get();

        return view('admin.editOrder', compact('live','order_list'));
    }

    public function update_order()
    {
        $get_ord_details=Input::except('_token');
        $decoded_id = Crypt::decrypt($get_ord_details['ord_i']);
        $update_order_status=Orders::where('id', '=', $decoded_id)
            ->update(['status' => $get_ord_details['ord_st']]);
        return json_encode(1);
    }
}

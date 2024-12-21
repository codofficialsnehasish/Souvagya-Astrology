<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Crypt;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItems;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\AddressBook;

class OrderController extends Controller
{
    public function __construct(){
        $this->middleware('role_or_permission:Order Show', ['only' => ['index','show']]);
        $this->middleware('role_or_permission:Order Delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $orders = Order::orderBy('id','desc')->get();
        return view('admin.orders.index',compact('orders'));
    }

    public function show($id){
        $order = Order::find($id);
        $buyer_details = AddressBook::find($order->address_book_id);
        $order_items = $order->items;
        return view('admin.orders.show',compact('order','buyer_details','order_items'));
    }

    public function destroy($id){
        $order = Order::find($id);
        if($order){
            $res = $order->delete();
            if($res){
                return back()->with('success','Deleted Successfully');
            }else{
                return back()->with('error','Not Deleted');
            }
        }else{
            return back()->with('error','Not Found');
        }
    }
}
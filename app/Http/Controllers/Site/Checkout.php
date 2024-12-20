<?php

namespace App\Http\Controllers\Site;

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

class Checkout extends Controller
{
    public function index(){
        $userId = Auth::check() ? Auth::id() : Cookie::get('guest_user_id');
        $cart_items = Cart::where('user_id', $userId)->get();
        if($cart_items->isNotEmpty()){
            $countrys = Country::where('is_visible',1)->get();
            $address = AddressBook::where('user_id',Auth::id())->get();
            return view('site.checkout',compact('countrys','address'));
        }else{
            return redirect()->back()->with('error','Your Cart is empty');
        }
    }

    public function process_checkout(Request $request){
        if($request->addrradio == 'fornewaddr'){
            $this->saveaddress($request);
        }else{
            $userID = Auth::id();
            $address_id = $request->addrradio;
            $this->clear_default_address($userID);
            AddressBook::where('user_id',$userID)->where('id',$address_id)->update(['is_default' => 1]);
        }

        $this->place_order();
    }

    protected function clear_default_address($user_id){
        AddressBook::where('user_id',$user_id)->update(['is_default' => 0]);
    }

    protected function saveaddress(Request $request){
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|regex:/^[a-zA-Z\s]+$/|max:255',
            'last_name' => 'required|regex:/^[a-zA-Z\s]+$/|max:255',
            'email' => 'required|email',
            'phone' => 'required|digits:10|regex:/^[6789]/',
            'country' => 'required|exists:countries,id',
            'state' => 'required|exists:states,id',
            'city' => 'nullable|exists:cities,id',
            'pincode' => 'required|digits:6',
            'address' => 'nullable|string|max:255',
        ],[
            'pincode.digits' => 'The pincode must be exactly 6 digits.',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        $this->clear_default_address(Auth::id());

        $address = new AddressBook();
        $address->user_id = Auth::id();
        $address->shipping_first_name = $address->billing_first_name = $request->first_name;
        $address->shipping_last_name = $address->billing_last_name = $request->last_name;
        $address->shipping_email = $address->billing_email = $request->email;
        $address->shipping_phone_number = $address->billing_phone_number = $request->phone;
        $address->shipping_address = $address->billing_address = $request->address;
        $address->shipping_country = $address->billing_country = $request->country;
        $address->shipping_state = $address->billing_state = $request->state;
        $address->shipping_city = $address->billing_city = $request->city;
        $address->shipping_zip_code = $address->billing_zip_code = $request->pincode;
        $address->is_default = 1;
        $address->save();
    }

    protected function place_order(){
        $cart_items = Cart::where('user_id', Auth::id())->get();
        if($cart_items){

            $cart_sub_total = calculate_cart_sub_total_by_userId(Auth::id());
            $cart_total = calculate_cart_total();
            $coupone_discount = !empty($request->coupone_code) ? get_coupone_discount($request->coupone_code,$cart_total) : 0.00;

            $order = new Order();
            $order->order_number = generateOrderNumber();
            $order->user_id = Auth::id();
            $order->address_book_id = AddressBook::where('user_id', Auth::id())->where('is_default', 1)->value('id');
            $order->price_subtotal = $cart_sub_total;
            $order->price_gst = 0.00;
            $order->price_shipping = 0.00;
            $order->total_amount = calculate_cart_total();
            $order->discounted_price = $cart_sub_total-$order->total_amount;
            $order->save();

            update_order_number($order->id, $order->order_number);

            foreach($cart_items as $cart_item){
                $order_item = new OrderItems();
                $order_item->order_id = $order->id;
                $order_item->product_id = $cart_item->product_id;
                $order_item->product_name = $cart_item->product->name;
                $order_item->quantity = $cart_item->quantity;
                $order_item->price = $cart_item->product->total_price;
                $order_item->subtotal = $cart_item->product->total_price * $cart_item->quantity;
                $order_item->save();
            }

            //clear cart
            $cart_items = Cart::where('user_id', Auth::id())->delete(); 

            return redirect(route('user-dashboard'))->with('success','Order Placed Successfully');
        }
    }
}
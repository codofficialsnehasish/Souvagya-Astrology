<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Crypt;

use App\Models\Cart;

class CartController extends Controller
{
    public function index(){
        $userId = Auth::check() ? Auth::id() : Cookie::get('guest_user_id');
        $carts = Cart::where('user_id', $userId)->get();
        return view('site.cart',compact('carts'));
    }

    public function add_to_cart(Request $request){
        $validator = Validator::make($request->all(), [
            'product_id' => 'required|integer|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $userId = Auth::check() ? Auth::id() : Cookie::get('guest_user_id');

        $existingCartItem = Cart::where('user_id', $userId)
                                ->where('product_id', $request->product_id)
                                ->first();

        if ($existingCartItem) {
            // Update quantity if the product is already in the cart
            $existingCartItem->quantity += $request->quantity;
            $existingCartItem->save();

            return response()->json(['status'=>'true','massage'=>$existingCartItem->product->name.' Updated to Cart Successfully']);
        }

        // Create a new cart item
        $cartItem = Cart::create([
            'user_id' => $userId,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
        ]);

        return response()->json(['status'=>'true','massage'=>$cartItem->product->name.' Added to Cart Successfully']);
    }
}
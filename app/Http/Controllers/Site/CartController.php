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

    public function cartCount()
    {
        $userId = Auth::check() ? Auth::id() : Cookie::get('guest_user_id');
        $cartCount = Cart::where('user_id', $userId)->count();

        return response()->json(['count' => $cartCount]);
    }

    public function sum_cart_total(){
        $userId = Auth::check() ? Auth::id() : Cookie::get('guest_user_id');
        $carts = Cart::where('user_id', $userId)->with('product')->get();

        $totalPrice = $carts->sum(function ($cart) {
            return $cart->product->total_price * $cart->quantity;
        });

        return response()->json(['total' => $totalPrice]);
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

    public function updateCartQuantity(Request $request, $id)
    {
        $cart = Cart::find($id);
        if ($cart) {
            $newQuantity = $request->quantity;
            if ($newQuantity >= 1) {
                $cart->quantity = $newQuantity;
                $cart->save();
                $total_price = $cart->product->total_price * $cart->quantity;
                return response()->json(['success' => 'Quantity updated successfully.','total_price'=>$total_price]);
            }
            return response()->json(['error' => 'Invalid quantity.'], 400);
        }
        return response()->json(['error' => 'Item not found.'], 404);
    }


    public function deleteCartItem($id)
    {
        $cart = Cart::find($id);
        if ($cart) {
            $msg = $cart->product->name.' Deleted from Cart Successfully';
            $cart->delete();
            return response()->json(['status'=>'true','massage' => $msg]);
        }
        return response()->json(['error' => 'Item not found.'], 404);
    }
}
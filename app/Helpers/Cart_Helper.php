<?php

    use Illuminate\Support\Facades\Auth;
    use App\Models\Cart;
    use App\Models\Order;

    if(!function_exists('calculate_cart_total')){
        function calculate_cart_total(){
            $userId = Auth::check() ? Auth::id() : Cookie::get('guest_user_id');
            $carts = Cart::where('user_id', $userId)->with('product')->get();

            $totalPrice = $carts->sum(function ($cart) {
                return $cart->product->total_price;
            });

            return $totalPrice;
        }
    }

    if(!function_exists('calculate_cart_sub_total_by_userId')){
        function calculate_cart_sub_total_by_userId(int $userId)
        {
            $total = 0;

            $cartItems = Cart::where('user_id', $userId)->get();

            foreach ($cartItems as $cartItem) {
                $total += $cartItem->quantity * $cartItem->product->price;
            }

            return $total;
        }
    }

    if (!function_exists('generateOrderNumber')) {
        function generateOrderNumber() {
            $dateTime = date('YmdHis');
            $orderNumber = 'ORD' . $dateTime;
            return $orderNumber;
        }
    }

    if (!function_exists('update_order_number')) {
        function update_order_number($order_id, $order_number)
        {
            $data = array(
                'order_number' => $order_number.$order_id
            );
            Order::where('id', $order_id)->update($data);
        }
    }
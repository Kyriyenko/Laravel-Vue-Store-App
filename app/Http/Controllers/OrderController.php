<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{


    public function getOrderId()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $userId = $user['id'];

            $order = DB::table('orders')
                ->where('user_id', '=', $userId)
                ->where('status', '=', 0)
                ->first();

            if (!is_null($order)) {
                return [
                    'status' => true,
                    'orderId' => $order->id
                ];
            } else {
                return [
                    'status' => false,
                    'orderId' => 'null'
                ];
            }
        }

        return [
            'status' => false,
            'orderId' => 'you have no access'
        ];
    }

    public function buyProduct(Request $request)
    {
        $user = Auth::user();
        $userId = $user['id'];

        $order = DB::table('orders')
            ->where('user_id', '=', $userId)
            ->where('status', '=', 0)
            ->first();

        if (!is_null($order)) {
            $newOrderProduct = OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $request->product_id,
            ]);

            $newOrderProduct->save();

        } else {
            $newOrder = Order::create([
                'status' => 0,
                'total_sum' => 0,
                'user_id' => $userId,
            ]);

            $newOrder->save();

            $newOrderProduct = OrderProduct::create([
                'order_id' => $newOrder->id,
                'product_id' => $request->product_id,
            ]);

            $newOrderProduct->save();
        }

        return [
            'status' => true,
            'message' => 'product added to cart'
        ];
    }


    public function deleteCartItem(Request $request)
    {
        $orderProduct = DB::table('order_products')
            ->where('order_id', '=', $request->orderId)
            ->where('product_id', '=', $request->productId)
            ->first();

        OrderProduct::find($orderProduct->id)->delete();

        return [
            'status' => true,
            'message' => 'item was deleted'
        ];
    }

    public function getUserCart()
    {
        $user = Auth::user();
        $userId = $user['id'];

        $order = DB::table('orders')
            ->where('user_id', '=', $userId)
            ->where('status', '=', 0)
            ->first();


        if (is_null($order)) {
            return [
                'status' => false,
                'message' => 'cart is empty',
            ];
        }

        $orderProducts = DB::table('order_products')
            ->Join('products', 'products.id', '=', 'order_products.product_id')
            ->Join('orders', 'orders.id', '=', 'order_products.order_id')
            ->where('order_products.order_id', '=', $order->id)
            ->select('products.id as product_id',
                'orders.id as orders_id',
                'products.title as product_title',
                'products.price as price')
            ->get();


        $totalPrice = $orderProducts->pluck('price')->sum();

        return [
            'totalPrice' => $totalPrice,
            'orderProducts' => $orderProducts,
            'status' => true,
        ];

    }
}

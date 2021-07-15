<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function transaction(Request $request)
    {
        $user = Auth::user();
        $userId = $user['id'];

        DB::table('orders')
            ->where('user_id', '=', $userId)
            ->where('status', '=', 0)
            ->update(['status' => '1']);


        $transaction = new  Transaction([
            'status' => 1,
            'mode' => 'cart',
            'order_id' => $request->orderId,
        ]);

        $transaction->save();

        return [
            'status' => true,
            'message' => 'transaction was successful'
        ];

    }
}

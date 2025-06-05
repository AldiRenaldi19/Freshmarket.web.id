<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;

class CheckoutController extends Controller
{
    public function checkout(Request $request)
    {
        // Konfigurasi Midtrans
        Config::$serverKey = config('midtrans.server_key');
        Config::$clientKey = config('midtrans.client_key');
        Config::$isProduction = config('midtrans.is_production');

        // Data transaksi
        $transactionDetails = [
            'order_id' => uniqid(),
            'gross_amount' => $request->total, // Total pembayaran
        ];

        $itemDetails = [];
        foreach ($request->items as $item) {
            $itemDetails[] = [
                'id' => $item['id'],
                'price' => $item['price'],
                'quantity' => $item['quantity'],
                'name' => $item['name'],
            ];
        }

        $transactionData = [
            'transaction_details' => $transactionDetails,
            'item_details' => $itemDetails,
            'customer_details' => [
                'first_name' => $request->name,
                'last_name' => '',
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
            ],
        ];

        // Menghasilkan URL pembayaran
        $snapToken = Snap::getSnapToken($transactionData);

        return response()->json(['snapToken' => $snapToken]);
    }
}

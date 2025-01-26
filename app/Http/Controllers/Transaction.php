<?php

namespace App\Http\Controllers;

use App\Models\Transaction as ModelsTransaction;
use Illuminate\Http\Request;

class Transaction extends Controller
{
    public function createDonasi(Request $request)
    {
        try {
            $requestDonasi = $request->validate([
                "nama" => 'required|string|max:255',
                "email" => 'required|email|string|max:255',
                "tgl_faktur" => 'required|date',
                "jumlah_donasi" => 'required|integer',
                "payment_type" => 'required|string',
                "transaction_id" => 'nullable|string',
                "va_number" => 'nullable|string',
                "status" => 'nullable|string',
            ]);


            if ($requestDonasi['jumlah_donasi'] <= 2000) {
                return "Tolong Masukan Minimal Donasi Anda Lebih dari Rp.2000";
            }

            $order = $request->user()->transaction()->create($requestDonasi);

            // Set your Merchant Server Key
            \Midtrans\Config::$serverKey = config('midtrans.server_key');
            // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
            \Midtrans\Config::$isProduction = false;
            // Set sanitization on (default)
            \Midtrans\Config::$isSanitized = true;
            // Set 3DS transaction for credit card to true
            \Midtrans\Config::$is3ds = true;

            $params = array(
                'transaction_details' => array(
                    'order_id' => $order->id,
                    'gross_amount' => $order->jumlah_donasi,
                ),
                'customer_details' => array(
                    'first_name' => $request->user()->name,
                    'email' => $request->user()->email,
                    // 'phone' => '08111222333',
                ),
            );

            $snapToken = \Midtrans\Snap::getSnapToken($params);
        } catch (\Throwable $th) {
            dd($th);
        }
    }
}

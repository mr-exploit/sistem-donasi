<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Transaction as ModelsTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Nette\Utils\Random;
use Ramsey\Uuid\Type\Integer;

class TransactionController extends Controller
{
    public function showTransaction()
    {
        return view('users.payment');
    }




    public function detailProgramPayment($slug, Request $request)
    {
        // Ambil program berdasarkan slug
        $program = Program::where('slug', $slug)
            ->leftJoin('transaction', 'program.id', '=', 'transaction.program_id')
            ->selectRaw('program.*, COALESCE(COUNT(transaction.program_id), 0) AS jumlah_donatur')
            ->groupBy('program.id', 'program.nama')
            ->with('kategori') // Include kategori untuk program
            ->first();

        if (!$program) {
            return redirect()->back()->with('error', 'Program tidak ditemukan.');
        }

        if ($request->isMethod('get')) {
            return view('users.programPayment', compact('program'));
        }

        // Validasi input
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'tgl_faktur' => 'required|date',
            'jumlah_donasi' => 'required|integer|min:2001',
            'payment_type' => 'string',
        ]);

        $validedDataTransaction = ModelsTransaction::where('program_id', $program->id)
            ->first();

        // if (
        //     $validedDataTransaction['nama'] === $request->nama
        //     && in_array($validedDataTransaction['transaction_status'], ['unpaid']) && $validedDataTransaction['jumlah_donasi'] === $request->jumlah_donasi
        // ) {
        //     return abort(403, 'Anda sudah melakukan donasi pada program ini.');
        // } 

        try {
            // Simpan transaksi ke database
            $order = ModelsTransaction::create([
                'program_id' => $program->id,
                'nama' => $validatedData['nama'],
                'email' => $validatedData['email'],
                'tgl_faktur' => $validatedData['tgl_faktur'],
                'jumlah_donasi' => $validatedData['jumlah_donasi'],
                'payment_type' => $validatedData['payment_type'],
                'transaction_status' => 'pending',
                'transaction_id' => 'TRX' . time(),
                "va_number" => 'VA' . Random::generate(40),
                "transaction_time" => now(),
            ]);

            return redirect()->route('payment.success', $order->transaction_id);
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Terjadi kesalahan: ' . $th->getMessage()], 500);
        }
    }

    public function paymentToSuccess($transaction_id)
    {
        $order = ModelsTransaction::where('transaction_id', $transaction_id)->firstOrFail();
        // dd($order); 
        try {


            // Konfigurasi Midtrans
            \Midtrans\Config::$serverKey = config('midtrans.server_key');
            \Midtrans\Config::$isProduction = false;
            \Midtrans\Config::$isSanitized = true;
            \Midtrans\Config::$is3ds = true;


            // try {
            //     // Cek status transaksi di Midtrans
            //     $transactionStatus = \Midtrans\Transaction::status($order['va_number']);

            //     if (isset($transactionStatus->transaction_status)) {
            //         if ($transactionStatus->transaction_status === 'settlement') {
            //             return response()->json(['message' => 'Transaksi sudah berhasil.'], 200);
            //         } elseif ($transactionStatus->transaction_status === 'failure' || $transactionStatus->transaction_status === 'expire') {
            //             // Jika transaksi gagal atau expired, ubah status di database
            //             $order->update([
            //                 'transaction_status' => 'unpaid'
            //             ]);

            //             // Generate order_id baru
            //             $order_id = now()->timestamp . '-' . Str::random(8);
            //             // dd($order_id);
            //         } else {
            //             // Jika masih pending, tidak buat order baru
            //             return response()->json(['message' => 'Transaksi masih dalam status pending.'], 400);
            //         }
            //     }
            // } catch (\Exception $e) {
            //     return response()->json(['error' => 'Gagal mengambil status transaksi Midtrans: ' . $e->getMessage()], 500);
            // }
            $gross_amount = (int) $order['jumlah_donasi'];


            $params = [
                'transaction_details' => [
                    'order_id' => $order["va_number"],
                    'gross_amount' => $gross_amount,
                ],
                'item_details' => [
                    [
                        'id' => $order['program_id'],
                        'price' => $gross_amount,
                        'quantity' => 1,
                        'name' => $order['program']['nama'],
                    ],
                ],
                'customer_details' => [
                    'first_name' => $order['nama'],
                    'last_name' => '',
                    'email' => $order['email'],
                ],
            ];

            $snapToken = \Midtrans\Snap::getSnapToken($params);

            return view('users.payment', compact('order', 'snapToken'));
        } catch (\Exception $e) {
            return response()->json(['error' => 'Midtrans error: ' . $e->getMessage()], 500);
        }
    }

    public function paymentCallback(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        $hashed = hash('sha512', $request->order_id . $request->status_code . $request->gross_amount  . $serverKey);

        if ($hashed == $request->signature_key) {

            if ($request->transaction_status == 'capture' || $request->transaction_status == 'settlement') {
                $order = ModelsTransaction::find($request->order_id);
                $program = Program::find($order->program_id);
                dd($program);
                $program->update(['donasi_terkumpul' => $program->donasi_terkumpul + $order->jumlah_donasi]);
                dd($program);
                $order->update(['transaction_status' => 'paid', 'payment_method' => $request->payment_type]);
            } else if ($request->transaction_status == 'expired' || $request->transaction_status == 'cancel') {
                $order = ModelsTransaction::find($request->order_id);
                $order->update(['transaction_status' => 'unpaid', 'payment_method' => $request->payment_type]);
            }
        }
    }
}

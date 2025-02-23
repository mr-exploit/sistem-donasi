@extends('layouts.user.app')
@section('title', 'Pembayaran')

@section('content')

<head>
    <script type="text/javascript"
        src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{config('midtrans.client_key')}}">
    </script>

</head>


<body>
    @if ($errors->any())
    <div class="card text-white bg-danger mb-3 " style="width: 50%; justify-content: center; margin-left: 25%;" id="error-card">
        <div class="d-flex card-header" style="justify-content: space-between;">
            <h2>Error</h2>
            <i class="bi bi-file-x-fill" id="x-icon" style="cursor: pointer; font-size: 1.5rem;"></i>
        </div>
        <div class="card-body">
            @foreach ($errors->all() as $error)
            {{ $error }}
            @endforeach
        </div>
    </div>
    @endif

    @if (session('success'))
    <div class="card text-white bg-success mb-3" role="alert" style="width: 50%; justify-content: center; margin-left: 25%;" id="success-card">
        <div class="d-flex card-header" style="justify-content: space-between;">
            <h2>success</h2>
            <i class="bi bi-file-x-fill" id="x-icon" style="cursor: pointer; font-size: 1.5rem;"></i>
        </div>
        <div class="card-body">
            {{ session('success') }}
        </div>
    </div>
    @elseif (session('error'))
    <div class="card text-white bg-danger mb-3 " style="width: 50%; justify-content: center; margin-left: 25%;" id="error-card">
        <div class="d-flex card-header" style="justify-content: space-between;">
            <h2>Error</h2>
            <i class="bi bi-file-x-fill" id="x-icon" style="cursor: pointer; font-size: 1.5rem;"></i>
        </div>
        <div class="card-body">
            {{ session('error') }}
        </div>
    </div>
    @endif
    <div>
        <div class="container">
            <!-- Status Pembayaran -->
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 col-lg-6">
                    <div class="card p-3 shadow-sm text-center mt-4">
                        <div class="card-body">
                            <h6 class="card-title fw-bold">
                                Status Pembayaran Melalui {{$order->payment_type}}
                            </h6>
                            <p class="mt-4 text-success fw-bold" style="font-size: 2rem;">
                                {{$order->transaction_status}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Detail Pembayaran -->
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 col-lg-6">
                    <div class="card p-3 shadow-sm text-center mt-4">
                        <div class="card-body">
                            <h6 class="fw-bold" style="font-size: 2rem;">Detail Pembayaran</h6>

                            <div class="d-flex justify-content-between mt-4">
                                <p class="fw-bold mb-0">No Invoice</p>
                                <p class="text-secondary mb-0">{{$order->va_number}}</p>
                            </div>
                            <div class="d-flex justify-content-between mt-4">
                                <p class="fw-bold mb-0">Nama Donatur</p>
                                <p class="text-secondary mb-0">{{$order->nama}}</p>
                            </div>
                            <div class="d-flex justify-content-between mt-4">
                                <p class="fw-bold mb-0">Nama Program</p>
                                <p class="text-secondary mb-0">{{$order->program->nama}}</p>
                            </div>

                            <p class="fw-bold text-start mt-4">Yang Harus Dibayar</p>
                            <p class="fw-bold fs-3 text-success">
                                Rp{{ number_format($order->jumlah_donasi, 0, ',', '.') }}
                            </p>

                            <hr class="border border-success border-2 rounded">
                            <p class="text-muted">
                                Selesaikan pembayaran donasi sebelum besok jam 15:04, 23 Dec 2024.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if($order->transaction_status == 'pending')
        <!-- Tombol Bayar -->
        <div class="d-flex justify-content-center align-items-center mt-4" style="width: 50%; margin: auto;">
            <button id="pay-button" class="btn px-4 py-2 fw-bold" style="background-color: #45BF7C; color: #fff; border-radius: 8px;">
                Bayar Sekarang
            </button>
        </div>
        @elseif($order->transaction_status == 'unpaid' || $order->transaction_status == 'cancel')
        <div class="text-center mt-4">
            <p class="text-danger fw-bold">Transaksi telah kadaluarsa atau dibatalkan.</p>
            <br>
            <a href="{{ url('/program') }}" class="btn px-4 py-2 fw-bold" style="background-color: #FF6347; color: #fff; border-radius: 8px;">
                Kembali ke Program
            </a>
            @endif

            <!-- @TODO: You can add the desired ID as a reference for the embedId parameter. -->
            <div id="snap-container"></div>

            <script type="text/javascript">
                // Ambil tombol dengan ID "pay-button"
                var payButton = document.getElementById('pay-button');

                // Tambahkan event listener pada tombol
                payButton.addEventListener('click', function() {
                    // Pastikan mengganti SNAP_TRANSACTION_TOKEN dengan token transaksi dari server
                    var snapToken = '{{$snapToken}}'; // Pastikan variabel ini diisi dengan token dari backend
                    // Jalankan Midtrans Snap
                    window.snap.pay(snapToken, {
                        onSuccess: function(result) {
                            // Implementasi jika pembayaran berhasil
                            console.log('Pembayaran berhasil:', result);
                            window.location.href = '/invoice/{{$order->transaction_id}}';
                        },
                        onPending: function(result) {
                            // Implementasi jika pembayaran masih pending
                            alert("Menunggu pembayaran Anda!");
                            console.log('Status pending:', result);
                        },
                        onError: function(result) {
                            // Implementasi jika pembayaran gagal
                            if (result.status_code == 400) {
                                alert(result.status_message);
                            }
                            window.location.href = "{{ url('/program') }}";
                            console.log('Pembayaran gagal:', result);
                        },
                        onClose: function(e) {
                            if (e) {
                                return false;
                            }
                        }
                    });
                });
            </script>
        </div>
</body>


@endsection
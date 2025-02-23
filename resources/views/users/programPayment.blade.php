@extends('layouts.user.app')
@section('title', $program->judul)

@section('content')


<div>
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
    <div class="container">

        <div class="card mt-5">
            <div class="row d-flex p-5">
                <div class="col-md-6">
                    <img src="{{ asset('storage/' . $program->img_program) }}" alt="{{ $program->nama }}" class="img-fluid mt-3 w-100" style="height: 250px; object-fit: cover; border-radius: 10px;">
                </div>
                <div class="col-md-6">
                    <p class="fs-5 mt-2 text-secondary">Anda akan berdonasi untuk program:</p>
                    <p class="fw-bold">"{{ $program->nama }}"</p>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body" style="margin-left: 10%; margin-right: 10%;">
                <form action="/program/{{ Str::slug($program->nama) }}/payment" method="POST">
                    @csrf
                    @php
                    $isLoggedIn = Auth::check(); // Cek apakah user sudah login
                    $user = Auth::user(); // Ambil data user jika login
                    @endphp
                    <input type="hidden" name="payment_type" value="midtrans">
                    <input type="hidden" name="tgl_faktur" value="{{ now()->toDateString() }}">

                    <div class="mt-4">
                        <label class="fw-bold text-secondary">Nominal Donasi*</label>
                        <input type="number" class="form-control mt-2" name="jumlah_donasi" placeholder="Masukkan jumlah donasi">
                    </div>

                    <!-- Input Nama -->
                    <div class="mt-4">
                        <label class="fw-bold text-secondary">Masukkan Nama</label>
                        <div class="input-group mt-2">
                            <input type="text" id="namaInput" class="form-control" name="nama"
                                placeholder="Nama Lengkap"
                                value="{{ $isLoggedIn ? $user->name : '' }}"
                                {{ $isLoggedIn ? 'readonly' : '' }} required>
                        </div>
                        <div class="form-check mt-2">
                            <input class="form-check-input" type="checkbox" id="hambaAllahCheckbox" style="transform: scale(0.8);">
                            <label class="form-check-label ms-2" for="hambaAllahCheckbox">Hamba Allah</label>
                        </div>
                    </div>

                    <!-- Input Email -->
                    <div class="mt-4">
                        <label class="fw-bold text-secondary">Email <span class="text-muted">(Opsional)</span></label>
                        <input type="email" class="form-control mt-2" name="email"
                            placeholder="Email"
                            value="{{ $isLoggedIn ? $user->email : '' }}"
                            {{ $isLoggedIn ? 'readonly' : '' }}>
                    </div>


                    <!-- <div class="mt-4">
                        <label class="fw-bold text-secondary">Pilih Metode Pembayaran</label>
                        <select class="form-control mt-2" name="payment_type">
                            <option value="" disabled selected>Pilih Metode</option>
                            <option value="transfer">Transfer Bank</option>
                            <option value="ewallet">E-Wallet</option>
                            <option value="kartu_kredit">Kartu Kredit</option>
                            <option value="qris">Q-ris</option>
                        </select>
                    </div> -->


                    <div class="justify-content-center align-items-center d-flex mt-4" style="width: 100%;">
                        <button type="submit" class="btn w-100" style="background-color: #007646; color: #fff;">
                            Selanjutnya
                        </button>
                    </div>

                </form>



            </div>
        </div>

    </div>
    <script>
        document.getElementById('hambaAllahCheckbox').addEventListener('change', function() {
            let namaInput = document.getElementById('namaInput');
            if (this.checked) {
                namaInput.value = "Hamba Allah";
                namaInput.readOnly = true; // Buat tidak bisa diubah
            } else {
                namaInput.value = "";
                namaInput.readOnly = false;
            }
        });
    </script>
    @endsection
@extends('layouts.user.app')
@section('title', $program->judul)

@section('content')
<div style="background-color: #efefef;">
    <div class="container pb-5">
        <div class="row d-flex align-items-stretch">
            <div class="mt-4 col-md-6 d-flex">
                <img src="{{ asset('storage/' . $program->img_program) }}" alt="{{ $program->nama }}" class="img-fluid mt-3 w-100" style="height: 450px; object-fit: cover; border-radius: 10px;">
            </div>
            <div class="mt-4 col-md-6 d-flex flex-column justify-content-between">
                <p class="fs-5 mt-2">{{ $program->kategori->nama }}</p>
                <h1 class="text-start">{{ $program->nama }}</h1>
                @php
                $target = $program->target_donasi ?? 1;
                $terkumpul = $program->donasi_terkumpul ?? 0;
                $progress = min(100, ($terkumpul / $target) * 100);
                @endphp

                <div class="d-flex justify-content-between align-items-between mt-3">
                    <div class="d-flex flex-column">
                        <p>Dana Terkumpul :</p>
                        <p class="fw-bold fs-3">Rp{{ number_format($terkumpul, 0, ',', '.') }}</p>
                    </div>
                </div>

                <div class="d-flex flex-column">
                    <div style="width: 100%; height: 4px; background:#ddd; border-radius: 10px; position: relative;">
                        <div style="width: {{ $progress }}%; height: 4px; background:#45BF7C; border-radius: 10px;"></div>
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-between mt-2">
                    <div class="d-flex flex-column">
                        <p class="fw-bold ms-auto text-start">{{ $program->jumlah_donatur }} Donatur</p>
                    </div>
                </div>

                <a href="/program/{{ Str::slug($program->nama) }}/payment" type="button" class="btn btn-success fw-bold mt-3 pt-3 text-center" style="width: 100%; height:60px; ">Tunaikan Sekarang</a>

            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="btn-group mt-4" role="group" aria-label="Basic radio toggle button group">
        <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
        <label class="btn btn-outline-success" for="btnradio1">Deskripsi</label>

        <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
        <label class="btn btn-outline-success" for="btnradio2">Info Terbaru</label>

        <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
        <label class="btn btn-outline-success" for="btnradio3">Donatur</label>
    </div>
</div>

<hr>
<div class="container">
    <div id="deskripsi">{!! $program->deskripsi !!}</div>
    <div id="infoTerbaru" style="display: none;">Info Terbaru</div>
    <div id="donatur" style="display: none;">nama Donatur</div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll('input[name="btnradio"]').forEach(function(radio) {
            radio.addEventListener("change", function() {
                document.getElementById("deskripsi").style.display = this.id === "btnradio1" ? "block" : "none";
                document.getElementById("infoTerbaru").style.display = this.id === "btnradio2" ? "block" : "none";
                document.getElementById("donatur").style.display = this.id === "btnradio3" ? "block" : "none";
            });
        });
    });
</script>
@endsection
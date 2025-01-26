@extends('layouts.user.app')
@section('title', 'Donasi')

@section('content')
<div class="d-flex justify-content-center flex-wrap align-items-center mt-4">
    <div class="card border-0 shadow-lg gap-3" style="width: 100vh; height:auto;">
        <div class="d-flex justify-content-center align-items-center mt-4 flex-wrap flex-column">
            <img src="{{asset('user/Logo_NU_CARE-LAZISNU 1.svg')}}" alt="Logo Nu" width="30%">
            <div class="d-flex gap-2 flex-row text-center">
                <h2 style="font-size: 1.5rem;">Donasi Anda </h2>
                <h2 style="color:#007646;font-size: 1.5rem;font-weight:bold;">Berarti</h2>
                <h2 style="font-size: 1.5rem;"> Untuk Yang</h2>
                <h2 style="font-size: 1.5rem; color:#007646; font-weight:bold;"> Membutuhkan</h2>
            </div>

        </div>
    </div>
</div>
@endsection
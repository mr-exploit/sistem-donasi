@extends('layouts.user.app')
@section('title', $berita->judul)

@section('content')
<div class="container">
    <h1 class="mt-4">{{ $berita->judul }}</h1>
    <div class="d-flex flex-row gap-1 justify-content-start">
        <img src="{{ asset('user/calendar-icon.svg') }}" alt="calender" width="17" style="margin-bottom: 20px">
        <p>{{ $berita->created_at->format('Y-m-d') }}</p>
        <p class="ms-3 me-2">Penulis :</p>
        <p>{{ $berita->created_by }}</p>
    </div>

    <div class="d-flex justify-content-center mt-3 mb-5">
        <img src="{{ asset('storage/' . $berita->img_berita) }}" alt="{{ $berita->judul }}" class="img-fluid mt-3 justify-content-center" style="width: 1000px; height: 450px">
    </div>
    <div>{!! $berita->content !!}</div>


</div>
@endsection
@extends('layouts.user.app')
@section('title', 'Berita')

@section('content')
<!-- side Menu -->
<div>
    <div class="gap-2 d-flex justify-content-center align-items-center flex-column custom-container flex-wrap">
        <img src="{{asset('user/Logo_NU_CARE-LAZISNU 1.svg')}}" alt="Logo Nu" style="width: 15%;">
        <h2>INFO TERKINI LAZISNU</h2>
        <p>Berita Terbaru LAZISNU Kota Batam</p>
        <div class="d-flex justify-content-center align-items-center ">
            <form method="GET" action="{{ route('berita') }}" class="input-group">
                <!-- Input field for search -->
                <input
                    id="search-focus"
                    type="search"
                    name="query"
                    class="form-control"
                    placeholder="Search"
                    value="{{ request('query') }}" />
                <!-- Search button -->
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-search"></i>
                </button>
            </form>
        </div>
    </div>

    <div class="container mt-4">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach($berita as $berita)
            <div class="col-md-4">
                <div class="card " style="width: 100%; height: 600px;">
                    <img src="{{ asset('storage/' . $berita->img_berita) }}" class="card-img-top" alt="Sedekah" style="height: 240px; object-fit: cover;" />
                    <div class="card-body">
                        <h4 style="font-size:1rem; font-weight:bold;">{{$berita->judul}}</h4>
                        <div> {!! Str::limit($berita->content, 200) !!}</div>
                        <div class="d-flex flex-row gap-2 align-items-center">
                            <img src="{{ asset('user/calendar-icon.svg') }}" alt="calendar" width="17">
                            <p class="mb-0">{{$berita->created_at->format('Y-m-d')}}</p>
                        </div>
                        {{-- Button Lihat Berita Selengkapnya --}}
                        <div class="d-flex justify-content-end mt-2">
                            <a href="{{ route('beritaDetail', ['slug' => Str::slug($berita->judul)]) }}"
                                class="btn"
                                style="background-color: #007646; color: #ffffff;">
                                Selengkapnya
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>


    <script>
        const dataBerita = fetch('https://jsonplaceholder.typicode.com/posts').method('GET')
            .then((response) => response.json())
            .then((data) => {
                console.log(data);
            });
    </script>
</div>
@endsection
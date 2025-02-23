@extends('Layouts.user.app')
@section('title', 'Program')

<link rel="stylesheet" href="{{asset('css/programUser.css')}}">

@section('content')
<div class="d-flex flex-column justify-content-center align-items-center mt-4 flex-wrap">
  <img src="{{asset('user/Logo_NU_CARE-LAZISNU 1.svg')}}" alt="Logo Nu">
  <h2>AYO SALURKAN DONASIMU!</h2>
  <p>SIlahkan pilih program donasi yang Anda inginkan</p>
  <div class="d-flex justify-content-center align-items-center mt-4 flex-row text-center " style="gap: 40%" id="component-fitur">
    <button class="btn  filter-btn border shadow-lg p-3 mb-5 bg-body rounded" style="height: 58px; width: 100%; color: #696969;font-size:1.5rem;" data-category="zakat">zakat</button>
    <button class="btn  filter-btn border shadow-lg p-3 mb-5 bg-body rounded" style="height: 58px; width: 100%; color: #696969;font-size:1.5rem;" data-category="sedakah">sedekah</button>
    <button class="btn  filter-btn border shadow-lg p-3 mb-5 bg-body rounded" style="height: 58px; width: 100%; color: #696969;font-size:1.5rem;" data-category="infak">infak</button>
    <button class="btn  filter-btn border shadow-lg p-3 mb-5 bg-body rounded" style="height: 58px; width: 100%; color: #696969;font-size:1.5rem;" data-category="all">semua</button>

  </div>

  {{-- card donasi --}}
  <div class="container mt-4">
    <div class="row row-cols-1 row-cols-md-3 g-4">
      @foreach($donasi as $donasiProgram)
      <div class="col-md-4 program-item" data-category="{{ strtolower($donasiProgram->kategori->nama) }}">
        <a href="{{ route('programDetail', ['slug' => Str::slug($donasiProgram->nama)]) }}" style="text-decoration:none;">
          <div class="card" style="width: 100%; height: 450px;">
            <img src="{{ asset('storage/' . $donasiProgram->img_program) }}" class="card-img-top" alt="Sedekah" style="height: 250px; object-fit: cover;" />
            <div class="card-body">
              <div style="font-size:1rem; font-weight:bold;">{!! $donasiProgram->nama !!}</div>
              <h5 class="card-text mt-1" style="font-weight: 200;">{{ ucwords($donasiProgram->kecamatan) }}</h5>

              @php
              $target = $donasiProgram->target_donasi ?? 1;
              $terkumpul = $donasiProgram->donasi_terkumpul ?? 0;
              $progress = min(100, ($terkumpul / $target) * 100);
              @endphp

              <div style="width: 100%; height: 4px; background:#ddd; border-radius: 10px; position: relative;">
                <div style="width: {{ $progress }}%; height: 4px; background:#45BF7C; border-radius: 10px;"></div>
              </div>

              <div class="d-flex justify-content-between align-items-between mt-5">
                <div class="d-flex flex-column">
                  <p>Donasi Terkumpul</p>
                  <p class="fw-bold">Rp{{ number_format($terkumpul, 0, ',', '.') }}</p>
                </div>
                <div class="d-flex flex-column">
                  <p>Donatur</p>
                  <p class="fw-bold ms-auto text-end">{{ $donasiProgram->jumlah_donatur }}</p>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>

      @endforeach
    </div>
  </div>
  {{-- End card donasi --}}
</div>
</div>

<!-- Script untuk Filter -->
<!-- Script Filter Kategori -->
<script>
  document.querySelectorAll('.filter-btn').forEach(button => {
    button.addEventListener('click', () => {
      const category = button.getAttribute('data-category');
      const items = document.querySelectorAll('.program-item');

      items.forEach(item => {
        if (category === 'all' || item.getAttribute('data-category') === category) {
          item.style.display = 'block';
        } else {
          item.style.display = 'none';
        }
      });
    });
  });
</script>
@endsection
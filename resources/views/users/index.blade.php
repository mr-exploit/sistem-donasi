@extends('layouts.user.app')
@section('title', 'Home')

<link rel="stylesheet" href="{{asset('css/homeUser.css')}}">

@section('content')
{{-- Side Menu --}}
<div>
  {{-- Carousel Image Content --}}
  <div class="container text-center mt-4">
      <div class="carousel-container">
          <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false" data-bs-interval="false">
              <div class="carousel-inner">
                  <div class="carousel-item active">
                      <img src="user/collapse-1.png" class="d-block w-100" alt="First slide">
                  </div>
                  <div class="carousel-item">
                      <img src="user/collapse-1.png" class="d-block w-100" alt="Second slide">
                  </div>
                  <div class="carousel-item">
                      <img src="user/collapse-1.png" class="d-block w-100" alt="Third slide">
                  </div>
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
              </button>
          </div>
      </div>
  </div>

  {{-- table data donasi --}}
  <div class="d-flex align-items-center mt-4 flex-wrap" 
  style="background-color: #007646; width: 80%; height: 30%; margin: auto; border-radius: 20px; padding: 20px;" id="table-data-donasi-component">
    <div class="container text-center d-flex justify-content-around">
    <!-- Program Donasi -->
    <div style="width: 33%;">
      <h4 style="color: #ffffff; font-size: 1rem;">Program Donasi</h4>
      <h4 style="color: #ffffff;">10</h4>
    </div>

    <!-- Divider -->
    <div style="border-left: 2px solid #ffffff; height: auto;" id="divider1"></div>

    <!-- Total Dana Terkumpul -->
    <div style="width: 33%; ">
      <h4 style="color: #ffffff; font-size: 1rem;">Total Dana Terkumpul</h4>
      <h4 style="color: #ffffff; ">Rp100.000.000</h4>
    </div>

    <!-- Divider -->
    <div style="border-left: 2px solid #ffffff; height: auto;" id="divider2"></div>

    <!-- Donatur Terdaftar -->
    <div style="width: 33%; ">
      <h4 style="color: #ffffff; font-size: 1rem;">Donatur Terdaftar</h4>
      <h4 style="color: #ffffff; ">10</h4>
    </div>
    </div>
  </div>

  <div class="container d-flex justify-content-center align-items-center mt-4 flex-column">
    <img src="{{asset('user/Logo_NU_CARE-LAZISNU 1.svg')}}" alt="" class="img-fluid">
    <h2 >AYO SALURKAN DONASIMU!</h2>
    <h4 style="font-weight: 400; font-size:1rem;">SIlahkan pilih program donasi yang Anda inginkan</h4>
  </div>

  <div class="container d-flex justify-content-center align-items-center mt-4 flex-row text-center" style="gap: 10%">
      <div class="border shadow-lg p-3 mb-5 bg-body rounded " style="height: 58px; width: 20%;" id="border-fitur"> 
        <h4 style="color: #696969;font-size:1.5rem">Zakat</h4>
      </div>
      <div class="border shadow-lg p-3 mb-5 bg-body rounded" style="height: 58px; width: 20%;" id="border-fitur"> 
        <h4 style="color: #696969;font-size:1.5rem">Infaq</h4>
      </div>
      <div class="border shadow-lg p-3 mb-5 bg-body rounded" style="height: 58px; width: 20%;" id="border-fitur"> 
        <h4 style="color: #696969;font-size:1.5rem">Sedekah</h4>
      </div>
  </div>

  {{-- card donasi --}}
  <div class="container d-flex justify-content-center align-items-center mt-4 flex-row gap-4 flex-wrap">
    <div class="card" style="width: 18rem;">
      <img src="{{asset('user/image-card-1.png')}}" class="card-img-top" alt="Zakat"/>
      <div class="card-body">
        <p>Zakat</p>
        <h4 style="font-size:1rem; font-weight:bold;">Bangun Sekolah dasar Quran</h4 >
        <p class="card-text">Bengkong</p>
        <div style="width: 100%; height: 4px; background:#45BF7C; border: none; border-radius: 10px;"></div>

        <div class="d-flex justify-content-between align-items-between container mt-4 gap-4">
          <div class="d-flex flex-column">
            <p>Donasi Terkumpul</p>
            <p>Rp100.000.000</p>
          </div>
          <div class="d-flex flex-column">
            <p>Donatur</p>
            <p>18</p>
          </div>
        </div>
      </div>
    </div>
    <div class="card" style="width: 18rem;">
      <img src="{{asset('user/image-card-2.png')}}" class="card-img-top" alt="infaq"/>
      <div class="card-body">
        <p>Infaq</p>
        <h4 style="font-size:1rem; font-weight:bold;">Bangun Sekolah dasar Quran</h4>
        <p class="card-text">Bengkong</p>
        <div style="width: 100%; height: 4px; background:#45BF7C; border: none; border-radius: 10px;"></div>
        <div class="d-flex justify-content-between align-items-between container mt-4 gap-4">
          <div class="d-flex flex-column">
            <p>Donasi Terkumpul</p>
            <p>Rp100.000.000</p>
          </div>
          <div class="d-flex flex-column">
            <p>Donatur</p>
            <p>18</p>
          </div>
        </div>
      </div>
    </div>
    
    <div class="card" style="width: 18rem;">
      <img src="{{asset("user/image-card-3.png")}}" class="card-img-top" alt="Sedekah"/>
      <div class="card-body">
        <p>Sedekah</p>
        <h4 style="font-size:1rem; font-weight:bold;">Bangun Sekolah dasar Quran</h4>
        <p class="card-text">Bengkong</p>
        <div style="width: 100%; height: 4px; background:#45BF7C; border: none; border-radius: 10px;"></div>
        <div class="d-flex justify-content-between align-items-between container mt-4 gap-4">
          <div class="d-flex flex-column">
            <p>Donasi Terkumpul</p>
            <p>Rp100.000.000</p>
          </div>
          <div class="d-flex flex-column">
            <p>Donatur</p>
            <p>18</p>
          </div>
        </div>
      </div>
    </div>
    {{-- button donasi selengakapnya --}}
    <button class="btn" style="background-color: #DAFFDA; color: #007646;">Lihat Semua Program</button>
  </div>

  {{-- card berita --}}
  <div class="container d-flex justify-content-center align-items-center flex-column gap-2 flex-wrap" style="margin-top: 50px">
    <h2>INFO TERKINI LAZISNU</h2>
    <h4 style="font-size: 1rem">Berita Terbaru LAZISNU Kota Batam</h4>
    <div class="container d-flex justify-content-center align-items-center mt-4 flex-row gap-4 flex-wrap">

      <!-- First Card -->
      <div class="card " style="width: 18rem; height: 90vh">
        <img src="{{asset('user/image-berita-1.png')}}" class="card-img-top" alt="Sedekah"/>
        <div class="card-body">
          <h4 style="font-size:1rem; font-weight:bold;">Kerjasama Lazisnu PCNU kota Batam dengan BSI | news & streaming</h4>
          <p class="card-text">batamtv.com – Pengurus Cabang atau PC Lembaga Amal Zakat Infaq dan Shodaqoh Nahdatul Ulama (LAZISNU) terus melakukan inovasi dan terobosan dalam program kerjanya.</p>
          <div class="container d-flex flex-row gap-1">
            <img src="{{asset('user/calendar-icon.svg')}}" alt="calender" width="17" style="margin-bottom: 20px">
            <p>13:05, 01/01/2024</p>
          </div>

          {{-- button Lihat Berita selengkapnya --}}
          <div class="d-flex justify-content-end">
            <button class="btn" style="background-color: #007646; color: #ffffff; width: auto;">Selengkapnya</button>
          </div>
        </div>
      </div>
    
      <!-- Second Card -->
      <div class="card " style="width: 18rem;height: 90vh">
        <img src="{{asset('user/image-berita-2.png')}}" class="card-img-berita1" alt="Sedekah"/>
        <div class="card-body">
          <h4 style="font-size:1rem; font-weight:bold;">Tahniah, Buralimar Dipilih Jadi Ketua Lazisnu Batam 2022-2027</h4>
          <p class="card-text">GenPI.co Kepri - Pengurus Cabang NU Kota Batam, Ali Mubaidah mengatakan penunjukan Buralimar sebagai ketua Lazisnu Kota Batam itu hasil musyawarah pengurus Lazisnu Kota Batam 2022-2027</p>
          <div class="container d-flex flex-row gap-1">
            <img src="{{asset('user/calendar-icon.svg')}}" alt="calender" width="17" style="margin-bottom: 20px">
            <p>13:05, 01/01/2024</p>
          </div>

          {{-- button Lihat Berita selengkapnya --}}
          <div class="d-flex justify-content-end">
            <button class="btn" style="background-color: #007646; color: #ffffff; width: auto;">Selengkapnya</button>
          </div>
        </div>
      </div>
    
      <!-- Third Card -->
      <div class="card" style="width: 18rem; height: 90vh">
        <img src="{{asset('user/image-berita-3.png')}}" class="card-img-top" alt="Sedekah"/>
        <div class="card-body">
          <h4 style="font-size:1rem; font-weight:bold;">Lazisnu Kota Batam MOU Bersama JMSI Kepri - Berita Berdasar Fakta</h4>
          <p class="card-text">BATAM, Potretnusantara.id – Lembaga Amil Zakat, Infaq dan Shadaqah NU (Lazisnu) Kota Batam melakukan penandatangan nota kesepahaman bersama (MoU) bersama Jaringan Media Siber Indonesia (JMSI) Kepri, Kamis (31/3/2022) siang.</p>
          <div class="container d-flex flex-row gap-1">
            <img src="{{asset('user/calendar-icon.svg')}}" alt="calender" width="17" style="margin-bottom: 20px">
            <p>13:05, 01/01/2024</p>
          </div>

          {{-- button Lihat Berita selengkapnya --}}
          <div class="d-flex justify-content-end">
            <button class="btn" style="background-color: #007646; color: #ffffff; width: auto;">Selengkapnya</button>
          </div>
        </div>
      </div>
    </div>    
    <button class="btn mt-4" style="background-color: #DAFFDA; color: #007646;">Lihat Berita Lainnya</button>
  </div>

  <div class="container d-flex justify-content-center align-items-center mt-4 flex-column gap-2 flex-wrap">
      <img src="{{asset('user/Logo_NU_CARE-LAZISNU 1.svg')}}" alt="">    
      <h2>5 Pilar Program LAZISNU</h2>
      <h4 style="font-size: 1rem" class="text-center">Ayo kita dukung program-program yang dilaksanakan oleh Lazisnu</h4>
  </div>
    <div class="d-flex align-items-center mt-4 row gap-4 justify-content-center" >
      {{-- card 1 --}}
      <div class="card mt-4" style="width: 327px; background-color: #F5F5F5; position: relative; padding-top: 3rem; height: 290px;">
        <div style="width: 4rem; height: 4rem; background-color: #DAFFDA; position: absolute; top: -2rem; left: calc(50% - 2rem); display: flex; align-items: center; justify-content: center; border-radius: 25%; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);">
          <h1 style="color: #007646; margin: 0;">1</h1>
        </div>
        <div >
          <h2 class="text-center" style="font-size: 2rem;">NUcare Cerdas</h2>
          <p class="text-center" style="font-size: 1rem;">
            Pilar ini bertujuan untuk meningkatkan kualitas sumber daya manusia (SDM) melalui program beasiswa, pelatihan, dan peningkatan fasilitas pendidikan. Fokus utamanya adalah menjamin akses pendidikan yang merata, terutama bagi siswa yatim, dhuafa, dan berprestasi.
          </p>
        </div>
      </div>
      {{-- card2 --}}
      <div class="card mt-4" style="width: 327px; background-color: #F5F5F5; position: relative; padding-top: 3rem; height: 290px;">
        <div style="width: 4rem; height: 4rem; background-color: #DAFFDA; position: absolute; top: -2rem; left: calc(50% - 2rem); display: flex; align-items: center; justify-content: center; border-radius: 25%; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);">
          <h1 style="color: #007646; margin: 0;">2</h1>
        </div>
        <div >
          <h2 class="text-center" style="font-size: 2rem;">NUcare Berdaya</h2>
          <p class="text-center" style="font-size: 1rem;">
            Program untuk mendorong kemandirian dan meningkatkan pendapata, kesejahteraan, serta semangat kewirasuahaan melalui kegiatan ekonomi dan pembentukan usaha
          </p>
        </div>
      </div>
      {{-- card 3 --}}
      <div class="card mt-4" style="width: 327px; background-color: #F5F5F5; position: relative; padding-top: 3rem; height: 290px;">
        <div style="width: 4rem; height: 4rem; background-color: #DAFFDA; position: absolute; top: -2rem; left: calc(50% - 2rem); display: flex; align-items: center; justify-content: center; border-radius: 25%; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);">
          <h1 style="color: #007646; margin: 0;">3</h1>
        </div>
        <div >
          <h2 class="text-center" style="font-size: 2rem;">NUcare Sehat</h2>
          <p class="text-center" style="font-size: 1rem;">
            Program untuk meningkatkan layanan di bidang kesehatan masyarakat, khususnya di kalangan keluarga kurang mampu melalui tindakat kuratif maupun kegiatan preventif
          </p>
        </div>
      </div>
      {{-- card 4 --}}
      <div class="card mt-4" style="width: 327px; background-color: #F5F5F5; position: relative; padding-top: 3rem; height: 290px;">
        <div style="width: 4rem; height: 4rem; background-color: #DAFFDA; position: absolute; top: -2rem; left: calc(50% - 2rem); display: flex; align-items: center; justify-content: center; border-radius: 25%; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);">
          <h1 style="color: #007646; margin: 0;">4</h1>
        </div>
        <div >
          <h2 class="text-center" style="font-size: 2rem;">NUcare Damai</h2>
          <p class="text-center" style="font-size: 1rem;">
            program untuk meningkatkan layanan sosial dengan semangat dakwah Islam Ahlisunnah Wal Jama'ah dan misi kemanusiaan, baik dalam bentuk bantuan kebencanaan maupun bantuan sosial lainnya yang dilakukan secara sistematik dan melibatkan mitra internal dan eksternal NU
          </p>
        </div>
      </div>
      {{-- card 5 --}}
      <div class="card mt-4" style="width: 327px; background-color: #F5F5F5; position: relative; padding-top: 3rem; height: 290px;">
        <div style="width: 4rem; height: 4rem; background-color: #DAFFDA; position: absolute; top: -2rem; left: calc(50% - 2rem); display: flex; align-items: center; justify-content: center; border-radius: 25%; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);">
          <h1 style="color: #007646; margin: 0;">5</h1>
        </div>
        <div >
          <h2 class="text-center" style="font-size: 2rem;">NUcare Hijau</h2>
          <p class="text-center" style="font-size: 1rem;">
            program yang diarahkan untuk memelihara lingkungan dan mendorong keberlanjutan alam sebagai sumber penghidupan masyarakat
          </p>
        </div>
      </div>
  </div>

</div>
{{-- End Side Menu --}}
@endsection
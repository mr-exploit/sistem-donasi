@extends('Layouts.user.app')
@section('title', 'Program')

<style>
    @media(max-width: 576px) {
      #component-fitur{
        gap: 20px !important;
      }
    }
</style>

@section('content')
<div class="d-flex flex-column justify-content-center align-items-center mt-4 flex-wrap">
    <img src="{{asset('user/Logo_NU_CARE-LAZISNU 1.svg')}}" alt="Logo Nu">
    <h2>AYO SALURKAN DONASIMU!</h2>
    <p>SIlahkan pilih program donasi yang Anda inginkan</p>
    <div class="d-flex justify-content-center align-items-center mt-4 flex-row text-center " style="gap: 40%" id="component-fitur">
        <div class="border shadow-lg p-3 mb-5 bg-body rounded " style="height: 58px; width: 60%;" id="border-fitur"> 
            <h4 style="color: #696969;font-size:1.5rem">Zakat</h4>
        </div>
        <div class="border shadow-lg p-3 mb-5 bg-body rounded" style="height: 58px; width: 60%;" id="border-fitur"> 
            <h4 style="color: #696969;font-size:1.5rem">Infaq</h4>
        </div>
        <div class="border shadow-lg p-3 mb-5 bg-body rounded" style="height: 58px; width: 60%;" id="border-fitur"> 
            <h4 style="color: #696969;font-size:1.5rem">Sedekah</h4>
        </div>
    </div>
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
    </div>
</div>

@endsection
<link rel="stylesheet" href="{{asset('css/navbar.css')}}">

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <!-- Left Section: Logo and Title -->
      <div class="d-flex align-items-center gap-2 " style="margin-left: 5%" id="content-nav-start">
          <img src="{{asset('user/Logo_NU_CARE-LAZISNU 1.svg')}}" alt="Logo" class="img-fluid" style="max-width: 50px; height: auto;" >
            <a href="{{route('home')}}" style="text-decoration: none;" class="d-flex flex-row gap-2">
              <h3 class="mb-0" style="font-size: 1rem; color: #007646;">LAZISNU</h3>
              <h3 class="mb-0" style="font-size: 1rem; color:black">KOTA BATAM</h3>
            </a>
      </div>
  
      <!-- Right Section: Navbar Toggle and Links -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      
      <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup" style="margin-right: 5%">
        <div class="navbar-nav">
          <a class="nav-link active" aria-current="page" href="{{route('program')}}" >Program</a>
          <a class="nav-link" href="{{route('berita')}}" >Berita</a>
          <a class="nav-link" href="#" >Tentang Kami</a>
          <button type="button" class="btn btn-success" style="margin-left: 10px; width:80px;">Login</button>
        </div>
      </div>
    </div>
  </nav>
  
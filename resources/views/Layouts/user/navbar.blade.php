<style>
   .nav-link {
    color: #878787d1; /* Default color */
    text-decoration: none; /* Removes underline */
    transition: color 0.3s ease; /* Smooth transition */
  }

  .nav-link:hover {
    color: #111111; /* Bright green for hover */
    text-decoration: none; /* Optional underline */
  }
  </style>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <!-- Left Section: Logo and Title -->
      <div class="d-flex align-items-center gap-2" style="margin-left: 10%">
        <img src="{{asset('user/Logo_NU_CARE-LAZISNU 1.svg')}}" alt="Logo" class="img-fluid" style="max-width: 50px; height: auto;">
        <div>
          <h3 class="mb-0" style="font-size: 1rem; color: #007646;">LAZISNU</h3>
          <h3 class="mb-0" style="font-size: 1rem;">KOTA BATAM</h3>
        </div>
      </div>
  
      <!-- Right Section: Navbar Toggle and Links -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      
      <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup" style="margin-right: 15%">
        <div class="navbar-nav">
          <a class="nav-link active" aria-current="page" href="#" >Program</a>
          <a class="nav-link" href="#" >Berita</a>
          <a class="nav-link" href="#" >Tentang Kami</a>
          <button type="button" class="btn btn-success" style="margin-left: 10px; width:80px;">Login</button>
        </div>
      </div>
    </div>
  </nav>
  
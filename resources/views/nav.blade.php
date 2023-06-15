<nav class="navbar navbar-expand-lg navbar-light fixed-top navbar-solid">
  <div class="container">
    <a class="navbar-brand" href="/"><img src="Icon.png" alt="logo"></a>
    <h5 class="navigasi">Desa Adat Osing Kemiren</h5>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link{{ Request::is('/') ? ' active' : '' }}" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link{{ Request::is('desawisata') ? ' active' : '' }}" href="/desawisata">Object Wisata</a>
        </li>
        <li class="nav-item">
          <a class="nav-link{{ Request::is('festival') ? ' active' : '' }}" href="/festival">Festival</a>
        </li>
        <li class="nav-item">
          <a class="nav-link{{ Request::is('paketwisata') ? ' active' : '' }}" href="/paketwisata">Paket Wisata</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

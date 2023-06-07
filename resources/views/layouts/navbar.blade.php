<nav class="navbar navbar-light navbar-glass navbar-top navbar-expand">
  <button class="btn navbar-toggler-humburger-icon navbar-toggler me-1 me-sm-3" type="button" data-bs-toggle="collapse"
    data-bs-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse" aria-expanded="false"
    aria-label="Toggle Navigation">
    <span class="navbar-toggle-icon">
      <span class="toggle-line"></span>
    </span>
  </button>
  <a class="navbar-brand me-1 me-sm-3" href="index.html">
    <div class="d-flex align-items-center">
      <span class="font-sans-serif">Sianma</span>
    </div>
  </a>
  <ul class="navbar-nav align-items-center d-none d-lg-block">
    <li class="nav-item">
      <h3 class="fw-light overflow-hidden">
        <span class="typed-text fw-bold" data-typed-text='["Sistem Antrian Mahasiswa", "Universitas Bhamada Slawi"]'></span>
      </h3>
    </li>
  </ul>
  <ul class="navbar-nav navbar-nav-icons ms-auto flex-row align-items-center">
    <li class="nav-item dropdown">
      <a class="nav-link pe-0" id="navbarDropdownUser" href="#" role="button" data-bs-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <div class="avatar avatar-xl">
          <img class="rounded-circle" src="{{ asset('falcon/public/assets/img/team/3-thumb.png') }}" alt="" />
        </div>
      </a>
      <div class="dropdown-menu dropdown-menu-end py-0" aria-labelledby="navbarDropdownUser">
        <div class="bg-white dark__bg-1000 rounded-2 py-2">
          <a class="dropdown-item" href="{{ url('profile') }}">Profil Saya</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="" data-bs-toggle="modal" data-bs-target="#modalLogout">Logout</a>
        </div>
      </div>
    </li>
  </ul>
</nav>
<div class="modal fade" id="modalLogout" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content border-0">
      <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
        <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base" data-bs-dismiss="modal"
          aria-label="Close"></button>
      </div>
      <div class="modal-body p-0">
        <div class="bg-light rounded-top-lg py-3 ps-4 pe-6 text-start">
          <h4 class="mb-3">Logout</h4>
          <h5 class="fs-0 fw-normal">Yakin keluar dari sistem?</h5>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Tidak</button>
        <button class="btn btn-primary" type="button"
          onclick="event.preventDefault(); document.getElementById('logout').submit();">Ya</a>
          <form action="{{ route('logout') }}" method="POST" id="logout">
            @csrf
          </form>
      </div>
    </div>
  </div>
</div>

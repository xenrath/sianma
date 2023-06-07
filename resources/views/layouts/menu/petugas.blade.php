<li class="nav-item">
  <a class="nav-link {{ request()->is('petugas') ? 'active' : '' }}" href="{{ url('/') }}" role="button"
    aria-expanded="false">
    <div class="d-flex align-items-center">
      <span class="nav-link-icon">
        <span class="fas fa-chart-pie"></span>
      </span>
      <span class="nav-link-text ps-1">Dashboard</span>
    </div>
  </a>
</li>
<li class="nav-item">
  <!-- label-->
  <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
    <div class="col-auto navbar-vertical-label">Menu User
    </div>
    <div class="col ps-0">
      <hr class="mb-0 navbar-vertical-divider" />
    </div>
  </div>
  <!-- parent pages-->
  <a class="nav-link {{ request()->is('petugas/antrian*') ? 'active' : '' }}" href="{{ url('petugas/antrian') }}"
    role="button" aria-expanded="false">
    <div class="d-flex align-items-center">
      <span class="nav-link-icon">
        <span class="fas fa-user"></span>
      </span>
      <span class="nav-link-text ps-1">Data Antrian</span>
    </div>
  </a>
</li>

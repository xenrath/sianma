<li class="nav-item">
  <a class="nav-link {{ request()->is('admin') ? 'active' : '' }}" href="{{ url('/') }}"
    role="button" aria-expanded="false">
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
  <a class="nav-link {{ request()->is('admin/petugas*') ? 'active' : '' }}" href="{{ url('admin/petugas') }}" role="button"
    aria-expanded="false">
    <div class="d-flex align-items-center">
      <span class="nav-link-icon">
        <span class="fas fa-user"></span>
      </span>
      <span class="nav-link-text ps-1">Data Petugas</span>
    </div>
  </a>
  <!-- parent pages-->
  <a class="nav-link {{ request()->is('admin/loket*') ? 'active' : '' }}" href="{{ url('admin/loket') }}" role="button"
    aria-expanded="false">
    <div class="d-flex align-items-center">
      <span class="nav-link-icon">
        <span class="fas fa-user"></span>
      </span>
      <span class="nav-link-text ps-1">Data Loket</span>
    </div>
  </a>
  <!-- parent pages-->
  <a class="nav-link {{ request()->is('pelanggan*') ? 'active' : '' }}" href="{{ url('pelanggan') }}" role="button"
    aria-expanded="false">
    <div class="d-flex align-items-center">
      <span class="nav-link-icon">
        <span class="fas fa-user"></span>
      </span>
      <span class="nav-link-text ps-1">Data Pelanggan</span>
    </div>
  </a>
</li>
<li class="nav-item">
  <!-- label-->
  <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
    <div class="col-auto navbar-vertical-label">Menu Produk
    </div>
    <div class="col ps-0">
      <hr class="mb-0 navbar-vertical-divider" />
    </div>
  </div>
  <!-- parent pages-->
  <a class="nav-link {{ request()->is('mobil*') ? 'active' : '' }}" href="{{ url('mobil') }}" role="button"
    aria-expanded="false">
    <div class="d-flex align-items-center">
      <span class="nav-link-icon">
        <i class="fas fa-car"></i>
      </span>
      <span class="nav-link-text ps-1">Data Mobil</span>
    </div>
  </a>
  <!-- parent pages-->
  <a class="nav-link {{ request()->is('produk*') ? 'active' : '' }}" href="{{ url('produk') }}" role="button"
    aria-expanded="false">
    <div class="d-flex align-items-center">
      <span class="nav-link-icon">
        <i class="fas fa-car"></i>
      </span>
      <span class="nav-link-text ps-1">Data Produk</span>
    </div>
  </a>
</li>
<li class="nav-item">
  <!-- label-->
  <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
    <div class="col-auto navbar-vertical-label">Menu Pemesanan
    </div>
    <div class="col ps-0">
      <hr class="mb-0 navbar-vertical-divider" />
    </div>
  </div>
  <!-- parent pages-->
  <a class="nav-link {{ request()->is('transaksi') || request()->is('transaksi/create') ? 'active' : '' }}"
    href="{{ url('transaksi/create') }}" role="button" aria-expanded="false">
    <div class="d-flex align-items-center">
      <span class="nav-link-icon">
        <i class="fas fa-shopping-cart"></i>
      </span>
      <span class="nav-link-text ps-1">Pemesanan</span>
    </div>
  </a>
</li>
<li class="nav-item">
  <!-- label-->
  <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
    <div class="col-auto navbar-vertical-label">Menu Transaksi
    </div>
    <div class="col ps-0">
      <hr class="mb-0 navbar-vertical-divider" />
    </div>
  </div>
  <!-- parent pages-->
  <a class="nav-link {{ request()->is('transaksi/menunggu*') ? 'active' : '' }}"
    href="{{ url('transaksi/menunggu') }}" role="button" aria-expanded="false">
    <div class="d-flex align-items-center">
      <span class="nav-link-icon">
        <i class="fas fa-clipboard-list"></i>
      </span>
      <span class="nav-link-text ps-1">Menunggu Konfirmasi</span>
    </div>
  </a>
  <!-- parent pages-->
  <a class="nav-link {{ request()->is('transaksi/proses*') ? 'active' : '' }}" href="{{ url('transaksi/proses') }}"
    role="button" aria-expanded="false">
    <div class="d-flex align-items-center">
      <span class="nav-link-icon">
        <i class="fas fa-clipboard-list"></i>
      </span>
      <span class="nav-link-text ps-1">Dalam Peminjaman</span>
    </div>
  </a>
</li>
<li class="nav-item">
  <!-- label-->
  <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
    <div class="col-auto navbar-vertical-label">Menu Laporan
    </div>
    <div class="col ps-0">
      <hr class="mb-0 navbar-vertical-divider" />
    </div>
  </div>
  <!-- parent pages-->
  <a class="nav-link {{ request()->is('transaksi/riwayat*') ? 'active' : '' }}" href="{{ url('transaksi/riwayat') }}"
    role="button" aria-expanded="false">
    <div class="d-flex align-items-center">
      <span class="nav-link-icon">
        <i class="fas fa-clipboard-list"></i>
      </span>
      <span class="nav-link-text ps-1">Riwayat Peminjaman</span>
    </div>
  </a>
</li>
<li class="nav-item">
  <!-- label-->
  <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
    <div class="col-auto navbar-vertical-label">Menu Rekening
    </div>
    <div class="col ps-0">
      <hr class="mb-0 navbar-vertical-divider" />
    </div>
  </div>
  <!-- parent pages-->
  <a class="nav-link {{ request()->is('rekening*') ? 'active' : '' }}" href="{{ url('rekening') }}" role="button"
    aria-expanded="false">
    <div class="d-flex align-items-center">
      <span class="nav-link-icon">
        <i class="fas fa-credit-card"></i>
      </span>
      <span class="nav-link-text ps-1">Data Rekening</span>
    </div>
  </a>
</li>

<nav class="navbar navbar-light navbar-vertical navbar-expand-xl navbar-card">
  <div class="d-flex align-items-center">
    <div class="toggle-icon-wrapper">
      <button class="btn navbar-toggler-humburger-icon navbar-vertical-toggle" data-bs-toggle="tooltip"
        data-bs-placement="left" title="Toggle Navigation">
        <span class="navbar-toggle-icon">
          <span class="toggle-line"></span>
        </span>
      </button>
    </div>
    <a class="navbar-brand" href="{{ url('/') }}">
      <div class="d-flex align-items-center py-3">
        <span class="font-sans-serif">Sianma</span>
      </div>
    </a>
  </div>
  <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
    <div class="navbar-vertical-content scrollbar">
      <ul class="navbar-nav flex-column mb-3" id="navbarVerticalNav">
        @if (auth()->user()->isDev())
          @include('layouts.menu.dev')
        @elseif (auth()->user()->isAdmin())
          @include('layouts.menu.admin')
        @elseif (auth()->user()->isPetugas())
          @include('layouts.menu.petugas')
        @endif
      </ul>
    </div>
  </div>
</nav>

<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Sistem Antrian Mahasiswa</title>

  <link rel="apple-touch-icon" sizes="180x180"
    href="{{ asset('falcon/public/assets/img/favicons/apple-touch-icon.png') }}">
  <link rel="icon" type="image/png" sizes="32x32"
    href="{{ asset('falcon/public/assets/img/favicons/favicon-32x32.png') }}">
  <link rel="icon" type="image/png" sizes="16x16"
    href="{{ asset('falcon/public/assets/img/favicons/favicon-16x16.png') }}">
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('falcon/public/assets/img/favicons/favicon.ico') }}">
  <link rel="manifest" href="{{ asset('falcon/public/assets/img/favicons/manifest.json') }}">
  <meta name="msapplication-TileImage" content="{{ asset('falcon/public/assets/img/favicons/mstile-150x150.png') }}">
  <meta name="theme-color" content="#ffffff">
  <script src="{{ asset('falcon/public/assets/js/config.js') }}"></script>
  <script src="{{ asset('falcon/public/vendors/overlayscrollbars/OverlayScrollbars.min.js') }}"></script>

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:300,400,500,600,700,800,900&amp;display=swap"
    rel="stylesheet">
  <link href="{{ asset('falcon/public/vendors/overlayscrollbars/OverlayScrollbars.min.css') }}" rel="stylesheet">
  <link href="{{ asset('falcon/public/assets/css/theme.min.css') }}" rel="stylesheet" id="style-default">
  <link href="{{ asset('falcon/public/assets/css/user.min.css') }}" rel="stylesheet" id="user-style-default">
</head>

<body>

  <main class="main border vh-100" id="top">
    <div class="container-fluid py-3">
      <div class="row g-3">
        <div class="col-sm-6 col-md-6">
          <div class="card mb-3">
            <div class="bg-holder d-none d-lg-block bg-card"
              style="background-image:url({{ asset('falcon/public/assets/img/icons/spot-illustrations/corner-4.png') }});">
            </div>
            <div class="card-body position-relative text-center">
              <h3 class="fw-light overflow-hidden">
                <span class="typed-text fw-bold"
                  data-typed-text='["Sistem Antrian Mahasiswa", "Universitas Bhamada Slawi"]'></span>
              </h3>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-6">
          <div class="card bg-dark mb-3">
            <div class="bg-holder d-none d-lg-block bg-card"
              style="background-image:url({{ asset('falcon/public/assets/img/icons/spot-illustrations/corner-4.png') }});">
            </div>
            <div class="card-body position-relative text-center">
              <h3 class="fw-bold overflow-hidden text-white">
                <span class="me-4">{{ $today }}</span>
                &verbar;
                <span class="ms-4" id="jam"></span>
              </h3>
            </div>
          </div>
        </div>
      </div>
      @if (session('success'))
        <div class="alert alert-success border-2 d-flex align-items-center" role="alert">
          <div class="bg-success me-3 icon-item">
            <span class="fas fa-check-circle text-white fs-3"></span>
          </div>
          <p class="mb-0 flex-1">{{ session('success') }}</p>
          <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
      <div class="row g-3 mb-3">
        @php
          $jumlah = count($lokets);
          if ($jumlah == 4) {
              $col = 'col-md-3';
          } elseif ($jumlah == 3) {
              $col = 'col-md-4';
          } elseif ($jumlah == 2) {
              $col = 'col-md-6';
          } elseif ($jumlah == 1) {
              $col = 'col-md-12';
          }
        @endphp
        @foreach ($lokets as $loket)
          @php
            $antrian = \App\Models\Antrian::where([['loket_id', $loket->id], ['status', true]])
                ->whereDate('created_at', \Carbon\Carbon::today())
                ->orderBy('id', 'desc')
                ->first();
          @endphp
          <div class="col-sm-6 {{ $col }}">
            <div class="card overflow-hidden" style="min-width: 12rem">
              <div class="bg-holder bg-card"
                style="background-image:url(assets/img/icons/spot-illustrations/corner-1.png);">
              </div>
              <!--/.bg-holder-->
              <div class="card-body position-relative">
                <h5 class="text-center">{{ $loket->nama }}</h5>
                <hr>
                <h6 class="text-center">
                  Nomor Antrian
                  <br>
                  <span style="font-size: 120px">
                    @if ($antrian != null)
                      {{ $antrian->urutan }}
                    @else
                      -
                    @endif
                  </span>
                </h6>
                <hr>
                <div class="text-center">
                  <a href="{{ url('antrian/' . $loket->id) }}" class="btn btn-primary">Ambil Antrian</a>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
      <div class="card overflow-hidden">
        <div class="card-body">
          <h4 class="fw-medium overflow-hidden">
            <span class="typed-text" data-typed-text='["Tersenyum bukan berarti bahagia."]'></span>
          </h4>
        </div>
      </div>
    </div>
  </main>

  <script src="{{ asset('falcon/public/vendors/popper/popper.min.js') }}"></script>
  <script src="{{ asset('falcon/public/vendors/bootstrap/bootstrap.min.js') }}"></script>
  <script src="{{ asset('falcon/public/vendors/anchorjs/anchor.min.js') }}"></script>
  <script src="{{ asset('falcon/public/vendors/is/is.min.js') }}"></script>
  <script src="{{ asset('falcon/public/vendors/fontawesome/all.min.js') }}"></script>
  <script src="{{ asset('falcon/public/vendors/lodash/lodash.min.js') }}"></script>
  <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
  <script src="{{ asset('falcon/public/vendors/list.js/list.min.js') }}"></script>
  <script src="{{ asset('falcon/public/assets/js/theme.js') }}"></script>
  <script src="{{ asset('falcon/public/vendors/typed.js/typed.js') }}"></script>

  <script>
    window.onload = function() {
      jam();
    }

    function jam() {
      var e = document.getElementById('jam'),
        d = new Date(),
        h, m, s;
      h = d.getHours();
      m = set(d.getMinutes());
      s = set(d.getSeconds());

      e.innerHTML = h + ':' + m + ':' + s;

      setTimeout('jam()', 1000);
    }

    function set(e) {
      e = e < 10 ? '0' + e : e;
      return e;
    }
  </script>

</body>

</html>

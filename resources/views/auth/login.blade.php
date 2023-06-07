<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- ===============================================-->
  <!--    Document Title-->
  <!-- ===============================================-->
  <title>Login | Sianma</title>
  <!-- ===============================================-->
  <!--    Favicons-->
  <!-- ===============================================-->
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
  <!-- ===============================================-->
  <!--    Stylesheets-->
  <!-- ===============================================-->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:300,400,500,600,700,800,900&amp;display=swap"
    rel="stylesheet">
  <link href="{{ asset('falcon/public/vendors/overlayscrollbars/OverlayScrollbars.min.css') }}" rel="stylesheet">
  <link href="{{ asset('falcon/public/assets/css/theme.min.css') }}" rel="stylesheet" id="style-default">
  <link href="{{ asset('falcon/public/assets/css/user.min.css') }}" rel="stylesheet" id="user-style-default">
</head>

<body>
  <!-- ===============================================-->
  <!--    Main Content-->
  <!-- ===============================================-->
  <main class="main" id="top">
    <div class="container-fluid">
      <div class="row min-vh-100 bg-100">
        <div class="col-6 d-none d-lg-block position-relative">
          <div class="bg-holder shadow"
            style="background-image:url({{ asset('falcon/public/assets/img/generic/login-image.jpg') }});background-position: 50% 20%;">
          </div>
          <!--/.bg-holder-->
        </div>
        <div class="col-sm-10 col-md-6 px-sm-0 align-self-center mx-auto py-5">
          <div class="row justify-content-center g-0">
            <div class="col-lg-9 col-xl-8 col-xxl-6">
              <div class="card">
                <div class="card-header bg-circle-shape bg-shape text-center p-2"><a
                    class="font-sans-serif fw-bolder fs-4 z-index-1 position-relative link-light light"
                    href="">Sianma</a></div>
                <div class="card-body p-4">
                  <div class="row flex-between-center mb-3">
                    <div class="col-auto">
                      <h3>Login</h3>
                    </div>
                  </div>
                  <form action="{{ route('login') }}" method="POST" autocomplete="off">
                    @csrf
                    <div class="mb-3">
                      <label class="form-label" for="username">Username</label>
                      <input class="form-control" name="username" id="username" type="text"
                        value="{{ old('username') }}" />
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="password">Password</label>
                      <input class="form-control" id="password" type="password" name="password"
                        value="{{ old('password') }}" />
                    </div>
                    <div class="mt-5">
                      <button class="btn btn-primary d-block w-100 mt-3" type="submit" name="submit">Masuk</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <!-- ===============================================-->
  <!--    End of Main Content-->
  <!-- ===============================================-->


  <div class="offcanvas offcanvas-end settings-panel border-0" id="settings-offcanvas" tabindex="-1"
    aria-labelledby="settings-offcanvas">
    <div class="offcanvas-header settings-panel-header bg-shape">
      <div class="z-index-1 py-1 light">
        <h5 class="text-white"> <span class="fas fa-palette me-2 fs-0"></span>Settings</h5>
        <p class="mb-0 fs--1 text-white opacity-75"> Set your own customized style</p>
      </div>
      <button class="btn-close btn-close-white z-index-1 mt-0" type="button" data-bs-dismiss="offcanvas"
        aria-label="Close"></button>
    </div>
    <div class="offcanvas-body scrollbar-overlay px-card" id="themeController">
      <h5 class="fs-0">Color Scheme</h5>
      <p class="fs--1">Choose the perfect color mode for your app.</p>
      <div class="btn-group d-block w-100 btn-group-navbar-style">
        <div class="row gx-2">
          <div class="col-6">
            <input class="btn-check" id="themeSwitcherLight" name="theme-color" type="radio" value="light"
              data-theme-control="theme" />
            <label class="btn d-inline-block btn-navbar-style fs--1" for="themeSwitcherLight"> <span
                class="hover-overlay mb-2 rounded d-block"><img class="img-fluid img-prototype mb-0"
                  src="../../../assets/img/generic/falcon-mode-default.jpg" alt="" /></span><span
                class="label-text">Light</span></label>
          </div>
          <div class="col-6">
            <input class="btn-check" id="themeSwitcherDark" name="theme-color" type="radio" value="dark"
              data-theme-control="theme" />
            <label class="btn d-inline-block btn-navbar-style fs--1" for="themeSwitcherDark"> <span
                class="hover-overlay mb-2 rounded d-block"><img class="img-fluid img-prototype mb-0"
                  src="../../../assets/img/generic/falcon-mode-dark.jpg" alt="" /></span><span
                class="label-text">
                Dark</span></label>
          </div>
        </div>
      </div>
      <hr />
      <div class="d-flex justify-content-between">
        <div class="d-flex align-items-start"><img class="me-2"
            src="../../../assets/img/icons/left-arrow-from-left.svg" width="20" alt="" />
          <div class="flex-1">
            <h5 class="fs-0">RTL Mode</h5>
            <p class="fs--1 mb-0">Switch your language direction </p><a class="fs--1"
              href="../../../documentation/customization/configuration.html">RTL Documentation</a>
          </div>
        </div>
        <div class="form-check form-switch">
          <input class="form-check-input ms-0" id="mode-rtl" type="checkbox" data-theme-control="isRTL" />
        </div>
      </div>
      <hr />
      <div class="d-flex justify-content-between">
        <div class="d-flex align-items-start"><img class="me-2" src="../../../assets/img/icons/arrows-h.svg"
            width="20" alt="" />
          <div class="flex-1">
            <h5 class="fs-0">Fluid Layout</h5>
            <p class="fs--1 mb-0">Toggle container layout system </p><a class="fs--1"
              href="../../../documentation/customization/configuration.html">Fluid Documentation</a>
          </div>
        </div>
        <div class="form-check form-switch">
          <input class="form-check-input ms-0" id="mode-fluid" type="checkbox" data-theme-control="isFluid" />
        </div>
      </div>
      <hr />
      <div class="d-flex align-items-start"><img class="me-2" src="../../../assets/img/icons/paragraph.svg"
          width="20" alt="" />
        <div class="flex-1">
          <h5 class="fs-0 d-flex align-items-center">Navigation Position </h5>
          <p class="fs--1 mb-2">Select a suitable navigation system for your web application </p>
          <div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" id="option-navbar-vertical" type="radio" name="navbar"
                value="vertical" data-page-url="../../../modules/components/navs-and-tabs/vertical-navbar.html"
                data-theme-control="navbarPosition" />
              <label class="form-check-label" for="option-navbar-vertical">Vertical</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" id="option-navbar-top" type="radio" name="navbar" value="top"
                data-page-url="../../../modules/components/navs-and-tabs/top-navbar.html"
                data-theme-control="navbarPosition" />
              <label class="form-check-label" for="option-navbar-top">Top</label>
            </div>
            <div class="form-check form-check-inline me-0">
              <input class="form-check-input" id="option-navbar-combo" type="radio" name="navbar" value="combo"
                data-page-url="../../../modules/components/navs-and-tabs/combo-navbar.html"
                data-theme-control="navbarPosition" />
              <label class="form-check-label" for="option-navbar-combo">Combo</label>
            </div>
          </div>
        </div>
      </div>
      <hr />
      <h5 class="fs-0 d-flex align-items-center">Vertical Navbar Style</h5>
      <p class="fs--1 mb-0">Switch between styles for your vertical navbar </p>
      <p> <a class="fs--1" href="../../../modules/components/navs-and-tabs/vertical-navbar.html#navbar-styles">See
          Documentation</a></p>
      <div class="btn-group d-block w-100 btn-group-navbar-style">
        <div class="row gx-2">
          <div class="col-6">
            <input class="btn-check" id="navbar-style-transparent" type="radio" name="navbarStyle"
              value="transparent" data-theme-control="navbarStyle" />
            <label class="btn d-block w-100 btn-navbar-style fs--1" for="navbar-style-transparent"> <img
                class="img-fluid img-prototype" src="../../../assets/img/generic/default.png" alt="" /><span
                class="label-text"> Transparent</span></label>
          </div>
          <div class="col-6">
            <input class="btn-check" id="navbar-style-inverted" type="radio" name="navbarStyle" value="inverted"
              data-theme-control="navbarStyle" />
            <label class="btn d-block w-100 btn-navbar-style fs--1" for="navbar-style-inverted"> <img
                class="img-fluid img-prototype" src="../../../assets/img/generic/inverted.png" alt="" /><span
                class="label-text"> Inverted</span></label>
          </div>
          <div class="col-6">
            <input class="btn-check" id="navbar-style-card" type="radio" name="navbarStyle" value="card"
              data-theme-control="navbarStyle" />
            <label class="btn d-block w-100 btn-navbar-style fs--1" for="navbar-style-card"> <img
                class="img-fluid img-prototype" src="../../../assets/img/generic/card.png" alt="" /><span
                class="label-text"> Card</span></label>
          </div>
          <div class="col-6">
            <input class="btn-check" id="navbar-style-vibrant" type="radio" name="navbarStyle" value="vibrant"
              data-theme-control="navbarStyle" />
            <label class="btn d-block w-100 btn-navbar-style fs--1" for="navbar-style-vibrant"> <img
                class="img-fluid img-prototype" src="../../../assets/img/generic/vibrant.png" alt="" /><span
                class="label-text"> Vibrant</span></label>
          </div>
        </div>
      </div>
      <div class="text-center mt-5"><img class="mb-4" src="../../../assets/img/icons/spot-illustrations/47.png"
          alt="" width="120" />
        <h5>Like What You See?</h5>
        <p class="fs--1">Get Falcon now and create beautiful dashboards with hundreds of widgets.</p><a
          class="mb-3 btn btn-primary"
          href="https://themes.getbootstrap.com/product/falcon-admin-dashboard-webapp-template/"
          target="_blank">Purchase</a>
      </div>
    </div>
  </div>

  <!-- ===============================================-->
  <!--    JavaScripts-->
  <!-- ===============================================-->
  <script src="{{ asset('falcon/public/vendors/popper/popper.min.js') }}"></script>
  <script src="{{ asset('falcon/public/vendors/bootstrap/bootstrap.min.js') }}"></script>
  <script src="{{ asset('falcon/public/vendors/anchorjs/anchor.min.js') }}"></script>
  <script src="{{ asset('falcon/public/vendors/is/is.min.js') }}"></script>
  <script src="{{ asset('falcon/public/vendors/fontawesome/all.min.js') }}"></script>
  <script src="{{ asset('falcon/public/vendors/lodash/lodash.min.js') }}"></script>
  <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
  <script src="{{ asset('falcon/public/vendors/list.js/list.min.js') }}"></script>
  <script src="{{ asset('falcon/public/assets/js/theme.js') }}"></script>

</body>

</html>

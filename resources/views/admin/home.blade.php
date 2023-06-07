@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
  <h5 class="mb-3">Informasi Hari Ini</h5>
  <div class="row g-3 mb-3">
    <div class="col-sm-6 col-md-4">
      <div class="card overflow-hidden" style="min-width: 12rem">
        <div class="bg-holder bg-card" style="background-image:url(assets/img/icons/spot-illustrations/corner-1.png);">
        </div>
        <!--/.bg-holder-->
        <div class="card-body position-relative">
          <h6>Total Antrian</h6>
          <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-warning"
            data-countup='{"endValue": 10,"suffix":" antrian"}'>0</div>
          <a class="fw-semi-bold fs--1 text-nowrap" href="{{ url('sopir') }}">Lihat Data
            <span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span>
          </a>
        </div>
      </div>
    </div>
  </div>
  <h5 class="mb-3">Detail Informasi</h5>
  <div class="row g-3 mb-3">
    <div class="col-sm-6 col-md-4">
      <div class="card overflow-hidden" style="min-width: 12rem">
        <div class="bg-holder bg-card" style="background-image:url(assets/img/icons/spot-illustrations/corner-1.png);">
        </div>
        <!--/.bg-holder-->
        <div class="card-body position-relative">
          <h6>Loket 1</h6>
          <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-warning"
            data-countup='{"endValue": 4,"suffix":" antrian"}'>0</div>
          <a class="fw-semi-bold fs--1 text-nowrap" href="{{ url('mobil') }}">Lihat Data
            <span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span>
          </a>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-md-4">
      <div class="card overflow-hidden" style="min-width: 12rem">
        <div class="bg-holder bg-card" style="background-image:url(assets/img/icons/spot-illustrations/corner-1.png);">
        </div>
        <!--/.bg-holder-->
        <div class="card-body position-relative">
          <h6>Loket 2</h6>
          <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-warning"
            data-countup='{"endValue": 6,"suffix":" antrian"}'>0</div>
          <a class="fw-semi-bold fs--1 text-nowrap" href="{{ url('produk') }}">Lihat Data
            <span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span>
          </a>
        </div>
      </div>
    </div>
  </div>
@endsection
@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
  <h5 class="mb-3">Informasi Hari Ini</h5>
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
    @foreach ($lokets as $loket)
      @php
        $total = \App\Models\Antrian::where('loket_id', $loket->id)
            ->whereDate('created_at', \Carbon\Carbon::today())
            ->get();
        $proses = \App\Models\Antrian::where([['loket_id', $loket->id], ['status', true]])
            ->whereDate('created_at', \Carbon\Carbon::today())
            ->orderBy('id', 'desc')
            ->first();
        $menunggu = \App\Models\Antrian::where([['loket_id', $loket->id], ['status', false]])
            ->whereDate('created_at', \Carbon\Carbon::today())
            ->get();
      @endphp
      <div class="col-sm-6 col-md-4">
        <div class="card overflow-hidden mb-3" style="min-width: 12rem">
          <div class="bg-holder bg-card" style="background-image:url(assets/img/icons/spot-illustrations/corner-1.png);">
          </div>
          <!--/.bg-holder-->
          <div class="card-body position-relative">
            <h6>Total Antrian</h6>
            <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-warning">{{ count($total) }} antrian</div>
          </div>
        </div>
        <div class="card overflow-hidden" style="min-width: 12rem">
          <div class="bg-holder bg-card" style="background-image:url(assets/img/icons/spot-illustrations/corner-1.png);">
          </div>
          <!--/.bg-holder-->
          <div class="card-body position-relative">
            <h5 class="text-center">{{ $loket->nama }}</h5>
            <hr>
            <h6 class="text-center">
              Nomor Antrian Saat Ini
              <br>
              <span style="font-size: 120px">
                @if ($proses != null)
                  {{ $proses->urutan }}
                @else
                  -
                @endif
              </span>
            </h6>
            @if (count($total) > 0)
              <hr>
              <div class="row g-3">
                @if ($proses != null)
                  <div class="{{ count($menunggu) == 0 ? 'col-12' : 'col-4' }}">
                    <div class="d-grid">
                      <a href="{{ url('petugas/ulangi/' . $loket->id) }}" class="btn btn-secondary">
                        <span class="fas fa-undo-alt" data-fa-transform="shrink-3"></span>
                        {{ count($menunggu) == 0 ? 'Ulangi' : '' }}
                      </a>
                    </div>
                  </div>
                @endif
                @if (count($menunggu) > 0)
                  <div class="{{ $proses != null ? 'col-8' : 'col-12' }}">
                    <div class="d-grid">
                      <a href="{{ url('petugas/selanjutnya/' . $loket->id) }}" class="btn btn-primary">
                        Selanjutnya<span class="fas fa-chevron-right ms-2" data-fa-transform="shrink-3"></span>
                      </a>
                    </div>
                  </div>
                @endif
              </div>
            @endif
            <hr>
            <h6 class="text-center">
              @if (count($menunggu) > 0)
                {{ count($menunggu) }} antrian menunggu
              @else
                Tidak ada antrian lagi
              @endif
            </h6>
          </div>
        </div>
      </div>
    @endforeach
  </div>
@endsection

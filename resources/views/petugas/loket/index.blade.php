@extends('layouts.app')

@section('title', 'Data Loket')

@section('content')
  <div class="card mb-3">
    <div class="bg-holder d-none d-lg-block bg-card"
      style="background-image:url({{ asset('falcon/public/assets/img/icons/spot-illustrations/corner-4.png') }});">
    </div>
    <!--/.bg-holder-->
    <div class="card-body position-relative">
      <div class="row">
        <div class="col-lg-8">
          <h3>Data Loket</h3>
          <p class="mb-0">Loket</p>
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
  @if (session('error'))
    <div class="alert alert-danger border-2" role="alert">
      <div class="clearfix">
        <div class="d-flex align-items-center float-start">
          <div class="bg-danger me-3 icon-item">
            <span class="fas fa-times-circle text-white fs-3"></span>
          </div>
          <h5 class="mb-0 text-danger">Error!</h5>
        </div>
        <button class="btn-close float-end" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      <div class="mt-3">
        @foreach (session('error') as $error)
          <p class="mb-0 flex-1">
            <span class="dot bg-danger"></span> {{ $error }}
          </p>
        @endforeach
      </div>
    </div>
  @endif
  <div class="card">
    <div class="card-header">
      <h5 class="float-start">Tabel Loket</h5>
      <button type="button" class="btn btn-outline-primary btn-sm float-end" data-bs-toggle="modal"
        data-bs-target="#modal-tambah">
        <i class="fas fa-plus"></i> Tambah
      </button>
    </div>
    <div class="card-body p-0">
      <div class="table-responsive scrollbar">
        <table class="table table-bordered table-striped">
          <thead class="bg-200 text-900">
            <tr>
              <th class="text-center" style="width: 24px">No.</th>
              <th>Nama Loket</th>
              <th>Kode</th>
              <th>Petugas</th>
              <th class="text-center" style="width: 120px">Opsi</th>
            </tr>
          </thead>
          <tbody class="list">
            @forelse ($lokets as $loket)
              <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td>{{ $loket->nama }}</td>
                <td>{{ $loket->kode }}</td>
                <td>{{ $loket->petugas->nama }}</td>
                <td class="text-center">
                  <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                    data-bs-target="#modal-edit-{{ $loket->id }}">
                    <i class="fas fa-pen"></i>
                  </button>
                  <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                    data-bs-target="#modal-hapus-{{ $loket->id }}">
                    <i class="fas fa-trash"></i>
                  </button>
                </td>
              </tr>
              <div class="modal fade" id="modal-edit-{{ $loket->id }}" data-bs-keyboard="false"
                data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog mt-6" role="document">
                  <div class="modal-content border-0">
                    <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
                      <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ url('admin/loket/' . $loket->id) }}" method="post">
                      @csrf
                      @method('put')
                      <div class="modal-body p-0">
                        <div class="bg-light rounded-top-lg py-3 ps-4 pe-6 text-start">
                          <h4 class="mb-3">Ubah Loket</h4>
                        </div>
                        <div class="p-4">
                          <div class="mb-3">
                            <label class="col-form-label">Nama Loket</label>
                            <input class="form-control" type="text" name="nama"
                              value="{{ old('nama-' . $loket->id, $loket->nama) }}" />
                          </div>
                          <div class="mb-3">
                            <label class="col-form-label" id="kode">Kode</label>
                            <select class="form-select" name="kode">
                              <option value="">- Pilih -</option>
                              @for ($i = 0; $i < count($abjad); $i++)
                                <option value="{{ $abjad[$i] }}"
                                  {{ old('kode-' . $loket->id, $loket->kode) == $abjad[$i] ? 'selected' : '' }}>
                                  {{ $abjad[$i] }}</option>
                              @endfor
                            </select>
                          </div>
                          <div class="mb-3">
                            <label class="col-form-label" id="petugas_id">Petugas</label>
                            <select class="form-select" name="petugas_id">
                              <option value="">- Pilih -</option>
                              @foreach ($users as $user)
                                <option value="{{ $user->id }}"
                                  {{ old('petugas_id-' . $loket->id, $loket->petugas_id) == $user->id ? 'selected' : '' }}>
                                  {{ $user->nama }}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Batal</button>
                        <button class="btn btn-primary" type="submit">Simpan</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="modal fade" id="modal-hapus-{{ $loket->id }}" data-bs-keyboard="false"
                data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog mt-6" role="document">
                  <div class="modal-content border-0">
                    <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
                      <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-0">
                      <div class="bg-light rounded-top-lg py-3 ps-4 pe-6 text-start">
                        <h4 class="mb-3">Hapus</h4>
                        <h5 class="fs-0 fw-normal">Yakin hapus loket
                          <strong>{{ $loket->nama }}?</strong>
                        </h5>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Batal</button>
                      <button class="btn btn-primary" type="button"
                        onclick="event.preventDefault(); document.getElementById('delete{{ $loket->id }}').submit();">Hapus</button>
                      <form action="{{ url('admin/loket/' . $loket->id) }}" method="POST" id="delete{{ $loket->id }}">
                        @csrf
                        @method('delete')
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            @empty
              <tr>
                <td colspan="5" class="text-center">- Data tidak ditemukan -</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="modal fade" id="modal-tambah" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1"
    aria-hidden="true">
    <div class="modal-dialog mt-6" role="document">
      <div class="modal-content border-0">
        <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
          <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base" data-bs-dismiss="modal"
            aria-label="Close"></button>
        </div>
        <form action="{{ url('admin/loket') }}" method="post" autocomplete="off">
          @csrf
          <div class="modal-body p-0">
            <div class="bg-light rounded-top-lg py-3 ps-4 pe-6 text-start">
              <h4 class="mb-3">Tambah Loket</h4>
            </div>
            <div class="p-4">
              <div class="mb-3">
                <label class="col-form-label">Nama Loket</label>
                <input class="form-control" type="text" name="nama" value="{{ old('nama') }}" />
              </div>
              <div class="mb-3">
                <label class="col-form-label" id="kode">Kode</label>
                <select class="form-select" name="kode">
                  <option value="">- Pilih -</option>
                  @for ($i = 0; $i < count($abjad); $i++)
                    <option value="{{ $abjad[$i] }}" {{ old('kode') == $abjad[$i] ? 'selected' : '' }}>
                      {{ $abjad[$i] }}</option>
                  @endfor
                </select>
              </div>
              <div class="mb-3">
                <label class="col-form-label" id="petugas_id">Petugas</label>
                <select class="form-select" name="petugas_id">
                  <option value="">- Pilih -</option>
                  @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ old('petugas_id') == $user->id ? 'selected' : '' }}>
                      {{ $user->nama }}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Batal</button>
            <button class="btn btn-primary" type="submit">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection

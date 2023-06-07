@extends('layouts.app')

@section('title', 'Data Petugas')

@section('content')
  <div class="card mb-3">
    <div class="bg-holder d-none d-lg-block bg-card"
      style="background-image:url({{ asset('falcon/public/assets/img/icons/spot-illustrations/corner-4.png') }});">
    </div>
    <!--/.bg-holder-->
    <div class="card-body position-relative">
      <div class="row">
        <div class="col-lg-8">
          <h3>Data Petugas</h3>
          <p class="mb-0">Petugas</p>
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
      <h5 class="float-start">Tabel Petugas</h5>
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
              <th>Nama Petugas</th>
              <th class="text-center" style="width: 120px">Opsi</th>
            </tr>
          </thead>
          <tbody class="list">
            @forelse ($users as $user)
              <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td>{{ $user->nama }}</td>
                <td class="text-center">
                  <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                    data-bs-target="#modal-edit-{{ $user->id }}">
                    <i class="fas fa-pen"></i>
                  </button>
                  <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                    data-bs-target="#modal-hapus-{{ $user->id }}">
                    <i class="fas fa-trash"></i>
                  </button>
                </td>
              </tr>
              <div class="modal fade" id="modal-edit-{{ $user->id }}" data-bs-keyboard="false"
                data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog mt-6" role="document">
                  <div class="modal-content border-0">
                    <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
                      <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ url('admin/petugas/' . $user->id) }}" method="post">
                      @csrf
                      @method('put')
                      <div class="modal-body p-0">
                        <div class="bg-light rounded-top-lg py-3 ps-4 pe-6 text-start">
                          <h4 class="mb-3">Ubah Petugas</h4>
                        </div>
                        <div class="p-4">
                          <div class="mb-3">
                            <label class="col-form-label">Nama Petugas</label>
                            <input class="form-control" type="text" name="nama"
                              value="{{ old('nama-' . $user->id, $user->nama) }}" />
                          </div>
                          <div class="mb-3">
                            <label class="col-form-label">Username</label>
                            <input class="form-control" type="text" name="username"
                              value="{{ old('username-' . $user->id, $user->username) }}" />
                          </div>
                          <div class="mb-3">
                            <label class="col-form-label">Password</label>
                            <br>
                            <button type="button" class="btn btn-warning btn-sm" data-bs-dismiss="modal"
                              data-bs-toggle="modal" data-bs-target="#modal-reset-{{ $user->id }}">Reset</button>
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
              <div class="modal fade" id="modal-hapus-{{ $user->id }}" data-bs-keyboard="false"
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
                        <h5 class="fs-0 fw-normal">Yakin hapus petugas
                          <strong>{{ $user->nama }}?</strong>
                        </h5>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Batal</button>
                      <button class="btn btn-primary" type="button"
                        onclick="event.preventDefault(); document.getElementById('delete-{{ $user->id }}').submit();">Hapus</button>
                      <form action="{{ url('admin/petugas/' . $user->id) }}" method="POST" id="delete-{{ $user->id }}">
                        @csrf
                        @method('delete')
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal fade" id="modal-reset-{{ $user->id }}" data-bs-keyboard="false"
                data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog mt-6" role="document">
                  <div class="modal-content border-0">
                    <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
                      <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-0">
                      <div class="bg-light rounded-top-lg py-3 ps-4 pe-6 text-start">
                        <h4 class="mb-3">Reset Password</h4>
                      </div>
                      <div class="p-4">
                        <p>Password dari <strong>{{ $user->nama }}</strong> akan diubah menjadi
                          <strong>12345678</strong>
                          <br>
                          <strong>Lanjutkan?</strong>
                        </p>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button class="btn btn-secondary" type="button" data-bs-dismiss="modal" data-bs-toggle="modal"
                        data-bs-target="#modal-edit-{{ $user->id }}">Kembali</button>
                      <a href="{{ url('admin/petugas/reset-password/' . $user->id) }}" class="btn btn-primary">Ya</a>
                    </div>
                  </div>
                </div>
              </div>
            @empty
              <tr>
                <td colspan="3" class="text-center">- Data tidak ditemukan -</td>
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
        <form action="{{ url('admin/petugas') }}" method="post" autocomplete="off">
          @csrf
          <div class="modal-body p-0">
            <div class="bg-light rounded-top-lg py-3 ps-4 pe-6 text-start">
              <h4 class="mb-3">Tambah Petugas</h4>
            </div>
            <div class="p-4">
              <div class="mb-3">
                <label class="col-form-label">Nama Petugas</label>
                <input class="form-control" type="text" name="nama" value="{{ old('nama') }}" />
              </div>
              <div class="mb-3">
                <label class="col-form-label">Username</label>
                <input class="form-control" type="text" name="username" value="{{ old('username') }}" />
              </div>
              <div class="mb-3">
                <label class="col-form-label">Password</label>
                <input class="form-control" type="password" name="password" value="{{ old('password') }}" />
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

@extends('layouts.app')

@section('content')
<div class="container mt-3 mb-3">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">Profil Saya</div>
        <form action="{{ route('profile.update') }}" method="POST">
          <div class="card-body">
            @csrf
            @method('PUT')
            <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input type="text" class="form-control" name="username" value="{{ $user->username }}" >
            </div>
            <div class="mb-3">
              <label for="username" class="form-label">Nama Lengkap</label>
              <input type="text" class="form-control" name="namaLengkap" value="{{ $user->namaLengkap }}" >
            </div>
            <div class="mb-3">
              <label for="username" class="form-label">Email</label>
              <input type="email" class="form-control" name="email" value="{{ $user->email }}" >
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" name="password" />
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Konfirmasi Password</label>
              <input type="password" class="form-control" name="password_confirmation" />
            </div>
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-primary w-50">Simpan</button>
          </div>
        </form>
        <div class="card-footer text-center mt-3"> <!-- Tambahkan tombol logout -->
          <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger w-50">Logout</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

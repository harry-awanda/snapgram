@extends('layouts.app')

@section('content')
<div class="container mt-4">
  <form action="{{ route('albums.store') }}" method="POST">
    @csrf
    <div class="card">
      <div class="card-header">
        <h2>Buat Album Baru</h2>
      </div>
      <div class="card-body">
        <div class="col-6 mx-auto">
          <div class="row g-3">
            <div class="mb-3">
              <label for="namaAlbum" class="form-label">Nama Album</label>
              <input type="text" class="form-control" id="namaAlbum" name="namaAlbum" required>
            </div>
            <div class="mb-3">
              <label for="deskripsi" class="form-label">Deskripsi Album</label>
              <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required maxlength="150"></textarea>
              <small id="charCount" class="form-text text-muted">0/150 characters</small>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer d-flex justify-content-end">
        <button type="submit" class="btn btn-primary">Tambah Album</button>
      </div>
    </div>
  </form>
</div>

@endsection

@push('scripts')
<!-- JavaScript untuk menghitung karakter -->
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const deskripsiInput = document.getElementById('deskripsi');
    const charCount = document.getElementById('charCount');
    
    deskripsiInput.addEventListener('input', function () {
      const currentLength = deskripsiInput.value.length;
      charCount.textContent = `${currentLength}/150 characters`;
    });
  });
</script>
@endpush
@extends('layouts.app')

@section('content')
@if ($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif
<div class="container mt-4">
  <form action="{{ route('photos.update', $photo->fotoID) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT') <!-- Mengganti metode menjadi PUT untuk update -->
    
    <div class="card">
      <div class="card-header">
        <h2>Edit Foto</h2> <!-- Mengubah judul menjadi Edit -->
      </div>
      <div class="card-body">
        <div class="mb-3">
          <label for="judulFoto" class="form-label">Judul Foto</label>
          <input type="text" class="form-control" id="judulFoto" name="judulFoto" value="{{ $photo->judulFoto }}" required>
        </div>
        
        <div class="mb-3">
          <label for="photo" class="form-label">Pilih Foto (Opsional jika ingin mengganti)</label>
          <input type="file" class="form-control" id="photo" name="photo">
          <!-- Menampilkan nama file foto sebelumnya -->
          @if($photo->lokasiFile)
          <small class="form-text text-muted">
            Foto yang diunggah sebelumnya: <strong>{{ basename($photo->lokasiFile) }}</strong>
          </small>
          @endif
        </div>
        
        <div class="mb-3">
          <label for="description" class="form-label">Deskripsi</label>
          <textarea class="form-control" id="description" name="description" rows="3">{{ $photo->deskripsiFoto }}</textarea>
        </div>

        <div class="mb-3">
          <label for="albumID" class="form-label">Album</label>
          <select class="form-control" id="albumID" name="albumID" required>
            <option value="">Pilih Album</option>
            @foreach ($albums as $album)
              <option value="{{ $album->albumID }}" {{ $album->albumID == $photo->albumID ? 'selected' : '' }}>
                {{ $album->namaAlbum }}
              </option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="card-footer d-flex justify-content-end">
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
      </div>
    </div>
  </form>
</div>
@endsection

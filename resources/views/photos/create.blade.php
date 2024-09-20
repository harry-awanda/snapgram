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
  <form action="{{ route('photos.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card">
      <div class="card-header">
        <h2>Upload Foto Baru</h2>
      </div>
      <div class="card-body">
        <div class="mb-3">
          <label for="judulFoto" class="form-label">Judul Foto</label>
          <input type="text" class="form-control" id="judulFoto" name="judulFoto" required>
        </div>
        <div class="mb-3">
          <label for="photo" class="form-label">Pilih Foto</label>
          <input type="file" class="form-control" id="photo" name="photo" required>
        </div>
        <div class="mb-3">
          <label for="description" class="form-label">Deskripsi</label>
          <textarea class="form-control" id="description" name="description" rows="3"></textarea>
        </div>
        <div class="mb-3">
          <label for="albumID" class="form-label">Album</label>
          <select class="form-control" id="albumID" name="albumID" required>
            <option value="">Pilih Album</option>
            @foreach ($albums as $album)
              <option value="{{ $album->albumID }}">{{ $album->namaAlbum }}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="card-footer d-flex justify-content-end">
        <button type="submit" class="btn btn-primary">Unggah Foto</button>
      </div>
    </div>
  </form>
</div>
@endsection

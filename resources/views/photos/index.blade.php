@extends('layouts.app')

@section('content')
<div class="container mt-4 mb-5">
  <h3>{{ $album->namaAlbum }}</h3>
  <p>{{ $album->deskripsi }}</p>
  
  <div class="row">
    @if($album->photos->isNotEmpty())
      @foreach($album->photos as $photo)
      <div class="col-md-3 mb-4">
        <div class="card">
          <img src="{{ asset('storage/' . $photo->lokasiFile) }}" class="card-img-top" alt="{{ $photo->judulFoto }}">
          <div class="card-body">
            <h5 class="card-title">{{ $photo->judulFoto }}</h5>
            <p class="card-text">{{ $photo->deskripsiFoto }}</p>
            
            <!-- Tombol Edit -->
            <a href="{{ route('photos.edit', $photo->fotoID) }}" class="btn btn-warning btn-sm">Edit</a>
            
            <!-- Form Hapus -->
            <form action="{{ route('photos.destroy', $photo->fotoID) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus foto ini?');">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
            </form>
          </div>
          <div class="card-footer text-muted">
            Diunggah {{ $photo->created_at->diffForHumans() }}
          </div>
        </div>
      </div>
      @endforeach
    @else
      <p>Tidak ada foto dalam album ini.</p>
    @endif
  </div>
</div>
@endsection

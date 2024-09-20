@extends('layouts.app')

@section('content')
<div class="container mt-4 mb-5"> <!-- Tambahkan kelas mb-5 di sini -->
  <!-- Tombol Tambah Album -->
  <div class="col-md-4 mb-4">
    <a href="{{ route('albums.create') }}" class="btn btn-primary">Tambah Album</a>
    <!-- <a href="{{ route('albums.create') }}" class="text-decoration-none">
      <div class="card d-flex justify-content-center align-items-center" style="height: 100px; width: 100px;">
        <i class='bx bx-plus-circle' style="font-size: 3rem; color: gray;"></i>
      </div>
    </a> -->
  </div>
  <div class="row">
    @if(!$albums->isEmpty())
    <!-- Menampilkan daftar album -->
    @foreach($albums as $album)
    <div class="col-md-2 mb-2">
      <div class="card h-100">
        @if($album->photos->isNotEmpty())
        <div class="thumbnail">
          <img src="{{ asset('storage/' . $album->photos->last()->lokasiFile) }}" class="card-img-top" alt="Thumbnail">
        </div>
        @else
        <div class="card-img-top bg-secondary text-white text-center" style="height: 180px; display: flex; justify-content: center; align-items: center;">
          <span>Thumbnail</span>
        </div>
        @endif
        <div class="card-body">
          <h5 class="card-title">
            <a href="{{ route('albums.photos', $album->albumID) }}" class="text-decoration-none text-dark">
              {{ $album->namaAlbum }}
            </a>
          </h5>
          <p class="card-text">{{ $album->deskripsi }}</p>
          <div class="d-flex justify-content-end">
            <!-- Dropdown menu for Edit and Delete -->
            <div class="dropdown">
              <button class="btn btn-light btn-sm" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class='bx bx-dots-vertical-rounded'></i>
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <li><a href="{{ route('albums.edit', $album->albumID) }}" class="dropdown-item">Edit</a></li>
                <li>
                  <form action="{{ route('albums.destroy', $album->albumID) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus album ini?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="dropdown-item text-danger">Hapus</button>
                  </form>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="card-footer text-muted">
          @if($album->photos->isNotEmpty())
          {{ $album->photos->last()->created_at->diffForHumans() }}
          @else
          No photos yet
          @endif
        </div>
      </div>
    </div>
    @endforeach
    @endif
  </div>
</div>
@endsection

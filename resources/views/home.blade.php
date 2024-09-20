@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    @foreach ($photos as $photo)
    <div class="col-md-4 mb-4">
      <div class="card">
        <div class="card-header">
          <strong>{{ $photo->user->username }}</strong>
        </div>
        <div class="card-body text-center">
          <img src="{{ asset('storage/' . $photo->lokasiFile) }}" class="img-fluid" style="aspect-ratio: 1/1; object-fit: cover;" alt="{{ $photo->judulFoto }}">
          <div class="mt-2">
            <button id="like-button-{{ $photo->fotoID }}" class="btn btn-light" onclick="likePhoto({{ $photo->fotoID }})">
              <i class='bx bx-heart {{ $photo->liked_by_user ? 'text-danger' : '' }}'></i>
            </button>
            <span id="like-count-{{ $photo->fotoID }}">{{ $photo->likes_count }}</span>
            <a href="{{ route('photos.comments', $photo->fotoID) }}" class="btn btn-light">
              <i class='bx bx-comment'></i>
            </a>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endsection

@push('scripts')
<script>
  function likePhoto(photoId) {
  const url = "http://localhost:8000/photos/" + photoId + "/like";
  fetch(url, {
    method: 'POST',
    headers: {
    'X-CSRF-TOKEN': '{{ csrf_token() }}',
    'Content-Type': 'application/json',
    },
    body: JSON.stringify({})
  })
  .then(response => response.json())
  .then(data => {
    if (data.success) {
    // Perbarui elemen DOM untuk like dan jumlah like
    const likeButton = document.querySelector(`#like-button-${photoId}`);
    const likeCount = document.querySelector(`#like-count-${photoId}`);

    if (data.liked) {
      likeButton.classList.add('text-danger'); // Ubah warna ikon menjadi merah
    } else {
      likeButton.classList.remove('text-danger'); // Kembalikan warna ikon
    }
    likeCount.textContent = data.likeCount; // Update jumlah like
    } else {
    console.error('Error:', data.error);
    }
  })
  .catch(error => console.error('Fetch error:', error));
  }
</script>
@endpush

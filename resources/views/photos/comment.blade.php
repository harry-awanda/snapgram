@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row d-flex justify-content-center">
    <div class="col-md-6 mb-4">
      <div class="card">
        <div class="card-header">
          <strong>{{ $photo->user->username }}</strong>
        </div>
        <div class="card-body text-center">
          <img src="{{ asset('storage/' . $photo->lokasiFile) }}" class="img-fluid" style="aspect-ratio: 1/1; object-fit: cover;" alt="{{ $photo->judulFoto }}">
          <div class="mt-2 text-start">
            <div class="comment mb-1">
              <strong>{{ $photo->user->username }}</strong>: {{ $photo->deskripsiFoto }}
            </div>
          </div>
        </div>
        <div class="card-footer">
          @foreach ($photo->comments as $comment)
          <div class="mt-2 text-start">
            <div class="comment mb-1">
              <strong>{{ $comment->user->username }}</strong>: {{ $comment->isiKomentar }}
            </div>
          </div>
          @endforeach
          <hr>
          <form action="{{ route('photos.comment.store', $photo->fotoID) }}" method="POST">
            @csrf
            <div class="form-group">
              <textarea name="isiKomentar" class="form-control mt-2" placeholder="Tulis komentar..." required maxlength="200"></textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Kirim</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

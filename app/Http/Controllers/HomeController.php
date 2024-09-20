<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;
use App\Models\LikePhoto;

class HomeController extends Controller {
  // Menampilkan halaman utama dengan daftar foto
  public function index() {
    $photos = Photo::with(['user', 'album'])
      ->withCount('likes')
      ->get();

    $userId = auth()->id();
    // Tandai foto mana yang disukai oleh pengguna
    foreach ($photos as $photo) {
      $photo->liked_by_user = LikePhoto::where('fotoID', $photo->fotoID)
        ->where('userID', $userId)
        ->exists();
    }

    return view('home', compact('photos'));
  }
}

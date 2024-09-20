<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use Illuminate\Support\Facades\Auth;

class AlbumController extends Controller {
  public function index() {
    $albums = Album::where('userID', Auth::id())->with(['photos' => function($query) {
      $query->orderBy('created_at', 'desc');
    }])->get();
    return view('albums.index', compact('albums'));
  }
  // Fungsi untuk menampilkan form tambah album
  public function create() {
    return view('albums.create');
  }
  // Fungsi untuk menyimpan album baru
  public function store(Request $request) {
    $request->validate([
      'namaAlbum' => 'required|string|max:255',
      'deskripsi' => 'required|string|max:180',
    ]);
    Album::create([
      'namaAlbum' => $request->namaAlbum,
      'deskripsi' => $request->deskripsi,
      'userID' => Auth::id(),
      'tanggalDibuat' => now(),
    ]);
    return redirect()->route('albums.index')->with('success', 'Album berhasil dibuat.');
  }
  public function edit($albumID) {
    $album = Album::findOrFail($albumID);
    // Pastikan hanya user yang membuat album bisa mengedit
    if ($album->userID !== Auth::id()) {
      abort(403, 'Unauthorized action.');
    }
    return view('albums.edit', compact('album'));
  }
  public function update(Request $request, $albumID) {
    $album = Album::findOrFail($albumID);
    // Pastikan hanya user yang membuat album bisa mengupdate
    if ($album->userID !== Auth::id()) {
      abort(403, 'Unauthorized action.');
    }
    // Validasi input
    $request->validate([
      'namaAlbum' => 'required|string|max:255',
      'deskripsi' => 'required|string|max:150',
    ]);
    // Update data album
    $album->namaAlbum = $request->namaAlbum;
    $album->deskripsi = $request->deskripsi;
    $album->save();
    return redirect()->route('albums.index')->with('success', 'Album berhasil diperbarui!');
  }
  public function destroy($albumID) {
    $album = Album::findOrFail($albumID);
    // Pastikan hanya user yang membuat album yang dapat menghapus
    if ($album->userID !== Auth::id()) {
      abort(403, 'Unauthorized action.');
    }
    // Hapus semua foto di dalam album (jika diperlukan)
    foreach ($album->photos as $photo) {
      // Hapus file foto dari storage
      Storage::delete($photo->lokasiFile);
      $photo->delete();
    }
    // Hapus album
    $album->delete();
    return redirect()->route('albums.index')->with('success', 'Album berhasil dihapus!');
  }
}
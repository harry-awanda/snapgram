<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
  protected $primaryKey = 'fotoID';
  protected $fillable = ['judulFoto', 'deskripsiFoto', 'tanggalUnggah', 'lokasiFile', 'albumID', 'userID'];
  
  // Relasi dengan album
  public function album() {
    return $this->belongsTo(Album::class, 'albumID');
  }
  
  public function user() {
    return $this->belongsTo(User::class, 'userID');
  }
  
  public function comments() {
    return $this->hasMany(Comment::class, 'fotoID');
  }
  
  public function likes() {
    return $this->hasMany(LikePhoto::class, 'fotoID');
  }
}
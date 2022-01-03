<?php

namespace App\Models;

use App\Models\User;
use App\Models\Kategori;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Artikel extends Model
{
    use HasFactory;
    protected $table = 'artikel';

    protected $fillable =[
        'judul','slug','desc','kategori_id','user_id','image','is_active','views'
    ];

    protected $hidden= [];
    
 public function kategori()
 {
     return $this->belongsTo(Kategori::class, 'kategori_id','id');
 }

 public function users()
 {
     return $this->belongsTo(User::class, 'user_id','id');
 }
}

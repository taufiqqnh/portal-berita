<?php

namespace App\Models;

use App\Models\Playlist;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Materi extends Model
{
    use HasFactory;
    protected $table = 'materi';

    protected $fillable =[
        'judul_materi','slug','link','playlist_id','desc','is_active','image'
    ];

    protected $hidden= [];

    public function playlist()
    {
        return $this->belongsTo(Playlist::class, 'playlist_id','id');
    }
}

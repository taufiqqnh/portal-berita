<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Playlist extends Model
{
    use HasFactory;
    protected $table = 'playlist';

    protected $fillable =[
        'judul_playlist','slug','desc','user_id','image','is_active'
    ];

    protected $hidden= [];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id','id');
    }
}

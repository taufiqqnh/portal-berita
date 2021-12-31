<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';

    protected $fillable =[
        'nama_kategori','slug'
    ];

    protected $hidden= [];

    public function artikel()
    {
        return $this->hasMany(Artikel::class, 'kategori_id');
    }
}

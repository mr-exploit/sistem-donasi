<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;
    protected $table = 'berita';

    protected $fillable = [
        'id',
        'judul',
        'img_berita',
        'list_berita',
        'content',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}

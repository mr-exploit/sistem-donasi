<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Berita extends Model
{
    use HasFactory;
    protected $table = 'berita';

    protected $fillable = [
        'id',
        'judul',
        'slug',
        'img_berita',
        'list_berita',
        'content',
        'status',
        'created_by',
    ];

    public function user()
    {

        return $this->belongsTo(User::class, 'created_by');
    }

    public function setJudulAttribute($value)
    {
        $this->attributes['judul'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
}

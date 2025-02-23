<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Program extends Model
{
    use HasFactory;
    protected $table = 'program';

    protected $fillable = [
        'id',
        'kategori_id',
        'nama',
        'kecamatan',
        'img_program',
        'slug',
        'deskripsi',
        'target_donasi',
        'donasi_terkumpul',
        'isDone',
        'status',
        'created_by'
    ];

    public function user()
    {

        return $this->belongsTo(User::class, 'created_by');
    }

    public function setJudulAttribute($value)
    {
        $this->attributes['nama'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function kategori()
    {
        return $this->belongsTo(KategoriProgram::class, 'kategori_id');
    }
}

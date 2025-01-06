<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;
    protected $table = 'program';

    protected $fillable = [
        'id',
        'kategori_id',
        'nama',
        'img_program',
        'deskripsi',
        'target_donasi',
        'donasi_terkumpul',
        'isDone',
        'status',
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriProgram::class, 'kategori_id');
    }
}

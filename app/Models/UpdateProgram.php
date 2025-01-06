<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UpdateProgram extends Model
{
    use HasFactory;
    protected $table = 'update_program';

    protected $fillable = [
        'id',
        'program_id',
        'img_program',
        'deskripsi',
    ];

    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $table = 'transaction';

    protected $fillable = [
        'id',
        'program_id',
        'email',
        'nama',
        'no_hp',
        'tgl_faktur',
        'jumlah_donasi',
        'payment_type',
        'transaction_id',
        'va_number',
        'status',
        'transaction_status',
        'transaction_time',
    ];

    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id');
    }
}

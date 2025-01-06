<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionHistory extends Model
{
    use HasFactory;
    protected $table = 'transaction_history';

    protected $fillable = [
        'id',
        'transaction_id',
        'email',
        'nama',
        'jumlah_donasi',
        'payment_type',
        'transaction_id',
        'va_number',
        'transaction_status',
        'transaction_time',
    ];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'transaction_id');
    }
}

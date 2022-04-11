<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'vendor_name',
        'transaction_amount',
        'limit_balance',
        'transaction_status',
        'transaction_date',

    ];
}

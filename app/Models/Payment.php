<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['payment_id', 'user_id', 'amount', 'payment_method', 'status', 'paid_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

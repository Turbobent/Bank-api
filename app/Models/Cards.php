<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cards extends Model
{
    use HasFactory;

    public function customer(){
        return $this->belongsTo(Customer::class);

    }

    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}

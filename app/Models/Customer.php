<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'email',
        'password',
        'address',
        'city',
        'postal_code',
        'phone_number',
    ];

    public function accounts()
    {
        return $this->hasMany(Account::class);
    }
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
    
    public function cards()
    {
        return $this->hasMany(Card::class);
    }

    public function loans()
    {
        return $this->hasMany(Loan::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loans extends Model
{
    use HasFactory;
    protected $fillable = ['user_id',
    'loan_amount',
    'interest_rate',
     'loan_type',
     'term_months',
     'monthly_payment',
     'disbursement_date',
     'due_date',
     'status'];

    public function customer(){
        return $this->belongsTo(Customer::class);

    }
}

<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AccountResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            'id'=>$this->id,
            'customerId'=>$this->customer_id,
            'loanAmount'=>$this->loan_amount,
            'interestRate'=>$this->interest_rate,
            'loanType'=>$this->loan_type,
            'termMonths'=>$this->term_months,
            'monthlyPayment'=>$this->monthly_payment,
            'disbursementDate'=>$this->disbursement_date,
            'dueDate'=>$this->due_date,
            'status'=>$this->status,

        ];
    }
}

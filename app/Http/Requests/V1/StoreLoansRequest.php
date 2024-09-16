<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLoansRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'loanAmount' =>['required'],
            'interestRate'=>['required'],
            'loanType'=>['required', Rule::in(['P', 'M', 'A', 'E','p', 'm', 'a', 'e'])],
            'termMonths'=>['required'],
            'monthlyPayment'=>['required'],
            'disbursementDate'=>['required'],
            'dueDate'=>['required'],
            'status'=>['required', Rule::in(['PE','A','PA','pe','a','pa'])],
        ];
    }

    protected function prepareForValidation(){
        $this->merge([
            'loan_amount' => $this->loanAmount,
            'interest_rate' =>$this->interestRate,
            'loan_type' =>$this->loanType,
            'term_months' =>$this->termMonths,
            'monthly_payment' =>$this->monthlyPayment,
            'disbursement_date' =>$this->disbursementDate,
            'due_date' =>$this->dueDate,
        ]);
    }
}

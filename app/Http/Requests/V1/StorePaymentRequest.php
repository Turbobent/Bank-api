<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class StorePaymentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $user = $this->user();
        return $user != null && $user->tokenCan('create');

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'customer_id' =>['required'],
            'status'=>['required', Rule::in(['P','B','V','p','b','v'])],
            'to'=>['required'],
            'recipient_account'=>['required'],
            'amount'=>['required'],
            'currency'=>['required'],
            'payment_method'=>['required'],
            'paid_at'=>['required'],
        ];
    }

    protected function prepareForValidation(){
        $this->merge([
            'paid_at' => $this->paidAt,
            'payment_method' =>$this->paymentMethod,
            'recipient_account' =>$this->recipientAccount
        ]);
    }
}

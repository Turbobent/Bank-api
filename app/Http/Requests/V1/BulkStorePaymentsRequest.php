<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class BulkStorePaymentRequest extends FormRequest
{
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
            '*.customerId' =>['required', 'exists:customers,id'],
            '*.status'=>['required', Rule::in(['P','B','V','p','b','v'])],
            '*.amount'=>['required', 'numeric'],
            '*.to'=>['required','exists:customers,id'],
            '*.recipient_account'=>['required','exists:account,account_number'],
            '*.currency'=>['required','string'],
            '*.payment_method'=>['required','string'],
            '*.paid_at'=>['required','date'],
            '*.transaction_id'=>['required','numeric'],
        ];
    }

    protected function prepareForValidation(){
      $data =[];

      foreach($this->toArray() as $obj){
            $obj['customer_id'] =  $obj['customerId'] ?? null;
            $obj['paid_at'] = $obj['paidAt'] ?? null;
            $data[] = $obj;
        };

        $this->merge($data);

    }
}

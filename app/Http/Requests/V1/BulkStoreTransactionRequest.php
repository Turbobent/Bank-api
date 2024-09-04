<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class BulkStoreTransactionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
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
            '*.status'=>['required', Rule::in(['S','F','V','s','f','v'])],
            '*.amount'=>['required', 'numeric'],
            '*.to'=>['required','exists:customers,id'],
        ];
    }

    protected function prepareForValidation(){
      $data =[];

      foreach($this->toArray() as $obj){
            $obj['customer_id'] =  $obj['customerId'] ?? null;

            $data[] = $obj;
        };

        $this->merge($data);

    }
}

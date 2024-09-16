<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCardsRequest extends FormRequest
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
            'cardNumber' =>['required'],
            'cardType'=>['required', Rule::in(['C','D','c','d'])],
            'cvv'=>['required'],
            'expirationDate'=>['required'],
            'status'=>['required'],
            'accountId'=>['required'],
            'postalCode'=>['required'],
            'phoneNumber'=>['required'],
        ];
    }
    protected function prepareForValidation(){
        $this->merge([
            'card_number' => $this->cardNumber,
            'card_type' =>$this->cardType,
            'account_id' =>$this->accountId,
            'expiration_date' =>$this->expirationDate,
        ]);
    }
}

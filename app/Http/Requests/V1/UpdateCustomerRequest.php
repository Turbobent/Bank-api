<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
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
        $method = $this->method();

        if($method == 'PUT'){
        return [
            'name' =>['required'],
            'type'=>['required', Rule::in(['I','i','B','b'])],
            'email'=>['required', 'email'],
            'password'=>['required'],
            'address'=>['required'],
            'city'=>['required'],
            'postalCode'=>['required'],
            'phoneNumber'=>['required'],
            ];
        } else{
            return [
                'name' =>['sometimes', 'required'],
                'type'=>['sometimes', 'required', Rule::in(['I','i','B','b'])],
                'email'=>['sometimes', 'required', 'email'],
                'password'=>['sometimes', 'required'],
                'address'=>['sometimes', 'required'],
                'city'=>['sometimes', 'required'],
                'postalCode'=>['sometimes', 'required'],
                'phoneNumber'=>['sometimes', 'required'],
                ];
        }
    }

    protected function prepareForValidation(){
        if($this->postalcode){
        $this->merge([
            'postal_code' => $this->postalCode,
            'phone_number' =>$this->phoneNumber
        ]);
      }
    }
}

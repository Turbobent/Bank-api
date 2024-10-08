<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
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
            'name'=>$this->name,
            'type'=>$this->type,
            'email'=>$this->email,
            'password'=>$this->password,
            'address'=>$this->address,
            'city'=>$this->city,
            'postalCode'=>$this->postal_code,
            'phoneNumber'=>$this->phone_number,
            'transactions' => TransactionResource::collection($this->whenLoaded('transactions')),
            'accounts' => AccountResource::collection($this->whenLoaded('accounts')),
            'payments' => PaymentResource::collection($this->whenLoaded('payments')),
            'cards' => CardResource::collection($this->whenLoaded('cards')),
            'loans' => LoanResource::collection($this->whenLoaded('loans')),
        ];
    }
}

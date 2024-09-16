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
            'cardNumber'=>$this->card_number,
            'cardType'=>$this->card_type,
            'cvv'=>$this->cvv,
            'expirationDate'=>$this->expiration_date,
            'status'=>$this->status,
            'accountId'=>$this->account_id,
        ];
    }
}

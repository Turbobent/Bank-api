<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
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
            'amount'=>$this->amount,
            'status'=>$this->status,
            'to'=>$this->to,
            'createdAt'=>$this->created_at,

        ];
    }
}

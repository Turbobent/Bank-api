<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PaymentResource extends JsonResource
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
            'to'=>$this->to,
            'recipientAccount'=>$this->recipient_account,
            'amount'=>$this->amount,
            'currency'=>$this->currency,
            'paymentMethod'=>$this->payment_method,
            'transactionId'=>$this->transaction_id,
            'status'=>$this->status,
            'paidAt'=>$this->paid_at,
        ];
    }
}

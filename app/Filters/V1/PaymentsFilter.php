<?php
namespace App\Filters\V1;
use App\Filters\ApiFilter;
use Illuminate\Http\Request;


class AccountsFilter extends ApiFilter{

     protected $allowedParms = [
        'customerId'=>['eq'],
        'to'=>['eq', 'gt','lt','gte','lte'],
        'recipientAccount'=>['eq'],
        'currency'=>['eq'],
        'paymentMethod'=>['eq'],
        'status'=>['eq'],
        'amount'=>['eq', 'gt','lt','gte','lte'],
    ];

    protected $columMap = [
        'customerId' => 'customer_id',
        'recipientAccount' => 'recipient_account',
        'paymentMethod' => 'payment_method',
        'transactionId' => 'transaction_id',
        'paidAt' => 'paid_at'
    ];

    protected $operatorMap = [
        'eq' => '=',
        'gt' => '>',
        'lt' => '<',
        'gte' => '>=',
        'lte' => '<=',
        'ne' => '!='
    ];
}

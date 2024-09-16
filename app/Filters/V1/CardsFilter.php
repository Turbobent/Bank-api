<?php
namespace App\Filters\V1;
use App\Filters\ApiFilter;
use Illuminate\Http\Request;


class AccountsFilter extends ApiFilter{

     protected $allowedParms = [
        'customerId'=>['eq'],
        'cardNumber'=>['eq', 'gt','lt','gte','lte'],
        'cardType'=>['eq'],
        'cvv'=>['eq'],
        'status'=>['eq'],
        'account_id'=>['eq'],
        'expirationDate'=>['eq', 'gt','lt','gte','lte'],
    ];

    protected $columMap = [
        'customerId' => 'customer_id',
        'cardNumber' => 'card_number',
        'cardType' => 'card_type',
        'expirationDate' => 'expiration_date'
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

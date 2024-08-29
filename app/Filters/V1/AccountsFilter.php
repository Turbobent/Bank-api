<?php
namespace App\Filters\V1;
use App\Filters\ApiFilter;
use Illuminate\Http\Request;


class AccountsFilter extends ApiFilter{

     protected $allowedParms = [
        'customerId'=>['eq'],
        'accountNumber'=>['eq', 'gt','lt','gte','lte'],
        'accountName'=>['eq'],
        'amountOfMoney'=>['eq'],
    ];

    protected $columMap = [
        'customerId' => 'customer_id',
        'accountNumber' => 'account_number',
        'accountName' => 'account_name',
        'amountOfMoney' => 'amount_of_money'
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

<?php
namespace App\Filters\V1;
use App\Filters\ApiFilter;
use Illuminate\Http\Request;


class AccountsFilter extends ApiFilter{

     protected $allowedParms = [
        'customer_id'=>['eq'],
        'account_number'=>['eq', 'gt','lt','gte','lte'],
        'account_name'=>['eq'],
        'amount_of_money'=>['eq'],
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

<?php
namespace App\Filters\V1;
use App\Filters\ApiFilter;
use Illuminate\Http\Request;


class TransactionsFilter extends ApiFilter{

    protected $allowedParms = [
        'customerId'=>['eq'],
        'amount'=>['eq', 'gt','lt','gte','lte'],
        'status'=>['eq','ne'],
        'to'=>['eq'],
    ];

    protected $columMap = [
        'customerId' => 'customer_id'
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

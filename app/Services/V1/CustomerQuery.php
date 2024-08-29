<?php
namespace App\Services\V1;

use Illuminate\Http\Requrest;


class CustomerQuery{
    protected $allowedParms = [
        'name'=>['eq'],
        'type'=>['eq'],
        'email'=>['eq'],
        'address'=>['eq'],
        'city'=>['eq'],
        'phoneNumber'=>['eq'],
        'postalCode' =>['eq','gt','lt'],
    ];

    protected $columMap = [
        'postalCode' => 'postal_code'
    ];

    protected $operatorMap = [
        'eq' => '=',
        'gt' => '>',
        'lt' => '<',
        'gte' => '>=',
        'lte' => '<=',
    ];

}

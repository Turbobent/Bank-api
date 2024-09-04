<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Customer;
use App\Http\Requests\V1\StoreCustomerRequest;
use App\Http\Requests\V1\UpdateCustomerRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\CustomerResource;
use App\Http\Resources\V1\CustomerCollection;
use App\Filters\V1\CustomersFilter;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new CustomersFilter();
        $filterItems = $filter->transform($request); //[['column', 'operator', 'value']]

        $includeTransactions = $request->query('includeTransactions');
        $includeAccounts = $request->query('includeAccounts');

        $customers = Customer::where($filterItems);

        if ($includeTransactions) {
            $customers = $customers->with('transactions');
        }

        if ($includeAccounts) {
            $customers = $customers->with('accounts');
        }

        return new CustomerCollection($customers->paginate()->appends($request->query()));
    }



    /**
     * Store a newly created resource in storage.
     */
     public function store(StoreCustomerRequest $request)
     {
        return new CustomerResource(Customer::create($request->all()));
     }

    /**
     * Display the specified resource.
     */
     public function show(Customer $customer)
     {
        $includeTransactions = request()->query('includeTransactions');
        $includeAccounts = request()->query('includeAccounts');

        if ($includeTransactions) {
           $customer->loadMissing('transactions');
        }

        if ($includeAccounts) {
          $customer->loadMissing('accounts');
        }

        return new CustomerResource($customer);
     }

    /**
     * Update the specified resource in storage.
     */
     public function update(UpdateCustomerRequest $request, Customer $customer)
     {
        $customer->update($request->all());
     }

    /**
     * Remove the specified resource from storage.
     */
     public function destroy(Customer $customer)
     {
        //
     }
}

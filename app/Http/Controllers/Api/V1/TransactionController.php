<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Transaction;
use App\Http\Requests\V1\BulkStoreTransactionRequest;
use App\Http\Requests\V1\UpdateTransactionRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\TransactionResource;
use App\Http\Resources\V1\TransactionCollection;
use App\Filters\V1\TransactionsFilter;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;



class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new TransactionsFilter();
        $queryItems = $filter->transform($request); //[['column', 'operator', 'value']]

        if(count($queryItems) == 0){
            return new TransactionCollection(Transaction::paginate());
        } else {
            $transactions = Transaction::where($queryItems)->paginate();

            return new TransactionCollection($transactions->appends($request->query()));

        }
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    public function bulkStore(BulkStoreTransactionRequest $request)
    {
        $bulk = collect($request->all())->map(function($arr) {
            return Arr::except($arr, ['customerId']);
        });

        // Perform the bulk insert
        Transaction::insert($bulk->toArray());
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        return new TransactionResource($transaction);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTransactionRequest $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}

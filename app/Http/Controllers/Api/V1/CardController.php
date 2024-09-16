<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Cards;
use App\Http\Requests\StoreCardRequest; //need
use App\Http\Requests\UpdateCardRequest; //need
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\CardResource;
use App\Http\Resources\V1\CardCollection;
use App\Filters\V1\CardFilter;
use Illuminate\Http\Request;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $filter = new CardsFilter();
        $queryItems = $filter->transform($request); //[['column', 'operator', 'value']]

        if(count($queryItems) == 0){
            return new CardCollection(Account::paginate());
        } else {
            $cards = Card::where($queryItems)->paginate();

            return new CardCollection($cards->appends($request->query()));
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
    public function store(StoreCardsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Card $card)
    {
       return new CardResource($card);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cards $cards)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCardsRequest $request, Cards $cards)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cards $cards)
    {
        //
    }
}

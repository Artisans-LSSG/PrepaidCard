<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\Models\Card;
use App\Models\Transaction;
use http\Client\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Transaction::all();
       return response()->json($comments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTransactionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(\Illuminate\Http\Request $request)
    {
        $request->validate([
            'card_number'=>Card::all()->random()->pluck('card_number'),
            'vendor_name'=>'required|string',
            'transaction_amount'=> 'required|integer',
            'limit_balance'=> 'required|integer',
        ]);

        $newTransaction = new Transaction([

            'card_number'=>$request->get('card_number'),
            'vendor_name'=>$request->get('vendor_name'),
            'transaction_amount'=>$request->get('transaction_amount'),
            'limit_balance'=>$request->get('limit_balance'),
        ]);

        $newTransaction->save();

        return response()->json($newTransaction);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        $user = Transaction::findOrFail($transaction);
       return response()->json($user);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTransactionRequest  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTransactionRequest $request, Transaction $transaction)
    {
       $user = Transaction::findOrFail($transaction);

        $request->validate([
            'transaction_amount'=> 'required|integer',
            'vendor_name'=>'required|string',
            'limit_balance'=> 'required|integer',
            'card_number'=>'required|integer'
        ]);

        $user->transaction_amount = $request->get('transaction_amount');
        $user->vendor_name= $request->get('vendor_name');
        $user->limit_balance= $request->get('limit_balance');
        $user-> card_number = $request->get('card_number');
        $user->save();

        return response()->json($transaction);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorerefundsRequest;
use App\Http\Requests\UpdaterefundsRequest;
use App\Models\refunds;

class RefundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $refunds = refunds::all();
        return response()->json($refunds);
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
     * @param  \App\Http\Requests\StorerefundsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorerefundsRequest $request)
    {
        $request->validate([
            'transaction_is'=>'required|string',
            'refund_amount'=>'required|interger',
            'refund_status'=>'required|boolean',
            'refund_date'=>'required|date|timestamp',
        ]);
        $newRefund = new refunds([
           'transaction_id'=>$request->get(transaction_id),
           'refund_amount'=>$request->get('refund_amount'),
           'refund_status'=>$request->get('refund_status'),
            'refund_date'=>$request->get('refund_date'),
        ]);
        $newRefund->save();
        return response()->json($newRefund);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\refunds  $refunds
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(refunds $refund_id)
    {
        $refunds =refunds::findOrFail($refund_id);
        return response()->json($refunds);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\refunds  $refunds
     * @return \Illuminate\Http\Response
     */
    public function edit(refunds $refunds)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdaterefundsRequest  $request
     * @param  \App\Models\refunds  $refunds
     * @return \Illuminate\Http\Response
     */
    public function update(UpdaterefundsRequest $request, refunds $refunds)
    {
        $refunds = refunds::findOrFail($refunds);

        $request->validate([
            'transaction_is'=>'required|string',
            'refund_amount'=>'required|interger',
            'refund_status'=>'required|boolean',
            'refund_date'=>'required|date|timestamp',
        ]);

        $refunds->transaction_id=$request->get('transaction_id');
        $refunds->refund_amount=$request->get('refund_amount');
        $refunds->refund_status=$request->get('refund_status');
        $refunds->refund_date=$request->get('refund_date');
        $refunds->save();

        return response()->json($refunds);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\refunds  $refunds
     * @return \Illuminate\Http\Response
     */
    public function destroy(refunds $refunds)
    {
        //
    }
}

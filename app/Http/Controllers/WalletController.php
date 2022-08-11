<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Escrow;
use App\Models\Wallet;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $payuser = Wallet::findOrFail($id);
        $payuser->amount = ($payuser->amount + $request->amount);
        $payuser->save();

        $statusEscrow = Order::findOrFail($request->order_id);
        $statusEscrow->escrow_status = 'sent';
        $statusEscrow->save();

        $escrowPaidAt = Escrow::where('order_id', $request->order_id)->firstOrFail();
        $escrowPaidAt->paid_at = now();
        $escrowPaidAt->status = 'sent';
        $escrowPaidAt->save();

        return redirect()->route('escrow')->with('success', 'Seller Paid Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

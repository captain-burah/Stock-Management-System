<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Sale;
use Illuminate\Support\Facades\Hash;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Sale::toArray(latest()->paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'cashier_id'  => 'required|integer',
            'stock_id'  => 'required|integer',
            'customer_id'  => 'required|integer'
        ]);
        return Sale::create([
            'cashier_id' => $request['cashier_id'],
            'stock_id' => $request['stock_id'],
            'customer_id' => $request['customer_id'],
            'quantity' => $request['quantity'],
            'total_price' => $request['total_price']
        ]);
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = Sale::findOrFail($id);

        $this->validate($request, [
            'cashier_id'  => 'required',
            'stock_id'  => 'required',
            'customer_id'  => 'required',
        ]);

        $user->update($request->all());

        return['message' => 'updating'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Sale::findOrFail($id);
        $user->delete();
        return ['message' => 'User Deleted'];
    }
}

<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Stock;
use Illuminate\Support\Facades\Hash;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Stock::latest()->paginate(10);
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
            'name'  => 'required|string|max:191',
            'size'  => 'required|string|max:191',
            'quantity'  => 'required|integer',
            'color'  => 'required|string|max:191',
            'category'  => 'required|string|max:191',
            'brand_id'  => 'required|string|max:191',
            'unit_price'  => 'integer',
        ]);
        return Stock::create([
            'name' => $request['name'],
            'size' => $request['size'],
            'quantity' => $request['quantity'],
            'color' => $request['color'],
            'category' => $request['category'],
            'brand_id' => $request['brand_id'],
            'unit_price' => $request['unit_price'],
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
        $user = Stock::findOrFail($id);

        $this->validate($request, [
            'name'  => 'required|string|max:191',
            'size'  => 'required|string|max:191',
            'quantity'  => 'required',
            'color'  => 'required|string|max:191',
            'category'  => 'required|string|max:191',
            'brand_id'  => 'required|string|max:191',
            'unit_price'  => 'integer',
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
        $user = Stock::findOrFail($id);
        $user->delete();
        return ['message' => 'User Deleted'];
    }

    public function searchStock(){
        if ($search = \Request::get('q')){
            $stocks = Stock::select('*')->where('id', $search)->first();

            //$stocks = Stock::select('unit_price')->where(function($query) use ($search){
            //    $query->where('id', '=', "%$search%");
            //})->first();
        }
        return $stocks;
    }
}

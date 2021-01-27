<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Cashier;
use Illuminate\Support\Facades\Hash;

class CashierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Cashier::latest()->paginate(10);
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
            'fname'  => 'required|string|max:191',
            'lname'  => 'required|string|max:191',
            'email'  => 'required|string|email|max:191|unique:cashiers',
            'password' => 'required|string|min:6'
            //'privacyPolicy' => 'required|string',
        ]);
        return Cashier::create([
            'fname' => $request['fname'],
            'lname' => $request['lname'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            
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
        $user = Cashier::findOrFail($id);

        $this->validate($request, [
            'fname'  => 'required|string|max:191',
            'lname'  => 'required|string|max:191',
            'email'  => 'required|string|email|max:191|unique:cashiers,email,'.$user->id,
            'password' => 'sometimes|string|min:6'
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
        $user = Cashier::findOrFail($id);
        $user->delete();
        return ['message' => 'User Deleted'];
    }
}

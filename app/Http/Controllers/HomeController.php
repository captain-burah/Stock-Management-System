<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function manager()
    {
        //$user = 'manager';
        return view('auth.login', ['user' => 'manager']);
    }

    public function stockKeeper()
    {
        $user = 'stockKeeper';
        return view('auth.login', ['user' => 'stockKeeper']);
    }

    public function cashier()
    {
        $user = 'cashier';
        return view('auth.login', ['user' => 'cashier']);
    }
}
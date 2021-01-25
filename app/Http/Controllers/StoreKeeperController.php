<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\StoreKeeper;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Session;

class StoreKeeperController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:storeKeeper');
    }

    public function dashboard(){
        return view('storeKeeper.master');
    }
}

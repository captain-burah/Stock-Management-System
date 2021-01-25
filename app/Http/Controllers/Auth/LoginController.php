<?php

namespace App\Http\Controllers\Auth;

use App\Manager;
use App\StoreKeeper;
use App\Cashier;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function managerLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:8'
        ]);
        
        if (Auth::guard('manager')
            ->attempt(['email' => $request->email, 'password' => $request->password], 
            $request->get('remember')))
        {
            //redirect to SETUP page
            return redirect('/manager_panel');
        }
        else{
            return back()->withInput($request->only('email', 'remember'));
        }

    }

    public function storeKeeperLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:8'
        ]);
        
        if (Auth::guard('storeKeeper')
            ->attempt(['email' => $request->email, 'password' => $request->password], 
            $request->get('remember')))
        {
            //redirect to SETUP page
            return redirect('/storeKeeper_panel');
        }
        else{
            return back()->withInput($request->only('email', 'remember'));
        }

    }
    public function cashierLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:8'
        ]);
        
        if (Auth::guard('cashier')
            ->attempt(['email' => $request->email, 'password' => $request->password], 
            $request->get('remember')))
        {
            //redirect to SETUP page
            return redirect('/cashier_panel');
        }
        else{
            return back()->withInput($request->only('email', 'remember'));
        }

    }
}

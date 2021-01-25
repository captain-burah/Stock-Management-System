<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Manager;
use App\StoreKeeper;
use App\Cashier;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return Manager::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
    



    //------ Show Login Forms ----------------
    public function manager()
    {
        return view('auth.register', ['acc' => 'manager']);
    }
    public function stockKeeper()
    {
        return view('auth.register', ['acc' => 'stockKeeper']);
    }
    public function cashier()
    {
        return view('auth.register', ['acc' => 'cashier']);
    }
    



    
    public function managerRegister(Request $request)
    {
        $validate = $this->validate($request, [
            'fname'  => 'required|string|max:191',
            'lname'  => 'required|string|max:191',
            'email'  => 'required|string|email|max:191|unique:managers',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required| min:6',
            //'privacyPolicy' => 'required|string',
        ]);
        if ($validate == true){
            try{
                Manager::create([
                    'fname' => $request['fname'],
                    'lname' => $request['lname'],
                    'email' => $request['email'],
                    'password' => Hash::make($request['password']),
                    
                ]);
            } catch (\Exception $exception) {
                $message = 'Failled to create a new database record for '.$request->email;
                return dd($message);
            }

            //$user = new LecturerInfo();
            //$user->lec_email = $request['email'];
            //$user->gender = $request['gender'];
            //$user->push();
            return redirect('/manager-login');
        }
    }

    public function storeKeeperRegister(Request $request)
    {
        $validate = $this->validate($request, [
            'fname'  => 'required|string|max:191',
            'lname'  => 'required|string|max:191',
            'email'  => 'required|string|email|max:191|unique:managers',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required| min:6',
            //'privacyPolicy' => 'required|string',
        ]);
        if ($validate == true){
            try{
                StoreKeeper::create([
                    'fname' => $request['fname'],
                    'lname' => $request['lname'],
                    'email' => $request['email'],
                    'password' => Hash::make($request['password']),
                    
                ]);
            } catch (\Exception $exception) {
                $message = 'Failled to create a new database record for '.$request->email;
                return dd($message);
            }

            //$user = new LecturerInfo();
            //$user->lec_email = $request['email'];
            //$user->gender = $request['gender'];
            //$user->push();
            return redirect('/stockKeeper-login');
        }
    }

    public function cashierRegister(Request $request)
    {
        $validate = $this->validate($request, [
            'fname'  => 'required|string|max:191',
            'lname'  => 'required|string|max:191',
            'email'  => 'required|string|email|max:191|unique:managers',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required| min:6',
            //'privacyPolicy' => 'required|string',
        ]);
        if ($validate == true){
            try{
                Cashier::create([
                    'fname' => $request['fname'],
                    'lname' => $request['lname'],
                    'email' => $request['email'],
                    'password' => Hash::make($request['password']),
                    
                ]);
            } catch (\Exception $exception) {
                $message = 'Failled to create a new database record for '.$request->email;
                return dd($message);
            }

            //$user = new LecturerInfo();
            //$user->lec_email = $request['email'];
            //$user->gender = $request['gender'];
            //$user->push();
            return redirect('/cashier-login');
        }
    }
}

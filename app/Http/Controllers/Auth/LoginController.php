<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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

    protected function redirectTo()
    {
        return '/';
    }

    public function username()
    {
        return 'name';
    }

    public function authenticate(Request $request)
    {
        $input = $request->all();
        if (Auth::attempt(['name' => $input['name'], 'password' => $input['password'], 'is_deleted' => 0])) {
            // Аутентификация успешна...
            return redirect()->intended('clients');
        }
        else
        {
            return redirect('login')->withErrors(['msg'=>'Неверные логин или пароль']);
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

	protected function credentials(Request $request)
	{
		$login = $request->input($this->username());
		$field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

		return [$field => $login, 'password' => $request->input('password'), 'fkestado' => 11];
	}
}

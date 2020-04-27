<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Validation\ValidationException;




class AdminLoginController extends Controller
{
    use AuthenticatesUsers;

    //
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    /**
     * Showing the login form
     * @return Illuminate\Http\Response
     */

    public function showLoginForm()
    {

        return view('auth.admin');
    }

    /**
     * function to login users
     * @param Illuminate\Http\Request
     */
    public function login(Request $request)
    {



        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
        /**
         * Login if successful and redirect to staff page
         */
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {

            return redirect()->intended(route('admin.dashboard'));
        }
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }


    public function logout()
    {

        Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }
}

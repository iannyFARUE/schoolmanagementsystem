<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Auth\AuthenticatesUsers;



class StaffLoginController extends Controller
{

    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest:staff')->except('logout');
    }
    /**
     *
     * show login form for teachers to login using email and password
     *
     * @return \Illuminate\Http\Response
     */

    public function showLoginForm()

    {

        return view('auth.staff');
    }

    /**
     *  function to perform the actual login using the Auth facades
     *
     * @param \Illuminate\Http\Request
     */

    public function login(Request $request)
    {

        /**
         * validate form data
         */

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);


        /**
         * Login if successful and redirect to staff page
         */
        if (Auth::guard('staff')->attempt(['email' => $request->email, 'password' => $request->password])) {

            return redirect()->intended(route('staff.dashboard'));
        } else {


            throw ValidationException::withMessages([
                $request->email => [trans('auth.failed')],
            ]);

            // return redirect()->back()->withInput($request->only('email', 'remember'));
        }
    }

    public function logout()
    {

        Auth::guard('staff')->logout();
        return redirect('/teachers/login');
    }
}

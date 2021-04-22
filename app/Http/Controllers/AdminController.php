<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AdminController extends Controller
{
    use AuthenticatesUsers;
    use RegistersUsers;

    // public function login(Request $request)
    // {
    //     $credentials = $request->only('email', 'password');
    //     if (Auth::guard('admin')->attempt($credentials, $request->remember)) {
    //         $user = Admin::where('email', $request->email)->first();
    //         Auth::guard('admin')->login($user);
    //         return redirect()->route('admin.home');
    //     }
    //     return redirect()->route('admin.login')->with('status', 'Failed To Process Login');
    // }

    protected $redirectTo = '/admin/dashboard';

    protected function authenticated(Request $request, $user)
    {
        return redirect()->route('admin.home');
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();
        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect('/');
    }

    protected function loggedOut(Request $request)
    {
        return redirect()->route('admin.login');
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }

    // register admin

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return Admin::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    // end rerister admin

    // public function logout()
    // {

    //     if (Auth::guard('admin')->logout()) {
    //         return redirect()->route('admin.logout')->with('status', 'Logout Successfully!');
    //     }
    // }
}

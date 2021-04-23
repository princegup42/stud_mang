<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Pro;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class ProController extends Controller
{
    use AuthenticatesUsers;
    use RegistersUsers;


    // public function login(Request $request)
    // {
    //     $credentials = $request->only('email', 'password');
    //     if (Auth::guard('pro')->attempt($credentials, $request->remember)) {
    //         $user = Pro::where('email', $request->email)->first();
    //         Auth::guard('pro')->login($user);
    //         return redirect()->route('pro.home');
    //     }
    //     return redirect()->route('pro.login')->with('status', 'Failed To Process Login');
    // }

    protected $redirectTo = '/pro/dashboard';

    protected function authenticated(Request $request, $user)
    {
        return redirect()->route('pro.home');
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
        return redirect()->route('welcome');
    }

    protected function guard()
    {
        return Auth::guard('pro');
    }

    // register pro

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
        return Pro::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function profile()
    {
        return view('pro.profile.index');
    }

    public function profileedit(Pro $id)
    {
        return view('pro.profile.edit', ['pro' => $id]);
    }

    public function profileupdate(Pro $id)
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $id->update([
            'name' => request('name'),
            'email' => request('email'),
            'password' => Hash::make(request('password')),
            // 'password' => request('password'),

            //     // $2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi

            //     // 'password' => Hash::make($data['password']),
        ]);

        // $id->name = request('name');
        // $id->email = request('email');
        // $id->password = Hash::make(request('password'));
        // $id->save();

        return redirect('pro/profile');
    }

    // end rerister pro

    // public function logout()
    // {

    //     if (Auth::guard('pro')->logout()) {
    //         return redirect()->route('pro.logout')->with('status', 'Logout Successfully!');
    //     }
    // }
}

<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Auth;
use App\Models\Professional;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class ProfessionalController extends Controller
{
    use AuthenticatesUsers;
    use RegistersUsers;



    protected $redirectTo = '/professional/home';

    protected function authenticated(Request $request)
    {
        // $jobs = Job::latest()->paginate(7);

        // $params = [
        //     'jobs' => $jobs,
        // ];

        // return view('professional.home')->with($params);


        return redirect()->route('professional.home');
        // return view(
        //     'professional.home',
        //     ['jobs' => $jobs]
        // );

        // return redirect()->route('professional.home');
    }

    public function showdata()
    {
        $jobs = Job::latest()->paginate(7);
        $data = [
            'jobs' => $jobs,
        ];

        return view('professional.home')->with($data);
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();
        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect('login');
    }

    protected function loggedOut(Request $request)
    {
        return redirect()->route('login');
    }

    protected function guard()
    {
        return Auth::guard('professional');
    }

    // register professional

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
        return Professional::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function profile()
    {
        return view('professional.profile.index');
    }

    public function profileedit(Professional $id)
    {
        return view('professional.profile.edit', ['professional' => $id]);
    }

    public function profileupdate(Professional $id)
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

        return redirect('professional/profile');
    }

    // end rerister professional

    // public function logout()
    // {

    //     if (Auth::guard('professional')->logout()) {
    //         return redirect()->route('professional.logout')->with('status', 'Logout Successfully!');
    //     }
    // }
}

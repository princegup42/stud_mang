<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Job;
use App\Models\Skill;
use App\Models\Professional;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class ProfessionalController extends Controller
{
    use AuthenticatesUsers;
    use RegistersUsers;



    protected $redirectTo = '/professional/home';

    protected function authenticated(Request $request)
    {
        return redirect()->route('professional.home');
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

        ]);

        return redirect('professional/profile');
    }

    public function createJob()
    {
        $skills = Skill::all();
        $data = [
            'skills' => $skills,
        ];
        return view('professional.job.create')->with($data);
    }

    public function postJob(Request $request)
    {
        request()->validate([
            'title' => 'required',
            'company_name' => 'required',
            'company_phone' => 'required',
            'company_email' => 'required',
            'company_address' => 'required',
            'company_website' => 'required',
            'skill_id' => 'required',
            'description' => 'required',
        ]);

        $job = Job::create([
            'title' => $request->title,
            'company_name' => $request->company_name,
            'company_phone' => $request->company_phone,
            'company_email' => $request->company_email,
            'company_address' => $request->company_address,
            'company_website' => $request->company_website,
            'skill_id' => implode(
                ', ',
                $request->skill_id
            ),
            'description' => $request->description,
        ]);

        // $job->skillid()->attach($request->skill_id);

        // Job::create([
        //     'title' => request('title'),
        //     'company_name' => request('company_name'),
        //     'company_phone' => request('company_phone'),
        //     'company_email' => request('company_email'),
        //     'company_address' => request('company_address'),
        //     'company_website' => request('company_website'),
        //     'skill_id' => request('skill_id'),
        //     'description' => request('description'),
        // ]);

        return redirect('/professional/home');
    }

    public function jobEdit(Job $id)
    {

        // $zoneCityIds = [];
        // $job = Job::find($id);
        // $skills = Skill::all();
        // foreach ($job->skill as $skillId) {
        //     $zoneCityIds[] = $skillId->id;
        // }

        // return view('professional.job.edit', compact('job', 'skills', 'zoneCityIds'));



        $skills = Skill::all();
        $data = [
            'job' => $id,
            'skills' => $skills,
        ];
        return view('professional.job.edit')->with($data);
        // return view('professional.job.edit', ['job' => $id]);
    }

    public function jobUpdate(Job $id)
    {
        request()->validate([
            'title' => 'required',
            'company_name' => 'required',
            'company_phone' => 'required',
            'company_email' => 'required',
            'company_address' => 'required',
            'company_website' => 'required',
            'skill_id' => 'required',
            'description' => 'required',
        ]);

        $id->update([
            'title' => request('title'),
            'company_name' => request('company_name'),
            'company_phone' => request('company_phone'),
            'company_email' => request('company_email'),
            'company_address' => request('company_address'),
            'company_website' => request('company_website'),
            'skill_id' => request('skill_id'),
            'description' => request('description'),
        ]);

        return redirect('/professional/home');
    }
}

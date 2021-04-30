<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Skill;
use App\Models\College;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $users = User::with('college')->get();
        // $skills = Skill::with('skill')->get();
        return view('home', compact('users'));
    }

    public function stdprofileedit(User $id)
    {
        $colleges = College::all();
        $skills = Skill::all();
        $data = [
            'colleges' => $colleges,
            'skills' => $skills,
            'user' => $id,
        ];

        return view('std.profile.edit')->with($data);
        // return view('std.profile.edit', ['user' => $id]);
    }

    public function stdprofileupdate(User $id)
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        // dd($id->all());

        $id->update([
            'name' => request('name'),
            'email' => request('email'),

            'skill_id' => request('skill_id', []),
            'college_id' => implode(request('college_id')),
            'password' => Hash::make(request('password')),
        ]);

        return redirect('/home');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\College;
// use App\Models\Skill;
use Illuminate\Http\Request;

class CollegeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colleges = College::latest()->paginate(7);
        return view('admin.colleges.index', compact('colleges'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.colleges.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required',
        ]);

        College::create([
            'name' => request('name'),
            'phone' => request('phone'),
            'email' => request('email'),
            'address' => request('address'),
        ]);

        return redirect('/admin/colleges');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(College $college)
    {
        return view('admin.colleges.edit', ['college' => $college]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(College $college)
    {
        request()->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required',
        ]);

        $college->update([
            'name' => request('name'),
            'phone' => request('phone'),
            'email' => request('email'),
            'address' => request('address'),
        ]);

        return redirect('admin/colleges');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(College $college)
    {
        $college->delete();

        return redirect('admin/colleges');
    }
}

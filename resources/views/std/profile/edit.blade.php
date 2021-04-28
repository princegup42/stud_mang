@extends('layouts.app')
@section('content')
<div class="col-md-3"></div>
<div class="col-md-6 py-4">
    <div class="card card-danger">
        <div class="card-header">
            <h3 class="card-title">Profile Edit</h3>
        </div>
        <form method="POST" action="{{ route('stdprofile.update',Auth::user()->id) }}">
            @method('PUT')
            @csrf
            <div class="card-body">
                <!-- Date dd/mm/yyyy -->
                <div class="form-group">
                    <label>Name</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user    "></i></span>
                        </div>
                        <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}">
                    </div>
                    <!-- /.input group -->
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-at    "></i></span>
                        </div>
                        <input type="text" class="form-control" id="email" name="email"
                            value="{{ Auth::user()->email }}">
                    </div>
                    <!-- /.input group -->
                </div>
                <div class="form-group">
                    <label for="college_id">College</label>
                    <select class="form-control" id="college_id" name="college_id">
                        @foreach ($colleges as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="skill_id">Skills List</label>
                    <select class="form-control" id="skill_id[]" multiple="" name="skill_id[]">
                        @foreach ($skills as $skill)
                        <option value="{{ $skill->id }}">{{ $skill->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-lock    "></i></span>
                        </div>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <!-- /.input group -->
                </div>
                {{-- <div class="form-group">
                            <label>Confirm Password</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-lock    "></i></span>
                                </div>
                                <input type="text" class="form-control" id="password" name="password">
                            </div>
                            <!-- /.input group -->
                        </div> --}}
            </div>
            <div class="card-footer text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <!-- /.card-body -->
    </div>
</div>
<div class="col-md-3"></div>
@endsection

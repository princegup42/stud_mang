@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title">Profile</h3>
                </div>
                <form method="POST" action="{{ route('profile.update',Auth::guard('admin')->user()->id) }}">
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
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ Auth::guard('admin')->user()->name }}">
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
                                    value="{{ Auth::guard('admin')->user()->email }}">
                            </div>
                            <!-- /.input group -->
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-lock    "></i></span>
                                </div>
                                <input type="text" class="form-control" id="password" name="password">
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
    </div>
</div>
@endsection

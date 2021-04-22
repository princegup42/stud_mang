@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit College</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" action="{{ route('college.update',$college->id) }}">
                @method('PUT')
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">College Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $college->name }}"
                            placeholder="College Name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ $college->phone }}"
                            placeholder="Phone">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $college->email }}"
                            placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Address</label>
                        <input type="text" class="form-control" id="address" name="address"
                            value="{{ $college->address }}" placeholder="Address">
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-4"></div>
</div>

@endsection

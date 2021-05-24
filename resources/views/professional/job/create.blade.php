@extends('layouts.professional')
@section('content')
<div class="container">
    <div class="row p-2">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Create Job</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" action="/professional/postjob">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Job Name</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Job Name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Company</label>
                            <div class="row">
                                <div class="col-8">
                                    <input type="text" class="form-control" name="company_name" placeholder="Name">
                                </div>
                                <div class="col-4">
                                    <input type="text" class="form-control" name="company_phone" placeholder="Phone No">
                                </div>
                            </div>
                            <label for="exampleInputEmail1"></label>
                            <div class="row">
                                <div class="col-7">
                                    <input type="email" name="company_email" class="form-control" placeholder="Email">
                                </div>
                                <div class="col-5">
                                    <input type="text" class="form-control" name="company_website"
                                        placeholder="Website (Optional)">
                                </div>
                            </div>
                            <label for="exampleInputEmail1"></label>
                            <div class="row">
                                <div class="col-12">
                                    <input type="text" class="form-control" name="company_address"
                                        placeholder="Address">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Skills</label>
                            <select class="form-control multiple" name="skill_id[]" multiple="multiple">
                                @foreach ($skills as $skill)
                                <option value="{{ $skill->id }}">{{ $skill->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" rows="3" name="description"
                                placeholder="Job Description"></textarea>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Post</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>
@endsection

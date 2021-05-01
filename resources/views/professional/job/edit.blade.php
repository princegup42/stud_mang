@extends('layouts.professional')
@section('content')
<div class="container">
    <div class="row p-2">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit Job</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" action="{{ route('job.update',Auth::guard('professional')->user()->id) }}">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Job Name</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Job Name"
                                value="{{ $job->title}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Company</label>
                            <div class="row">
                                <div class="col-8">
                                    <input type="text" class="form-control" name="company_name" placeholder="Name"
                                        value="{{ $job->company_name }}">
                                </div>
                                <div class="col-4">
                                    <input type="text" class="form-control" name="company_phone" placeholder="Phone No"
                                        value="{{ $job->company_phone }}">
                                </div>
                            </div>
                            <label for="exampleInputEmail1"></label>
                            <div class="row">
                                <div class="col-7">
                                    <input type="email" name="company_email" class="form-control" placeholder="Email"
                                        value="{{ $job->company_email }}">
                                </div>
                                <div class="col-5">
                                    <input type="text" class="form-control" name="company_website"
                                        placeholder="Website (Optional)" value="{{ $job->company_website }}">
                                </div>
                            </div>
                            <label for="exampleInputEmail1"></label>
                            <div class="row">
                                <div class="col-12">
                                    <input type="text" class="form-control" name="company_address" placeholder="Address"
                                        value="{{ $job->company_address }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Skills</label>
                            <select class="select2 select2-hidden-accessible" name="skill_id" multiple=""
                                data-placeholder="Select Skills" style="width: 100%;" data-select2-id="7" tabindex="-1"
                                aria-hidden="true">
                                @foreach ($skills as $skill)
                                <option value="{{ $skill->id }}">{{ $skill->name }}</option>
                                @endforeach
                            </select><span class="select2 select2-container select2-container--default" dir="ltr"
                                data-select2-id="8" style="width: 100%;"><span class="selection"><span
                                        class="select2-selection select2-selection--multiple" role="combobox"
                                        aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-disabled="false">
                                        <ul class="select2-selection__rendered">
                                            <li class="select2-search select2-search--inline"><input
                                                    class="select2-search__field" type="search" tabindex="0"
                                                    autocomplete="off" autocorrect="off" autocapitalize="none"
                                                    spellcheck="false" role="searchbox" aria-autocomplete="list"
                                                    placeholder="Select a State" style="width: 577.6px;"></li>
                                        </ul>
                                    </span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" rows="3" name="description"
                                placeholder="Job Description">{{ $job->description }}</textarea>
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

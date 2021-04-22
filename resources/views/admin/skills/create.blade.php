@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8 push-lg-4 personal-info">
            <form method="POST" action="/admin/skills/create">
                @csrf
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Add Skill</label>
                    <div class="col-lg-9">
                        <input id="name" name="name" class="form-control" type="text" value="" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label"></label>
                    <div class="col-lg-9">
                        <input type="submit" class="btn btn-primary" value="Create" />
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

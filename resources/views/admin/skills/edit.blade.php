@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8 push-lg-4 personal-info">
            <form method="POST" action="{{ route('skill.update',$skill->id) }}">
                @method('PUT')
                @csrf
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label">Edit Skill</label>
                    <div class="col-lg-9">
                        <input id="name" name="name" class="form-control" type="text" value="{{ $skill->name }}" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label form-control-label"></label>
                    <div class="col-lg-9">
                        <input type="submit" class="btn btn-primary" value="Save Changes" />
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

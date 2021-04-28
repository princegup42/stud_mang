@extends('layouts.professional')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="{{ asset('img/undraw_profile.svg') }}"
                            alt="User profile picture" width="250" height="250">
                    </div>

                    <h3 class="profile-username text-center">{{ Auth::guard('professional')->user()->name }}</h3>

                    <p class="text-muted text-center">Software Engineer</p>

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Email</b> <a class="float-right">{{ Auth::guard('professional')->user()->email }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Following</b> <a class="float-right">543</a>
                        </li>
                        <li class="list-group-item">
                            <b>Friends</b> <a class="float-right">13,287</a>
                        </li>
                    </ul>

                    <a href="/professional/profile/{{ Auth::guard('professional')->user()->id }}/edit"
                        class="btn btn-primary btn-block"><b>Edit</b></a>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>
@endsection

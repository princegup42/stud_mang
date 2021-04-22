@extends('layouts.admin')
@section('content')

{{-- <!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Skills <b>Details</b></h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</div> --}}

<!-- Content Row -->
<div class="row">
    <div class="col-md-8">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-8">
                            <h2>Skills <b>Lists</b></h2>
                        </div>
                        <div class="col-sm-4">
                            <a href="/admin/skills/create" type="button" class="btn btn-info add-new"><i
                                    class="fa fa-plus"></i> Add
                                New</a>
                        </div>
                    </div>
                </div>
                <table class="table table-bordered">
                    <thead>

                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($skills as $skill)
                        <tr>
                            <td>{{ $skill->id }}</td>
                            <td>{{ $skill->name }}</td>
                            <td>
                                {{-- <a class="add" title="Add" data-toggle="tooltip"><i
                                        class="material-icons">&#xE03B;</i></a> --}}
                                <a href="/admin/skills/{{ $skill->id }}/edit" class="edit" title="Edit"><i
                                        class="material-icons">&#xE254;</i></a>
                                <form action="{{route('skill.destroy', $skill->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete" title="Delete"><i
                                            class="material-icons">&#xE872;</i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="text-center">
                    {{ $skills->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">

    </div>
</div>

@endsection

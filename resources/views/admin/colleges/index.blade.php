@extends('layouts.admin')
@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Colleges List</h1>
    <a href="/admin/colleges/create" class="d-none d-sm-inline-block btn btn-primary shadow-sm"><i
            class="fas fa-plus fa-sm text-white-50"></i> Add College</a>
</div>

<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">College Name</th>
            <th scope="col">Phone No</th>
            <th scope="col">Email</th>
            <th scope="col">Address</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($colleges as $college)
        <tr>
            <th scope="row">{{ $college->id }}</th>
            <td>{{ $college->name }}</td>
            <td>{{ $college->phone }}</td>
            <td>{{ $college->email }}</td>
            <td>{{ $college->address }}</td>
            <td>
                <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                    <div class="btn-group btn-group-sm mr-2" role="group" aria-label="Basic example">
                        <a href="/admin/colleges/{{ $college->id }}/edit" type="button"
                            class="btn btn-warning btn-sm btn-circle"><i class="fas fa-edit"></i></a>
                    </div>
                    <div class="btn-group btn-group-sm mr-2" role="group" aria-label="Group 2">
                        <form action="{{route('college.destroy', $college->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger btn-sm btn-circle"><i
                                    class="fas fa-trash"></i></button>
                        </form>
                    </div>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="card-footer clearfix">
    <ul class="pagination m-0 float-right">
        {{ $colleges->links('pagination::bootstrap-4') }}
    </ul>
</div>
@endsection

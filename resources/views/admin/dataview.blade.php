@extends('layouts.app')

@section('content')
<div class="container-fluid bg-white admin-dashboard">
    <div class="d-flex justify-content-center align-items-center m-2 p-2">
        <a href="/industries" class="btn btn-primary text-light mr-2">Industries</a>
        <a href="/hobbies" class="btn btn-primary text-light mr-2">Hobbies</a>
        <a href="/interests" class="btn btn-primary text-light mr-2">Interests</a>
        <a href="/needs" class="btn btn-primary text-light mr-2">Needs</a>
        <a href="/passions" class="btn btn-primary text-light mr-2">Passions</a>
    </div>
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    <div class="card mt-3 mb-3">
        <div class="card-header bg-primary text-light">
            <h4>Add New Entry</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="">
                @csrf
                <div class="form-group">
                    <input class="form-control" type="text" name="name" placeholder="Name Here..." required>
                </div>
                <button type="submit" class="btn btn-success">Add</button>
            </form>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $d)
                    <tr>
                        <td scope="row">{{ $d->id }}</td>
                        <td>{{ $d->name }}</td>
                        <td>
                            <a href="{{ url('/delete') }}/{{$type}}/{{ $d->id }}"
                                class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

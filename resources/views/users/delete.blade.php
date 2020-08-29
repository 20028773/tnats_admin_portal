@extends('layouts.app')


@section('title')
    User: Delete
    <h3>Are you sure you want to delete this?</h3>
@endsection

@section('content')
    <div class="container">
        <h3>This page will delete the user</h3>
        <table class="table table-dark table-bordered">
            <tbody>
            <tr>
                <th class="text-center" scope="col">ID</th>
                <th class="text-center" scope="col">{{$user->id}}</th>
            </tr>
            <tr>
                <th class="text-center" scope="col">Name</th>
                <th class="text-center" scope="col">{{$user->name}}</th>
            </tr>
            <tr>
                <th class="text-center" scope="col">Email</th>
                <th class="text-center" scope="col">{{$user->email}}</th>
            </tr>
            <tr>
                <th class="text-center" scope="col">Password</th>
                <th class="text-center" scope="col">{{$user->password}}</th>
            </tr>
            <tr>
                <th class="text-center" scope="col">Date created</th>
                <th class="text-center" scope="col">{{$user->created_at}}</th>
            </tr>
            <tr>
                <th class="text-center" scope="col">Date updated</th>
                <th class="text-center" scope="col">{{$user->updated_at}}</th>
            </tr>
            </tbody>
        </table>

        <h5 class="mb-3">Do you want to delete this user?</h5>

        <form action="/users/{{$user->id}}" method="POST">
            @method('DELETE')
            @csrf

            <button type="submit" class="btn btn-danger mr-4">Yes</button>
            <a href="/users" class="btn btn-info mr-4">Cancel</a>
        </form>
    </div>
@endsection

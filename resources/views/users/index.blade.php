@extends('layouts.app')

@section('title')
    Users: Show list of Users
@endsection

@section('content')
    <div class="container">
        <a class="btn btn-success" href="users/create">Create</a>
        <p>This page will show list of Users</p>
        <table id="myTable" class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
                <th scope="col">Created At</th>
                <th scope="col">Updated At</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td><a href="/roomStatuses/{{$user->id}}/edit">{{$user->name}}</a></td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->password}}</td>
                    <td>{{$user->created_at}}</td>
                    <td>{{$user->updated_at}}</td>
                    <td>
                        <a href="/users/{{$user->id}}/edit" class="btn btn-warning">Update</a>
                        <a href="{{route('users.delete', $user)}}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$users->links()}}
    </div>

@endsection

@section('scripts')

    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>

@endsection

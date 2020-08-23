@extends('layouts.app')

@section('title')
    Observations: Index
@endsection

@section('content')
    <div class="container">
        <div>
            <a href='{{url("/observations/create")}}' class="btn btn-success">Add New Observation</a>
        </div>
        <br>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Date</th>
                <th scope="col">Location</th>
                <th scope="col">Species</th>
                <th scope="col">Notes</th>
                <th scope="col">Observer</th>
                <th scope="col">Approval</th>
                <th scope="col">Photo</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach($observations as $o)
                    <tr>
                        <td>{{$o->id}}</td>
                        <td>{{$o->created_at}}</td>
                        <td>{{$o->location}}</td>
                        <td>{{$o->species}}</td>
                        <td>{{$o->notes}}</td>
                        <td>{{$o->user_id}}</td>
                        <td>{{$o->approved}}</td>
                        <td><img src="/observations/{{$o->id}}/fetch_image" style="width: 200px; height: 200px; "></td>

                        <td>
{{--                            <a href='{{url("/observations/{$o->id}")}}' class="btn btn-success">Show</a>--}}
                            <a href='{{url("/observations/{$o->id}/edit")}}' class="btn btn-primary">Edit</a>
                            <a href='{{url("/observations/{$o->id}/destroy")}}' class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div> @endsection

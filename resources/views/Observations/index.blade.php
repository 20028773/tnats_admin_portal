@extends('layouts.app')

@section('title')
    Rates: Index
@endsection

@section('content')
    <div class="container">
        <div>
            <a href='{{url("/rates/create")}}' class="btn btn-success">Add New Rate</a>
        </div>
        <br>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Rate</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach($rates as $rate)
                    <tr>
                        <td>{{$rate->id}}</td>
                        <td>{{$rate->rate}}</td>
                        <td>{{$rate->description}}</td>
                        <td>
                            <a href='{{url("/rates/{$rate->id}")}}' class="btn btn-success">Show</a>
                            <a href='{{url("/rates/{$rate->id}/edit")}}' class="btn btn-primary">Edit</a>
                            <a href='{{url("/rates/{$rate->id}/destroy")}}' class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div> @endsection

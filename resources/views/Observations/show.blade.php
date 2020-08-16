@extends('layouts.app')

@section('title')
    Rates: Show
@endsection

@section('content')
    <div class="container">
        <h2>Rates: Show Rate</h2>
        <table class="table">
            <tbody>
            <tr>
                <th scope="col" class="text-primary">ID</th>
                <td>{{$rate->id}}</td>
            </tr>
            <tr>
                <th scope="col" class="text-primary">Name</th>
                <td>{{$rate->rate}}</td>
            </tr>
            <tr>
                <th scope="col" class="text-primary">Description</th>
                <td>{{$rate->description}}</td>
            </tr>
            <tr>
                <th scope="col" class="text-primary">Created</th>
                <td>{{$rate->created_at}}</td>
            </tr>
            <tr>
                <th scope="col" class="text-primary">Updated</th>
                <td>{{$rate->updated_at}}</td>
            </tr>
            </tbody>
        </table>
        <div>
        </div>
    </div>
@endsection

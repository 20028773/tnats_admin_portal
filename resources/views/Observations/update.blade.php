@extends('layouts.app')

@section('title')
    Rates: Edit
@endsection

@section('content')
    <div class="container">
        <h2>Rates: Edit</h2>
        <form action="/rates" method="post">
            @csrf
            <input type="hidden" value="{{$rate->id}}" name="id" id="id">
            <div class="form-group">
                <label for="rateRate">Rate</label>
                <input type="text" id="rateRate" name="rateRate" class="form-control" value="{{$rate->rate}}">
            </div>
            <div class="form-group">
                <label for="rateDescription">Description</label>
                <input type="text" id="rateDescription" name="rateDescription" class="form-control" value="{{$rate->description}}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection

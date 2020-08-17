@extends('layouts.app')

@section('title')
    Rates: Add
@endsection

@section('content')
    <div class="container">
       <h2>Rates: Add</h2>
       <form action="/rates" method="post">
           @csrf
           <div class="form-group">
               <label for="rateRate">Rate</label>
               <input type="text" id="rateRate" name="rateRate" class="form-control">
           </div>
           <div class="form-group">
               <label for="rateDescription">Description</label>
               <input type="text" id="rateDescription" name="rateDescription" class="form-control">
           </div>
           <button type="submit" class="btn btn-primary">Submit</button>
       </form>
    </div>
@endsection

@extends('layouts.app')

@section('title')
    Observation: Add
@endsection

@section('content')
    <div class="container">
       <h2>Observations: Add</h2>
       <form action="/observations" method="post" enctype="multipart/form-data">
           @csrf
           <div class="form-group">
               <input type="file" class="form-control-file" name="oPhoto" id="oPhoto" aria-describedby="fileHelp">
               <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 1MB.</small>
           </div>
           <div class="form-group">
               <label for="oSpecies">Species</label>
               <input type="text" id="oSpecies" name="oSpecies" class="form-control">
           </div>
           <div class="form-group">
               <label for="oNotes">Notes</label>
               <input type="text" id="oNotes" name="oNotes" class="form-control">
           </div>
           <button type="submit" class="btn btn-primary">Submit</button>
       </form>
    </div>
@endsection

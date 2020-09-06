@extends('layouts.app')

@section('title')
    Observation: Edit
@endsection

@section('content')
    <div class="container">
        <h2>Observation: Edit</h2>
        <form action="/observations" method="post">
            @csrf
            <input type="hidden" value="{{$o->id}}" name="id" id="id">
            <div class="form-group text-center">
                <img src="/observations/{{$o->id}}/fetch_image"  >
            </div>
            <div class="form-group">
                <label for="oSpecies">Species</label>
                <input type="text" id="oSpecies" name="oSpecies" class="form-control"  value="{{$o->species}}">
            </div>
            <div class="form-group">
                <label for="oNotes">Notes</label>
                <input type="text" id="oNotes" name="oNotes" class="form-control" value="{{$o->notes}}">
            </div>

            <div class="form-group">
                <label for="bNumberOfGuests">Approve/Reject</label>
                <select class="form-control" id="oApproved" name="oApproved">
                    <?php
                        for($i = 1;$i<=count($list);$i++)
                        {
                            echo "<option value='" . $i ."' " . (($o->approved == $i) ? "selected" : "") . ">" . $list[$i] . "</option>";
                        }
                    ?>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection

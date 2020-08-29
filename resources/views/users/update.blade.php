@extends('layouts.app')

@section('title')
    User: Update
@endsection

@section('content')
    <div class="container">
        <p>This page will update the user</p>
        <form method="POST" action="/users/{{$user->id}}">
            @csrf
            @method("PUT")
            <div class="form-group row">
                <label for="id" class="col-sm-2 col-form-label">Id</label>
                <div class="col-sm-10">
                    <input
                        type="number"
                        readonly class="form-control-plaintext"
                        id="id"
                        name="id"
                        value="{{$user->id}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="subject" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input
                        required="required"
                        type="text"
                        class="form-control"
                        id="name"
                        name="name"
                        maxlength="25"
                        value="{{$user->name}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input
                          class="form-control"
                          required="required"
                          type="Email"
                          id="email"
                          name="email"
                          rows="3"
                          maxlength="25"
                          value="{{$user->email}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input
                        class="form-control"
                        required="required"
                        type="password"
                        id="password"
                        name="password"
                        rows="3"
                        maxlength="25"
                        value="{{$user->password}}">

                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary" name="btnEdit">Edit</button>
                </div>
            </div>
        </form>
    </div>
@endsection

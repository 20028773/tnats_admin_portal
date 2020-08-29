@extends('layouts.app')

@section('title')
    User: Show individual user
@endsection

@section('content')
    <div class="container">
        <p>This page will show individual user</p>
        <hr>
        <form>
            <div class="form-group row">
                <label for="id" class="col-sm-2 col-form-label">Id</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" value="{{$user->id}}" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" maxlength="25" value="{{$user->name}}" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input class="form-control" type="email" maxlength="25" value="{{$user->email}}" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input class="form-control" type="password" maxlength="25" value="{{$user->password}}" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="created_at" class="col-sm-2 col-form-label">Created At</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" value="{{$user->created_at}}" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="updated_at" class="col-sm-2 col-form-label">Updated At</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" value="{{$user->updated_at}}" readonly>
                </div>
            </div>
            <a href="/users" class="btn btn-primary"> Back </a>
{{--            <a href="/users/delete" class="btn btn-primary"> Delete </a>--}}

        </form>
    </div>
@endsection

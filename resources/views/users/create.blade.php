@extends('layouts.app')

@section('title')
    Users: Create
@endsection

@section('content')
    <div class="container">
        <p>This page will create Users</p>
        <form method="POST" action="/users">
            @csrf
            <div class="form-group row">
                <label for="subject" class="col-sm-2 col-form-label">Name</label>
                <div class="col-md-6">
                    <input
                        required="required"
                        type="text"
                        class="form-control"
                        id="name"
                        name="name"
                        maxlength="16"
                        value="">
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-md-6">
                    <input
                        required="required"
                        type="text"
                        class="form-control"
                        id="email"
                        name="email"
                        maxlength="25"
                        value="">
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-sm-2 col-form-label">Password</label>
                <div class="col-md-6">
                    <input
                        required="required"
                        type="password"
                        class="form-control"
                        id="password"
                        name="password"
                        maxlength="25"
                        value="">
                </div>
            </div>
            <div class="form-group row mb-0">
                <div class="col-md-8">
                    <button type="submit" class="btn btn-primary">OK</button>
                    <a href="/users" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </form>
    </div>
@endsection

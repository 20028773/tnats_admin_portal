@extends('layouts.app')

@section('title')
    Users: Show list of Users
@endsection

@section('content')
    <div class="container">
                <a class="btn btn-success mb-2" href="users/create">Create</a>
                <input type="text" class="form-control mb-2" id="myInput" placeholder="Search">
{{--                <form action="/search" method="POST" role="search">--}}
{{--                    {{ csrf_field() }}--}}
{{--                    <div class="input-group">--}}
{{--                        <input type="text" class="form-control" name="query"--}}
{{--                               placeholder="Search users"><span class="input-group-btn mb-2">--}}
{{--					<button type="submit" class="btn btn-info ">--}}
{{--                        Search--}}
{{--					</button>--}}
{{--				</span>--}}
{{--                    </div>--}}
{{--                </form>--}}
            <table id="myTable" class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Updated At</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <th scope="row">{{$user->id}}</th>
                        <td><a href="/users/{{$user->id}}/edit">{{$user->name}}</a></td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->password}}</td>
                        <td>{{$user->created_at}}</td>
                        <td>{{$user->updated_at}}</td>
                        <td>
                            <a href="/users/{{$user->id}}/edit" class="btn btn-warning">Update</a>
                            <a href="{{route('users.delete', $user)}}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{$users->links()}}
    </div>


@endsection

@section('scripts')

{{--    <script>--}}
{{--        $(document).ready(function(){--}}
{{--            $("#myInput").on("keyup", function() {--}}
{{--                var value = $(this).val().toLowerCase();--}}
{{--                $("#myTable tr").DataTable().filter(function() {--}}
{{--                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)--}}
{{--                });--}}
{{--            });--}}
{{--        });--}}
{{--        $(document).ready( function () {--}}
{{--            $('#myTable').DataTable();--}}
{{--        });--}}

{{--    </script>--}}
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
    <script type="text/javascript">
        var path = "{{ route('users.search') }}";
        $('input.typeahead').typeahead({
            source:  function (query, process) {
                return $.get(path, { query: query }, function (data) {
                    return process(data);
                });
            },
            highlighter: function (item, data) {
                var parts = item.split('#'),
                    html = '<div class="row">';
                html += '<div class="col-md-10 pl-0">';
                html += '<span>'+data.name+'</span>';
                html += '<p class="m-0">'+data.desc+'</p>';
                html += '</div>';
                html += '</div>';

                return html;
            }
        });
    </script>

@endsection

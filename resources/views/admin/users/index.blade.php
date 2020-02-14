@extends('layout.admin')
@section('title','Users')
@section('action')
    {{route("admin.users.search")}}
@endsection
@section('content')
    <table class="table table-striped table-inverse table-responsive">
        <thead class="thead-inverse">
        <tr>
            <th>#</th>
            <th>Email</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $key => $user)
            <tr>
                <td scope="row">{{++$key}}</td>
                <td>{{ $user->email }}</td>

            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $users->links() }}
@endsection

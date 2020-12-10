@extends('layouts.admin.admin')
@section('content')
    @if (Session::has('message'))
        <p class="bg-success"> {{session('message')}} </p>
    @endif
    <table class="table table-bordered table-hover">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Photo</th>
            <th scope="col">Username</th>
            <th scope="col">Role</th>
            <th scope="col">Email</th>
            <th scope="col">Updated at</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
        <tr>
            <th scope="row">{{$user->id}}</th>
            <th scope="row">
                <img class="img-responsive" height="50" width=auto src="{{$user->photo ? '/images/' . $user->photo->name : 'https://via.placeholder.com/50'}}" alt="Image">
            </th>
            <td><a href="/admin/user/{{$user->id}}/edit">{{$user->name}}</a></td>
            <td>{{$user->role->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->updated_at->diffForHumans()}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>

@endsection

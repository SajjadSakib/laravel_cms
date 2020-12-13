@extends('layouts.admin.admin')

@section('content')
    <h1>Posts</h1>
    <div class="col-sm">
    <table class="table table-bordered table-hover ">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Photo</th>
            <th scope="col">Author</th>
            <th scope="col">Title</th>
            <th scope="col">Category</th>
            <th scope="col">Content</th>
            <th scope="col">Updated at</th>
        </tr>
        </thead>
        <tbody>
        @if($posts)
        @foreach($posts as $post)
            <tr>
                <th scope="row">{{$post->id}}</th>
{{--                <th scope="row">--}}
{{--                    <img class="img-responsive" height="50" width=auto src="{{$user->photo ? '/images/' . $user->photo->name : 'https://via.placeholder.com/50'}}" alt="Image">--}}
{{--                </th>--}}
{{--                <td><a href="/admin/user/{{$user->id}}/edit">{{$user->name}}</a></td>--}}
                <td>{{$post->photo_id}}</td>
                <td>{{$post->user->name}}</td>
                <td>{{$post->title}}</td>
                <td>{{$post->category_id}}</td>
                <td>{{$post->content}}</td>
                <td>{{$post->updated_at->diffForHumans()}}</td>
            </tr>
        @endforeach
        @endif

        </tbody>
    </table>
    </div>
@endsection


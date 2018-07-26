@extends('layouts.admin')

@section('content')

    <h1>Posts</h1>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>PHOTO</th>
            <th>USER</th>
            <th>CATEGORY</th>
            <th>TITLE</th>
            <th>BODY</th>
            <th>CREATED AT</th>
            <th>UPDATED AT</th>
        </tr>
        </thead>
        <tbody>
        @if($posts)

            @foreach($posts as $post)

                <tr>
                    <td>{{$post->id}}</td>
                    <td><img height="100" width="100" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/400x400'}}" alt=""></td>
                    <td>{{$post->user->name}}</td>
                    <td>{{$post->category ? $post->category->name : 'Uncategorized'}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->body}}</td>
                    <td>{{$post->created_at->diffForHumans()}}</td>
                    <td>{{$post->updated_at->diffForHumans()}}</td>
                </tr>

            @endforeach


        @endif

        </tbody>
    </table>

@stop
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
            <th>VIEW POST</th>
            <th>VIEW COMMENTS</th>
            <th>CREATED AT</th>
        </tr>
        </thead>
        <tbody>
        @if($posts)

            @foreach($posts as $post)

                <tr>
                    <td>{{$post->id}}</td>
                    <td><img height="100" width="100"
                             src="{{$post->photo ? $post->photo->file : 'http://placehold.it/400x400'}}" alt=""></td>
                    <td><a href="{{route('admin.posts.edit', $post->id )}}">{{$post->user->name}}</a></td>
                    <td>{{$post->category ? $post->category->name : 'Uncategorized'}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{str_limit($post->body)}}</td>
                    <td><a href="{{route('home.post',$post->id)}}">View Post</a></td>
                    <td><a href="{{route('admin.comments.show',$post->id)}}">View Comment</a></td>
                    <td>{{$post->created_at->diffForHumans()}}</td>
                </tr>

            @endforeach


        @endif

        </tbody>
    </table>

    <div class="row">
        <div class="col-sm-6 col-sm-offset-5">
            {{$posts->render()}} <!-- Pagination için bu kodu yazıyoruz. -->
        </div>
    </div>

@stop
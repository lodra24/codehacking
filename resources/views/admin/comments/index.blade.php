@extends('layouts.admin')

@section('content')



    @if(count($comments) > 0)

        <h1>Comments</h1>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Id</th>
                <th>Author</th>
                <th>Email</th>
                <th>Body</th>
                <th>Post</th>
                <th>Active</th>
                <th>Danger</th>
            </tr>
            </thead>
            <tbody>
            @foreach($comments as $comment)

                <tr>
                    <td>{{$comment->id}}</td>
                    <td>{{$comment->author}}</td>
                    <td>{{$comment->email}}</td>
                    <td>{{$comment->body}}</td>
                    <td><a href="{{route('home.post' , $comment->post->id)}}"> {{$comment->post->title}}</a></td>
                    <td><a href="{{route('admin.comments.replies.show' , $comment->id)}}">View Replies</a></td>
                    <td>
                        <!--Eğer yorum aktifse, onu tekrar deaktif yapabiliriz. Eğer deaktifse aktif yapabiliriz. -->
                        @if($comment->is_active == 1)

                            {!! Form::open(['method'=>'PATCH', 'action'=> ['PostCommentController@update',$comment->id]]) !!}

                            <input type="hidden" name="is_active" value="0"/> <!-- Submit butonuna basıldığında is_active bölümü 0 yapıyoruz -->

                            <div class="form-group">
                                {!! Form::submit('Unapprove', ['class'=> 'btn btn-danger']) !!}
                            </div>
                            {!! Form::close() !!}

                        @else

                            {!! Form::open(['method'=>'PATCH', 'action'=> ['PostCommentController@update',$comment->id]]) !!}

                            <input type="hidden" name="is_active" value="1"/>

                            <div class="form-group">
                                {!! Form::submit('Approve', ['class'=> 'btn btn-success']) !!}
                            </div>
                            {!! Form::close() !!}


                        @endif

                    </td>
                    <td>
                        {!! Form::open(['method'=>'DELETE', 'action'=> ['PostCommentController@destroy',$comment->id]]) !!}

                        <input type="hidden" name="is_active" value="1"/>

                        <div class="form-group">
                            {!! Form::submit('Delete', ['class'=> 'btn btn-danger']) !!}
                        </div>
                        {!! Form::close() !!}

                    </td>
                </tr>

            @endforeach
            </tbody>
        </table>

    @else

        <h1 class="text-center">No comments</h1>

    @endif

@stop
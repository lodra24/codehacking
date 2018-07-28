@extends('layouts.admin')

@section('content')

    <h1>Media</h1>
    @if(Session::has('deleted_photo'))

    <p>{{Session::get('deleted_photo')}}</p>
    @endif
    @if($photos)
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>PHOTO</th>
                <th>CREATED DATE</th>
                <th>DELETE PHOTO</th>
            </tr>
            </thead>
            <tbody>
            @foreach($photos as $photo)
                <tr>
                    <td>{{$photo->id}}</td>
                    <td><img height="100" src="{{$photo->file}}" alt=""></td>
                    <td>{{$photo->created_at ? $photo->created_at : "no date"}}</td>
                    <td>    {!! Form::open(['method'=>'DELETE', 'action'=> ['AdminMediaController@destroy',$photo->id]]) !!}


                        <div class="form-group">
                            {!! Form::submit('Delete Media', ['class'=> 'btn btn-primary']) !!}
                        </div>
                        {!! Form::close() !!}</td>
                </tr>
            </tbody>
            @endforeach
        </table>



    @endif

@stop
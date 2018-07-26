@extends('layouts.admin')

@section('content')

    <h1>Edit Users</h1>
    <div class="row">
        <div class="col-sm-3">

            <img src="{{$user->photo ? $user->photo->file : 'https://www.livetracklist.com/wp-content/uploads/2016/05/charlotte-de-witte-live-pic.jpg'}}"
                 alt="" class="img-responsive">
        </div>

        <div class="col-sm-9">
            {!! Form::model($user,['method'=>'PATCH', 'action'=> ['AdminUsersController@update', $user->id],'files'=>true]) !!}

            <div class="form-group">
                {!! Form::label('name', 'Name: ') !!}
                {!! Form::text('name', null, ['class'=> 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('email', 'Email:') !!}
                {!! Form::email('email', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('is_active', 'Status:') !!}
                {!! Form::select('is_active', array(1=>'Active', 0=>'Deactive'), null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('photo_id', 'Title:') !!}
                {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('Role_id', 'Role:') !!}
                {!! Form::select('role_id',[''=>"Choose Options"] + $roles,null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('password', 'Password:') !!}
                {!! Form::password('password', ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Create User', ['class'=> 'btn btn-primary col-sm-2']) !!}
            </div>
            {!! Form::close() !!}



            {!! Form::open(['method'=>'DELETE', 'action'=> ['AdminUsersController@destroy', $user->id]]) !!}


                    <div class="form-group">
                        {!! Form::submit('Delete User', ['class'=> 'btn btn-danger col-sm-2']) !!}
                    </div>
                    {!! Form::close() !!}

        </div>
    </div>

    <div class="row">
        <div class="col-sm-9 pull-right">
            @include('includes.form_errors')
        </div>
    </div>





@stop
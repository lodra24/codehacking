@extends('layouts.admin')

@section('content')

    @if(Session::has('deleted_user'))

        <p>{{session('deleted_user')}}</p>

    @endif

    <h1>Users</h1>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>PHOTO</th>
            <th>NAME</th>
            <th>EMAIL</th>
            <th>ROLE</th>
            <th>ACTIVE</th>
            <th>CREATED</th>
            <th>UPDATED</th>
        </tr>
        </thead>
        <tbody>

        @if($users)

            @foreach($users as $user)

                <tr>
                    <td>{{$user->id}}</td>
                    <td><img height="50" src="{{$user->photo ? $user->photo->file : 'https://www.livetracklist.com/wp-content/uploads/2016/05/charlotte-de-witte-live-pic.jpg'}}"/></td>
                    <td><a href="{{route('admin.users.edit', $user->id)}}">{{$user->name}}</a></td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role->name}}</td>
                    <td>
                        @if($user->is_active == 1)
                            YES

                        @else
                            NO

                        @endif


                    </td>
                    <td>{{$user->created_at->diffForHumans()}}</td>
                    <td>{{$user->updated_at->diffForHumans()}}</td>
                </tr>

            @endforeach

        @endif

        </tbody>
    </table>
@stop


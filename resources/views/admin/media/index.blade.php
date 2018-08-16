@extends('layouts.admin')

@section('content')

    <h1>Media</h1>
    @if(Session::has('deleted_photo'))

        <p>{{Session::get('deleted_photo')}}</p>
    @endif
    @if($photos)
        <form action="delete/media" method="post" class="form-inline">
            {{csrf_field()}}
            {{method_field('delete')}}
            <div class="form-group">
                <select name="checkBoxArray" id="" class="form-control">
                    <option value="">Delete</option>
                </select>
            </div>

            <div class="form-group">
                <input type="submit" name="delete_all" value="DELETE" class="btn-primary">
            </div>

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th><input type="checkbox" id="options"></th>
                    <th>ID</th>
                    <th>PHOTO</th>
                    <th>CREATED DATE</th>
                    <th>DELETE PHOTO</th>
                </tr>
                </thead>
                <tbody>
                @foreach($photos as $photo)
                    <tr>
                        <td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value="{{$photo->id}}">
                        </td>
                        <td>{{$photo->id}}</td>
                        <td><img height="100" src="{{$photo->file}}" alt=""></td>
                        <td>{{$photo->created_at ? $photo->created_at : "no date"}}</td>
                        <td>
                            <input type="hidden" name="photo" value="{{$photo->id }}">
                            <input type="submit" name="delete_single" value="DELETE" class="btn btn-danger">
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </form>



    @endif


@stop


@section('scripts')

    <script>
        $(document).ready(function () {

            $('#options').click(function () {

                if (this.checked) {

                    $('.checkBoxes').each(function () {

                        this.checked = true;
                    });
                } else {

                    $('.checkBoxes').each(function () {

                        this.checked = false;
                    });


                }

            });
        })
    </script>
@stop
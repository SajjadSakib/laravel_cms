@extends('layouts.admin.admin')
@section('container')
    <div class="row">
        <div class="col-sm-3">
            <img class="img-responsive" height="200" width=auto src="{{$user->photo ? '/images/' . $user->photo->name : 'https://via.placeholder.com/200'}}" alt="Image">
        </div>
        <div class="col-sm-9">
@endsection
    @section('content')
        {!! Form::model($user,['action' => ['AdminUserController@update',$user->id],'method'=>'PATCH','files'=>'true']) !!}

        <div class="form-group">
            {!! Form::label('name', 'User Name',['class' => 'control-label']); !!}
            {!! Form::text($name='name', $value = null, $attributes = ['class' => 'form-control','placeholder'=>'Enter Your Username']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('email', 'E-Mail Address',['class' => 'control-label']); !!}
            {!! Form::email($name='email', $value = null, $attributes = ['class' => 'form-control','placeholder'=>'Enter Your Email']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('role', 'Role',['class' => 'control-label']); !!}
            {!! Form::select('role', $role_array, $user->role->id, $attributes = ['class' => 'form-control','placeholder'=>'Select A Role']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('photo', 'Update Photo',['class' => 'control-label']); !!}
            {!! Form::file('photo',  ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('password', 'Password',['class' => 'control-label']); !!}
            {!! Form::input('password',$name='password', null, ['class' => 'form-control','placeholder'=>'Enter Password','type'=>'password']) !!}

        </div>
        <div class="form-group">
            {!! Form::label('password_confirmation', 'Confirm Password',['class' => 'control-label']); !!}
            {!! Form::input('password',$name='password_confirmation', $value = null, ['class' => 'form-control','placeholder'=>'Confirm Password','type'=>'password']) !!}
        </div>
        {!! Form::hidden('old_password', $user->password) !!}
        <div class="form-group">

                {!! Form::submit('Submit',['class'=>'btn btn-primary'])!!}

        </div>

        {!! Form::close() !!}

{{--        {!! Form::open(['action'=>['AdminUserController@destroy',$user->id],'method'=>'DELETE','class'=>'']) !!}--}}
            <div class="">
                <a class="btn btn-danger" href="#" data-toggle="modal" data-target="#deleteUserModal">
                    Delete
                </a>
{{--                {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}--}}
            </div>
{{--        {!! Form::close() !!}--}}

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            </div>
        </div>
    <!-- Delete Modal-->
    <div class="modal fade" id="deleteUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                {!! Form::open(['action'=>['AdminUserController@destroy',$user->id],'method'=>'DELETE','class'=>'']) !!}
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Click delete to remove the user</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <input type="submit" name="submit" value="Delete" class="btn btn-danger">

                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    @endsection



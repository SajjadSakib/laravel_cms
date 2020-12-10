@extends('layouts.admin.admin')

@section('content')
    {!! Form::open(['action' => 'AdminUserController@store','method'=>'post']) !!}
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
    {!! Form::select('role', $role_array, $value = null, $attributes = ['class' => 'form-control','placeholder'=>'Select A Role']) !!}
    </div>
    <div class="form-group">
    {!! Form::label('password', 'Password',['class' => 'control-label']); !!}
    {!! Form::input('password',$name='password', $value = null, ['class' => 'form-control','placeholder'=>'Enter Password','type'=>'password']) !!}
    </div>
    <div class="form-group">
    {!! Form::label('password_confirmation', 'Confirm Password',['class' => 'control-label']); !!}
    {!! Form::input('password',$name='password_confirmation', $value = null, ['class' => 'form-control','placeholder'=>'Confirm Password','type'=>'password']) !!}
    </div>
    <div class="form-group">
    {!! Form::submit('Submit',['class'=>'btn btn-primary'])!!}
    </div>

    {!! Form::close() !!}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection

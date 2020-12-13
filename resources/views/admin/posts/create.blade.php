@extends('layouts.admin.admin')

@section('content')
    {!! Form::open(['action' => 'AdminPostController@store','method'=>'post','files'=>'true']) !!}
    <div class="form-group">
        {!! Form::label('title', 'Title',['class' => 'control-label']); !!}
        {!! Form::text($name='title', $value = null, $attributes = ['class' => 'form-control','placeholder'=>'Enter Post Title']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('category', 'Category',['class' => 'control-label']); !!}
        {!! Form::select($name='category',$category_array, $value = null, $attributes = ['class' => 'form-control','placeholder'=>'Select category']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('photo', 'Add Photo',['class' => 'control-label']); !!}
        {!! Form::file('photo',  ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('content', 'Content',['class' => 'control-label']); !!}
        {!! Form::textarea($name='content', $value = null, ['class' => 'form-control','rows'=>'4']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('submit',['class'=>'btn btn-primary'])!!}
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

@extends('layouts.app')

@section('content')
<div class="container">
{!! Form::open(['url' => 'blogs/add','method' => 'post']) !!}

<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Blog Title</label>
  {!! Form::text('title', null, ['class' => $errors->has('title') ? 'form-control is-invalid' : 'form-control']) !!}
    @error('title')
      <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>

<div class="mb-3">
    <label for="exampleFormControlInput2" class="form-label">Blog Content</label>
    {!! Form::textarea('content' , null, ['class' => $errors->has('content')? 'form-control is-invalid' : 'form-control']) !!}
    @error('content')
      <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    {!! Form::submit('Add Your Blog',['class' => 'btn btn-success'])  !!}
</div>

{!! Form::close() !!}
</div>
@endsection
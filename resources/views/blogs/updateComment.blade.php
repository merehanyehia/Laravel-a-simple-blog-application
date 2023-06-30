@extends('layouts.app')

@section('content')

<div class="container">
  @if(session('success'))
<div class="alert alert-success w-50">

   {{session('success')}}
   <script>
        setTimeout(function() {
            $('div.alert').remove();
        }, 1000);
    </script>
    </div>
    @endif

    {!!Form::model($comment,['route' => ['comments.update', $comment->id],'method' => 'put','class'=>'mt-5']) !!}
      <div class="mb-3">
      <strong> {!! Form::label('content', 'Comment', ['class' => 'form-label'])!!}</strong>
      {!!Form::textarea('content', null, ['class' => $errors->has('content') ? 'form-control is-invalid' : 'form-control']) !!}
     @error('content')
       <div class="invalid-feedback">{{ $message }}</div>
     @enderror
    </div>
  <div class=" mt-5 pb-3 text-center">
  {!!Form::submit('Update',['class' => 'btn btn-success px-5'])!!}
  </div>
  {!!Form::close() !!}
  </div>

  @endsection

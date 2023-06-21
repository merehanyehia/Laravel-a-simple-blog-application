@extends('layouts.app')

@section('content')

<div>
  @if(session('success'))
<div class="alert alert-success w-50">

   {{session('success')}}
    </div>
    @endif
    {!!Form::model($comment,['route' => ['comment.update', $comment->id],'method' => 'put','class'=>'ms-5 mt-5']) !!}
      <div class="mb-3 ms-5">
  <strong> {!! Form::label('content', 'comment', ['class' => 'form-label'])!!}</strong>


    {!!Form::text('content',null, ['class' => ['form-control', 'w-50',($errors->has('content') ? 'is-invalid' : '')],'id' => 'content'])!!}

    @if($errors->has('content'))
    <div class="alert alert-danger w-50">
      <ul>
        @foreach($errors->get('content') as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  </div>
  <div class=" mt-5 pb-3 text-center">
  {!!Form::submit('Update',['class' => 'btn btn-success ps-5 pe-5'])!!}
  </div>
  {!!Form::close() !!}
  </div>

  @endsection

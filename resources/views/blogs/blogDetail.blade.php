@extends('layouts.app')

@section('content')
<div class="container">

<div class="card mb-5">
  <div class="card-header">
    {{$blogs->users->name}}
  </div>
  <div class="card-body">
    <h5 class="card-title">{{$blogs->title}}</h5>
    <p class="card-text">{{$blogs->content}}</p>
    @can('delete',$blogs)
    {!! Form::open(['route' => ['deleteBlog',$blogs],'method' => 'delete']) !!}
        {!! Form::submit('Delete',['class'=>'btn btn-danger']);!!}
    {!! Form::close() !!}
    @endcan


    <div>
  @if(session('success'))
<div class="alert alert-success w-50">

   {{session('success')}}
    </div>
    @endif
    {!! Form::open(['route' => ['comment.store', $blogs->id], 'method' => 'post', 'class' => 'ms-5 mt-5']) !!}

  <div class="mb-3 ms-5">
  <strong> {!! Form::label('content', 'comment', ['class' => 'form-label'])!!}</strong>
    <input type="text" class="form-control w-50 @error('content') is-invalid @enderror" id="content" name="content">

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
  <div class=" mt-5 pb-3  text-center">
  {!!Form::submit('Add Comment',['class' => 'btn btn-dark ps-5 pe-5'])!!}

  </div>


  {!!Form::close() !!}
  <div class=" mt-5 pb-3  text-center">


<a href="{{ route('comments',$blogs->id) }}" class="btn btn-primary ps-5 pe-5">View Comments</a>
</div>
  </div>
  
</div>


</div>
@endsection


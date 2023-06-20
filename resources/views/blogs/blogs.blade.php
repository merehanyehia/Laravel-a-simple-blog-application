@extends('layouts.app')

@section('content')
<div class="container">
<div class="card">
  <div class="card-header">
    Menna Raafat
  </div>
  <div class="card-body">
    <h5 class="card-title">Post title</h5>
    <p class="card-text">Post Content</p>
    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
  </div>
  <div>
  <!-- @if(session('success'))
<div class="alert alert-success w-50">

   {{session('success')}}
    </div>
    @endif -->
{!!Form::open(['route' => 'comment.store', $blog->id,'method' => 'post', 'class'=>'ms-5 mt-5']) !!}

  <div class="mb-3 ms-5">
  <strong> {!! Form::label('content', 'comment', ['class' => 'form-label'])!!}</strong>
  <!-- <strong> <label for="IDno" class="form-label">IDno</label></strong>  -->
    <input type="text" class="form-control w-50 @error('content') is-invalid @enderror" id="content" name="content">
<!-- 
    @if($errors->has('IDno'))
    <div class="alert alert-danger w-50">
      <ul>
        @foreach($errors->get('IDno') as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif -->
  </div>
  <div class=" mt-5 pb-3 text-center">
  {!!Form::submit('Add Comment',['class' => 'btn btn-dark ps-5 pe-5'])!!}
  </div>
  {!!Form::close() !!}
  </div>
</div>
</div>
@endsection
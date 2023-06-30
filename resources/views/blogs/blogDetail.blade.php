@extends('layouts.app')

@section('content')
<div class="container">

@if (session('success'))
    <div class="alert alert-success alert-dismissible" role="alert">
        {{ session('success') }}
    </div>
    <script>
        setTimeout(function() {
            $('div.alert').remove();
        }, 1000);
    </script>
@endif

<div class="card mb-5">
  <div class="card-header d-flex">
    <div>{{$blogs->users->name}}</div>

  </div>
  <div class="card-body">
    <h5 class="card-title">{{$blogs->title}}</h5>
    <p class="card-text">{{$blogs->content}}</p>
    <div class="d-flex">

    @can('update',$blogs)
    <a class="btn btn-success m-1" href="{{ route('blogs.edit', $blogs) }}">
      <i class="fas fa-edit"></i>
    </a>
    @endcan

    @can('delete',$blogs)
     {!! Form::open(['route' => ['blogs.delete', $blogs], 'method' => 'delete']) !!}
      <button type="submit" class="btn btn-danger m-1">
        <i class="fa fa-trash"></i>
      </button>
     {!! Form::close() !!}
    @endcan
    <a href="{{ route('blogs.comments',$blogs->id) }}" class="btn btn-primary m-1">View Comments</a>
    </div>

</div>

</div>

<div class="card mb-5">
  <div class="card-body">

  {!! Form::open(['route' => ['comments.store', $blogs->id], 'method' => 'post', 'class' => 'ms-5 mt-5']) !!}

<div class="mb-3">
     <label for="exampleFormControlInput1" class="form-label">Comment</label>
     {!! Form::textarea('content', null, ['class' => $errors->has('content') ? 'form-control is-invalid' : 'form-control']) !!}
     @error('content')
      <div class="invalid-feedback">{{ $message }}</div>
     @enderror
</div>

<div class=" mt-5 pb-3  text-center">
{!! Form::submit('Add Comment',['class' => 'btn btn-success ps-5 pe-5']) !!}

</div>
{!!Form::close() !!}
</div>

</div>
</div>
@endsection


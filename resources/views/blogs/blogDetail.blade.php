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
    </div>

    <!-- <div> -->
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
   
  
  
</div>

<div>
{!! Form::open(['route' => ['comments.store', $blogs->id], 'method' => 'post', 'class' => 'ms-5 mt-5']) !!}

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
<!-- </div> -->
<div class=" mt-5 pb-3  text-center">
{!! Form::submit('Add Comment',['class' => 'btn btn-dark ps-5 pe-5']) !!}

</div>


{!!Form::close() !!}
<div class=" mt-5 pb-3  text-center">


<a href="{{ route('blogs.comments',$blogs->id) }}" class="btn btn-primary ps-5 pe-5">View Comments</a>
</div>
<!-- <div> -->
</div>

</div>


</div>
@endsection


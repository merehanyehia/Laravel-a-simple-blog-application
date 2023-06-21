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
    <div>

    </div>

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

    <!-- {!! Form::open(['route' => ['blogs.delete',$blogs],'method' => 'delete']) !!}
        {!! Form::submit('Delete',['class'=>'btn btn-danger m-3 px-5 ']);!!}
    {!! Form::close() !!} -->

    </div>
  </div>
</div>


</div>
@endsection


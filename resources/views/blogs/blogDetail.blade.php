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
    <div class="d-flex">
    @can('delete',$blogs)
    <a class="btn btn-success m-3 px-5" href="{{ route('blogs.edit', $blogs) }}">Update</a>
    @endcan

    @can('delete',$blogs)
    {!! Form::open(['route' => ['blogs.delete',$blogs],'method' => 'delete']) !!}
        {!! Form::submit('Delete',['class'=>'btn btn-danger m-3 px-5 ']);!!}
    {!! Form::close() !!}
    @endcan
    </div>
  </div>
</div>


</div>
@endsection


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
  </div>
</div>


</div>
@endsection


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

<h2>Comments</h2>
@foreach ($comments as $comment)
    <div class="card mb-5">
    <div class="card-header d-flex">
    <div>{{$comment->user->name}}</div>
  </div>
    <div class="card-body">
    <h5 class="card-title">{{$comment->content }}</h5>
    <div class="d-flex">
      @can('update',$comment)
        <a class="btn btn-success m-1" href="{{ route('comments.edit',$comment->id) }}">
        <i class="fas fa-edit"></i>
        </a>
      @endcan

      @can('delete',$comment)

      {!! Form::open(['route' => ['comments.delete', $comment->id], 'method' => 'delete']) !!}
      <button type="submit" class="btn btn-danger m-1">
        <i class="fa fa-trash"></i>
      </button>
     {!! Form::close() !!}
      @endcan
      </div>
    </div>
    </div>
        @endforeach
    </div>
    @endsection

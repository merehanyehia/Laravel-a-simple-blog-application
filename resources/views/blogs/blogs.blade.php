@extends('layouts.app')

@section('content')
<div class="container">
@foreach($blogs as $blog)
<div class="card mb-5">
  <div class="card-header">
    {{$blog->users->name}}
  </div>
  <div class="card-body">
    <h5 class="card-title">{{$blog->title}}</h5>
    <p class="card-text">{{$blog->content}}</p>
    <a  href="{{ route('blogDetail', $blog) }}" class="btn btn-primary">Details</a>

  </div>
  
</div>
@endforeach
</div>
@endsection
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

@foreach($blogs as $blog)
<div class="card mb-5">
  <div class="card-header">
   {{$blog->users->name}}
  </div>
  <div class="card-body">
    <h5 class="card-title">{{$blog->title}}</h5>
    <p class="card-text">{{$blog->content}}</p>
    <a  href="{{ route('blogs.details', $blog) }}" class="btn btn-primary px-5">Blog Details</a>

  </div>
  
</div>
@endforeach
</div>
@endsection
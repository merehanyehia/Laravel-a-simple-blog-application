
@extends('layouts.app')

@section('content')
<div class="container">
<h2>Comments</h2>
    <ul>
        @foreach ($comments as $comment)
            <li>{{ $comment->content }}</li>
            <a href="{{ route('comment.edit',$comment->id) }}" class="btn btn-primary">Update Comment</a>
            <form action="{{route('comment.delete',$comment->id)}}" method="post">
  @method('delete')
  @csrf
      <input type="submit" value="Delete Comment" class="btn btn-danger">
      </form>
        @endforeach

    </ul>
    </div>
    @endsection

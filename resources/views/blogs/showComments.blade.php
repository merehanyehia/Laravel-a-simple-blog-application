
@extends('layouts.app')

@section('content')
<div class="container">
<h2>Comments</h2>
    <ul>
        @foreach ($comments as $comment)
            <li>{{ $comment->content }}</li>
            @can('update_comment',$comment)

            <a href="{{ route('comments.edit',$comment->id) }}" class="btn btn-primary">Update Comment</a>
            @endcan
            @can('delete_comment',$comment)

            <form action="{{route('comments.delete',$comment->id)}}" method="post">
  @method('delete')
  @csrf
      <input type="submit" value="Delete Comment" class="btn btn-danger">
      </form>
      @endcan

        @endforeach
    </ul>
    </div>
    @endsection

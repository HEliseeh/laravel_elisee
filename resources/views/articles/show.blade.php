@extends('layouts.master')
@section('content')
@foreach($article->comments as $comment)
    <p> <strong>{{ $comment->user->name }}</strong> a réagi: </p>
    <p> {{ $comment->comment}}  </p>
    <p> <small> {{ $comment->created_at->diffForHumans() }} </small>  </p>
    @endforeach
    <a href="/article/{{ $article->id }}/edit">Éditer l'article</a>


@endsection 
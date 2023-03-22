@extends('layouts.master')

@section('title')
    Articles
@endsection

@section('content')

    <h2>Articles</h2>
    @if($articles)
        @foreach($articles as $article)
            @include('partials.index')
        @endforeach
    @else
        @include('partials.no-articles')
    @endif

@endsection

@extends('layouts.app')

@section('content')
    @include('partials.meta_static')
    @foreach ($blogs as $blog)
        <h2><a href="{{ route('blogs.show', [$blog->id]) }}">{{ $blog->title }}</a></h2>
        {!! $blog->body !!}   
    @endforeach
@endsection



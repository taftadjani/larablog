@extends('layouts.app')

@section('content')
<div class="container">
    @foreach ($categories as $category)
        <h2><a href="{{ route('categories.show', $category->slug) }}">{{ $category->slug }}</a></h2>
        <p> {{ $category->name }} </p>
    @endforeach
</div>
@endsection
{{--  {{ route('categories.show', [$category->id]) }}  --}}

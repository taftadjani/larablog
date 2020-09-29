@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="jumbotron">
            <h1>{{ $category->name }}</h1>
            <div class="btn-group">
                <a href="{{ route('categories.edit', $category->id ) }}" class="btn btn-primary btn-sm btn-margin-right">Edit</a>

                <form action="{{ route('categories.destroy', $category->id) }}" method="post">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger btn-sm pull-left " type="submit">Delete</button>
                </form>
            </div>
        </div>
        <div class="col-md-12">
            @foreach ($category->blog as $blog)
                <h3><a href="{{ route('blogs.show', $blog->id) }}">{{ $blog->title }}</a></h3>
            @endforeach
        </div>
    </div>
@endsection

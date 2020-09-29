@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="jumbotron text-center">
            <h1>Update a new blog</h1>
        </div>
        <div class="col-md-12">
            <form action="{{ route('blogs.update', $blog->id) }}" method="post">
                @csrf
                @method('patch')
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" value="{{ $blog->title }}">
                </div>
                <div class="form-group">
                    <label for="body">Body</label>
                    <textarea id="body" class="form-control" name="body">{{ $blog->body }}</textarea>
                </div>
                <div class="form-group form-check form-check-inline">
                    {{ $blog->category->count()? "Current categories : " : '' }} &nbsp;
                    @foreach ($blog->category as $category)
                        <input type="checkbox" value="{{ $category->id }}" name="category_id[]" class="form-check-input" id="{{ $category->id }}" checked>
                        <label class="form-check-label btn-margin-right" for="{{ $category->id }}">{{ $category->name }}</label>
                    @endforeach
                </div>
                <div class="form-group form-check form-check-inline">
                    {{ count($filtered)? "Unused categories : " : '' }} &nbsp;
                    @foreach ($filtered as $f_cate)
                        <input type="checkbox" value="{{ $f_cate->id }}" name="category_id[]" class="form-check-input" id="{{ $f_cate->id }}">
                        <label class="form-check-label btn-margin-right" for="{{ $f_cate->id }}">{{ $f_cate->name }}</label>
                    @endforeach
                </div>
                <div>
                    <button class="btn btn-primary" type="submit">Update blog</button>
                </div>
            </form>
        </div>
    </div>
@endsection

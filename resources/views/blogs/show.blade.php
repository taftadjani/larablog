@extends('layouts.app')

@section('content')

    @include('partials.meta_static')

    <div class="container-fluid">
        <article>
            <div class="jumbotron text-center">
                <div class="col-md-12">
                    @if ($blog->featured_image )
                        <img src="{{ asset('images/featured_image/'.$blog->featured_image) }}" alt="{{ str_limit($blog->title, 50) }}" class="img-responsive featured_image"><br>
                    @endif
                </div>

                <div class="col-md-12">
                    <h1>{{ $blog->title }}</h1>
                </div>

                <div class="col-md-12">
                    <div class="btn-group">
                        <a href="{{ route('blogs.edit', $blog->id ) }}" class="btn btn-primary btn-sm pull-left btn-margin-right">Edit</a>
                        <form method="post" action="{{ route('blogs.delete', $blog->id) }}">
                            @csrf
                            {{ method_field('delete') }}
                            <button class="btn btn-danger btn-sm pull-left">Delete</button>
                        </form>
                    </div>
                </div>

            </div>

            <div class="col-md-12">
                {!! $blog->body !!}
                <hr>
                <strong>Categories : </strong>
                @foreach ($blog->category as $category)
                    <span><a href="{{ route('categories.show', $category->slug) }}">{{ $category->name }}</a></span>
                @endforeach
            </div>

        </article>
    </div>
@endsection

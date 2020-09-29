@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="jumbotron text-center">
        <h1>Trashed Blogs</h1>
    </div>
</div>

<div class="col-md-12">
    @foreach ($trashedBlogs as $blog)
        <h2>{{ $blog->title }}</h2>
        <p> {{ $blog->body }} </p>

        <div class="btn-group">
            {{--  Restore form  --}}
            <form action="{{ route('blogs.restore', $blog->id) }}">
                @csrf
                <button class="btn btn-success btn-xs pull-left btn-margin-right" type="submit" >Restore</button>
            </form>
            {{--  Permanent delete form  --}}
            <form action="{{ route('blogs.permanentDelete', $blog->id) }}" method="post">
                @csrf
                @method('delete')
                <button class="btn btn-danger btn-xs pull-left btn-margin-right" type="submit" >Permanent delete</button>
            </form>
        </div>
    @endforeach
</div>
@endsection

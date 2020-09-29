@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="jumbotron text-center">
            <h1>Edit category</h1>
        </div>
        <div class="col-md-12">
            <form action="{{ route('categories.update', $category->id) }}" method="post">
                @csrf
                @method('patch')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $category->name }}">
                </div>
                <button class="btn btn-primary" type="submit">Edit category</button>
            </form>
        </div>
    </div>
@endsection


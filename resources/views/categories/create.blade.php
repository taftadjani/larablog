@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="jumbotron text-center">
            <h1>Create a category</h1>
        </div>
        <div class="col-md-12">
            <form action="{{ route('categories.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <button class="btn btn-primary" type="submit">Create a category</button>
            </form>
        </div>
    </div>
@endsection


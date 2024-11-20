@extends('layouts.app')

@section('content')
    <h1>Add Equipment Category</h1>
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="category_name">Category Name</label>
            <input type="text" name="category_name" id="category_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="category_code">Category Code (2 digits)</label>
            <input type="text" name="category_code" id="category_code" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Create</button>
    </form>
@endsection

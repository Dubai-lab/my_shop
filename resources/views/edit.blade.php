@extends('layouts.main_layout')
@section('content')

    <div class="container">
        <h1 class="content">Update Books</h1>

        <form action="{{route('edit', $newbooks->id)}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-row">
                <label for="title">Book title:</label>
                <input type="text" name="title" class="form-control" placeholder="Enter book title"
                    value="{{ old('title', $newbooks->title) }}">
            </div>

            <div class="form-row">
                <label for="author">Author</label>
                <input type="text" name="author" class="form-control" placeholder="Enter book author" step="0.01"
                    value="{{ old('author', $newbooks->author) }}">
            </div>
            <div class="form-row">
                <label for="price"> Price ($):</label>
                <input type="number" name="price" class="form-control" placeholder="Enter price" step="0.01"
                    value="{{ old('price', $newbooks->price) }}">
            </div>

            <div class="form-row">
                <label for="image">Book Image:</label>
                <input type="file" name="image" class="form-control">
            </div>

            <br>
            <button type="submit" class="button">Update Book</button>
        </form>
    </div> 
@endsection



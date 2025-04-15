@extends('layouts.main_layout')
@section('content')

    <div class="container">
        <h1 class="content">Create New Book</h1>

        <form action="{{route('register_book')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-row">
                <label for="title">Book title:</label>
                <input type="text" name="title" class="form-control" placeholder="Enter book title"
                    value="{{ old('title') }}">
            </div>

            <div class="form-row">
                <label for="author">Author</label>
                <input type="text" name="author" class="form-control" placeholder="Enter book author" step="0.01"
                    value="{{ old('author') }}">
            </div>
            <div class="form-row">
                <label for="price"> Price ($):</label>
                <input type="number" name="price" class="form-control" placeholder="Enter price" step="0.01"
                    value="{{ old('price') }}">
            </div>

            <div class="form-row">
                <label for="image">Book Image:</label>
                <input type="file" name="image" class="form-control">
            </div>

            <br>
            <button type="submit" class="button">Create Book</button>
        </form>
    </div> 
@endsection



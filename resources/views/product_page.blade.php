@extends('layouts.main_layout')
@section('content')

    <div class="container">
        <h1 class="content">Create New Product</h1>

        <form action="{{route('register_product')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-row">
                <label for="name">Product Name:</label>
                <input type="text" name="name" class="form-control" placeholder="Enter product name"
                    value="{{ old('name') }}">
            </div>

            <div class="form-row">
                <label for="price">Price ($):</label>
                <input type="number" name="price" class="form-control" placeholder="Enter price" step="0.01"
                    value="{{ old('price') }}">
            </div>
            <div class="form-row">
                <label for="stock_quantity">stock quantity :</label>
                <input type="number" name="stock_quantity" class="form-control" placeholder="Enter price" step="0.01"
                    value="{{ old('stock_quantity') }}">
            </div>

            <div class="form-row">
                <label for="image">Product Image:</label>
                <input type="file" name="image_path" class="form-control">
            </div>

            <br>
            <button type="submit" class="button">Create Product</button>
        </form>
    </div>
@endsection



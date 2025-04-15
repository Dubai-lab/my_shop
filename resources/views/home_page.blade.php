@extends('layouts.main_layout')
@section('content')
<h1>Home Page</h1>

<div class="product-grid">
    @foreach ($products as $product)
    <div class="product-card">
        <img src="{{asset('product_images/'.$product->image_path)}}" alt="{{$product->name}}">
        <h1>{{$product->name}}</h1>
        <p>Price: ${{$product->price}}</p>
        <p>Stock Quantity: {{$product->stock_quantity}}</p>

        <p><a href="{{route('delete_product', $product->id)}}">Delete</a></p>

        <form method="post" action="{{route('sell_product', $product->id)}}">
            @csrf
            <input type="text" name="sold_quantity" placeholder="sold quantity">
            <button type="submit">Sell</button>
        </form>
    </div>
    @endforeach

@endsection

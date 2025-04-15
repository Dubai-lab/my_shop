@extends('layouts.main_layout')
@section('content')
<h1>All Books</h1>

<div class="product-grid">
    @foreach ($newbook as $newbooks)
    <div class="product-card">
        <img src="{{asset('product_images/'.$newbooks->image)}}" alt="{{$newbooks->title}}">
        <h1>{{$newbooks->title}}</h1>
        <p>Author: {{$newbooks->author}}</p>
        <p>Price: ${{$newbooks->price}}</p>
        <button type="submit">Sell</button>

        <form action="">
            <ul>
                <li><a href="{{route('delete_book', $newbooks->id)}}">Remove</a></li>
                <li><a href="{{route('edit', $newbooks->id)}}">Edit</a></li>
            </ul>
        </form>
        
    </div>
    @endforeach
</div>

@endsection
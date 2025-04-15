<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce</title>
    <link rel="stylesheet" href="{{asset('Css/main_layout.css')}}">
</head>
<body>
    <nav class="navbar">
        
        <div class="container">
            <a class="brand" href="{{route('home_page')}}">E-commerce</a>

            <ul class="menu">
                <li><a href="{{route('home_page')}}">Home</a></li>
                <li><a href="{{route('product_page')}}">Products</a></li>
                <li><a href="{{route('all_books')}}">All Books</a></li>
                <li><a href="{{route('new_book')}}">New Books</a></li>
                <li><a href="{{route('logout')}}">Logout</a></li>
            </ul>
        </div>
        @auth
        <span class="round-name">
        <b class="success">{{auth()->user()->name}}</b>
        </span>
    @endauth
    </nav>

    <div class="container">
   
    @if($errors->any())
     <div class="alart alart-danger">
        <ul>
            @foreach($errors->all() as $error)
             <li>{{$error}}</li>
            @endforeach
        </ul>
     </div>
    @endif

    @if(session('success'))
     <p class="success">{{session('success')}}</p>
    @endif

        @yield('content')
    </div>
    
</body>
</html>
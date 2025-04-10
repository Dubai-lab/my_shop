<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{asset('Css/style.css')}}">
</head>
<body>
<div class="container"> 
@if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session('success'))

        {{session('success')}}
        @endif
            <h1>Login Form</h1>

            <form method="POST" action="{{route('signin')}}">
                @csrf   
                <input type="email" name="email" placeholder="example@gmail.com" required> 
                <input type="password" name="password" placeholder="Password" required> 
                <button type="submit">Login</button>
            </form>
            <p>
                Don't have an account? <a href="{{route('registeration')}}">Register</a>
             </p>
        </div>
    
</body>
</html>
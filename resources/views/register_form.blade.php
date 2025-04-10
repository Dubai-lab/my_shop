<!-- resources/views/register_form.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="{{ asset('Css/style.css') }}">
</head>
<body>
    <div class="container">
        <h1>Registration Form</h1>

        <!-- Display validation errors if any -->
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

        <form method="POST" action="{{ route('register_user') }}">
            @csrf
            <input type="text" name="user_name" placeholder="Username" required value="{{ old('user_name') }}">
            <input type="email" name="email" placeholder="Email" required value="{{ old('email') }}"> 
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
            <button type="submit">Register</button>
        </form>

        <p>
            Already have an account? <a href="{{ route('login') }}">Login</a>
        </p>
    </div>
</body>
</html>

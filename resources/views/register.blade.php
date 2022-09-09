@extends('layout')

@section('title', 'Register page')

@section('content')
    <h2>Register</h2>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li style="color:red">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form method="post">
        @csrf
        <input type="text" name="first_name" placeholder="First name"><br>
        <input type="text" name="last_name" placeholder="Last name"><br>
        <input type="text" name="city" placeholder="City"><br>
        <input type="text" name="postal_code" placeholder="Postal code"><br>
        <input type="text" name="email" placeholder="Email"><br>
        <input type="text" name="password" placeholder="Password"><br>
        <input type="text" name="password_confirmation" placeholder="Confirm Password"><br>
        <input type="submit" value="Register">
    </form>
@endsection

@extends('layout')

@section('title', 'Contact Form')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@endsection

@section('content')

    <form method="post">
        @csrf
        <input type="text" name="name" placeholder="Name"><br>
        <input type="text" name="email" placeholder="Email"><br>
        <textarea name="message" cols="30" rows="10"></textarea><br>
        <input type="submit" value="Send">
    </form>
@endsection

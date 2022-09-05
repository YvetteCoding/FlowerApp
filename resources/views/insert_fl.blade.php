@extends ('layout')

@section('title', 'Insert Flower')
@section('content')

    <h2>Insert a new Flower</h2>
    <form method="post">
        @csrf
        <input type="text" name="name" placeholder="Flowers Name"><br>
        <input type="text" name="price" placeholder="Price"><br>
        <input type="submit" value="Submit your Flower"><br>
    </form>
@endsection

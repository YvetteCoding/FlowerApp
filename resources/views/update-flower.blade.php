@extends ('layout')

@section('title', 'Update Flower')
@section('content')

    <h2>Update Flower</h2>
    <form method="post">
        @csrf
        @method('PUT')
        <input type="text" name="name" placeholder="Flowers Name" value="{{ $flower->name }}"><br>
        <input type="text" name="price" placeholder="Price" value="{{ $flower->price }}"><br>
        <input type="submit" value="Update your Flower"><br>
    </form>
@endsection

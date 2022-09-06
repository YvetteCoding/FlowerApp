@extends ('layout')

@section('title', 'Insert Flower')
@section('content')

    <h2>Insert a new Flower</h2>
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
        <input type="text" name="name" placeholder="Flowers Name">
        @error('name')
            {{ $message }}
        @enderror
        <br>
        <input type="text" name="price" placeholder="Price">
        @error('price')
            {{ $message }}
        @enderror
        <br>
        <input type="submit" value="Submit your Flower"><br>
    </form>
@endsection

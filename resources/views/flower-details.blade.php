@extends('layout')

@section('title', 'Flower detail')

@section('content')

    <p><strong>Name : </strong> {{ $f->name }}</p>
    <p><strong>Price : </strong> {{ $f->price }}</p>
    <a href="{{ url('/flowers/update', $f->id) }}">Update</a> /
    <a href="{{ url('/flowers/delete', $f->id) }}">Delete</a>

    <hr>

    @if (count($f->comments) > 0)
        <h3>Comments</h3>
        <ul>
            @foreach ($f->comments as $c)
                <li>{{ $c->comment }}</li>
            @endforeach
        </ul>
    @endif
@endsection

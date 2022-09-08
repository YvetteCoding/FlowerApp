@extends('layout')

@section('title', 'Comments list')

@section('content')

    @foreach ($comments as $c)
        {{ $c->comment }}
        / for flower : {{ $c->flower->name }}
        <hr>
    @endforeach

@endsection

@extends('master')

@section('content')

    <ul>
        @foreach ($animals as $animal)
            <li><a href="{{ action('AnimalsController@show', [$animal->id]) }}">{{ $animal->name }}</a></li>
        @endforeach
    </ul>

@stop
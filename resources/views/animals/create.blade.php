@extends('master')

@section('content')

    <h1>
        Dodavanje zivotinje
    </h1>

    {!! Form::open(['url' => 'animals']) !!}

    @include('animals._form', ['submitButton' => 'Placeholder']);

    {!! Form::close() !!}

    @include('errors.list')

@stop
@extends('master')

@section('content')

    <h1>
        Promjenite informacije o zivotinji.
    </h1>

    {!! Form::model($animal, ['method' => 'PATCH', 'action' => ['AnimalsController@update', $animal->id]]) !!}

    @include('animals._form', ['submitButton' => 'Placeholder 2'])

    {!! Form::close() !!}

    @include('errors.list')

@stop
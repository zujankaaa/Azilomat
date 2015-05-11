{!! Form::hidden('user_id', 1) !!}

<div class="form-group">

    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}

</div>

<div class="form-group">

    {!! Form::label('type', 'Type:') !!}
    {!! Form::text('', null, ['class' => 'form-control']) !!}

</div>


<div class="form-group">

    {!! Form::label('breed', 'Breed:') !!}
    {!! Form::text('', null, ['class' => 'form-control']) !!}

</div>

<div class="form-group">

    {!! Form::label('age', 'Age:') !!}
    {!! Form::text('-1', null, ['class' => 'form-control']) !!}

</div>

<div class="form-group">

    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('-1', null, ['class' => 'form-control']) !!}

</div>

<div class="form-group">

    {!! Form::label('published_at', 'Publish On:') !!}
    {!! Form::input('date', 'arrived_at', date('Y-m-d'), ['class' => 'form-control']) !!}

</div>

<div class="form-group">

    {!! Form::label('another', 'Another:') !!}
    {!! Form::text('yes', null, ['class' => 'form-control']) !!}

</div>

<div class="form-group">

    {!! Form::label('shelter_id', 'Shelter id:') !!}
    {!! Form::text(-1, null, ['class' => 'form-control']) !!}

</div>

<div class="form-group">

    {!! Form::submit($submitButton, null, ['class' => 'btn btn-primary form-control']) !!}

</div>

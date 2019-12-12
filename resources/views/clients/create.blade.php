@extends('main')

@section('content')
    <h1>Create new client</h1>
    <hr>

    {!! Form::open() !!}

    <div class="form-group">
        {!! Form::label('card_number','Card number:') !!}
        {!! Form::text('card_number',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('firstname','First name:') !!}
        {!! Form::text('firstname',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('lastname','Last name:') !!}
        {!! Form::text('lastname',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('patronymic','Patronymic:') !!}
        {!! Form::text('patronymic',null,['class'=>'form-control']) !!}
    </div>


    <div class="form-group">
        {!! Form::submit('Add client',['class'=>'btn btn-primary form-control']) !!}
    </div>


    {!! Form::close() !!}
@stop

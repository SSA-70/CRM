@extends('main')

@section('content')
    <h1>Create new client</h1>
    <hr>

    {!! Form::open(['url' => 'clients']) !!}

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
        {!! Form::label('birthday','Birthday:') !!}
        {!! Form::input('date','birthday',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('mobile_number','Mobile number:') !!}
        {!! Form::text('mobile_number',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('mobile_number_addition','Mobile number:') !!}
        {!! Form::text('mobile_number_addition',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('phone_number','Phone number:') !!}
        {!! Form::text('phone_number',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-check">
        {!! Form::checkbox('is_send_sms',null,null,['class'=>'form-check-input']) !!}
        {!! Form::label('is_send_sms','is_send_sms:') !!}
    </div>
    <div class="form-group">
        {!! Form::label('email','Email:') !!}
        {!! Form::text('email',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('car_mark_id','Car mark:') !!}
        {!! Form::text('car_mark_id',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('car_model_id','Car model:') !!}
        {!! Form::text('car_model_id',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('car_year','Car year:') !!}
        {!! Form::input('date','car_year',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('user_id','User:') !!}
        {!! Form::text('user_id',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('azs_id','Azs:') !!}
        {!! Form::text('azs_id',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('sold_at','Sold at:') !!}
        {!! Form::input('date','sold_at',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('checked_at','Checked at:') !!}
        {!! Form::input('date','checked_at',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Add client',['class'=>'btn btn-primary form-control']) !!}
    </div>


    {!! Form::close() !!}
@stop

@extends('main')

@section('content')
    <div class="my-3 p-3 bg-white rounded shadow-sm">
        {!! Form::open(array('url' => ['clients',$client->id],'method'=>'put')) !!}
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center border-bottom mb-3">
            <h1 class="h2">Создать новую анкету</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group mr-2">
                    <button type="submit" class="btn btn-sm btn-outline-secondary"><i class="fas fa-check"></i> Сохранить</button>
                    <button type="button" class="btn btn-sm btn-outline-secondary" onclick="window.location='{{ route('clients.index') }}';"><i class="fas fa-times"></i>  Отменить</button>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-3">
                {!! Form::label('firstname','Фамилия') !!}
                {!! Form::text('firstname',$client->firstname,['class'=>'form-control']) !!}
            </div>
            <div class="col-md-3">
                {!! Form::label('lastname','Имя') !!}
                {!! Form::text('lastname',$client->lastname,['class'=>'form-control']) !!}
            </div>
            <div class="col-md-3">
                {!! Form::label('patronymic','Отчество') !!}
                {!! Form::text('patronymic',$client->patronymic,['class'=>'form-control']) !!}
            </div>
            <div class="col-md-3">
                {!! Form::label('birthday','День рождения') !!}
                {!! Form::input('date','birthday',$client->birthday,['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-3">
                {!! Form::label('mobile_number','Сотовый') !!}
                {!! Form::text('mobile_number',$client->mobile_number,['class'=>'form-control']) !!}
            </div>
            <div class="col-md-3">
                {!! Form::label('mobile_number_addition','Сотовый (доп)') !!}
                {!! Form::text('mobile_number_addition',$client->mobile_number_addition,['class'=>'form-control']) !!}
            </div>
            <div class="col-md-3">
                {!! Form::label('phone_number','Городской') !!}
                {!! Form::text('phone_number',$client->phone_number,['class'=>'form-control']) !!}
            </div>
            <div class="col-md-3">

                {!! Form::label('is_send_sms','СМС рассылка') !!}
                <select class="custom-select" id="is_send_sms">
                    <option @if($client->is_send_sms){{'selected'}}@endif value="1">Согласен</option>
                    <option @if(!$client->is_send_sms){{'selected'}}@endif value="0">Не согласен</option>
                </select>

            </div>

        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                {!! Form::label('email','Электорнная почта:') !!}
                {!! Form::text('email',$client->email,['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-3">
                {!! Form::label('car_mark_id','Марка автомобиля') !!}
                {!! Form::text('car_mark_id',$client->car_mark_id,['class'=>'form-control']) !!}
            </div>
            <div class="col-md-3">
                {!! Form::label('car_model_id','Модель автомобиля') !!}
                {!! Form::text('car_model_id',$client->car_model_id,['class'=>'form-control']) !!}
            </div>
            <div class="col-md-3">
                {!! Form::label('car_year','Год выпуска') !!}
                {!! Form::input('date','car_year',$client->car_year,['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-3">
                {!! Form::label('card_number','Номер карты') !!}
                {!! Form::text('card_number',$client->card_number,['class'=>'form-control']) !!}
            </div>
            <div class="col-md-3">
                {!! Form::label('user_id','Оператор') !!}
                {!! Form::text('user_id',$client->user_id,['class'=>'form-control']) !!}
            </div>
            <div class="col-md-3">
                {!! Form::label('azs_id','АЗС') !!}
                {!! Form::text('azs_id',$client->azs_id,['class'=>'form-control']) !!}
            </div>
            <div class="col-md-3">
                {!! Form::label('sold_at','Дата продажи') !!}
                {!! Form::input('date','sold_at',$client->sold_at,['class'=>'form-control']) !!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
    </div>


@stop

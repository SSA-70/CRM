@if($errors->any())
    <div class="row mb-3">
        <div class="col-md">
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
<div class="row mb-3">
    <div class="col-md-3">
        {!! Form::label('firstname','Фамилия') !!}
        {!! Form::text('firstname',null,['class'=>'form-control']) !!}
    </div>
    <div class="col-md-3">
        {!! Form::label('lastname','Имя') !!}
        {!! Form::text('lastname',null,['class'=>'form-control']) !!}
    </div>
    <div class="col-md-3">
        {!! Form::label('patronymic','Отчество') !!}
        {!! Form::text('patronymic',null,['class'=>'form-control']) !!}
    </div>
    <div class="col-md-3">
        {!! Form::label('birthday','День рождения') !!}
        {!! Form::input('date','birthday',null,['class'=>'form-control']) !!}
    </div>
</div>
<div class="row mb-3">
    <div class="col-md-3">
        {!! Form::label('mobile_number','Сотовый') !!}
        {!! Form::text('mobile_number',null,['class'=>'form-control']) !!}
    </div>
    <div class="col-md-3">
        {!! Form::label('mobile_number_addition','Сотовый (доп)') !!}
        {!! Form::text('mobile_number_addition',null,['class'=>'form-control']) !!}
    </div>
    <div class="col-md-3">
        {!! Form::label('phone_number','Городской') !!}
        {!! Form::text('phone_number',null,['class'=>'form-control']) !!}
    </div>
    <div class="col-md-3">

        {!! Form::label('is_send_sms','СМС рассылка') !!}
        <select name="is_send_sms" class="custom-select" id="is_send_sms">
            <option @if($client->is_send_sms){{'selected'}}@endif value="1">Согласен</option>
            <option @if(!$client->is_send_sms){{'selected'}}@endif value="0">Не согласен</option>
        </select>

    </div>

</div>
<div class="row mb-3">
    <div class="col-md-6">
        {!! Form::label('address','Адрес') !!}
        {!! Form::text('address',null,['class'=>'form-control']) !!}
    </div>
    <div class="col-md-6">
        {!! Form::label('email','Электорнная почта:') !!}
        {!! Form::text('email',null,['class'=>'form-control']) !!}
    </div>
</div>
<div class="row mb-3">
    <div class="col-md-3">
        {!! Form::label('car_mark_id','Марка автомобиля') !!}
        {!! Form::text('car_mark_id',null,['class'=>'form-control']) !!}
    </div>
    <div class="col-md-3">
        {!! Form::label('car_model_id','Модель автомобиля') !!}
        {!! Form::text('car_model_id',null,['class'=>'form-control']) !!}
    </div>
    <div class="col-md-3">
        {!! Form::label('car_year','Год выпуска') !!}
        {!! Form::number('car_year',null,['class'=>'form-control','min'=>'1900','step'=>'1']) !!}
    </div>
    <div class="col-md-3">
        <template>{!! Form::label('owner_id','Владелец') !!}</template>
        {!! Form::hidden('owner_id',null,['class'=>'form-control']) !!}
    </div>
</div>
<div class="row mb-3">
    <div class="col-md-3">
        {!! Form::label('card_number','Номер карты') !!}
        {!! Form::text('card_number',null,['class'=>'form-control']) !!}
    </div>
    <div class="col-md-3">
        {!! Form::label('sold_at','Дата продажи') !!}
        {!! Form::input('date','sold_at',null,['class'=>'form-control']) !!}
    </div>
    <div class="col-md-3">
        <template>{!! Form::label('user_id','Оператор') !!}</template>
        {!! Form::hidden('user_id',null,['class'=>'form-control']) !!}
    </div>
    <div class="col-md-3">
        <template>{!! Form::label('azs_id','АЗС') !!}</template>
        {!! Form::hidden('azs_id',null,['class'=>'form-control']) !!}
    </div>

</div>
<div class="row">
    <div class="col-md">
        {!! Form::label('comment','Комментарий') !!}
        {!! Form::text('comment',null,['class'=>'form-control']) !!}
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-3">
        {!! Form::label('name','Логин') !!}
        {!! Form::text('name',null,['class'=>'form-control']) !!}
    </div>
    <div class="col-md-3">
        {!! Form::label('pass','Пароль') !!}
        {!! Form::text('pass',null,['class'=>'form-control']) !!}
    </div>
</div>
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
        {!! Form::label('email','Почта') !!}
        {!! Form::text('email',null,['class'=>'form-control']) !!}
    </div>
    <div class="col-md-3">
        {!! Form::label('post_id','Должность (id)') !!}
        {!! Form::text('post_id',null,['class'=>'form-control']) !!}
    </div>
    <div class="col-md-3">
        {!! Form::label('place_id','Подразделение (id)') !!}
        {!! Form::text('place_id',null,['class'=>'form-control']) !!}
    </div>
    <div class="col-md-3">
        {!! Form::label('security_group_id','Группа безопасности (id)') !!}
        {!! Form::text('security_group_id',null,['class'=>'form-control']) !!}
    </div>
</div>


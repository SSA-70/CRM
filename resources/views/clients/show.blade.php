@extends('main')

@section('content')

    <div class="my-3 p-3 bg-white rounded shadow-sm">
        {!! Form::model($client) !!}
        
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center border-bottom mb-3">
            <h1 class="h2">Карта №{{ $client->card_number }}</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group mr-2">
                    <button type="button" class="btn btn-sm btn-outline-secondary" onclick="window.location='{{ route('clients.edit',$client->id) }}';"><i class="fas fa-edit"></i> Редактировать</button>
                    <button type="button" class="btn btn-sm btn-outline-secondary" onclick="window.location='{{ route('clients.index') }}';"><i class="fas fa-arrow-left"></i>  Назад</button>
                </div>
            </div>
        </div>
        <fieldset disabled="disabled">
        @include('clients._form')
        </fieldset>
        {!! Form::close() !!}
    </div>
    </div>
@stop

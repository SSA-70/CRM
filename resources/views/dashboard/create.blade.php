@extends('main')

@section('content')
    <div class="my-3 p-3 bg-white rounded shadow-sm">
        {!!  Form::model($client,['url' => 'clients']) !!}
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center border-bottom mb-3">
            <h1 class="h2">Создать новую анкету</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group mr-2">
                    <button type="submit" class="btn btn-sm btn-outline-secondary"><i class="fas fa-check"></i> Сохранить</button>
                        <button type="button" class="btn btn-sm btn-outline-secondary" onclick="window.location='{{ route('clients.index') }}';"><i class="fas fa-times"></i>  Отменить</button>
                </div>
            </div>
        </div>
        @include('clients._form')
        {!! Form::close() !!}
        </div>
    </div>


@stop

@extends('main')

@section('content')

    <div class="my-3 p-3 bg-white rounded shadow-sm">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
            <h1 class="h2">Карта №{{ $client->card_number }}</h1>
            <div class="btn-toolbar">
                <a href="{{ route('clients.edit', $client->id) }}">
                    <button type="button" class="btn btn-sm btn-outline-secondary"><i class="fas fa-edit"></i> Редактировать</button>
                </a>
            </div>
        </div>

    <hr>
    <article>
        <div class="body">{{ $client->firstname }} {{$client->lastname}} {{$client->patronymic }}</div>
    </article>
    <hr>
    <a href="/clients"><< back</a>
@stop

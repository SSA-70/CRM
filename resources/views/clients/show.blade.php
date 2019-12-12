@extends('main')

@section('content')
    <h1>Client {{ $client->card_number }}</h1>
    <hr>
    <article>
        <div class="body">{{ $client->firstname }} {{$client->lastname}} {{$client->patronymic }}</div>
    </article>
    <hr>
    <a href="/clients"><< back</a>
@stop

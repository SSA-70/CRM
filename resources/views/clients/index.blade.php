@extends('main')

@section('content')
    <h1>Clients</h1>
    <hr>
    @foreach($clients as $client)
        <article>
            <h2>
                <a href="clients/{{ $client->id }}">{{ $client->card_number }}</a>
            </h2>
            <div class="body">{{ $client->firstname }} {{$client->lastname}} {{$client->patronymic }}</div>
        </article>
    @endforeach
    <hr>
    <a href="clients/create">create new client</a>
@stop

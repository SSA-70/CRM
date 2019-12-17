@extends('main')

@section('content')
    <div class="my-3 p-3 bg-white rounded shadow-sm">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
            <h1 class="h2">Анкеты</h1>
            <div class="btn-toolbar">
                    <a href="{{ route('clients.create') }}">
                        <button type="button" class="btn btn-sm btn-outline-secondary"><i class="fas fa-user-plus"></i> Создать</button>
                    </a>
            </div>
        </div>
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th>Дата создания</th>
                <th>Номер карты</th>
                <th>Фамилия</th>
                <th>Имя</th>
                <th>Отчество</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>


    @foreach($clients as $client)
            <tr>
                <td>{{ $client->created_at }}</td>
                <td>{{ $client->card_number }}</td>
                <td>{{ $client->firstname }}</td>
                <td>{{ $client->lastname }}</td>
                <td>{{ $client->patronymic }}</td>
                <td>
                        <a href="{{ route('clients.show',$client->id) }}" class="abtn"><i class="far fa-id-card"></i></a>
                        <a href="{{ route('clients.edit',$client->id) }}" class="abtn"><i class="fas fa-edit"></i></a>
                        <a href="#" class="abtn" onclick="document.getElementById('submitDeleteButton').submit();"><i class="fas fa-trash-alt"></i></a>
                    {!! Form::open(array('url' => ['clients',$client->id],'method'=>'delete')) !!}
                        <button type="hidden" id="submitDeleteButton">

                    {!! Form::close() !!}
                </td>
            </tr>
    @endforeach
            </tbody>
        </table>

    </div>

@stop

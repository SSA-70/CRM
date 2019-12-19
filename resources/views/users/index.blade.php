@extends('main')

@section('content')
    <div class="my-3 p-3 bg-white rounded shadow-sm">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
            <h1 class="h2">Пользователи</h1>
            <div class="btn-toolbar">
                <a href="{{ route('users.create') }}">
                    <button type="button" class="btn btn-sm btn-outline-secondary"><i class="fas fa-user-plus"></i>
                        Создать
                    </button>
                </a>
            </div>
        </div>
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th>АЗС</th>
                <th>Логин</th>
                <th>Фамилия</th>
                <th>Имя</th>
                <th>Отчество</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>


            @foreach($users as $usr)
                <tr>
                    <td>{{ $usr->place_id }}</td>
                    <td>{{ $usr->name }}</td>
                    <td>{{ $usr->firstname }}</td>
                    <td>{{ $usr->lastname }}</td>
                    <td>{{ $usr->patronymic }}</td>
                    <td>
                        {!! Form::open(array('url' => ['users',$usr->id],'method'=>'delete','id'=>'submitDelete'.$usr->id)) !!}
                        <a href="{{ route('users.show',$usr->id) }}" class="abtn"><i class="far fa-id-card"></i></a>
                        <a href="{{ route('users.edit',$usr->id) }}" class="abtn"><i class="fas fa-edit"></i></a>
                        <a href="#" class="abtn"
                           onclick="document.getElementById('submitDelete{{$usr->id}}').submit();"><i
                                class="fas fa-trash-alt"></i></a>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>

@stop

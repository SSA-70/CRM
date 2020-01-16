@extends('main')

@section('content')


    <div class="my-3 p-3 bg-white rounded shadow-sm">
        <div style="position: relative">
            <div style="position: absolute; right:0px">
                <div class="btn-toolbar">
                    <form method="GET" action="{{ route('clients_db.index',array_merge(\Request::only('tab'))) }}"
                          class="form-inline">
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control" placeholder="Найти" value="{{$searchtext}}"
                                   aria-label="Найти" aria-describedby="button-addon2" name="search"
                                   onkeyup="this.value=this.value.replace(' ','')">
                            <input type="hidden" name="tab" value="{{ \Request::input('tab') }}">
                            <div class="input-group-append">
                                <button class="btn btn-sm btn-outline-secondary" type="submit" id="button-addon2"><i
                                        class="fa fa-search"></i></button>
                            </div>
                        </div>
                        <a class="ml-2" href="{{ route('clients_db.create') }}">
                            <button type="button" class="btn btn-sm btn-outline-secondary"><i
                                    class="fas fa-user-plus"></i>
                                Создать
                            </button>
                        </a>
                    </form>
                </div>
            </div>
        </div>
        <ul class="nav nav-tabs mr-auto">
            <li class="nav-item">
                <a href="{{ route('clients_db.index', ['tab'=>'base','search'=>$searchtext]) }}"
                   class="nav-link @if(Request::get('tab')=='base') active @endif">База</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('clients_db.index', ['tab'=>'ws','search'=>$searchtext]) }}"
                   class="nav-link @if(Request::get('tab')=='ws') active @endif">Заявки
                    (<b>{{ $ws_count }}</b>)</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('clients_db.index', ['tab'=>'del','search'=>$searchtext]) }}"
                   class="nav-link @if(Request::get('tab')=='del') active @endif">Удаленные</a>
            </li>
            <li>

            </li>
        </ul>

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
            <h1 class="h2"></h1>
        </div>

        <table class="table table-hover table-sm ">
            <thead>
            <tr>
                <th>Номер</th>
                <th>ФИО</th>
                <th>Телефон</th>
                <th>АЗС</th>
                <th>Оператор</th>
                <th>Продажи</th>
                <!--<th>Коментарий</th>-->
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>


            @foreach($clients_db as $client)
                <tr>
                    <td>{{ $client->card_number }}</td>
                    <td>{{ $client->firstname.' '.$client->lastname.' '.$client->patronymic }}</td>
                    <td>{{ $client->mobile_number }}</td>
                    <td>{{ $client->azs->name }}</td>
                    <td>{{ $client->user->firstname.' '.$client->user->lastname }}</td>
                    <td>{{ $client->sold_at }}</td>
                <!--<td>{{ $client->comment }}</td>-->
                    <td>
                        {!! Form::open(array('url' => ['clients_db',$client->id],'method'=>'delete','id'=>'submitDelete'.$client->id)) !!}
                        <a href="{{ route('clients_db.show',$client->id) }}" class="abtn" title="Просмотр"><i
                                class="far fa-id-card"></i></a>
                        @if(Request::get('tab')!=='del')
                        <a href="{{ route('clients_db.edit',$client->id) }}" class="abtn" title="Редактировать"><i
                                class="fas fa-edit"></i></a>
                        @endif
                        @if(Request::get('tab')!=='ws' and Request::get('tab')!=='del')
                        <a href="#" class="abtn"
                           onclick="document.getElementById('submitDelete{{$client->id}}').submit();"
                           title="Удалить"><i
                                class="fas fa-trash-alt"></i></a>
                        @endif
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    {{$clients_db->appends(\Request::except('page'))->links()}}
    <!-- конец вкладка "БАЗА" -->


    </div>

@stop

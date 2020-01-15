@extends('main')

@section('content')


    <div class="my-3 p-3 bg-white rounded shadow-sm">
<div style="position: relative">
        <div style="position: absolute; right:0px">
            <div class="btn-toolbar">
                <form method="GET" action="{{ route('clients_db.search') }}" class="form-inline">
                    <div class="input-group input-group-sm">
                        <input type="text" class="form-control" placeholder="Найти" aria-label="Найти" aria-describedby="button-addon2" name="search">
                        <div class="input-group-append">
                            <button class="btn btn-sm btn-outline-secondary" type="submit" id="button-addon2"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                    <a class="ml-2" href="{{ route('clients_db.create') }}">
                        <button type="button" class="btn btn-sm btn-outline-secondary"><i class="fas fa-user-plus"></i>
                            Создать
                        </button>
                    </a>
                </form>
            </div>
        </div>
        </div>

        <ul class="nav nav-tabs mr-auto" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#db" role="tab" aria-controls="db"
                   aria-selected="true">База</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#worksheet" role="tab"
                   aria-controls="profile" aria-selected="false">Заявки (<b>{{ $clients_ws->count() }}</b>)</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#deleted" role="tab"
                   aria-controls="contact" aria-selected="false">Удаленные</a>
            </li>
            <li>

            </li>
        </ul>



        <div class="tab-content" id="myTabContent">
            <!--вкладка "БАЗА"-->
            <div class="tab-pane fade show active" id="db" role="tabpanel" aria-labelledby="db-tab">
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
                            <td>{{ $client->azs_id }}</td>
                            <td>{{ $client->user_id }}</td>
                            <td>{{ $client->sold_at }}</td>
                        <!--<td>{{ $client->comment }}</td>-->
                            <td>
                                {!! Form::open(array('url' => ['clients_db',$client->id],'method'=>'delete','id'=>'submitDelete'.$client->id)) !!}
                                <a href="{{ route('clients_db.show',$client->id) }}" class="abtn" title="Просмотр"><i
                                        class="far fa-id-card"></i></a>
                                <a href="{{ route('clients_db.edit',$client->id) }}" class="abtn" title="Редактировать"><i
                                        class="fas fa-edit"></i></a>
                                <a href="#" class="abtn"
                                   onclick="document.getElementById('submitDelete{{$client->id}}').submit();"
                                   title="Удалить"><i
                                        class="fas fa-trash-alt"></i></a>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- конец вкладка "БАЗА" -->
            <!-- вкладка "ЗАЯВКИ" -->
            <div class="tab-pane fade" id="worksheet" role="tabpanel" aria-labelledby="worksheet-tab">
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


                    @foreach($clients_ws as $client)
                        <tr>
                            <td>{{ $client->card_number }}</td>
                            <td>{{ $client->firstname.' '.$client->lastname.' '.$client->patronymic }}</td>
                            <td>{{ $client->mobile_number }}</td>
                            <td>{{ $client->azs_id }}</td>
                            <td>{{ $client->user_id }}</td>
                            <td>{{ $client->sold_at }}</td>
                        <!--<td>{{ $client->comment }}</td>-->
                            <td>

                                <a href="{{ route('clients_db.show',$client->id) }}" class="abtn" title="Просмотр"><i
                                        class="far fa-id-card"></i></a>
                                <a href="{{ route('clients_db.edit',$client->id) }}" class="abtn" title="Редактировать"><i
                                        class="fas fa-edit"></i></a>


                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- конец вкладка "ЗАЯВКИ" -->
            <!-- вкладка "УДАЛЕННЫЕ" -->
            <div class="tab-pane fade" id="deleted" role="tabpanel" aria-labelledby="deleted-tab">
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


                    @foreach($clients_del as $client)
                        <tr>
                            <td>{{ $client->card_number }}</td>
                            <td>{{ $client->firstname.' '.$client->lastname.' '.$client->patronymic }}</td>
                            <td>{{ $client->mobile_number }}</td>
                            <td>{{ $client->azs_id }}</td>
                            <td>{{ $client->user_id }}</td>
                            <td>{{ $client->sold_at }}</td>
                        <!--<td>{{ $client->comment }}</td>-->
                            <td>


                                <a href="{{ route('clients_db.show',$client->id) }}" class="abtn" title="Просмотр"><i
                                        class="far fa-id-card"></i></a>



                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- конец вкладка "УДАЛЕННЫЕ" -->
        </div>


    </div>

@stop

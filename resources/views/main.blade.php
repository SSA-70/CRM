<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
          integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <title>CRM</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="{{ url('js/jquery.inputmask.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#mobile_number").inputmask("+7(999)999-99-99")
            $("#mobile_number_addition").inputmask("+7(999)999-99-99")
        });
    </script>
    <style>
        .abtn {
            color: #636b6f;
            padding-left: 4px;
        }

        .abtn:hover {
            color: #343a40;
        }

        .btn:hover {
            background-color: #343a40;
            color: #fff;
            border-color: #fff;
        }

        .nickname {
            color: #fff
        }
    </style>
</head>
<body class="bg-light">
<nav class="navbar navbar-expand navbar-dark bg-dark">
    <a class="navbar-brand" href="\"><img class="d-block pl-5 pr-5" src="/img/elke.png"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample02"
            aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExample02">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="\">Главная</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="\">Анкеты</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Заявки</a>
            </li>
            @if($user->is_admin)
                <li class="nav-item">
                    <a class="nav-link" href="{{route('users.index')}}"><b>USERS</b></a>
                </li>
            @endif
        </ul>
        <form class="form-logout" method="POST" action="{{ route('logout') }}">
            {{ csrf_field() }}
            <span class="nickname">Привет, {{ $user->name }}</span>
            <button type="submit" class="btn btn-light btn-sm">
                <span class="fas fa-sign-out-alt"></span> Выйти
            </button>
        </form>
    </div>
</nav>
<main role="main" class="container">
    <template>{{ $ip }}</template>
    @yield('content')
</main>
</body>
</html>

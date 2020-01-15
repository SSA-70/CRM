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
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{ url('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('js/jquery.inputmask.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#mobile_number").inputmask("+7(999)999-99-99")
            $("#mobile_number_addition").inputmask("+7(999)999-99-99")
        });
    </script>
    <style>
        .nav-tabs .nav-link {
            color: #343a40;
        }
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
                <a class="nav-link" href="{{route('dashboard.index')}}">Главная</a>
            </li>

            @if($user->security_group_id == 1 or $user->is_admin)
            <li class="nav-item">
                <a class="nav-link" href="{{route('clients.index')}}">Анкеты</a>
            </li>
            @endif
            @if($user->security_group_id == 2 or $user->is_admin)
            <li class="nav-item">
                <a class="nav-link" href="{{route('clients_db.index')}}"><b>База</b></a>
            </li>
            @endif
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
    @yield('content')
</main>
</body>
</html>

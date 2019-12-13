 <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>CRM</title>
    <style>
        html,
body {
  height: 100%;
}

body {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-align: center;
  align-items: center;
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #343a40;
}
.mb-4 {
    margin-bottom: 0rem!important;
}
.form-signin {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: auto;
}
.h3 {
    color: #fff
}
.btn {
  background-color: #fff;
  color: #343a40;
  border-color: #fff;
}
.btn:hover {
  background-color: #343a40;
  color: #fff;
  border-color: #fff;
}
.form-signin .form-control {
  position: relative;
  box-sizing: border-box;
  height: auto;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
      box-shadow: 0 0 0 0.1rem rgba(255, 255, 255, 0.25);
    border-color: #343a40;
}
.form-signin input[type="name"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
.alert
{
  margin-top: 0rem!important;
  background-color:  #343a40;
  border-color: #343a40;
  color: #fff;
}
    </style>
}
</head>
<body class="text-center">
    <form class= "form-signin" method="POST" action="{{ route('login') }}">
        @csrf
        {{ HTML::image('img/elke.png', 'alt', array('class' => 'mb-4')) }}
        <h1 class="h3 mb-3 font-weight-normal">CRM</h1>
        <label for="name" class="sr-only">Login</label>
        <input type="name" id="name" name="name" class="form-control" value="{{ old('name') }}" placeholder="Login" required autocomplete="name" autofocus>
        <label for="password" class="sr-only">Password</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="password" required autocomplete="current-password">
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        @if($errors->any())
            <div class="alert alert-danger" role="alert">
                Неверные логин или пароль
            </div>
        @endif
    </form>
</body>
</html>


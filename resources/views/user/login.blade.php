<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> titulo provisorio </title>
    <link rel="stylesheet" href="{{ asset('css/stylesheet.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
</head>

<body>
    <div class="bg"></div>

    <section id="conteudo-view" class="login">
        <h1>Login</h1>

        {!! Form::open(['route' => 'user.login', 'method' => 'post']) !!}
        <p>Acesse o sistema</p>
        <label>
            {!! Form::text('email', null, ['class' => 'input', 'placeholder' => 'Usuário']) !!}
        </label>
        <label>
            {!! Form::password('password', ['placeholder' => 'Senha']) !!}
        </label>
        <div class="submit-btn">
            {!! Form::submit('Entrar') !!}
        </div>
        {!! Form::close() !!}
    </section>

    <script src="{{ asset('bootstrap/js/jquery-3.4.1.slim.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
</body>

</html>

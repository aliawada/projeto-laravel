@extends('templates.master')

@section('title-view', 'Users')

@section('css-view')

@endsection

@section('content-view')

    @if (session('success')['message'])
        <h3> {{ session('success')['message'] }} </h3>
    @endif

    {!! Form::open(['route' => 'user.store', 'method' => 'post', 'class' => 'form-padrao']) !!}
    @include('templates.formulario.input', ['label' => 'CPF', 'input' => 'cpf', 'attributes' => ['placeholder' => 'CPF']])
    @include('templates.formulario.input', ['label' => 'Nome', 'input' => 'name', 'attributes' => ['placeholder' => 'Nome']])
    @include('templates.formulario.input', ['label' => 'E-mail', 'input' => 'email', 'attributes' => ['placeholder' => 'E-mail']])
    @include('templates.formulario.input', ['label' => 'Telefone', 'input' => 'phone', 'attributes' => ['placeholder' => 'Telefone']])
    @include('templates.formulario.password', ['label' => 'Senha', 'input' => 'password', 'attributes' => ['placeholder' => 'Senha']])
    @include('templates.formulario.submit', ['input' => 'Cadastrar'])
    {!! Form::close() !!}

    @include('users.list', ['user_list' => $users])

@endsection

@section('js-view')

@endsection


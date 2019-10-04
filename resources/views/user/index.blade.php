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

    <table class="table table-dark">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">cpf</th>
            <th scope="col">name</th>
            <th scope="col">phone</th>
            <th scope="col">birth</th>
            <th scope="col">gender</th>
            <th scope="col">notes</th>
            <th scope="col">email</th>
            <th scope="col">password</th>
            <th scope="col">status</th>
            <th scope="col">permission</th>
            <th scope="col">menu</th>
          </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
          <tr>
            <th scope="row">{{ $user->id }}</th>
            <td>{{ $user->cpf }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->phone }}</td>
            <td>{{ $user->birth }}</td>
            <td>{{ $user->gender }}</td>
            <td>{{ $user->notes }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->password }}</td>
            <td>{{ $user->status }}</td>
            <td>{{ $user->permission }}</td>
            <td>
              {!! Form::open(['route' => ['user.destroy', $user->id], 'method' => 'DELETE']) !!}

              {!! Form::submit('remover') !!}

              {!! Form::close() !!}
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>

@endsection

@section('js-view')

@endsection


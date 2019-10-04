@extends('templates.master')


@section('title-view', 'Instituitions')

@section('css-view')

@endsection

@section('content-view')

@if (session('success')['message'])
    <h3> {{ session('success')['message'] }} </h3>
@endif

{!! Form::open(['route' => 'instituition.store', 'method' => 'post', 'class' => 'form-padrao']) !!}
    @include('templates.formulario.input', ['label' => 'Nome da Instituição', 'input' => 'name', 'attributes' => ['placeholder' => 'Nome da Instituição']])
    @include('templates.formulario.submit', ['input' => 'Cadastrar'])
{!! Form::close() !!}

<table class="table table-dark">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome da Instituição</th>
            <th scope="col">menu</th>
        </tr>
    </thead>
    <tbody>
        @foreach($instituitions as $instituition)
        <tr>
            <th scope="row">{{ $instituition->id }}</th>
            <td>{{ $instituition->name }}</td>
            <td>
                {!! Form::open(['route' => ['instituition.destroy', $instituition->id], 'method' => 'DELETE']) !!}

                {!! Form::submit('remover') !!}

                {!! Form::close() !!}
                <a href="{{ route('instituition.show', $instituition->id) }}">Detalhes</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


@endsection

@section('js-view')

@endsection

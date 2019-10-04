@extends('templates.master')


@section('title-view', 'Groups')

@section('css-view')

@endsection

@section('content-view')

@if (session('success')['message'])
    <h3> {{ session('success')['message'] }} </h3>
@endif

{!! Form::open(['route' => 'group.store', 'method' => 'post', 'class' => 'form-padrao']) !!}
    @include('templates.formulario.input', ['label' => 'Nome do Grupo', 'input' => 'name', 'attributes' => ['placeholder' => 'Nome do Grupo']])
    @include('templates.formulario.select', ['label' => 'user_id', 'select' => 'user_id', 'value' => $user_list ,'attributes' => ['placeholder' => 'user_id']])
    @include('templates.formulario.select', ['label' => 'instituition_id', 'select' => 'instituition_id', 'value' => $instituition_list ,'attributes' => ['placeholder' => 'instituition_id']])
    @include('templates.formulario.submit', ['input' => 'Cadastrar'])
{!! Form::close() !!}

<table class="table table-dark">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome do Grupo</th>
            <th scope="col">Nome do Responsável</th>
            <th scope="col">Instituição</th>
            <th scope="col">menu</th>
        </tr>
    </thead>
    <tbody>
        @foreach($groups as $group)
        <tr>
            <th scope="row">{{ $group->id }}</th>
            <td>{{ $group->name }}</td>
            <td>{{ $group->owner->name }}</td>
            <td>{{ $group->instituition->name }}</td>
            <td>
                {!! Form::open(['route' => ['group.destroy', $group->id], 'method' => 'DELETE']) !!}

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

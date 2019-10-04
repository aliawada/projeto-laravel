@extends('templates.master')


@section('title-view', $group->name)

@section('css-view')

@endsection

@section('content-view')

<table class="table table-dark">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome do Grupo</th>
            <th scope="col">Nome do Responsável</th>
            <th scope="col">Nome da Instituição</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">{{ $group->id }}</th>
            <td>{{ $group->name }}</td>
            <td>{{ $group->owner->name }}</td>
            <td>{{ $group->instituition->name }}</td>
        </tr>
    </tbody>
</table>

{!! Form::open(['route' => ['group.user.store', $group->id], 'method' => 'post', 'class' => 'form-padrao']) !!}
    @include('templates.formulario.select', ['label' => 'Usuário', 'select' => 'user_id', 'value' => $user_list, 'placeholder' => 'Usuário'])
    @include('templates.formulario.submit', ['input' => 'Relacionar ao grupo'])
{!! Form::close() !!}


<h4>Pessoas relacionadas com este grupo </h4>

@include('user.list', ['user_list' => $group->users])


@endsection

@section('js-view')

@endsection

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
    @include('templates.formulario.select', ['label' => 'Nome do responsável', 'select' => 'user_id', 'value' => $user_list ,'attributes' => ['placeholder' => 'Nome do responsável']])
    @include('templates.formulario.select', ['label' => 'Nome da Instituição', 'select' => 'instituition_id', 'value' => $instituition_list ,'attributes' => ['placeholder' => 'Nome da Instituição']])
    @include('templates.formulario.submit', ['input' => 'Cadastrar'])
{!! Form::close() !!}

@include('groups.list', ['group_list' => $groups])


@endsection

@section('js-view')

@endsection

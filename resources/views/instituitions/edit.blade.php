@extends('templates.master')

@section('title-view', $instituition->name)

@section('css-view')

@endsection

@section('content-view')

    @if (session('success')['message'])
        <h3> {{ session('success')['message'] }} </h3>
    @endif

    {!! Form::model($instituition, ['route' => ['instituition.update', $instituition->id], 'method' => 'put', 'class' => 'form-padrao']) !!}
    @include('templates.formulario.input', ['label' => 'Nome da Instituição', 'input' => 'name', 'attributes' => ['placeholder' => 'Nome da Instituição']])
    @include('templates.formulario.submit', ['input' => 'Atualizar'])
    {!! Form::close() !!}

@endsection

@section('js-view')

@endsection


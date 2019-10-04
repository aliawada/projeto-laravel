@extends('templates.master')


@section('title-view', 'Instituitions')

@section('css-view')

@endsection

@section('content-view')


@if (session('success')['message'])
    <h3> {{ session('success')['message'] }} </h3>
@endif

{!! Form::open(['route' => ['instituition.product.store', $instituition->id], 'method' => 'post', 'class' => 'form-padrao']) !!}
    @include('templates.formulario.input', ['label' => 'Nome do produto', 'input' => 'name', 'attributes' => ['placeholder' => 'Nome do produto']])
    @include('templates.formulario.input', ['label' => 'Descrição', 'input' => 'description', 'attributes' => ['placeholder' => 'Descrição']])
    @include('templates.formulario.input', ['label' => 'Indexador', 'input' => 'indexer', 'attributes' => ['placeholder' => 'Indexador']])
    @include('templates.formulario.input', ['label' => 'Taxa de juros', 'input' => 'intereset_rate', 'attributes' => ['placeholder' => 'Taxa de juros']])
    @include('templates.formulario.submit', ['input' => 'Cadastrar'])
{!! Form::close() !!}


@endsection

@section('js-view')

@endsection

@extends('templates.master')

@section('title-view', 'Withdraw')

@section('content-view')

    @if (session('success')['message'])
        <h3> {{ session('success')['message'] }} </h3>
    @endif

    {!! Form::open(['route' => 'movement.withdraw.store', 'method' => 'post', 'class' => 'form-padrao']) !!}
        @include('templates.formulario.select', ['label' => 'Grupo', 'select' => 'group_id', 'value' => $group_list ?? [],'attributes' => ['placeholder' => 'Grupo']])
        @include('templates.formulario.select', ['label' => 'Produto', 'select' => 'product_id', 'value' => $product_list ?? [],'attributes' => ['placeholder' => 'Produto']])
        @include('templates.formulario.input', ['label' => 'Valor', 'input' => 'value', 'attributes' => ['placeholder' => 'valor']])
        @include('templates.formulario.submit', ['input' => 'withdraw'])
    {!! Form::close() !!}

@endsection
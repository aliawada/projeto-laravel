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


<table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome do Produto</th>
                <th scope="col">Descrição</th>
                <th scope="col">Indexador</th>
                <th scope="col">Taxa de juros</th>
                <th scope="col">menu</th>
            </tr>
        </thead>
        <tbody>
            @forelse($instituition->products as $product)
            <tr>
                <th scope="row">{{ $product->id }}</th>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->indexer }}</td>
                <td>{{ $product->intereset_rate }}</td>
                <td>
                    {!! Form::open(['route' => ['instituition.product.destroy', $instituition->id, $product->id], 'method' => 'DELETE']) !!}

                    {!! Form::submit('remover') !!}

                    {!! Form::close() !!}

                    {{-- <a href="{{ route('instituition.product.edit', $instituition->id, $product->id)}}">Editar</a> --}}
                </td>
            </tr>
            @empty
            <tr><td>Nenhum produto cadastrado</td></tr>
            @endforelse
        </tbody>
    </table>


@endsection

@section('js-view')

@endsection

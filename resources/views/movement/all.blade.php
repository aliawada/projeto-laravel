@extends('templates.master')


@section('title-view', 'Extract')

@section('css-view')

@endsection

@section('content-view')

<table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">Data</th>
                <th scope="col">Tipo</th>
                <th scope="col">Produto</th>
                <th scope="col">Grupo</th>
                <th scope="col">Valor</th>
            </tr>
        </thead>
        <tbody>
            @foreach($movement_list as $movement)
            <tr>
                <td>{{ $movement->created_at->format('d/m/Y H:i') }}</td>
                <td>{{ $movement->type == 1 ? "Aplicação" : "Resgate" }}</td>
                <td>{{ $movement->product->name }}</td>
                <td>{{ $movement->group->name }}</td>
                <td>R$ {{ number_format($movement->value, 2, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>


@endsection

@section('js-view')

@endsection

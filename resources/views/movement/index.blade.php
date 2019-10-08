@extends('templates.master')


@section('title-view', 'Applications')

@section('css-view')

@endsection

@section('content-view')

<table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">Produto</th>
                <th scope="col">Instituição</th>
                <th scope="col">Valor investido</th>
            </tr>
        </thead>
        <tbody>
            @foreach($product_list as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->instituition->name }}</td>
                <td>R$ {{ number_format($product->valueFromUser(Auth::user()), 2, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>


@endsection

@section('js-view')

@endsection

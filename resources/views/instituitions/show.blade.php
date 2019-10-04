@extends('templates.master')


@section('title-view', $instituition->name)

@section('css-view')

@endsection

@section('content-view')

<table class="table table-dark">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome da Instituição</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">{{ $instituition->id }}</th>
            <td>{{ $instituition->name }}</td>
        </tr>
    </tbody>
</table>

<h4>Grupos relacionados com esta instituição</h4>

@include('groups.list', ['group_list' => $instituition->groups])


@endsection

@section('js-view')

@endsection

<table class="table table-dark">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome do Grupo</th>
            <th scope="col">Nome do Responsável</th>
            <th scope="col">Instituição</th>
            <th scope="col">Total</th>
            <th scope="col">menu</th>
        </tr>
    </thead>
    <tbody>
        @foreach($group_list as $group)
        <tr>
            <th scope="row">{{ $group->id }}</th>
            <td>{{ $group->name }}</td>
            <td>{{ $group->owner->name }}</td>
            <td>{{ $group->instituition->name }}</td>
            <td>R$ {{ number_format($group->total_value, 2, ',', '.') }}</td>
            <td>
                {!! Form::open(['route' => ['group.destroy', $group->id], 'method' => 'DELETE']) !!}

                {!! Form::submit('remover') !!}

                {!! Form::close() !!}

                <a class="btn btn-primary" href="{{ route('group.show', $group->id)}}">Detalhes</a>
                <a class="btn btn-primary" href="{{ route('group.edit', $group->id)}}">Editar</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

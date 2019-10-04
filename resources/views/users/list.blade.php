<table class="table table-dark">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">cpf</th>
            <th scope="col">name</th>
            <th scope="col">phone</th>
            <th scope="col">birth</th>
            <th scope="col">gender</th>
            <th scope="col">notes</th>
            <th scope="col">email</th>
            <th scope="col">password</th>
            <th scope="col">status</th>
            <th scope="col">permission</th>
            <th scope="col">menu</th>
        </tr>
    </thead>
    <tbody>
        @foreach($user_list as $user)
        <tr>
            <th scope="row">{{ $user->id }}</th>
            <td>{{ $user->formatted_cpf }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->formatted_phone }}</td>
            <td>{{ $user->formatted_birth }}</td>
            <td>{{ $user->gender }}</td>
            <td>{{ $user->notes }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->password }}</td>
            <td>{{ $user->status }}</td>
            <td>{{ $user->permission }}</td>
            <td>
                {!! Form::open(['route' => ['user.destroy', $user->id], 'method' => 'DELETE']) !!}

                {!! Form::submit('remover') !!}

                {!! Form::close() !!}
                <a href="{{ route('user.edit', $user->id) }}">Editar</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

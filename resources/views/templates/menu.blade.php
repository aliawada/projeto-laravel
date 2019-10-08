<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
    <a class="navbar-brand" href="{{ route('users.dashboard') }}">
            <img src="{{ asset('images/logo.png') }}" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                <a class="nav-link" href="{{ route('user.index') }}">Usuário</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('instituition.index') }}">Instituições</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('group.index') }}">Grupos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('movement.application') }}">Investir</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('movement.withdraw') }}">Resgatar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('movement.index') }}">Aplicações</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('movement.all') }}">Extrato</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

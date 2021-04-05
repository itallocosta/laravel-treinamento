<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <p>
        <a href={{ route('condominium.create') }}>Cadastrar</a>
    </p>

    <form method="get" action="{{ route('condominium.search') }}">
        @csrf
        <p>
            Id:
            <input type="number" id="id" name="id" />
        </p>

        <p>Sindico:
            <select id="sindico" name="sindico" required>
                <option value="">--Escolha---</option>
                @foreach ($users as $user)
                <option value="{{ $user->id }}"> {{ $user->name }} </option>
                @endforeach
            </select>
        </p>
        <button type="submit">Pesquisar</button>
        <button type="reset">Limpar Formulário</button>
    </form>
    <p>
        <hr>
    </p>
    <p>
        <table>
            <thead>
                <tr>
                    <td>Id</td>
                    <td>Nome</td>
                    <td>Telefone</td>
                    <td>Sindico</td>
                    <td>Subsindico</td>
                    <td>&nbsp;</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($xptoCollection as $condiminio)
                <tr>
                    <td>{{ $condiminio->id }}</td>
                    <td>{{ $condiminio->name }}</td>
                    <td>{{ $condiminio->telefone }}</td>
                    <td>{{ $condiminio->sindico->name }}</td>
                    <td>{{ $condiminio->subSindico->name}}</td>
                    <td>
                        <a href={{ route('condominium.show', $condiminio->id) }}>Ver</a>
                        - &nbsp;
                        <form method="post" action="{{ route('condominium.destroy', $condiminio->id) }}">
                            @method('DELETE')
                            @csrf
                            <button type="submit">DELETAR</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </p>
</x-app-layout>
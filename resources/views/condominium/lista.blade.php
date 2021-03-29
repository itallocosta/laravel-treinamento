<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <p>
        <a href={{ route('condominium.create') }}>Cadastrar</a>
    </p>

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
</x-app-layout>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <div>

        @if (empty($condominio->id))
            <form method="post" action="{{ route('condominium.store') }}">
        @else
            <form method="post" action="{{ route('condominium.update', $condominio->id) }}">
            @method('PUT')
        @endif
            @csrf
            <p>
                Nome: <input type="text" name="name" id="name" value="{{ $condominio->name ?? old('name') }}" /> 
            </p>
            <p>
                Telefone: <input type="text" name="telefone" id="telefone" value="{{ $condominio->telefone ?? old('name') }}" /> 
            </p>
            <p>
                Endereco: <input type="text" name="endereco" id="endereco" value="{{ $condominio->endereco ?? old('endereco') }}" /> 
            </p>
            <p>
                Sindico: 
                <select id="sindico" name="sindico">
                    <option value="">Selecione...</option>
                    @foreach ($users as $user) 
                        <option {{ ($condominio->sindico->id ?? old('sindico')) == $user->id ? "selected" : "" }} value="{{ $user->id}}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </p>
            <p>
                Sub-Sindico: 
                <select id="subsindico" name="subsindico">
                    <option value="">Selecione...</option>
                    @foreach ($users as $user) 
                        <option {{ ($condominio->subsindico->id ?? old('subsindico')) == $user->id ? "selected" : "" }} value="{{ $user->id}}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </p>
            <p>&nbsp;</p>
            <p>
            @if (empty($condominio->id))
                <button type="submit">Cadastrar</button>
            @else
                <button type="submit">Alterar</button>
            @endif
             - &nbsp;
            <a href="{{route('condominium.index')}}">Voltar para a listagem</a>
            </p>
        </form>
    </div>
</x-app-layout>
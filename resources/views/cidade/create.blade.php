@extends('layouts.app', ['btnURL' => route('cidade.index'), 'btnText' => 'Voltar'])

@section('content')
<form class="row g-2" action="@isset($cidade){{ route('cidade.update', ['cidade' => $cidade['id']]) }}@else{{ route('cidade.store') }}@endisset" method="POST" autocomplete="off">
    @csrf
    @isset($cidade)
        @method('PUT')
    @endisset
    <div class="col-12 col-md-6">
        <label class="form-label mb-0" for="nome">Nome da Cidade</label>
        <input class="form-control" type="text" name="nome" id="nome" placeholder="Nome da Cidade" value="{{ $cidade['nome'] ?? old('nome') }}" required autofocus>
    </div>
    <div class="col-12 col-md-4">
        <label class="form-label mb-0" for="nome">Porte</label>
        <select class="form-select" name="porte" id="porte">
            <option value="PEQUENO" @if(($cidade['porte'] ?? old('porte')) == 'PEQUENO'){{ 'selected' }}@endif>PEQUENO</option>
            <option value="MÉDIO" @if(($cidade['porte'] ?? old('porte')) == 'MÉDIO'){{ 'selected' }}@endif>MÉDIO</option>
            <option value="GRANDE" @if(($cidade['porte'] ?? old('porte')) == 'GRANDE'){{ 'selected' }}@endif>GRANDE</option>
        </select>
    </div>
    <div class="col-12 col-md-2 d-flex align-items-end">
        <button class="btn btn-primary w-100" type="submit">@isset($cidade){{ 'Editar' }}@else{{ 'Cadastrar' }}@endisset</button>
    </div>
</form>
@endsection

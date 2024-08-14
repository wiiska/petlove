@extends('base')
@section('conteudo')
@section('titulo', 'Formulário de Professor')
@php
    if (!empty($dado->id)) {
        $route = route('professor.update', $dado->id);
    } else {
        $route = route('professor.store');
    }
@endphp

<h3>Formulário de Professor</h3>
<form action="{{ $route }}" method="post">

    @csrf

    @if (!empty($dado->id))
        @method('put')
    @endif

    <input type="hidden" name="id"
        value="@if (!empty($dado->id)) {{ $dado->id }}@else{{ '' }} @endif"><br>

    <label for="">Nome</label><br>
    <input type="text" name="nome" class="form-control"
        value="@if (!empty($dado->nome)) {{ $dado->nome }}@elseif (!empty(old('nome'))){{ old('nome') }}@else{{ '' }} @endif"><br>

    <label for="">Telefone</label><br>
    <input type="text" name="telefone" class="form-control"
        value="@if (!empty($dado->telefone)) {{ $dado->telefone }}@elseif (!empty(old('telefone'))){{ old('telefone') }}@else{{ '' }} @endif"><br>

    <label for="">CPF</label><br>
    <input type="text" name="cpf" class="form-control"
        value="@if (!empty($dado->cpf)) {{ $dado->cpf }}@elseif (!empty(old('cpf'))){{ old('cpf') }}@else{{ '' }} @endif"><br>

    <label for="">Categorias</label><br>
    <select name="categoria_id" class="form-select">
        @foreach ($categorias as $item)
            <option value="{{ $item->id }}">{{ $item->nome }}</option>
        @endforeach
    </select><br>

    <button type="submit" class="btn btn-success">Salvar</button>
    <a href="{{ url('professor') }}" class="btn btn-primary">Voltar</a>
</form>

@stop

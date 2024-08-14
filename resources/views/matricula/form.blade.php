@extends('base')
@section('conteudo')
@section('titulo', 'Formulário de Matricula')
@php
    if (!empty($dado->id)) {
        $route = route('matricula.update', $dado->id);
    } else {
        $route = route('matricula.store');
    }
@endphp

<h3>Formulário de Matricula</h3>
<form action="{{ $route }}" method="post" enctype="multipart/form-data">

    @csrf

    @if (!empty($dado->id))
        @method('put')
    @endif

    <input type="hidden" name="id"
        value="@if (!empty($dado->id)) {{ $dado->id }}@else{{ '' }} @endif"><br>

    <label for="">Curso</label><br>
    <select name="curso_id" class="form-select">
        @foreach ($cursos as $item)
            <option value="{{ $item->id }}">{{ $item->nome }}</option>
        @endforeach
    </select><br>

    <label for="">Turma</label><br>
    <select name="turma_id" class="form-select">
        @foreach ($turmas as $item)
            <option value="{{ $item->id }}">{{ $item->nome }}</option>
        @endforeach
    </select><br>

    <label for="">Aluno</label><br>
    <select name="aluno_id" class="form-select">
        @foreach ($alunos as $item)
            <option value="{{ $item->id }}">{{ $item->nome }}</option>
        @endforeach
    </select><br>

    <label for="">Data Matricula</label><br>
    <input type="date" name="data_matricula" class="form-control"
        value="@if (!empty($dado->data_matricula)) {{ $dado->data_matricula }}@elseif (!empty(old('data_matricula'))){{ old('data_matricula') }}@else{{ '' }} @endif"><br>


    <button type="submit" class="btn btn-success">Salvar</button>
    <a href="{{ url('matricula') }}" class="btn btn-primary">Voltar</a>
</form>

@stop

@extends('base')
@section('conteudo')
@section('titulo', 'Detalhe Matricula do Aluno')


<h3>Detalhe Matricula do Aluno</h3>

<b>Curso</b><br>
<span> {{ $curso->nome }}</span><br>

<b for="">Carga Horária</b><br>
<span> {{ $curso->carga_horaria }}</span><br>

<b for="">Requisitos</b><br>
<span> {{ $curso->requisitos }}</span><br>

<b for="">Turma</b><br>
<span> {{ $turma->nome }} - Data Início:{{ date('d/m/Y', strtotime($turma->data_inicio)) }}
    - Data Fim:{{ date('d/m/Y', strtotime($turma->data_fim)) }}</span><br>

@php
    $nome_imagem = !empty($aluno->imagem) ? $aluno->imagem : 'sem_imagem.jpg';
    //dd($nome_imagem);
@endphp

<b for="">Imagem Aluno</b><br>
<img src="/storage/{{ $nome_imagem }}" style="width: 150px" alt="imagem" />

<b for="">Aluno</b><br>
<span> {{ $aluno->nome }}</span><br>

<b for="">CPF</b><br>
<span> {{ $aluno->cpf }}</span><br>

<b for="">Telefone</b><br>
<span> {{ $aluno->telefone }}</span><br>

<a href="{{ url('matricula') }}" class="btn btn-primary"
    style="width: 100px">Voltar</a>

@stop

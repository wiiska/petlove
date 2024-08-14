<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    <h3>Listagem de Matriculas dos Alunos</h3>

    @foreach ($dados as $item)
        <b>Curso</b><br>
        <span> {{ $item->curso->nome }}</span><br>

        <b for="">Carga Horária</b><br>
        <span> {{ $item->curso->carga_horaria }}</span><br>

        <b for="">Requisitos</b><br>
        <span> {{ $item->curso->requisitos }}</span><br>

        <b for="">Turma</b><br>
        <span> {{ $item->turma->nome }} - Data Início:{{ date('d/m/Y', strtotime($item->turma->data_inicio)) }}
            - Data Fim:{{ date('d/m/Y', strtotime($item->turma->data_fim)) }}</span><br>

        @php
            $nome_imagem = !empty($item->aluno->imagem) ? $item->aluno->imagem : 'sem_imagem.jpg';
        @endphp

        <b for="">Imagem Aluno</b><br>
        <img src="{{ storage_path('app/public/' . $nome_imagem) }}" style="width: 150px" alt="imagem" />

        <b for="">Aluno</b><br>
        <span> {{ $item->aluno->nome }}</span><br>

        <b for="">CPF</b><br>
        <span> {{ $item->aluno->cpf }}</span><br>

        <b for="">Telefone</b><br>
        <span> {{ $item->aluno->telefone }}</span><br>
    @endforeach
</body>

</html>

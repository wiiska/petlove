@extends('base')
@section('conteudo')
@section('titulo', 'Listagem de Matriculas')

<h3>Listagem de Matriculas</h3>

<form action="{{ route('matricula.search') }}" method="post">

    <div class="row">
        @csrf
        <div class="col-4">
            <label for="">Nome</label><br>
            <input type="text" name="nome" class="form-control"><br>
        </div>
        <div class="col-5" style="margin-top: 22px;">
            <button type="submit" class="btn btn-primary"> <i class="fa-solid fa-magnifying-glass"></i> Buscar</button>
            <a href="{{ url('matricula/create') }}" class="btn btn-success"><i class="fa-solid fa-plus"></i> Novo</a>
            <a href="{{ route('matricula.report') }}" target="_blank" class="btn btn-danger"><i
                    class="fa-solid fa-file-pdf"></i> Relatório</a>
            <a href="{{ route('matricula.chart') }}" target="_blank" class="btn btn-warning"><i
                class="fa-solid fa-chart-pie"></i> Gráfico</a>
        </div>
    </div>
</form>

<hr>

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Curso</th>
            <th>Turma</th>
            <th>Aluno</th>
            <th>Data Matricula</th>
            <th>Detalhe</th>
            <th>Ação</th>
            <th>Ação</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($dados as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->curso->nome ?? '' }}</td>
                <td>{{ $item->turma->nome ?? '' }}</td>
                <td>{{ $item->aluno->nome ?? '' }}</td>
                <td>{{ date('d/m/Y', strtotime($item->data_matricula)) ?? '' }}</td>
                <td><a href="{{ route('matricula.detail', $item->id) }} "class="btn btn-outline-warning"
                        title="Detalhe"><i class="fa-solid fa-circle-info"></i></a></td>
                <td><a href="{{ route('matricula.edit', $item->id) }} "class="btn btn-outline-primary" title="Editar"><i
                            class="fa-solid fa-pen-to-square"></i></a></td>
                <td>
                    <form action="{{ route('matricula.destroy', $item) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-outline-danger" title="Deletar"
                            onclick="return confirm('Deseja realmente deletar esse registro?')">
                            <i class="fa-solid fa-trash-can"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{ $dados->withQueryString()->links('pagination::bootstrap-5') }}
@stop

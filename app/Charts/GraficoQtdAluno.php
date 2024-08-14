<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\Matricula;
use Illuminate\Support\Facades\DB;

class GraficoQtdAluno
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {

        /*

        SELECT COUNT(1) AS 'qtd_aluno_curso',
            cursos.nome FROM matriculas
            INNER JOIN cursos ON cursos.id = matriculas.curso_id
            GROUP BY curso_id
        */
        $matriculas = DB::table("matriculas")
                    ->selectRaw('count(1) as qtd_aluno_curso,cursos.nome as nome_curso')
                    ->join('cursos','cursos.id', '=','matriculas.curso_id')
                    ->groupBy('curso_id')->get();

        $qtdAlunos = [];
        $nomeCursos = [];

        foreach($matriculas as $item){
            $qtdAlunos[]= $item->qtd_aluno_curso;
            $nomeCursos[]= $item->nome_curso;
        }
       // dd($qtdAlunos);

        return $this->chart->pieChart()
            ->setTitle('Qtd alunos por Curso')
            ->setSubtitle('Semestre 2024.1')
            ->addData($qtdAlunos)
            ->setLabels($nomeCursos);
    }
}

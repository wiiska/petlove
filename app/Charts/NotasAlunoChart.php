<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\Aluno;
use App\Models\Matricula;

class NotasAlunoChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $qtdAlunos = Aluno::All()->count();
        $qtdAlunosMatriculados = Matricula::where('curso_id',3)->count();

        return $this->chart->pieChart()
            ->setTitle('Top 3 pontuações do time.')
            ->setSubtitle('Sessão 2024.')
            ->addData([$qtdAlunos , $qtdAlunosMatriculados, 30])
            ->setLabels(['Qtd Alunos', 'Qtd Alunos Matriculados', 'Player 9']);
    }
}

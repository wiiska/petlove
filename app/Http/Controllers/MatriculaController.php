<?php

namespace App\Http\Controllers;

use App\Models\Matricula;
use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\Turma;
use App\Models\Aluno;
use Barryvdh\DomPDF\Facade\Pdf;

use App\Charts\NotasAlunoChart;
use App\Charts\MediaNotasAlunoChart;

class MatriculaController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    private $pagination = 5;

    public function index()
    {
        $matriculas = Matricula::paginate($this->pagination);

        //dd($matriculas[1]->turma);

        return view('matricula.list',[
            'dados'=> $matriculas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cursos = Curso::all();
        $turmas = Turma::all();
        $alunos = Aluno::all();

        return view("matricula.form", [
            'cursos' => $cursos,
            'turmas' => $turmas,
            'alunos' => $alunos,
        ]);
    }
    public function store(Request $request)
    {
        //app/http/Controller
        $request->validate([
            'curso_id' => "required",
            'turma_id' => "required",
            'aluno_id' => "required",
        ], [
            'curso_id.required' => "O :attribute é obrigatório",
            'turma_id.required' => "O :attribute é obrigatório",
            'aluno_id.required' => "O :attribute é obrigatório",
        ]);

        Matricula::create($request->all());

        return redirect('matricula');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dado = Matricula::findOrFail($id);

        $cursos = Curso::all();
        $turmas = Turma::all();
        $alunos = Aluno::all();

        return view("matricula.form", [
            'dado'=> $dado,
            'cursos' => $cursos,
            'turmas' => $turmas,
            'alunos' => $alunos,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'curso_id' => "required",
            'turma_id' => "required",
            'aluno_id' => "required",
        ], [
            'curso_id.required' => "O :attribute é obrigatório",
            'turma_id.required' => "O :attribute é obrigatório",
            'aluno_id.required' => "O :attribute é obrigatório",
        ]);

        Matricula::updateOrCreate(
            ['id' => $request->id],
            $request->all()
        );

        return redirect('matricula');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $dado = Matricula::findOrFail($id);
        // dd($dado);
        $dado->delete();

        return redirect('matricula');
    }

    public function search(Request $request)
    {
        if (!empty($request->nome)) {
            $dados = Matricula::where(
                "nome",
                "like",
                "%" . $request->nome . "%"
            )->paginate($this->pagination);
        } else {
            $dados = Matricula::paginate($this->pagination);
        }
        // dd($dados);

        return view("matricula.list", ["dados" => $dados]);
    }

    public function detail($id)
    {
        $matricula = Matricula::find($id);

        $curso = $matricula->curso;
        $turma = $matricula->turma;
        $aluno = $matricula->aluno;

        //dd($matricula->turma);

        return view('matricula.detail',[
            'dado'=> $matricula,
            'curso'=> $curso,
            'turma'=> $turma,
            'aluno'=> $aluno,
        ]);
    }

    public function report() {

        $dados = Matricula::orderBy('id')->get();
        // dd( $dados );

        $pdf = Pdf::loadView('matricula.report', ['dados' => $dados]);

       // dd($pdf);

        return $pdf->download('listagem_matriculas.pdf');
    }

    public function chart(NotasAlunoChart $notasChart,
                 MediaNotasAlunoChart $mediaNotasChart)
    {
      //  $matriculas = Matricula::paginate($this->pagination);

        //dd($matriculas[1]->turma);

        return view('matricula.chart',[
            'notasChart'=> $notasChart->build(),
            'mediaNotasChart'=> $mediaNotasChart->build(),
        ]);
    }
}

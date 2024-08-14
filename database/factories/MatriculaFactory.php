<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Curso;
use App\Models\Turma;
use App\Models\Aluno;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Matricula>
 */
class MatriculaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'curso_id' => (Curso::inRandomOrder()->first())->id,
            'turma_id' => (Turma::inRandomOrder()->first())->id,
            'aluno_id' => (Aluno::inRandomOrder()->first())->id,
            'data_matricula' => fake()->date(),
        ];
    }
}

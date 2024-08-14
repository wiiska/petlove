<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       Categoria::factory()->count(3)->create();
       // ou
        /*
       Categoria::factory()
       ->count(3)
       ->sequence([
           'nome' => "Categoria 01",
           'nome' => "Categoria 02",
           'nome' => "Categoria 03",
           ])
       ->create();
       */
    }
}

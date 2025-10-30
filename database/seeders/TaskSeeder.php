<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Task;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    public function run(): void
    {
        $estudo = Category::where('name','Estudo')->first();
        $trab   = Category::where('name','Trabalho')->first();

        Task::factory()->count(0); // se tiver factory; não é necessário
        Task::create([
            'category_id' => $estudo?->id ?? Category::first()->id,
            'title' => 'Revisar Laravel',
            'description' => 'Ler migrations, Eloquent e Blade.',
            'completed' => false,
        ]);

        Task::create([
            'category_id' => $trab?->id ?? Category::first()->id,
            'title' => 'Enviar relatório',
            'description' => 'Relatório semanal do projeto.',
            'completed' => true,
        ]);
    }
}



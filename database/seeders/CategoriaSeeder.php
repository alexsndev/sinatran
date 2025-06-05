<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorias = [
            'Notícias',
            'Eventos',
            'Agentes',
            'Artigos',
            'Convocações',
        ];

        foreach ($categorias as $categoria) {
            DB::table('categorias')->updateOrInsert(
                ['nome' => $categoria],
                ['created_at' => now(), 'updated_at' => now()]
            );
        }
    }
}

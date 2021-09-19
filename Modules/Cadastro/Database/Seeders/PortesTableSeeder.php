<?php

namespace Modules\Cadastro\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Cadastro\Entities\Portes;

class PortesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        Portes::create([
            "nome" => "PEQUENO",
            "ativo" => "S"
        ]);

        Portes::create([
            "nome" => "MÉDIO",
            "ativo" => "S"
        ]);

        Portes::create([
            "nome" => "GRANDE",
            "ativo" => "S"
        ]);
    }
}

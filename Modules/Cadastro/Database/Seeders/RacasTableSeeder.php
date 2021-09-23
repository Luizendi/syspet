<?php

namespace Modules\Cadastro\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Cadastro\Entities\Racas;

class RacasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        Racas::create([
            "fk_especie" => "1",
            "nome" => "PERSA",
            "ativo" => "S"
        ]);
    }
}

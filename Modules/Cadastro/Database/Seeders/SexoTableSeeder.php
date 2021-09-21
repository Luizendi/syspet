<?php

namespace Modules\Cadastro\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Cadastro\Entities\Sexo;

class SexoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        Sexo::create([
            "nome" => "MACHO",
            "ativo" => "S"
        ]);

        Sexo::create([
            "nome" => "FÊMEA",
            "ativo" => "S"
        ]);
    }
}

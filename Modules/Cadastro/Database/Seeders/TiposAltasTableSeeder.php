<?php

namespace Modules\Cadastro\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Cadastro\Entities\TiposAltas;

class TiposAltasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        TiposAltas::create([
            "nome" => "ALTA MELHORADA",
            "obito" => "N",
            "ativo" => "S"
        ]);
    }
}

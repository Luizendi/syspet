<?php

namespace Modules\Cadastro\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Cadastro\Entities\Leitos;

class LeitosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        Leitos::create([
            "fk_porte" => "1",
            "nome" => "A1",
            "isolamento" => "N",
            "ativo" => "S"
        ]);
    }
}

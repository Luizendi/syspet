<?php

namespace Modules\Cadastro\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Cadastro\Entities\Especies;

class EspeciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        Especies::create([
            "nome" => "FELINOS",
            "ativo" => "S"
        ]);

    }
}

<?php

namespace Modules\Cadastro\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CadastroDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call([PortesTableSeeder::class]);
        $this->call([EspeciesTableSeeder::class]);
        $this->call([RacasTableSeeder::class]);
        $this->call([TiposAltasTableSeeder::class]);
        $this->call([LeitosTableSeeder::class]);
    }
}

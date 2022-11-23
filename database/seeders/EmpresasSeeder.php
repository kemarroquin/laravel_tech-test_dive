<?php

namespace Database\Seeders;

use App\Models\API\Empresas;
use Illuminate\Database\Seeder;

class EmpresasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Empresas::factory()
            ->count(5)
            ->hasUsuarios(5)
            ->create();
    }
}

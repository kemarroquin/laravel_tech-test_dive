<?php

namespace Database\Seeders;

use App\Models\API\Company;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::factory()
            ->count(5)
            ->hasUsers(5)
            ->create();
    }
}

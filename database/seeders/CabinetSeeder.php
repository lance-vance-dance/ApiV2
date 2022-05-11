<?php

namespace Database\Seeders;

use App\Models\Cabinet;
use Illuminate\Database\Seeder;

class CabinetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cabinet::factory(30)->create();
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{User, Group};

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RolesTableSeeder::class,
            SubjectsSeeder::class,
            CabinetSeeder::class
        ]);

        Group::factory(10)->create()->each(function (Group $group) {
            User::factory(mt_rand(20, 30))->create([
                'group_id' => $group->id
            ]); 
        });
    }
}

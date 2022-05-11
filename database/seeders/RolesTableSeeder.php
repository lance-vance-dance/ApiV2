<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
         * Role Types
         *
         */
        $RoleItems = [
            [
                'name'        => 'Завуч',
                'slug'        => 'head_teacher',
                'level'       => 5,
            ],
            [
                'name'        => 'Учитель',
                'slug'        => 'teacher',
                'level'       => 4,
            ],
            [
                'name'        => 'Ученик',
                'slug'        => 'student',
                'level'       => 2,
            ],
            [
                'name'        => 'Родитель',
                'slug'        => 'parent',
                'level'       => 3,
            ],
            [
                'name'        => 'Администратор',
                'slug'        => 'admin',
                'level'       => 1,
            ],
        ];

        /*
         * Add Role Items
         *
         */
        foreach ($RoleItems as $RoleItem) {
            $newRoleItem = config('roles.models.role')::where('slug', '=', $RoleItem['slug'])->first();
            if ($newRoleItem === null) {
                $newRoleItem = config('roles.models.role')::create([
                    'name'          => $RoleItem['name'],
                    'slug'          => $RoleItem['slug'],
                    'description'   => '',
                    'level'         => $RoleItem['level'],
                ]);
            }
        }
    }
}

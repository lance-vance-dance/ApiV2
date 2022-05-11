<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Seeder;

class SubjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subjects = ['Математика', 'Русский язык', 'Литература' , 'Иностранный язык', 'История', 'Обществознание', 'География', 'Геометрия', 'Информатика', 'Физика', 'Биология', 'Химия', 'Изобразительное искусство', 'Музыка', 'Технология', 'Физическая культура', 'Основы безопасности жизнедеятельности'];
        foreach ($subjects as $subject)
        {
            Subject::create([
                'name' => $subject
            ]);
        }
    }
}

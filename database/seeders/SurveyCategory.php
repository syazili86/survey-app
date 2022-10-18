<?php

namespace Database\Seeders;

use App\Models\SurveyCategory as ModelsSurveyCategory;
use Illuminate\Database\Seeder;

class SurveyCategory extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Aktivitas Belajar Mengajar',
                'options' => '[{"value": 1, "item": "Sangat Tidak Puas"},{"value": 2, "item": "Tidak Puas"},{"value": 3, "item": "Puas"},{"value": 4, "item": "Sangat Puas"}]',
                "created_at" =>  \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now()
            ]
        ];

        ModelsSurveyCategory::insert($data);
    }
}

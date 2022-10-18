<?php

namespace Database\Seeders;

use App\Models\Survey as ModelsSurvey;
use Illuminate\Database\Seeder;

class Survey extends Seeder
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
                'categoryId' => 1,
                'name' => 'Apakah materi yang disampaikan sesuai dengan RPS',
                "created_at" =>  \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now()
            ],
            [
                'categoryId' => 1,
                'name' => 'Cara dosen menyampaikan materi menarik/tidak',
                "created_at" =>  \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now()
            ],
            [
                'categoryId' => 1,
                'name' => 'Apakah bahan ajar menarik (video dan PPT)',
                "created_at" =>  \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now()
            ],
        ];

        ModelsSurvey::insert($data);
    }
}

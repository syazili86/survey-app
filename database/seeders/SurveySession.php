<?php

namespace Database\Seeders;

use App\Models\SurveySession as ModelsSurveySession;
use Illuminate\Database\Seeder;

class SurveySession extends Seeder
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
                'name' => 'Sesi 1 - Aktivitas Belajar Mengajar',
                "start" =>  '2022-10-20',
                "end" => '2022-12-30',
                "active" => true,
                "created_at" =>  \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Sesi 2 - Aktivitas Belajar Mengajar',
                "start" =>  '2022-03-01',
                "end" => '2022-03-30',
                "active" => false,
                "created_at" =>  \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now()
            ]
        ];

        ModelsSurveySession::insert($data);
    }
}

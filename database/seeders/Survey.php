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
            ['ratingName'=>'Apakah materi yang disampaikan sesuai dengan RPS', 'value'=>'5',"created_at" =>  \Carbon\Carbon::now(),"updated_at" => \Carbon\Carbon::now()],
            ['ratingName'=>'Cara dosen menyampaikan materi menarik/tidak', 'value'=>'5',"created_at" =>  \Carbon\Carbon::now(),"updated_at" => \Carbon\Carbon::now()],
            ['ratingName'=>'Apakah bahan ajar menarik (video dan PPT)', 'value'=>'5',"created_at" =>  \Carbon\Carbon::now(),"updated_at" => \Carbon\Carbon::now()],
        ];

        ModelsSurvey::insert($data);
    }
}

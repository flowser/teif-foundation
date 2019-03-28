<?php

use Illuminate\Database\Seeder;
use App\Models\Course\Syllabus\standard\Practice;

class PracticeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Practice::create(['name' => 'Academic']);
        Practice::create(['name' => 'Industrial']);
        Practice::create(['name' => 'Freelance']);
        Practice::create(['name' => 'Profession']);
        Practice::create(['name' => 'Academic/Industrial/Proffesion']);
        Practice::create(['name' => 'Academic/Industrial/Freelance/Proffesion']);
    }
}

<?php

use Illuminate\Database\Seeder;
use App\Models\Course\standard\CourseLanguage;

class CourseLanguageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CourseLanguage::create(['name'  => 'English',]);
        CourseLanguage::create(['name'  => 'Kiswahili',]);
    }
}



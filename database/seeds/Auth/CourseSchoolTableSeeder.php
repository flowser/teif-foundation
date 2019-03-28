<?php

use Illuminate\Database\Seeder;
use App\Models\Course\standard\CourseSchool;

class CourseSchoolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CourseSchool::create(['name' => 'ARTIFICIAL INTELLIGENCE',]);
        CourseSchool::create(['name' => 'DATA SCIENCE',]);
        CourseSchool::create(['name' => 'PROGRAMMING',]);
        CourseSchool::create(['name' => 'AUTONOMOUS',]);
        CourseSchool::create(['name' => 'MECHANICAL',]);
        CourseSchool::create(['name' => 'ELECTRICAL',]);
        CourseSchool::create(['name' => 'BUSINESS',]);
        CourseSchool::create(['name' => 'CAREER',]);
    }
}



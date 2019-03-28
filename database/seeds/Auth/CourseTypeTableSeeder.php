<?php

use Illuminate\Database\Seeder;
use App\Models\Course\standard\CourseType;

class CourseTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CourseType::create(['name'  => 'Credit Eligible',]);
        CourseType::create(['name'  => 'Masters Degree',]);
        CourseType::create(['name'  => 'Micro Masters Programmes',]);
        CourseType::create(['name'  => 'Proffesional Certificate',]);
        CourseType::create(['name'  => 'Proffesional Education',]);
        CourseType::create(['name'  => 'Teenage Programmes',]);
        CourseType::create(['name'  => 'Verified',]);
        CourseType::create(['name'  => 'Tseries',]);
    }
}



<?php

use Illuminate\Database\Seeder;
use App\Models\Course\standard\CourseFeature;

class CourseFeatureTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CourseFeature::create(['name'  => 'Vedio',]);
        CourseFeature::create(['name'  => 'Audio',]);
        CourseFeature::create(['name'  => 'Notes',]);
    }
}



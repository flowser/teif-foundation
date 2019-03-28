<?php

use Illuminate\Database\Seeder;
use App\Models\Course\standard\CourseAvailability;

class CourseAvailabilityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CourseAvailability::create(['name'  => 'Current',]);
        CourseAvailability::create(['name'  => 'Soon Starting',]);
        CourseAvailability::create(['name'  => 'Upcoming',]);
        CourseAvailability::create(['name'  => 'Self Paced',]);
        CourseAvailability::create(['name'  => 'Archived',]);
    }
}




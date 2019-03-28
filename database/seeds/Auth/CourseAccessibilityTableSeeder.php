<?php

use Illuminate\Database\Seeder;
use App\Models\Course\standard\CourseAccessibility;

class CourseAccessibilityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CourseAccessibility::create(['name'  => 'Online',]);
        CourseAccessibility::create(['name'  => 'Offline',]);
    }
}


